<?
require($_SERVER['DOCUMENT_ROOT'].'/sqlload.php');
function echoProfilePage()
{
    global $cfg;


    $user = userInfo($_SESSION['id']);
    $animeList = getUserWatchedAnime($user['id']);
    $access = $user['access'];

    switch ($access) {
      case '3':
        $role = '<font class="dev">Разработчик Сайта</font>';
        break;
      case '2':
        $role = '<font color="red">Админ</font>';
        break;
      case '1':
      $role = '<font>Пользователь</font>';
      break;
      default:
      break;
    }
    echo '
    <div class="sblock">
      <h3 style="margin-left: 30%">Профиль пользователя - <b>'.$user['login'].'</b></h3>
      <div class="userInfo">
        <img src="'.$user['avatar'].'" class="userAvatar" alt="...">
          <ul style="list-style-type: none">
            <li>Mail - '.$user['mail'].'</li>
            <li>VK - '.$user['vk'].'</li>
            <li>Роль - '.$role.'</li>
          </ul>
      <div class="btn btn-primary" id="exit">Выход</div>
      </div>
      <div class="animeWatched">
        <ul>
          '.$animeList.'
        </ul>
      </div>
    </div>
    ';
}


?>
