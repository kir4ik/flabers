<script src="/public/js/jquery.inputmask.bundle.js"></script>

<nav class="nav">
    <a href="/order/create" class="nav__item nav__item--active">Создать заказ</a>
    <div class="line-y--mx"></div>
    <a href="/order/list" class="nav__item">Отчеты о заказах</a>
</nav>
<div class="line-x"></div>

<?php if(!empty($_POST) && empty($errors)): ?>
  <script>alert('Всё ок\nЗаявка принята');</script>
<?php elseif(!empty($errors)): foreach($errors as $field => $err): ?>
    <ul>Поле: <?= $field ?>
    <?php for($i = 0; $i < count($err); $i++): ?>
      <li>Ошибка: <?= $err[$i] ?></li>
    <?php endfor; ?>
    </ul>
  <?php endforeach; ?>
<?php endif; ?>

<form action="/order/create" method="POST" class="form" id="form_create">
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

<!-- validation & mask -->
<script type="text/javascript">
  var maskPhone = '+38(999) 999-99-99'; // mask

  var phone = $("#phone").inputmask({"mask": maskPhone, showMaskOnFocus: true, showMaskOnHover: true, clearMaskOnLostFocus : false});

  // validation for all field by default
  var totalValid = {
    required: true,
    normalizer: function( value ) {
          return $.trim( value );
        }
  };
  var msg = { // messages for display error
    required: 'обязательное поле',
    alphabet: 'может содержать только буквы',
    number: 'должно быть числом',
    email: 'не корректный E-mail',
    phone: 'не корректный номер',
  };

  // Custom nethod validation
  $.validator.addMethod('customEmail', function(value, element) {
    var pattern = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?){1}$/;

    return pattern.test(value);
  });

  $.validator.addMethod('alphabet', function(value, element) {
    var pattern = /^(?:[a-zа-я]+\s*)+$/i;

    return pattern.test(value);
  });
 
  $.validator.addMethod('phone', function(value, element) {
    return  Inputmask.isValid(value, maskPhone);
  });

  // set validator
  $( "#form_create" ).validate({
    wrapper: 'div class="form__label form__error"',
    errorPlacement: function(error, element) {
      error.insertBefore(element);
    },
    errorClass: 'form__input--error',
    validClass: 'form__input--success',
    highlight: function(element, errorClass, validClass) {
      $(element).addClass(errorClass).removeClass(validClass);
    },
    unhighlight: function(element, errorClass, validClass) {
      $(element).addClass(validClass).removeClass(errorClass);
    },
    rules: {
      client_name: {
        ...totalValid,
        alphabet: true
      },
      client_last_name: {
        ...totalValid,
        alphabet: true
      },
      phone: {
        ...totalValid,
        phone: true
      },
      email: {
        ...totalValid,
        email: false,
        customEmail: true
      },
      city: {
        ...totalValid,
        alphabet: true
      },
      amount: {
        ...totalValid,
        number: true
      }
    },
    messages: {
      client_name: {
        required: msg.required,
        alphabet: msg.alphabet,
      },
      client_last_name: {
        required: msg.required,
        alphabet: msg.alphabet,
      },
      phone: {
        required: msg.required,
        phone: msg.phone,
      },
      email: {
          required: msg.required,
          customEmail: msg.email,
          email: msg.email,
      },
      city: {
        required: msg.required,
        alphabet: msg.alphabet,
      },
      amount: {
          required: msg.required,
          number: msg.number,
      }
    }
  });
</script>