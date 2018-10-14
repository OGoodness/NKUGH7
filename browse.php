<?php
    if(isset($_POST["language"])){
        $language = $_POST["language"];
        setcookie("language", $language, time() + (86400 * 30), "/");
    }elseif(!isset($_COOKIE["language"])) {
        $language = "en";
        setcookie("language", $language, time() + (86400 * 30), "/");
    }else{
        $language=$_COOKIE["language"];
    }
    

    require_once ('vendor/autoload.php');
    include 'include/db_connect.php';
    include 'functions/functions.php';
    use \Statickidz\GoogleTranslate;
    $content["login__sign_in_account"]="If you have previously created a profile and are a registered guide, please sign in below";
    $content["login__login_general_use_description"]= "This website will allow you to either help guide an immagrant family or if you are an immagrant family you can find resdients help make your transtion to your new home smoother. Don't worry, your information is confidential and secure";
    $content["login__sign_in_header_text_bold"]= "Sign in";
    $content["login__login"] = "Login";
    $content["login__create_account_button"]= "Create Account";
    $content["login__sign_in_header_text"]= "to your account";
    $content["login__create_account"]="If you are new to this website, click the button below to get started on your personal profile and make one step closer to finding your future guide";

    $content["c1t__last_name"] = "";
    $content["c1t__first_name"] = "";
    $content["c1t__age"] = "";
    $content["c1st__city"] = "";
    $content["c1st__state"] = "";
    $content["c1f__language"] = "";
    $content["c1f__nationality"] = "";
    $content["c1f__religion"] = "";
    $content["c1f__gender"] = "";
    $content["c1f__study"] = "";
    $content["c1p__family"] = "";
    $content["c1v__quick_info1"] = "";
    $content["c1v__quick_info2"] = "";
    


    $trans = new GoogleTranslate();
    foreach($content as $key => $text){
        $content["$key"] = $trans->translate("en", $language, $text);
    }
    $guides = get_guides($conn);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php $content["login__login"]; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/theme.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="js/main.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
        
        <style>
            .card-container {
                width: 100%;
                background-color: white;
                border-radius: 5px;
                height: 250px;
                margin-bottom: 25px;
                clear: both;
                transition: 0.3s ease-in-out;
            }
            .card-container:hover {
                box-shadow: 0px 0px 15px lightgray;
                margin-left: 15px;
            }
            .card-container-left {
                width: 40%;
                height: 100%;
                float: left;
                padding: 20px;
                box-sizing: border-box;
            }
            .card-container-right {
                width: 60%;
                height: 100%;
                float: right;
                background-color: white;
                padding: 20px;
                box-sizing: border-box;
            }
            .card-picture {
                float: left;
                height: 50px;
                width: 50px;
                background-color: lightgray;
                border-radius: 50px;
                margin-right: 20px;
            }
            .card-title {
                font-weight: 400;
                text-transform: uppercase;
                font-size: 24px;
            }
            .card-subtitle {
                text-transform: uppercase;
                font-size: 13px;
                letter-spacing: 1px;
            }
            .card-container-title {
                height: 50px;
            }
            .card-container-content {
                font-size: 13px;
                text-transform: lowercase;
                color: gray;
            }
            .card-container-content b {
                text-transform: uppercase;
                color: black;
            }
            .card-row {
                display: block;
                float: left;
                clear: left;
                margin-bottom: 25px;
            }
            .card-field, .card-verified {
                float: left;
                margin-right: 35px;
            }
            .card-paragraph {
                text-align: justify;
            }
            .card-verified {
                text-transform: uppercase;
            }
            .card-container-left {
                background-image: url("images/map.jpg");
                background-size: cover;
            }
            .card-selected {
                margin-left: 15px;
                border-left: 4px solid #e0b548;
                border-radius: 0px;
            }
            </style>
    </head>

<body>

<header>
<header>
    <nav>
        <ul>
            <li style="float: left; font-size: 20px;"><a href="index.php"><b>Cultural</b> Inclusiveness Project</a></li>
            <li style="float: right; font-size: 20px;"><a href="map.php"><i class="fas fa-map-marked-alt"></i></a></li>
            <li style="float: right; font-size: 20px;"><a href="browse.php"><i class="fas fa-list"></i></a></li>
            <li style="float: right; font-size: 20px;" class="dropdown"><a href="javascript:void(0)" class="dropbtn"><i class="fas fa-user-cog"></i></a>
            <div class="dropdown-content">
                <a href="#">Account</a>
                <a href="#">Sign Out</a>
            </div>
            </li>
        </ul>
    </nav>
</header>

<main style="width: 70%;">

<?php  foreach($guides as $person){
        ?>

        $trans = new GoogleTranslate();
    foreach($content as $key => $text){
        $content["$key"] = $trans->translate("en", $language, $text);
    }
    $guides = get_guides($conn);
<div class="card-container">
        <div class="card-container-left">
            <div class="card-picture"><img src=""></div>
            <div class="card-container-title">
                <div class="card-title"><b><?php echo $trans->translate($person->user_first_name . " " . $person->user_last_name); ?></b>, <?php echo $trans->translate($person->age); ?></div>
                <div class="card-subtitle"><?php echo $trans->translate($person->city . ", " . $person->state);?></div>
            </div>
        </div>
        <div class="card-container-right">
            <div class="card-container-content">
                <div class="card-row">
                    <div class="card-field"><b><?php echo $trans->translate($person->primary_language); ?></b><br>primary language</div>
                    <div class="card-field"><b><?php echo $trans->translate($person->nationality); ?></b><br>nationality</div>
                    <div class="card-field"><b><?php echo $trans->translate($person->religion); ?></b><br>religion</div>
                    <div class="card-field"><b><?php echo $trans->translate($person->gender); ?></b><br>gender</div>
                    <div class="card-field"><b><?php echo $trans->translate($person->occupation); ?></b><br>field of study</div>
                </div>
                <div class="card-row">
                    <div class="card-paragraph"><?php echo $trans->translate($person->self_desc); ?></div>
                </div>
               <!--  <div class="card-row">
                    <div class="card-verified" style="color: #008F95;"><i class="fas fa-users"></i> &nbsp;Involved in Community</div>
                    <div class="card-verified" style="color: #E24E42;"><i class="fas fa-clock"></i> &nbsp;Previous Refugee</div>
                </div> -->
            </div>
        </div>
    </div>

<?php      
    }?>

<!-- BEGIN HARD CODED --> 

    <div class="card-container">
        <div class="card-container-left">
            <div class="card-picture"><img src=""></div>
            <div class="card-container-title">
                <div class="card-title"><b><?php echo $trans->translate('Griffin Burkhardt')?></b>, 20</div>
                <div class="card-subtitle"><?php echo $trans->translate('Montgomery, OH')?></div>
            </div>
        </div>
        <div class="card-container-right">
            <div class="card-container-content">
                <div class="card-row">
                    <div class="card-field"><b><?php echo $trans->translate('English')?></b><br><?php echo $trans->translate('primary language') ?></div>
                    <div class="card-field"><b><?php echo $trans->translate('White')?></b><br><?php echo $trans->translate('nationality')?></div>
                    <div class="card-field"><b><?php echo $trans->translate('Christian') ?></b><br><?php echo $trans->translate('religion') ?></div>
                    <div class="card-field"><b><?php echo $trans->translate('Male')?></b><br><?php echo $trans->translate('gender')?></div>
                    <div class="card-field"><b><?php echo $trans->translate('Business')?></b><br><?php echo $trans->translate('field of study')?></div>
                </div>
                <div class="card-row">
                    <div class="card-paragraph"><?php echo $trans->translate('Hi, my name is Griffin, a leadership-oriented Junior student at Northern Kentucky University with an ability to utilize agile methodology and an inspiration to produce quality driven work seeking an internship in project management that blends business analytics and web development')?></div>
                </div>
                <div class="card-row">
                    <div class="card-verified" style="color: #008F95;"><i class="fas fa-users"></i> &nbsp;<?php echo $trans->translate('Involved in Community')?></div>
                    <div class="card-verified" style="color: #E24E42;"><i class="fas fa-clock"></i> &nbsp;<?php echo $trans->translate('Previous Refugee')?></div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-container card-selected">
        <div class="card-container-left">
            <div class="card-picture"><img src=""></div>
            <div class="card-container-title">
                <div class="card-title"><b>Brent Schleper</b>, 20</div>
                <div class="card-subtitle">Highland Heights, KY</div>
            </div>
        </div>
        <div class="card-container-right">
            <div class="card-container-content">
                <div class="card-row">
                    <div class="card-field"><b>English</b><br>primary language</div>
                    <div class="card-field"><b>White</b><br>nationality</div>
                    <div class="card-field"><b>Christian</b><br>religion</div>
                    <div class="card-field"><b>Male</b><br>gender</div>
                    <div class="card-field"><b>Technology</b><br>field of study</div>
                </div>
                <div class="card-row">
                    <div class="card-paragraph">Student in the College of Informatics at Northern Kentucky University driven in furthering my knowledge in software development and data science</div>
                </div>
                <div class="card-row">
                    <div class="card-verified" style="color: #008F95;"><i class="fas fa-users"></i> &nbsp;Involved in Community</div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-container">
        <div class="card-container-left">
            <div class="card-picture"><img src=""></div>
            <div class="card-container-title">
                <div class="card-title"><b>Tobel Atnafu</b>, 27</div>
                <div class="card-subtitle">Highland Heights, KY</div>
            </div>
        </div>
        <div class="card-container-right">
            <div class="card-container-content">
                <div class="card-row">
                    <div class="card-field"><b>English</b><br>primary<br> language</div>
                    <div class="card-field"><b>Amharic</b><br>secondary<br> language</div>
                    <div class="card-field"><b>Ethiopian</b><br>nationality</div>
                    <div class="card-field"><b>Christian</b><br>religion</div>
                    <div class="card-field"><b>Male</b><br>gender</div>
                    <div class="card-field"><b>Technology</b><br>field of study</div>
                </div>
                <div class="card-row">
                    <div class="card-paragraph">Student in the College of Informatics at Northern Kentucky University driven in furthering my knowledge in software development and data science</div>
                </div>
                <div class="card-row">
                    <div class="card-verified" style="color: #E24E42;"><i class="fas fa-clock"></i> &nbsp;F1 Student Visa</div>
                    <div class="card-verified" style="color: #6A5ACD;"><i class="fas fa-graduation-cap"></i> &nbsp;Educational Student</div>
                </div>
            </div>
        </div>
    </div>
</main>

</body>
</html>