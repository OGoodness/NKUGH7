<?php
if(isset($_COOKIE["language"])) {
   // header("Location: login.php");  Comment this back in when we are ready to change language whenever
}
?>

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
<<<<<<< HEAD
        <img id="flag-filipino" src="images/flag-filipino.png" alt="Filipino Flag" data="tl" onclick="languageSelect('flag-filipino')">
=======
    <img id="flag-filipino" src="images/flag-filipino.png" alt="Filipino Flag" data="tl" onclick="languageSelect('flag-filipino')">
>>>>>>> 0b77863da19a63f77ffeb3e44cd13af60cfbaaad
        <img id="flag-usa" src="images/flag-usa.png" alt="USA Flag" data="en" onclick="languageSelect('flag-usa')">
        <img id="flag-arabic" src="images/flag-arabic.png" alt="Arabic Flag" data="ar" onclick="languageSelect('flag-arabic')">
        <img id="flag-vietnam" src="images/flag-vietnam.png" alt="Vietnam Flag" data="vi" onclick="languageSelect('flag-vietnam')">
        <img id="flag-spanish" src="images/flag-spanish.png" alt="Spanish Flag" data="es" onclick="languageSelect('flag-spanish')">
<<<<<<< HEAD
        <img id="flag-spanish" src="images/flag-spanish.png" alt="Spanish Flag" data="np" onclick="languageSelect('flag-spanish')">
=======
>>>>>>> 0b77863da19a63f77ffeb3e44cd13af60cfbaaad
    </div>
</main>

</body>
</html>