<?
require($_SERVER['DOCUMENT_ROOT'].'/htmltemplates/head.php');
require($_SERVER['DOCUMENT_ROOT'].'/htmltemplates/body.php');
require($_SERVER['DOCUMENT_ROOT'].'/htmltemplates/nav.php');
require($_SERVER['DOCUMENT_ROOT'].'/htmltemplates/auth.php');
require($_SERVER['DOCUMENT_ROOT'].'/htmltemplates/profile.php');
require($_SERVER['DOCUMENT_ROOT'].'/sqlload.php');
require($_SERVER['DOCUMENT_ROOT'].'/config.php');

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
function profilePage()
{
  echoProfilePage();
}
function checkUser()
{
  if(empty($_SESSION['user']))
  {
  	header('HTTP/1.0 403 Forbidden');
  	header('Location: /auth');
  	die;
  }
}
function checkUserAuth()
{
  if(!empty($_SESSION['user']))
  {
    header('HTTP/1.0 403 Forbidden');
    header('Location: /profile');
    die;
  }
}
function not_existing_page($page)
{
  echo '<p style="color: white;">Страницы '.$page.' - не существует, переходим на главную страницу через 3 секунды!</p>';
}

function msg($key, $err = 'ok'){
	global $cfg;
	die(json_encode(['err' => $err, 'mes' => $cfg['err'][$key], 'key' => $key]));
}

function login()
{
  global $cfg, $db;
  if (!empty($_SESSION['user']))
  {
    msg('authorized', 'error');
  }
  if(empty($_POST['login']) || empty($_POST['pass']))
	{
		msg('empty', 'error');
	}
  $_POST['login'] = mb_strtolower($_POST['login']);
  $query = $db->prepare('SELECT `id`, `login`, `pass` FROM `users` WHERE `login` = :login');
  $query->bindValue(':login', $_POST['login']);
  $query->execute();
  if($query->rowCount() == 0)
  {
    msg('invalidUser', 'error');
  }
  $row = $query->fetch();
  if(md5($_POST['pass']) != $row['pass'])
  {
    msg('wrongPass', 'error');
  }else{
    startSess($row);
    msg('success');
  }
}

function startSess($row)
{
  global $db;
  session_start();
  $_SESSION['user'] = $row['login'];
  $_SESSION['id'] = $row['id'];
  $query = $db->prepare('UPDATE `users` SET `last_auth` = :time WHERE `id` = :id');
  $query->bindParam(':time', time());
  $query->bindParam(':id', $row['id']);
  $query->execute();
}

function _exit()
{
  session_start();
  session_unset();
  session_destroy();
  empty($_SESSION);
}

function userInfo($id)
{
  global $db;
  $query = $db->prepare('SELECT `id`, `login`, `mail`, `vk`, `avatar`, `access` FROM `users` WHERE `id` = :id');
  $query->bindParam(':id', $id);
  $query->execute();
  $row = $query->fetch();
  $user =
		[
			'id' => $row['id'],
      'access' => $row['access'],
			'login' => $row['login'],
			'avatar' => $row['avatar'],
      'vk' => $row['vk'],
			'mail' => $row['mail'],
		];
    return $user;
}

function reg()
{
  global $cfg, $db;
  if (!empty($_SESSION))
  {
    msg('registered', 'error');
  }
  if(empty($_POST['login']) || empty($_POST['mail']) || empty($_POST['pass']))
  {
    msg('empty', 'error');
  }
  if(preg_match('/[^0-9A-Za-z]/', $_POST['login']))
  {
    msg('wrongLogin', 'error');
  }
  if(!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))
  {
    msg('wrongEmail', 'error');
  }
  $_POST['mail'] = mb_strtolower($_POST['mail']);
  $_POST['login'] = mb_strtolower($_POST['login']);

  $query = $db->prepare('SELECT `id` FROM `users` WHERE `login` = :login');
  $query->bindValue(':login', $_POST['login']);
  $query->execute();
  if($query->rowCount() > 0)
  {
    msg('registered', 'error');
  }
  $query = $db->prepare('SELECT `id` FROM `users` WHERE `mail`= :mail');
  $query->bindParam(':mail', $_POST['mail']);
  $query->execute();
  if($query->rowCount() > 0)
  {
    msg('registered', 'error');
  }

  $pass = md5($_POST['pass']);
  $query = $db->prepare('INSERT INTO `users` (`login`, `mail`, `pass`, `regdate`, `avatar`, `vk`, `access`) VALUES (:login, :mail, :pass, :time, :avatar, :vk, :access)');
  $query->bindValue(':login', $_POST['login']);
  $query->bindParam(':mail', $_POST['mail']);
  $query->bindParam(':pass', $pass);
  $query->bindParam(':time', $cfg['time']);
  $query->bindParam(':avatar', 'http://i.imgur.com/xVwHlSg.jpg');
  $query->bindParam(':vk', 'Не указано');
  $query->bindParam(':access', '1');
  $query->execute();
  _mail($_POST['mail'], "Регистрация", "Вы успешно зарегистрировались на сайте www.Animeghost.ru");
  msg('success');
}

function _mail($email, $subject, $message){
	global $cfg;
	$headers  = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=utf-8\r\n";
	$headers .= "Content-Transfer-Encoding: base64\r\n";
	$subject  = "=?utf-8?B?".base64_encode($subject)."?=";
	$headers .= "From: {$cfg['email_from']} <{$cfg['email']}>\r\n";
	mail($email, $subject, rtrim(chunk_split(base64_encode($message))), $headers);
}
?>
