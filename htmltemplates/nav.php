<?
  function echoNavMenu()
  {
    if (empty($_SESSION['user']))
    {
      $navLink = '/auth';
      $navText = 'Авторизация';
    }
    else
    {
      $navLink = '/profile';
      $navText = 'Профиль';
    }
    echo '
    <div class="header">
      <nav class="navMenu">
        <a class="navList" href="/">Главная</a>
        <a class="navList" href="/anime">Аниме</a>
        <a class="navList" href="/manga">Манга</a>
        <a class="navList" href="/">Случайный Тайтл</a>
        <a class="navList" href="'.$navLink.'">'.$navText.'</a>
        <div class="l"></div>
      </nav>
    </div>
    ';
  }


?>
