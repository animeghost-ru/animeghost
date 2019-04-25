<?
require($_SERVER['DOCUMENT_ROOT'].'/config.php');
require($_SERVER['DOCUMENT_ROOT'].'/functions.php');
//require($_SERVER['DOCUMENT_ROOT'].'/session.php');


if (($_SERVER['REQUEST_URI'] == '/index') or ($_SERVER['REQUEST_URI'] == '/main') or ($_SERVER['REQUEST_URI'] == '/'))
{
  head();
  bodyStart();
  navMenu();
  bodyEnd();
}
elseif ($_SERVER['REQUEST_URI'] == '/anime')
{
  head('Список Аниме');
  bodyStart();
  bodyEnd();
}
else
{
  head('Что-то пошло не так!');
  bodyStart();
  not_existing_page($_SERVER['REQUEST_URI']);
  bodyEnd();
}
?>
