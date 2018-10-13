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
        }
        body {
            margin: 0px;
            padding: 0px;
            background-image: linear-gradient(145deg, #f9f9f9 0%, #ebedee 100%);
        }
        #container {
            width: 1366px; /*Most common screen resolution*/
            margin: 20px auto;
        }
        .card:hover {
            box-shadow: 0px 0px 25px lightgray;
        }
        .card .card-container-left:hover {
            padding-left: 30px;
        }
        .card {
            width: 48%;
            height: 325px;
            background-color: white;
            margin: 1%;
            float: left;
            transition: all 0.5s ease-in-out;
        }
        .name {
            text-transform: uppercase;
            font-size: 24px;
            letter-spacing: 3px;
        }
        .links {
            text-decoration: none;
            text-transform: uppercase;
            font-size: 12px;
            font-weight: 400;
            letter-spacing: 2px;
        }
        .links ul {
            padding: 0px;
        }
        .links li {
            list-style: none;
            display: inline;
            margin: 0px 5px;
        }
        .links a {
            text-decoration: none;
            color: gray;
            transition: all 0.5s ease-in-out;
        }
        .links a:hover {
            color: black;
        }
        .title {
            text-transform: uppercase;
            text-align: left;
            font-size: 24px;
            font-weight: 700;
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
        .languages {
            font-size: 12px;
            font-family: monospace;
            display: inline;
            padding-left: 2px;
        }
        .content {
            text-transform: lowercase;
            text-align: justify;
            font-size: 13px;
            font-weight: 300;
            letter-spacing: 0.1px;
            color: black;
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
        .card-container {
            width: 100%;
            height: 100%;
            float: left;
            padding: 20px;
            box-sizing: border-box;
        }
        .card-container-left {
            width: 50%;
            height: 100%;
            float: left;
            padding: 20px;
            box-sizing: border-box;
            transition: all 0.5s ease-in-out;
            cursor: pointer;
        }
        .card-container-right {
            width: 50%;
            height: 100%;
            float: right;
            background-color: white;
            padding: 20px;
            box-sizing: border-box;
        }
        #tesla-card {
            background-image: url("tesla.jpg");
            background-size: cover;
            background-position-x: -50px;
        }
        #music-card {
            background-image: url("studio.jpg");
            background-size: cover;
        }
        #portfolio-card {
            background-image: url("cubes.jpg");
            background-size: 100%;
        }
        #tweet-card {
            background-image: url("map.jpg");
            background-size: cover;
        }
        #norsetime-card {
            background-image: url("cubes.jpg");
            background-size: cover;
            background-size: 72%;
        }
        #tesla-card .languages, #tesla-card .sub-title {
            color: #C22946;
        }
        #portfolio-card .languages, #portfolio-card .sub-title {
            color: #3b6eaa;
        }
        #norsetime-card .languages, #norsetime-card .sub-title {
            color: goldenrod;
        }
        #music-card .languages, #music-card .sub-title {
            color: #61D59A;
        }
        #tweet-card .languages, #tweet-card .sub-title {
            color: #1DA1F2;
        }
    </style>
    </head>
    <header>
        <div id="container" style="text-align: center;">
            <div class="name"><b>Griffin</b> Burkhardt</div>
            <nav class="links">
                <ul>
                    <li><a href="">Projects</a></li>
                    <li><a href="">Education</a></li>
                    <li><a href="">Résumé</a></li>
                </ul>
            </nav>
        </div>
    </header>
<body>

<div id="container">

    <!--Junior-->
    <div class="divider">
        <div class="grade">Junior</div>
        <div class="date">2018 — 2019</div>
    </div>

    <!--Portfolio-->
    <div class="card" id="portfolio-card" style="width: 72%;">
        <div class="card-container-left">
            <div class="title">Portfolio</div>
            <div class="sub-title">UI/UX Web Project</div>
        </div>
        <div class="card-container-right">
            <div class="content"><b>carefully crafted design</b><br>Built a digital portfolio to present my web development projects, current work experience, and basic overview of my history as an Informatics student
                using <div class="languages">html/css, javascript, cpanel</div></div>
        </div>
    </div>
    
    <!--Music-->
    <div class="card" id="music-card" style="width: 24%;">
        <div class="card-container">
            <div class="title" style="color:#fff;">Music Composition</div>
            <div class="sub-title">Creative Project</div>
            <div class="content" style="padding-top: 20px;color: #fff;"><b>inspiration via sound</b><br>compose my own electronic-based music from the computer to share my creativeness through sound 
            using <div class="languages">fl studio 12</div></div>
        </div>
    </div>

    <!--NorseTime-->
    <div class="card" id="norsetime-card" style="width: 98%;">
        <div class="card-container-left">
            <div class="title">NorseTime</div>
            <div class="sub-title">UI/UX Web Project</div>
        </div>
        <div class="card-container-right">
            <div class="content"><b>internal management solutions</b><br>helped develop a customizable employee skills section into our NorseTime employee management web application for users to search and select their skills, assign a rating, and be sorted by a manager skill search tool 
            using <div class="languages">html/css, php, sql, javascript</div></div>
        </div>
    </div>
    
    <!--Sophomore-->
    <div class="divider">
        <div class="grade">Sophomore</div>
        <div class="date">2017 — 2018</div>
    </div>

    <!--Tweet Waves-->
    <div class="card" id="tweet-card">
        <div class="card-container-left">
            <div class="title">Tweet Waves</div>
            <div class="sub-title">Hackathon Project</div>
        </div>
        <div class="card-container-right">
            <div class="content"><b>big data analysis under constraints</b><br>collects and maps thousands of content filtered tweets onto a heatmap based off of activities, all built during the built during the 24-hour University of Kentucky CatHacks IV Hackathon 
            using <div class="languages">html/css, javascript, pytohn, php, sql</div></div>
        </div>
    </div>

    <!--Tesla-->
    <div class="card" id="tesla-card">
        <div class="card-container-left">
            <div class="title">Tesla</div>
            <div class="sub-title">UI/UX Web Project</div>
        </div>
        <div class="card-container-right">
            <div class="content"><b>consumer driven approach</b><br>coded an eight page mockup of the actual website with an alternate simplistic and contemporary UI/UX approach to appeal towards the younger audience within the electric vehicle market
            using <div class="languages">html/css, javascript</div>
        </div>
        </div>
    </div>

</div>

</body>
</html>