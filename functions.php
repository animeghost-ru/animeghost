<?
require($_SERVER['DOCUMENT_ROOT'].'/htmltemplates/head.php');
require($_SERVER['DOCUMENT_ROOT'].'/htmltemplates/body.php');
require($_SERVER['DOCUMENT_ROOT'].'/htmltemplates/nav.php');
require($_SERVER['DOCUMENT_ROOT'].'/htmltemplates/auth.php');

function head($title = '')
{
  global $cfg;
  if ($title == '')
  {
    $title = $cfg['title_index'];
  }
  echoHead($title);
}

function bodyStart()
{
  echoBodyStart();
}

function bodyEnd()
{
  echoBodyEnd();
}

function navMenu()
{
  echoNavMenu();
}
function authPage()
{
  echoAuthPage();
}

function not_existing_page($page)
{
  echo '<p style="color: white;">Страницы '.$page.' - не существует, переходим на главную страницу через 3 секунды!</p>';
}

?>
