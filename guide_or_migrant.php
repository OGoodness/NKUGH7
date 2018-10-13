<?php
    if(isset($_POST["language"])){
        $language = $_POST["language"];
    }else{
        $language = "en"; 
    }
    

    require_once ('vendor/autoload.php');
    use \Statickidz\GoogleTranslate;

    $boldText = 'Returning user';
    $restOfText = ", welcome back";
    $R_Post = "hi";

    $trans = new GoogleTranslate();
    $boldText = $trans->translate("en", $language, $boldText);
    $restOfText = $trans->translate("en", $language, $restOfText);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <title>Guide or Migrant</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/theme.css">
    <script src="js/main.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    </head>

<body class="center">

<header>
    <div class="title">Are you a Guide or a Migrant</div>
</header>

<main>
    <div class="content">
        
        <form action="guideForm.php" method="POST"> <a href="guideForm.php"><button type="submit" name="user_type" value="Guide">Guide</button></a></form>
        <form action="migrantForm.php" method="POST"><a href="migrantForm.php"><button type="submit" name="user_type" value="Migrant">Migrant</button></a></form>
        
    </div>
</main>

</body>
</html>