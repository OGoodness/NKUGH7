<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <title>Griffin Burkhardt | Portfolio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/theme.css">
    <script src="js/main.js"></script>
    </head>

<body class="center">

<header>
    <div class="title"><b>Hello</b>, Select your language</div>
    <ul class="languages">
        <li>elige tu idioma</li> <!--Spanish-->
        <li>اختر لغتك</li> <!--Arabic-->
        <li>chọn ngôn ngữ của bạn</li> <!--Vietnamese-->
        <li>Piliin ang iyong wika</li> <!--Filipino-->
    </ul>
</header>

<main>
    <div class="container">
        <a href="login.php"><img id="flag-filipino" src="images/flag-filipino.png" alt="Filipino Flag" data="Filipino" onclick="languageSelect('flag-filipino')"></a>
        <a href="login.php"><img id="flag-usa" src="images/flag-usa.png" alt="USA Flag" data="English" onclick="languageSelect('flag-usa')"></a>
        <a href="login.php"><img id="flag-arabic" src="images/flag-arabic.png" alt="Arabic Flag" data="Arabic" onclick="languageSelect('flag-arabic')"></a>
        <a href="login.php"><img id="flag-vietnam" src="images/flag-vietnam.png" alt="Vietnam Flag" data="Vietnamese" onclick="languageSelect('flag-vietnam')"></a>
        <a href="login.php"><img id="flag-spanish" src="images/flag-spanish.png" alt="Spanish Flag" data="Spanish" onclick="languageSelect('flag-spanish')"></a>
    </div>
</main>

</body>
</html>