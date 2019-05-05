<?
require($_SERVER['DOCUMENT_ROOT'].'/config.php');
require($_SERVER['DOCUMENT_ROOT'].'/functions.php');
require($_SERVER['DOCUMENT_ROOT'].'/sqlload.php');
//require($_SERVER['DOCUMENT_ROOT'].'/session.php');
session_start();

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
  navMenu();
  bodyEnd();
}
elseif ($_SERVER['REQUEST_URI'] == '/manga')
{
  head('Список Манги');
  bodyStart();
  navMenu();
  bodyEnd();
}
elseif ($_SERVER['REQUEST_URI'] == '/profile')
{
  checkUser();
  head('Профиль пользователя - '.$_SESSION['user']);
  bodyStart();
  navMenu();
  profilePage();
  bodyEnd();
}
elseif ($_SERVER['REQUEST_URI'] == '/auth')
{
  checkUserAuth();
  head('Авторизация');
  bodyStart();
  navMenu();
  authPage();
  bodyEnd();
}
else
{
  head('Что-то пошло не так!');
  bodyStart();
  navMenu();
  not_existing_page($_SERVER['REQUEST_URI']);
  bodyEnd();
}
?>
