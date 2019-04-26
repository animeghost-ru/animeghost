<?
function echoHead($title)
{
global $cfg;
echo '<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" id="metaViewport">
  <meta content="'.$cfg['description'].'" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="shortcut icon" href="AnimeGhost.ico" type="image/ico">
  <link rel="stylesheet" href="css/main.css">
  <title>'.$title.'</title>
</head>
';
}
?>
