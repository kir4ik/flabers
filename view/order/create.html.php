<?php if(!empty($errors)) foreach($errors as $field => $err): ?>
  <ul>Поле: <?= $field ?>
  <?php for($i = 0; $i < count($err); $i++): ?>
    <li>Ошибка: <?= $err[$i] ?></li>
  <?php endfor; ?>
  </ul>
<?php endforeach; ?>

<form action="./" method="post" id="base" class="">

  <!-- Unnamed (Rectangle) -->
  <div id="u0" class="ax_default heading_1">
    <div id="u0_div" class=""></div>
    <div id="u0_text" class="text ">
      <p><span>Создать заказ</span></p>
    </div>
  </div>

  <!-- Unnamed (Text Field) -->
  <div id="u1" class="ax_default text_field">
    <input id="u1_input" type="text" name="client_name" value="<?= isset($_POST['client_name']) ? $_POST['client_name'] : '' ?>"/>
  </div>

  <!-- Unnamed (Rectangle) -->
  <div id="u2" class="ax_default label">
    <div id="u2_div" class=""></div>
    <div id="u2_text" class="text ">
      <p><span>Имя клиента</span></p>
    </div>
  </div>

  <!-- Unnamed (Text Field) -->
  <div id="u3" class="ax_default text_field">
    <input id="u3_input" type="text" name="client_last_name" value="<?= isset($_POST['client_last_name']) ? $_POST['client_last_name'] : '' ?>"/>
  </div>

  <!-- Unnamed (Rectangle) -->
  <div id="u4" class="ax_default label">
    <div id="u4_div" class=""></div>
    <div id="u4_text" class="text ">
      <p><span>Фамилия клиента</span></p>
    </div>
  </div>

  <!-- Unnamed (Text Field) -->
  <div id="u5" class="ax_default text_field">
    <input id="u5_input" type="text" name="phone" value="<?= isset($_POST['phone']) ? $_POST['phone'] : '+38(___) ___-__-__' ?>"/>
  </div>

  <!-- Unnamed (Rectangle) -->
  <div id="u6" class="ax_default label">
    <div id="u6_div" class=""></div>
    <div id="u6_text" class="text ">
      <p><span>Номер телефона</span></p>
    </div>
  </div>

  <!-- Unnamed (Text Field) -->
  <div id="u7" class="ax_default text_field">
    <input id="u7_input" type="text" name="city" value="<?= isset($_POST['city']) ? $_POST['city'] : '' ?>"/>
  </div>

  <!-- Unnamed (Rectangle) -->
  <div id="u8" class="ax_default label">
    <div id="u8_div" class=""></div>
    <div id="u8_text" class="text ">
      <p><span>Город</span></p>
    </div>
  </div>

  <!-- Unnamed (Text Field) -->
  <div id="u9" class="ax_default text_field">
    <input id="u9_input" type="number" name="amount" min="0.00" step="0.01" value="<?= isset($_POST['amount']) ? $_POST['amount'] : '00.00' ?>"/>
  </div>

  <!-- Unnamed (Rectangle) -->
  <div id="u10" class="ax_default label">
    <div id="u10_div" class=""></div>
    <div id="u10_text" class="text ">
      <p><span>Сумма</span></p>
    </div>
  </div>

  <!-- Unnamed (Rectangle) -->
  <div id="u11" class="ax_default button">
    <div id="u11_div" class=""></div>
    <div id="u11_text" class="text ">
      <p><span>Очистить</span></p>
    </div>
  </div>

  <!-- Unnamed (Rectangle) -->
  <div id="u12" class="ax_default primary_button">
    <input type="submit" id="u12_div" value="Создать" style="color: white; cursor: pointer"></div>
    <div id="u12_text" class="text ">
      <!-- <p><span>Создать</span></p> -->
    </div>
  </div>

  <!-- Unnamed (Text Field) -->
  <div id="u13" class="ax_default text_field">
    <input id="u13_input" type="email" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>"/>
  </div>

  <!-- Unnamed (Rectangle) -->
  <div id="u14" class="ax_default label">
    <div id="u14_div" class=""></div>
    <div id="u14_text" class="text ">
      <p><span>Эл.почта</span></p>
    </div>
  </div>

  <!-- Unnamed (Rectangle) -->
  <div id="u15" class="ax_default label">
    <div id="u15_div" class=""></div>
    <div id="u15_text" class="text ">
      <p><span>гривен</span></p>
    </div>
  </div>

  <!-- Unnamed (Rectangle) -->
  <div id="u16" class="ax_default label">
    <div id="u16_div" class=""></div>
    <div id="u16_text" class="text ">
      <p><span>Создать заказ</span></p>
    </div>
  </div>

  <!-- Unnamed (Rectangle) -->
  <div id="u17" class="ax_default label">
    <div id="u17_div" class=""></div>
    <div id="u17_text" class="text ">
      <p><span>Отчеты о заказах</span></p>
    </div>
  </div>

  <!-- Unnamed (Vertical Line) -->
  <div id="u18" class="ax_default line">
    <img id="u18_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/создать/u18.png?token=f5bbb820b1209a2458893e80acb23a20"/>
  </div>

  <!-- Unnamed (Horizontal Line) -->
  <div id="u19" class="ax_default line">
    <img id="u19_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/создать/u19.png?token=557125e6f6e567984ef837318be0f77e"/>
  </div>

  <!-- Unnamed (Rectangle) -->
  <div id="u20" class="ax_default label">
    <div id="u20_div" class=""></div>
    <div id="u20_text" class="text ">
      <p><span>Обязательное поле, только буквы</span></p>
    </div>
  </div>

  <!-- Unnamed (Rectangle) -->
  <div id="u21" class="ax_default label">
    <div id="u21_div" class=""></div>
    <div id="u21_text" class="text ">
      <p><span>Обязательное поле, только буквы</span></p>
    </div>
  </div>

  <!-- Unnamed (Rectangle) -->
  <div id="u22" class="ax_default label">
    <div id="u22_div" class=""></div>
    <div id="u22_text" class="text ">
      <p><span>Обязательное поле, только цифры по маске</span></p>
    </div>
  </div>

  <!-- Unnamed (Rectangle) -->
  <div id="u23" class="ax_default label">
    <div id="u23_div" class=""></div>
    <div id="u23_text" class="text ">
      <p><span>Обязательное поле, валидация email</span></p>
    </div>
  </div>

  <!-- Unnamed (Rectangle) -->
  <div id="u24" class="ax_default label">
    <div id="u24_div" class=""></div>
    <div id="u24_text" class="text ">
      <p><span>Обязательное поле, только буквы</span></p>
    </div>
  </div>

  <!-- Unnamed (Rectangle) -->
  <div id="u25" class="ax_default label">
    <div id="u25_div" class=""></div>
    <div id="u25_text" class="text ">
      <p><span>Обязательное поле, только цифры</span></p>
    </div>
  </div>
</form>