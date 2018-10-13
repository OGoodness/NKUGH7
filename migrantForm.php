<?php
    if(isset($_POST["language"])){
        $language = $_POST["language"];
    }else{
        $language = "en"; 
    }
    

    require_once ('vendor/autoload.php');
    use \Statickidz\GoogleTranslate;

    $content["migrant_account__header_text"] = 'Edit Profile';
    $content["migrant_account__title_text"] = 'Migrant Profile';
    $content["migrant_account__first_name_text"] = 'First Name:';
    $content["migrant_account__last_name_text"] = 'Last Name:';
    $content["migrant_account__age_text"] = 'Age:';
    $content["migrant_account__gender_text"] = 'Gender:';
    $content["migrant_account__location_city"] = 'Location(City):';
    $content["migrant_account__location_state"] = 'Location(State):';
    $content["migrant_account__nationality_text"] = 'Nationality:';
    $content["migrant_account__religion_text"] = 'Religion:';
    $content["migrant_account__marital_stat_text"] = 'Relationship Status:';
    $content["migrant_account__family_textarea"] = 'Tell us about your family...';
    $content["migrant_account__language_textarea"] = 'What languages do you speak...';
    $content["migrant_account__hobby_text"] = 'Hobby:';
    $content["migrant_account__outcome_textarea"] = 'What are you hoping to get out of this...';
    $content["migrant_account__picture_text"] = 'Insert Pictures:';


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
        <form action="browse.php" method="post">
            <input required type="text" name="state" placeholder="<?php echo $content["migrant_account__location_state_text"]; ?>"><br>
            <input required type="text" name="city" placeholder="<?php echo $content["migrant_account__location_city_text"]; ?>"><br>
            <input type="text" name="fname" placeholder="<?php echo $content["migrant_account__first_name_text"]; ?>"><br>
            <input type="text" name="lname" placeholder="<?php echo  $content["migrant_account__last_name_text"]; ?>"><br>
            <input type="number" step="1" min="1" name="age" placeholder="<?php echo $content["migrant_account__age_text"]; ?>"><br>
            <input type="text" name="gender" placeholder="<?php echo $content["migrant_account__gender_text"]; ?>"><br>
            <input type="text" name="location"placeholder="<?php echo $content["migrant_account__location_city"]; ?>"><br>
            <input type="text" name="location"placeholder="<?php echo $content["migrant_account__location_state"]; ?>"><br>
            <input type="text" name="nationality" placeholder="<?php echo $content["migrant_account__nationality_text"]; ?>"><br>
            <input type="text" name="Religion"placeholder="<?php echo $content["migrant_account__religion_text"]; ?>"><br>

            <input type="text" name="hobby1"placeholder="<?php echo $content["migrant_account__marital_stat_text"];?>"><br>

            <input type="text" name="hobby1"placeholder="<?php echo $content["migrant_account__hobby_text"];?>"><br>
            <input type="text" name="hobby2" placeholder="<?php echo $content["migrant_account__hobby_text"]; ?>"><br>

            <textarea rows="6" cols="50" name="family" placeholder="<?php echo $content["migrant_account__family_textarea"]; ?>"></textarea><br>
            <textarea rows="4" cols="50" name="languages" placeholder="<?php echo $content["migrant_account__language_textarea"]; ?>"></textarea><br>
            
            <textarea rows="4" cols="50" name="outcome" placeholder="<?php echo $content["migrant_account__outcome_textarea"]; ?>"></textarea><br>
            
            <?php echo $content["migrant_account__picture_text"]; ?><input type="file" name="pic1" accept="image/*"><br>
            <input type="file" name="pic2" accept="image/*"><br>
            <input type="file" name="pic3" accept="image/*"><br>

            <input type="submit" value="Submit">
        </form>
    </div>
</main>

</body>
</html>