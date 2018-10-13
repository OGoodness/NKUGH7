<?php 
    require_once ('vendor/autoload.php');
    use \Statickidz\GoogleTranslate;

    $boldText = 'Returning user';
    $restOfText = ", welcome back";
    $R_Post = "hi";

    $trans = new GoogleTranslate();
    $boldText = $trans->translate("en", $R_Post, $boldText);
    $restOfText = $trans->translate("en", $R_Post, $restOfText);
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

</header>

<main>
    <div class="two-column-container">
        <div class="content">
            <div class="subtitle"><b><?php echo $boldText; ?></b><?php echo $restOfText; ?></div>
    </div>
</main>

</body>
</html>