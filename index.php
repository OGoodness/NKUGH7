<?php
//include "include/db_connect.php";



if(isset($_COOKIE["language"])) {
   // header("Location: login.php");  Comment this back in when we are ready to change language whenever
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Language Select</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/theme.css">
        <script src="js/main.js"></script>
        <style>
            .card-field {
                margin: 0px auto 10px auto;
            }
            .card-row-header {
                width: 100%;
                display: flex;
                flex-wrap: wrap;
                justify-content: space-around;
            }
        </style>
    </head>

<body class="center">

<header style="margin-top: 0%;">
    <div class="title"><b>Hello</b>, Select your language</div>
    <ul class="languages">
        <li>elige tu idioma</li> <!--Spanish-->
        <li>اختر لغتك</li> <!--Arabic-->
        <li>chọn ngôn ngữ của bạn</li> <!--Vietnamese-->
        <li>Piliin ang iyong wika</li> <!--Filipino-->
    </ul>
</header>

<main style="margin-top: 0%; width: 100%;">
    <div class="container">
        <div class="card-row-header">
            <div class="card-field;"><img id="flag-spanish" src="images/flag-spanish.png" alt="Spanish Flag" data="es" onclick="languageSelect('flag-spanish')"></div>  
            <div class="card-field;"><img id="flag-usa" src="images/flag-usa.png" alt="USA Flag" data="en" onclick="languageSelect('flag-usa')"></div>
            <div class="card-field;"><img id="flag-arabic" src="images/flag-arabic.png" alt="Arabic Flag" data="ar" onclick="languageSelect('flag-arabic')"></div>
            <div class="card-field;"><img id="flag-vietnam" src="images/flag-vietnam.png" alt="Vietnam Flag" data="vi" onclick="languageSelect('flag-vietnam')"></div>
            <div class="card-field;"><img id="flag-india" src="images/flag-india.png" alt="Indian Flag" data="hi" onclick="languageSelect('flag-india')"></div>
        </div>
        <div class="card-row-header">
            <div class="card-field;"><img id="flag-ethiopia" src="images/flag-ethiopia.png" alt="Ethiopia Flag" data="am" onclick="languageSelect('flag-ethiopia')"></div>
            <div class="card-field;"><img id="flag-bulgaria" src="images/flag-bulgaria.png" alt="Bulgaria Flag" data="bg" onclick="languageSelect('flag-bulgaria')"></div>
            <div class="card-field;"><img id="flag-france" src="images/flag-france.png" alt="France Flag" data="fr" onclick="languageSelect('flag-france')"></div>
            <div class="card-field;"><img id="flag-turkey" src="images/flag-turkey.png" alt="Turkey Flag" data="tr" onclick="languageSelect('flag-turkey')"></div>
            <div class="card-field;"><img id="flag-filipino" src="images/flag-filipino.png" alt="Filipino Flag" data="tr" onclick="languageSelect('flag-filipino')"></div>  
        </div>
    </div>
</main>

</body>
</html>