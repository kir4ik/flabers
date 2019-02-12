<!DOCTYPE html>
<html>
  <head>
    <title><?= $title ?></title>
    <meta charset="utf-8">
    <meta lang="ru">
    <meta name="robots" content="noindex, nofollow"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <link href="/public/css/jquery-ui-themes.css" type="text/css" rel="stylesheet"/>
    <script src="/public/js/jquery-1.7.1.min.js"></script>
    <script src="/public/js/jquery-ui-1.8.10.custom.min.js"></script>
    <link href="/public/css/axure_rp_page.css" type="text/css" rel="stylesheet"/>
    <link href="/public/css/styles.css" type="text/css" rel="stylesheet"/>
<?php if($isList) :?> 
    <link href="/public/css/report.css" type="text/css" rel="stylesheet"/> 
<?php endif; ?>
</head>
  <body>
   <?= $content ?>
  </body>
</html>