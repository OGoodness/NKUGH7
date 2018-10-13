<?php
require_once ('../vendor/autoload.php');
use \Statickidz\GoogleTranslate;

$source = 'en';
$target = 'fr';
$text = 'I am a dick';

$trans = new GoogleTranslate();
$result = $trans->translate($source, $target, $text);

echo $result;?>