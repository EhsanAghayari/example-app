<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>myView</title>
</head>
<body>
<!--<div style="direction: rtl; margin-top: 100px; font-size: 24px; text-align: center">
    آیدی:
    <?/*= $id */?>
</div>-->
<div style="direction: rtl; margin-top: 100px; font-size: 24px; text-align: center">
    نام شما:
    <?= $name ?>
</div>
<div style="direction: rtl; margin-top: 100px; font-size: 24px; text-align: center">
    رمز عبور شما:
    <?= "{$pass}{$id}" ?>
</div>
</body>
</html>
