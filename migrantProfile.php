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
<<<<<<< HEAD:migrantForm .php
        <form action="processData.php" method="post">
            <input type="hidden" name="type" value="migrent">
            <?php echo $content["migrant_account__first_name_text"]; ?><input type="text" name="fname"><br>
            <?php echo  $content["migrant_account__last_name_text"]; ?><input type="text" name="lname"><br>
            <?php echo $content["migrant_account__age_text"]; ?><input type="text" name="age"><br>
            <?php echo $content["migrant_account__gender_text"]; ?><input type="text" name="gender"><br>
            <?php echo $content["migrant_account__location_text"]; ?><input type="text" name="location"><br>
            <?php echo $content["migrant_account__nationality_text"]; ?><input type="text" name="nationality"><br>
            <?php echo $content["migrant_account__religion_text"]; ?><input type="text" name="Religion"><br>
            <?php echo $content["migrant_account__marital_stat_text"]; ?><input type="radio" name="maritalStat" value="married"><?php echo $content["migrant_account__married_button"]; ?>
            <input type="radio" name="maritalStat" value="single"> <?php echo $content["migrant_account__single_button"] = 'Single:'; ?><br>
            <textarea rows="6" cols="50" name="family"><?php echo $content["migrant_account__family_textarea"]; ?></textarea><br>
            <textarea rows="4" cols="50" name="languages"><?php echo $content["migrant_account__language_textarea"]; ?></textarea><br>
            <?php echo $content["migrant_account__location_text"]; ?><input type="text" name="hobby1"><br>
            <textarea rows="4" cols="50" name="outcome"><?php echo $content["migrant_account__outcome_textarea"]; ?></textarea><br>
            <?php echo $content["migrant_account__picture_text"]; ?><input type="file" name="pic1" accept="image/*"><br>
            <?php echo $content["migrant_account__picture_text"]; ?><input type="file" name="pic2" accept="image/*"><br>
            <?php echo $content["migrant_account__picture_text"]; ?><input type="file" name="pic3" accept="image/*"><br>
=======
        <form action="migrantForm.php" method="POST"><a href="migrantForm.php"><button type="submit" name="user_type" value="Migrant">Edit Info</button></a></form>
>>>>>>> ProfileWork:migrantProfile.php

    </div>
</main>

</body>
</html>