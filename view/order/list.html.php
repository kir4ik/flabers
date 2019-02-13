<?php if(!empty($orders)) foreach($orders as $record): ?>
  <ul>
    <li>ID: <?= $record['id'] ?></li>
    <li>Имя: <?= $record['client_name'] ?></li>
    <li>Фамилия: <?= $record['client_last_name'] ?></li>
    <li>Телефон: <?= $record['phone'] ?></li>
    <li>E-mail: <?= $record['email'] ?></li>
    <li>Город: <?= $record['city'] ?></li>
    <li>Сумма: <?= $record['amount'] ?></li>
  </ul>
<?php endforeach; ?>
<form method="GET" action="./" id="base" class="">

  <!-- Unnamed (Rectangle) -->
  <div id="u26" class="ax_default heading_1">
    <div id="u26_div" class=""></div>
    <div id="u26_text" class="text ">
      <p><span>Отчет о заказах</span></p>
    </div>
  </div>

  <!-- Unnamed (Rectangle) -->
  <div id="u27" class="ax_default primary_button">
    <input type="submit" id="u27_div" value="Найти" name="filter" style="color: white; cursor: pointer">
    <div id="u27_text" class="text ">
      <!-- <p><span>Найти</span></p> -->
    </div>
  </div>

  <!-- Unnamed (Rectangle) -->
  <div id="u28" class="ax_default label">
    <div id="u28_div" class=""></div>
    <div id="u28_text" class="text ">
      <p><span>Создать заказ</span></p>
    </div>
  </div>

  <!-- Unnamed (Rectangle) -->
  <div id="u29" class="ax_default label">
    <div id="u29_div" class=""></div>
    <div id="u29_text" class="text ">
      <p><span>Отчеты о заказах</span></p>
    </div>
  </div>

  <!-- Unnamed (Vertical Line) -->
  <div id="u30" class="ax_default line">
    <img id="u30_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/создать/u18.png?token=f5bbb820b1209a2458893e80acb23a20"/>
  </div>

  <!-- Unnamed (Horizontal Line) -->
  <div id="u31" class="ax_default line">
    <img id="u31_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/создать/u19.png?token=557125e6f6e567984ef837318be0f77e"/>
  </div>

  <!-- Unnamed (Table) -->
  <div id="u32" class="ax_default">

    <!-- Unnamed (Table Cell) -->
    <div id="u33" class="ax_default table_cell">
      <img id="u33_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u33.png?token=5e36b3b979a4f66c38e68564e6c0af79"/>
      <div id="u33_text" class="text ">
        <p><span>№ заказа</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u34" class="ax_default table_cell">
      <img id="u34_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u34.png?token=c9b40b116bd4d7b7bdab2fd801f9b1e2"/>
      <div id="u34_text" class="text ">
        <p><span>Имя</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u35" class="ax_default table_cell">
      <img id="u35_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u35.png?token=87dfa2788f1bd99276c3e7fdb923e996"/>
      <div id="u35_text" class="text ">
        <p><span>Фамилия</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u36" class="ax_default table_cell">
      <img id="u36_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u36.png?token=94d895dddafdf3e4534563ac119430c8"/>
      <div id="u36_text" class="text ">
        <p><span>Телефон</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u37" class="ax_default table_cell">
      <img id="u37_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u37.png?token=32d99ac633e123a848226790c390fcf3"/>
      <div id="u37_text" class="text ">
        <p><span>Эл.Почта</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u38" class="ax_default table_cell">
      <img id="u38_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u38.png?token=51290c6b46f80e7c36233f8a3e463f83"/>
      <div id="u38_text" class="text ">
        <p><span>Город</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u39" class="ax_default table_cell">
      <img id="u39_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u39.png?token=9cdd889dc442bfbf034805ed82544c7a"/>
      <div id="u39_text" class="text ">
        <p><span>Сумма</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u40" class="ax_default table_cell">
      <img id="u40_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u33.png?token=5e36b3b979a4f66c38e68564e6c0af79"/>
      <div id="u40_text" class="text ">
        <p><span>1</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u41" class="ax_default table_cell">
      <img id="u41_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u34.png?token=c9b40b116bd4d7b7bdab2fd801f9b1e2"/>
      <div id="u41_text" class="text ">
        <p><span>Диана</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u42" class="ax_default table_cell">
      <img id="u42_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u35.png?token=87dfa2788f1bd99276c3e7fdb923e996"/>
      <div id="u42_text" class="text ">
        <p><span>Захарова</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u43" class="ax_default table_cell">
      <img id="u43_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u36.png?token=94d895dddafdf3e4534563ac119430c8"/>
      <div id="u43_text" class="text ">
        <p><span>380671234567</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u44" class="ax_default table_cell">
      <img id="u44_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u37.png?token=32d99ac633e123a848226790c390fcf3"/>
      <div id="u44_text" class="text ">
        <p><span>user@gmail.com</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u45" class="ax_default table_cell">
      <img id="u45_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u38.png?token=51290c6b46f80e7c36233f8a3e463f83"/>
      <div id="u45_text" class="text ">
        <p><span>Киев</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u46" class="ax_default table_cell">
      <img id="u46_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u39.png?token=9cdd889dc442bfbf034805ed82544c7a"/>
      <div id="u46_text" class="text ">
        <p><span>321,23</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u47" class="ax_default table_cell">
      <img id="u47_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u33.png?token=5e36b3b979a4f66c38e68564e6c0af79"/>
      <div id="u47_text" class="text ">
        <p><span>2</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u48" class="ax_default table_cell">
      <img id="u48_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u34.png?token=c9b40b116bd4d7b7bdab2fd801f9b1e2"/>
      <div id="u48_text" class="text ">
        <p><span>Вячеслав</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u49" class="ax_default table_cell">
      <img id="u49_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u35.png?token=87dfa2788f1bd99276c3e7fdb923e996"/>
      <div id="u49_text" class="text ">
        <p><span>Кротов</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u50" class="ax_default table_cell">
      <img id="u50_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u36.png?token=94d895dddafdf3e4534563ac119430c8"/>
      <div id="u50_text" class="text ">
        <p><span>380671234567</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u51" class="ax_default table_cell">
      <img id="u51_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u37.png?token=32d99ac633e123a848226790c390fcf3"/>
      <div id="u51_text" class="text ">
        <p><span>user@gmail.com</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u52" class="ax_default table_cell">
      <img id="u52_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u38.png?token=51290c6b46f80e7c36233f8a3e463f83"/>
      <div id="u52_text" class="text ">
        <p><span>Херсон</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u53" class="ax_default table_cell">
      <img id="u53_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u39.png?token=9cdd889dc442bfbf034805ed82544c7a"/>
      <div id="u53_text" class="text ">
        <p><span>4567,00</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u54" class="ax_default table_cell">
      <img id="u54_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u33.png?token=5e36b3b979a4f66c38e68564e6c0af79"/>
      <div id="u54_text" class="text ">
        <p><span>3</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u55" class="ax_default table_cell">
      <img id="u55_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u34.png?token=c9b40b116bd4d7b7bdab2fd801f9b1e2"/>
      <div id="u55_text" class="text ">
        <p><span>Максим</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u56" class="ax_default table_cell">
      <img id="u56_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u35.png?token=87dfa2788f1bd99276c3e7fdb923e996"/>
      <div id="u56_text" class="text ">
        <p><span>Котов</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u57" class="ax_default table_cell">
      <img id="u57_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u36.png?token=94d895dddafdf3e4534563ac119430c8"/>
      <div id="u57_text" class="text ">
        <p><span>380671234567</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u58" class="ax_default table_cell">
      <img id="u58_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u37.png?token=32d99ac633e123a848226790c390fcf3"/>
      <div id="u58_text" class="text ">
        <p><span>user@gmail.com</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u59" class="ax_default table_cell">
      <img id="u59_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u38.png?token=51290c6b46f80e7c36233f8a3e463f83"/>
      <div id="u59_text" class="text ">
        <p><span>Одесса</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u60" class="ax_default table_cell">
      <img id="u60_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u39.png?token=9cdd889dc442bfbf034805ed82544c7a"/>
      <div id="u60_text" class="text ">
        <p><span>879,56</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u61" class="ax_default table_cell">
      <img id="u61_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u33.png?token=5e36b3b979a4f66c38e68564e6c0af79"/>
      <div id="u61_text" class="text ">
        <p><span>4</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u62" class="ax_default table_cell">
      <img id="u62_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u34.png?token=c9b40b116bd4d7b7bdab2fd801f9b1e2"/>
      <div id="u62_text" class="text ">
        <p><span>Иван</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u63" class="ax_default table_cell">
      <img id="u63_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u35.png?token=87dfa2788f1bd99276c3e7fdb923e996"/>
      <div id="u63_text" class="text ">
        <p><span>Буровой</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u64" class="ax_default table_cell">
      <img id="u64_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u36.png?token=94d895dddafdf3e4534563ac119430c8"/>
      <div id="u64_text" class="text ">
        <p><span>380671234567</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u65" class="ax_default table_cell">
      <img id="u65_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u37.png?token=32d99ac633e123a848226790c390fcf3"/>
      <div id="u65_text" class="text ">
        <p><span>user@gmail.com</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u66" class="ax_default table_cell">
      <img id="u66_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u38.png?token=51290c6b46f80e7c36233f8a3e463f83"/>
      <div id="u66_text" class="text ">
        <p><span>Чернигов</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u67" class="ax_default table_cell">
      <img id="u67_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u39.png?token=9cdd889dc442bfbf034805ed82544c7a"/>
      <div id="u67_text" class="text ">
        <p><span>85,23</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u68" class="ax_default table_cell">
      <img id="u68_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u33.png?token=5e36b3b979a4f66c38e68564e6c0af79"/>
      <div id="u68_text" class="text ">
        <p><span>5</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u69" class="ax_default table_cell">
      <img id="u69_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u34.png?token=c9b40b116bd4d7b7bdab2fd801f9b1e2"/>
      <div id="u69_text" class="text ">
        <p><span>Степан</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u70" class="ax_default table_cell">
      <img id="u70_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u35.png?token=87dfa2788f1bd99276c3e7fdb923e996"/>
      <div id="u70_text" class="text ">
        <p><span>Куксенко</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u71" class="ax_default table_cell">
      <img id="u71_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u36.png?token=94d895dddafdf3e4534563ac119430c8"/>
      <div id="u71_text" class="text ">
        <p><span>380671234567</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u72" class="ax_default table_cell">
      <img id="u72_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u37.png?token=32d99ac633e123a848226790c390fcf3"/>
      <div id="u72_text" class="text ">
        <p><span>user@gmail.com</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u73" class="ax_default table_cell">
      <img id="u73_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u38.png?token=51290c6b46f80e7c36233f8a3e463f83"/>
      <div id="u73_text" class="text ">
        <p><span>Никополь</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u74" class="ax_default table_cell">
      <img id="u74_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u39.png?token=9cdd889dc442bfbf034805ed82544c7a"/>
      <div id="u74_text" class="text ">
        <p><span>1235647,23</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u75" class="ax_default table_cell">
      <img id="u75_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u33.png?token=5e36b3b979a4f66c38e68564e6c0af79"/>
      <div id="u75_text" class="text ">
        <p><span>6</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u76" class="ax_default table_cell">
      <img id="u76_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u34.png?token=c9b40b116bd4d7b7bdab2fd801f9b1e2"/>
      <div id="u76_text" class="text ">
        <p><span>Вадим</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u77" class="ax_default table_cell">
      <img id="u77_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u35.png?token=87dfa2788f1bd99276c3e7fdb923e996"/>
      <div id="u77_text" class="text ">
        <p><span>Чопенко</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u78" class="ax_default table_cell">
      <img id="u78_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u36.png?token=94d895dddafdf3e4534563ac119430c8"/>
      <div id="u78_text" class="text ">
        <p><span>380671234567</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u79" class="ax_default table_cell">
      <img id="u79_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u37.png?token=32d99ac633e123a848226790c390fcf3"/>
      <div id="u79_text" class="text ">
        <p><span>user@gmail.com</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u80" class="ax_default table_cell">
      <img id="u80_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u38.png?token=51290c6b46f80e7c36233f8a3e463f83"/>
      <div id="u80_text" class="text ">
        <p><span>Иваново</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u81" class="ax_default table_cell">
      <img id="u81_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u39.png?token=9cdd889dc442bfbf034805ed82544c7a"/>
      <div id="u81_text" class="text ">
        <p><span>789,56</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u82" class="ax_default table_cell">
      <img id="u82_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u33.png?token=5e36b3b979a4f66c38e68564e6c0af79"/>
      <div id="u82_text" class="text ">
        <p><span>7</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u83" class="ax_default table_cell">
      <img id="u83_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u34.png?token=c9b40b116bd4d7b7bdab2fd801f9b1e2"/>
      <div id="u83_text" class="text ">
        <p><span>Дмитрий</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u84" class="ax_default table_cell">
      <img id="u84_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u35.png?token=87dfa2788f1bd99276c3e7fdb923e996"/>
      <div id="u84_text" class="text ">
        <p><span>Николаев</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u85" class="ax_default table_cell">
      <img id="u85_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u36.png?token=94d895dddafdf3e4534563ac119430c8"/>
      <div id="u85_text" class="text ">
        <p><span>380671234567</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u86" class="ax_default table_cell">
      <img id="u86_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u37.png?token=32d99ac633e123a848226790c390fcf3"/>
      <div id="u86_text" class="text ">
        <p><span>user@gmail.com</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u87" class="ax_default table_cell">
      <img id="u87_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u38.png?token=51290c6b46f80e7c36233f8a3e463f83"/>
      <div id="u87_text" class="text ">
        <p><span>Софиевка</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u88" class="ax_default table_cell">
      <img id="u88_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u39.png?token=9cdd889dc442bfbf034805ed82544c7a"/>
      <div id="u88_text" class="text ">
        <p><span>1002,32</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u89" class="ax_default table_cell">
      <img id="u89_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u33.png?token=5e36b3b979a4f66c38e68564e6c0af79"/>
      <div id="u89_text" class="text ">
        <p><span>8</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u90" class="ax_default table_cell">
      <img id="u90_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u34.png?token=c9b40b116bd4d7b7bdab2fd801f9b1e2"/>
      <div id="u90_text" class="text ">
        <p><span>Александр</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u91" class="ax_default table_cell">
      <img id="u91_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u35.png?token=87dfa2788f1bd99276c3e7fdb923e996"/>
      <div id="u91_text" class="text ">
        <p><span>Черняев</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u92" class="ax_default table_cell">
      <img id="u92_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u36.png?token=94d895dddafdf3e4534563ac119430c8"/>
      <div id="u92_text" class="text ">
        <p><span>380671234567</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u93" class="ax_default table_cell">
      <img id="u93_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u37.png?token=32d99ac633e123a848226790c390fcf3"/>
      <div id="u93_text" class="text ">
        <p><span>user@gmail.com</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u94" class="ax_default table_cell">
      <img id="u94_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u38.png?token=51290c6b46f80e7c36233f8a3e463f83"/>
      <div id="u94_text" class="text ">
        <p><span>Черновцы</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u95" class="ax_default table_cell">
      <img id="u95_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u39.png?token=9cdd889dc442bfbf034805ed82544c7a"/>
      <div id="u95_text" class="text ">
        <p><span>856,47</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u96" class="ax_default table_cell">
      <img id="u96_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u33.png?token=5e36b3b979a4f66c38e68564e6c0af79"/>
      <div id="u96_text" class="text ">
        <p><span>9</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u97" class="ax_default table_cell">
      <img id="u97_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u34.png?token=c9b40b116bd4d7b7bdab2fd801f9b1e2"/>
      <div id="u97_text" class="text ">
        <p><span>Денис</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u98" class="ax_default table_cell">
      <img id="u98_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u35.png?token=87dfa2788f1bd99276c3e7fdb923e996"/>
      <div id="u98_text" class="text ">
        <p><span>Максимов</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u99" class="ax_default table_cell">
      <img id="u99_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u36.png?token=94d895dddafdf3e4534563ac119430c8"/>
      <div id="u99_text" class="text ">
        <p><span>380671234567</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u100" class="ax_default table_cell">
      <img id="u100_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u37.png?token=32d99ac633e123a848226790c390fcf3"/>
      <div id="u100_text" class="text ">
        <p><span>user@gmail.com</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u101" class="ax_default table_cell">
      <img id="u101_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u38.png?token=51290c6b46f80e7c36233f8a3e463f83"/>
      <div id="u101_text" class="text ">
        <p><span>Львов</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u102" class="ax_default table_cell">
      <img id="u102_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u39.png?token=9cdd889dc442bfbf034805ed82544c7a"/>
      <div id="u102_text" class="text ">
        <p><span>5678,52</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u103" class="ax_default table_cell">
      <img id="u103_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u103.png?token=b16e5037c627cb13aa39ffa401f1ca8d"/>
      <div id="u103_text" class="text ">
        <p><span>10</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u104" class="ax_default table_cell">
      <img id="u104_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u104.png?token=251333ba59d2df25ba84cbd6a4565622"/>
      <div id="u104_text" class="text ">
        <p><span>Марьяна</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u105" class="ax_default table_cell">
      <img id="u105_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u105.png?token=18927abffabee8d0e026156e67d7a94e"/>
      <div id="u105_text" class="text ">
        <p><span>Трофимова</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u106" class="ax_default table_cell">
      <img id="u106_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u106.png?token=76754eafc790691817210c7280b8fe28"/>
      <div id="u106_text" class="text ">
        <p><span>380671234567</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u107" class="ax_default table_cell">
      <img id="u107_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u107.png?token=f8727cb05a84a2387b544c9c395b5dbe"/>
      <div id="u107_text" class="text ">
        <p><span>user@gmail.com</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u108" class="ax_default table_cell">
      <img id="u108_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u108.png?token=93cb7e2337793902ffa1d680733572b7"/>
      <div id="u108_text" class="text ">
        <p><span>Мариуполь</span></p>
      </div>
    </div>

    <!-- Unnamed (Table Cell) -->
    <div id="u109" class="ax_default table_cell">
      <img id="u109_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u109.png?token=fd0a8d45ef0934411ff748acdd246d45"/>
      <div id="u109_text" class="text ">
        <p><span>65,12</span></p>
      </div>
    </div>
  </div>

  <!-- Unnamed (Horizontal Line) -->
  <div id="u110" class="ax_default line">
    <img id="u110_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/создать/u19.png?token=557125e6f6e567984ef837318be0f77e"/>
  </div>

  <!-- Unnamed (Text Field) -->
  <div id="u111" class="ax_default text_field">
    <input id="u111_input" type="number" name="id" value=""/>
  </div>

  <!-- Unnamed (Rectangle) -->
  <div id="u112" class="ax_default label">
    <div id="u112_div" class=""></div>
    <div id="u112_text" class="text ">
      <p><span>№ заказа</span></p>
    </div>
  </div>

  <!-- Unnamed (Text Field) -->
  <div id="u113" class="ax_default text_field">
    <input id="u113_input" type="text" name="city" value=""/>
  </div>

  <!-- Unnamed (Rectangle) -->
  <div id="u114" class="ax_default label">
    <div id="u114_div" class=""></div>
    <div id="u114_text" class="text ">
      <p><span>Город</span></p>
    </div>
  </div>

  <!-- Unnamed (Ellipse) -->
  <div id="u115" class="ax_default ellipse">
    <img id="u115_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u115.png?token=3b5a9dc7ef76bc670fffcfe1861f1ed9"/>
    <div id="u115_text" class="text ">
      <p><span>1</span></p>
    </div>
  </div>

  <!-- Unnamed (Ellipse) -->
  <div id="u116" class="ax_default ellipse">
    <img id="u116_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u116.png?token=f85b23abf20a809b18658bd498eb4bba"/>
    <div id="u116_text" class="text ">
      <p><span>2</span></p>
    </div>
  </div>

  <!-- Unnamed (Ellipse) -->
  <div id="u117" class="ax_default ellipse">
    <img id="u117_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u116.png?token=f85b23abf20a809b18658bd498eb4bba"/>
    <div id="u117_text" class="text ">
      <p><span>3</span></p>
    </div>
  </div>

  <!-- Unnamed (Ellipse) -->
  <div id="u118" class="ax_default ellipse">
    <img id="u118_img" class="img " src="https://d2i72ju5buk5xz.cloudfront.net/gsc/9LJQQV/bf/51/34/bf5134dd18f6459d8db7077e76d31ca1/images/отчеты/u116.png?token=f85b23abf20a809b18658bd498eb4bba"/>
    <div id="u118_text" class="text ">
      <p><span>4</span></p>
    </div>
  </div>

  <!-- Unnamed (Rectangle) -->
  <div id="u119" class="ax_default heading_1">
    <div id="u119_div" class=""></div>
    <div id="u119_text" class="text ">
      <p><span>Найдено 10 заказов</span></p>
    </div>
  </div>

  <!-- Unnamed (Rectangle) -->
  <div id="u120" class="ax_default label">
    <div id="u120_div" class=""></div>
    <div id="u120_text" class="text ">
      <p><span>На сумму 123 456,67 гривен или $4748.33</span></p>
    </div>
  </div>

  <!-- Unnamed (Droplist) -->
  <div id="u121" class="ax_default droplist">
    <select id="u121_input">
      <option value="До 100 гривен">До 100 гривен</option>
      <option value="До 500 гривен">До 500 гривен</option>
      <option value="До 1000 гривен">До 1000 гривен</option>
      <option value="До 5000 гривен">До 5000 гривен</option>
      <option value="До 10000 гривен">До 10000 гривен</option>
    </select>
  </div>

  <!-- Unnamed (Rectangle) -->
  <div id="u122" class="ax_default label">
    <div id="u122_div" class=""></div>
    <div id="u122_text" class="text ">
      <p><span>Сумма заказа</span></p>
    </div>
  </div>
</form>