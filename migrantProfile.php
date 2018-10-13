<?php
    if(isset($_POST["language"])){
        $language = $_POST["language"];
    }else{
        $language = "en"; 
    }
    

    require_once ('vendor/autoload.php');
    use \Statickidz\GoogleTranslate;

    $content["display_profile__header_text"] = 'Profile';
    $content["display_profile__title_text"] = 'Profile';



    $trans = new GoogleTranslate();
    foreach($content as $key => $text){
        $content["$key"] = $trans->translate("en", $language, $text);
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <title><?php echo $content["migrant_account__title_text"]; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/theme.css">
    <script src="js/main.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    </head>

<body>

<header>
    <div class="title"><?php echo $content["migrant_account__header_text"]; ?></div>
</header>

<main>
    <div class="content">
        <form action="migrantForm.php" method="POST"><a href="migrantForm.php"><button type="submit" name="user_type" value="Migrant">Edit Info</button></a></form>

    </div>
</main>

</body>
</html>