<nav class="nav">
    <a href="/order/create" class="nav__item">Создать заказ</a>
    <div class="line-y--mx"></div>
    <a href="/order/list" class="nav__item--active">Отчеты о заказах</a>
</nav>
<div class="line-x"></div>

<form action="/order/list" method="GET" class="form" id="form_filter">
  <h3 class="title">Отчет о заказах</h3>

  <div class="form__group-filter">
    <label for="id" class="label form__label">№ заказа</label>
    <input type="number" name="id" id="id" min="0" step="1"
          value="<?= isset($_GET['id']) ? $_GET['id'] : '' ?>"
          class="input form__input-filter--number"/>
  </div>

  <div class="form__group-filter">
    <label for="client_name" class="label form__label">Имя Клиента</label>
    <input type="text" name="client_name" id="client_name"
          value="<?= isset($_GET['client_name']) ? $_GET['client_name'] : '' ?>"
          class="input form__input-filter"/>
  </div>

  <div class="form__group-filter">
  <label for="amount" class="label form__label">Сумма заказа</label>
    <select  id="amount" name="amount" class="input form__input--select">
        <option value="" <?= getIsExists($_GET['amount']) ? '' : 'selected' ?> >-- выбрать --</option>
        <option value="{lt}100" <?= $_GET['amount'] === '{lt}100' ? 'selected' : '' ?> >До 100 гривен</option>
        <option value="{lt}500" <?= $_GET['amount'] === '{lt}500' ? 'selected' : '' ?> >До 500 гривен</option>
        <option value="{lt}1000" <?= $_GET['amount'] === '{lt}1000' ? 'selected' : '' ?> >До 1000 гривен</option>
        <option value="{lt}5000" <?= $_GET['amount'] === '{lt}5000' ? 'selected' : '' ?> >До 5000 гривен</option>
        <option value="{lt}10000" <?= $_GET['amount'] === '{lt}10000' ? 'selected' : '' ?> >До 10000 гривен</option>
      </select>
  </div>

  <div class="form__group">
    <input type="submit" value="Найти" name="filter" class="btn form__submit">
  </div>

</form>

<section>
  <div class="info">
    <h3 class="title info__title">Найдено <span id="count_orders"><?= getIsExists($count, '0') ?></span> заказов</h3>
    <p class="text">На сумму <span id="sum_in_UAH"><?= getIsExists($sumInUAH, '0.00') ?></span> гривен или $<span id="sum_in_USD"><?= getIsExists($sumInUSD, '0.00') ?></span></p>
  </div>
  <div class="line-x--my"></div>
  
  <table>
    <tr>
      <th>№ заказа</th>
      <th>Имя</th>
      <th>Фамилия</th>
      <th>Телефон</th>
      <th>Эл.Почта</th>
      <th>Город</th>
      <th>Сумма</th>
    </tr>
    <tbody id="order_list">
      <?php if(!empty($orders)) foreach($orders as $record): ?>
        <tr>
          <td><?= $record['id'] ?></td>
          <td><?= $record['client_name'] ?></td>
          <td><?= $record['client_last_name'] ?></td>
          <td><?= $record['phone'] ?></td>
          <td><?= $record['email'] ?></td>
          <td><?= $record['city'] ?></td>
          <td><?= getAsPrice($record['amount']) ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <div class="pagin">
    <button class="pagin__btn_page--active">1</button>
    <button class="pagin__btn_page">2</button>
    <button class="pagin__btn_page">3</button>
    <button class="pagin__btn_page">4</button>
  </div>
</section>

<!-- AJAX for get list orders -->
<script>
  let form = $('#form_filter');
  let orderResList = $('#order_list');
  let countOrders = $('#count_orders');
  let sumInUAH = $('#sum_in_UAH');
  let sumInUSD = $('#sum_in_USD');

  let lastQuery = null;

  let listCols = ['id', 'client_name', 'client_last_name', 'phone', 'email', 'city', 'amount'];

  function hadleRes(res) {
    countOrders.text(res.count);
    sumInUAH.text(res.sumInUAH);
    sumInUSD.text(res.sumInUSD);

    orderResList.empty();
    
    if(res.count == 0) return;

    let protoRow = $('<tr/>');
    let protoCol = $('<td/>');

    for(let order of res.orders) {
      let row = protoRow.clone();
      
      for (let col of listCols) {
        let text = order[col];

        if(col === 'amount') {
          text = Number(text).toFixed(2);
        }

        row.append( protoCol.clone().text(text) );
        orderResList.append(row);
      }
    }
  }

  form.on('submit', (e) => {
    e.preventDefault();

    let nextQuery = form.serialize();

    if (lastQuery == nextQuery) {
      return;
    }
    lastQuery = nextQuery;

    $.ajax({
      method: 'GET',
      url: '/order/list/?r_type=json',
      data: form.serialize()
    })
    .done((res) => hadleRes(res))
    .error((err) => {
      alert('\tooops!\nЧто-то пошло не так');
      console.log(err);
    });
  });
</script>