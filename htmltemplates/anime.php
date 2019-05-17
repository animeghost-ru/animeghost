<?
require($_SERVER['DOCUMENT_ROOT'].'/sqlload.php');

function animePage($animeInfo)
{
  echo '
  <div class="sblock">
  <h1>'.$animeInfo['name'].' / '.$animeInfo['laname'].'</h1>
  ';
    foreach ($animeInfo['genres'] as $k) {
      echo '<li>'.$k.'</li>';
    }
  echo '
  </div>
  ';
}

function animeSearch()
{

}

?>
