<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <title>Griffin Burkhardt | Portfolio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
     @import url('https://fonts.googleapis.com/css?family=Open+Sans:300,400,700');
     html {
            font-family: 'Open Sans', sans-serif;
            width: 75%;
            margin: 0px auto;
        }
        body {
            margin: 0px;
            padding: 0px;
            background-color: #ebedee;
        }
        header {
            margin-top: 20%;
            text-align: center;
        }
        main {
            margin-top: 2%;
        }
        .name {
            text-transform: uppercase;
            font-size: 24px;
            letter-spacing: 3px;
        }
        .languages {
            text-decoration: none;
            text-transform: uppercase;
            font-size: 12px;
            font-weight: 400;
            letter-spacing: 2px;
        }
        ul.languages {
            padding: 0px;
            color: gray;
        }
        .languages li {
            list-style: none;
            display: inline-block;
            margin: 0px 15px;
        }
        .title {
            text-transform: uppercase;
            font-size: 36px;
            letter-spacing: 3px;
        }
        .sub-title {
            text-transform: uppercase;
            text-align: left;
            font-size: 12px;
            font-weight: 400;
            letter-spacing: 2px;
            color: gray;
        }
        .content {
            text-transform: lowercase;
            font-size: 13px;
            font-weight: 300;
            letter-spacing: 0.1px;
            color: gray;
        }
        .divider {
            margin-left: 1%;
            margin-top: 40px;
            text-align: left;
            width: 100%;
            float: left;
        }
        .date {
            text-transform: uppercase;
            font-size: 12px;
            font-weight: 400;
            letter-spacing: 2px;
            color: gray;
        }
        .grade {
            text-transform: uppercase;
            font-size: 16px;
            font-weight: 700;
            letter-spacing: 3px;
        }
        .two-column-container {
            display: flex;
            justify-content: center;
        }
        .two-column-container img {
            height: 100px;
            width: 100px;
            margin: 0px 20px;
            transition: all 0.3s ease-in-out;
        }
        .two-column-container img:hover {
            box-shadow: 0px 0px 10px gray;
        }
    </style>
    </head>

<body>

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
    <div class="two-column-container">
        <img id="flag-phili" src="images/flag-phili.png" alt="Philipino Flag">
        <img id="flag-usa" src="images/flag-usa.png" alt="USA Flag">
        <img id="flag-arabic" src="images/flag-arabic.png" alt="Arabic Flag">
        <img id="flag-vietnam" src="images/flag-vietnam.png" alt="Vietnam Flag">
        <img id="flag-spanish" src="images/flag-spanish.png" alt="Spanish Flag">
    </div>
</main>

</body>
</html>