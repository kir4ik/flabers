<script src="/public/js/jquery.mask.min.js"></script>

<?php if(!empty($errors)) foreach($errors as $field => $err): ?>
  <ul>Поле: <?= $field ?>
  <?php for($i = 0; $i < count($err); $i++): ?>
    <li>Ошибка: <?= $err[$i] ?></li>
  <?php endfor; ?>
  </ul>
<?php endforeach; ?>

<nav class="nav">
    <a href="/order/create" class="nav__item nav__item--active">Создать заказ</a>
    <div class="line-y--mx"></div>
    <a href="/order/list" class="nav__item">Отчеты о заказах</a>
</nav>
<div class="line-x"></div>

<form action="/order/create" method="POST" class="form">
  <h3 class="title">Создать заказ</h3>

  <div class="form__group">
    <label for="client_name" class="label form__label">Имя Клиента</label>
    <input type="text" name="client_name" id="client_name"
          value="<?= isset($_POST['client_name']) ? $_POST['client_name'] : '' ?>"
          class="input form__input"/>
    <span class="hint form__hint">Обязательное поле, только буквы</span>
  </div>

  <div class="form__group">
    <label for="client_last_name" class="label form__label">Фамилия клиента</label>
    <input type="text" name="client_last_name" id="client_last_name"
          value="<?= isset($_POST['client_last_name']) ? $_POST['client_last_name'] : '' ?>"
          class="input form__input"/>
    <span class="hint form__hint">Обязательное поле, только буквы</span>
  </div>

  <div class="form__group">
    <label for="phone" class="label form__label">Номер телефона</label>
    <input type="text" name="phone" id="phone" data-mask="+38(___) ___-__-__"
          value="<?= isset($_POST['phone']) ? $_POST['phone'] : '+38(___) ___-__-__' ?>"
          class="input form__input"/>
    <span class="hint form__hint">Обязательное поле, только цифры по маске</span>
  </div>

  <div class="form__group">
    <label for="email" class="label form__label">Эл.почта</label>
    <input type="email" name="email" id="email"
          value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>"
          class="input form__input"/>
    <span class="hint form__hint">Обязательное поле, валидация email</span>
  </div>

  <div class="form__group">
    <label for="city" class="label form__label">Город</label>
    <input type="text" name="city" id="city"
          value="<?= isset($_POST['city']) ? $_POST['city'] : '' ?>"
          class="input form__input"/>
    <span class="hint form__hint">Обязательное поле, только буквы</span>
  </div>

  <div class="form__group">
    <label for="amount" class="label form__label">Сумма</label>
    <input type="number" name="amount" id="amount"  min="0.00" step="0.01" placeholder="00.00"
          value="<?= isset($_POST['amount']) ? $_POST['amount'] : '' ?>"
          class="input form__input--number"/>
    <span class="text form__text">гривен</span>
    <span class="hint form__hint">Обязательное поле, только цифры</span>
  </div>

  <div class="form__group">
    <input type="submit" value="Создать" class="btn form__submit">
    <input type="reset" value="Очистить" class="btn form__reset">
  </div>

</form>

<script type="text/javascript">
  $("#phone").mask("+38(999) 9999-99-99", {
    translation: {
      // '_': {pattern: /\d/, optional: false},
    },
    optional: false,
    placeholder: "+38(___) ___-__-__"
  });
</script>