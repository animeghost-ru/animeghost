<?
#project config#
$cfg['project_name'] = 'AnimeGhost.ru';
$cfg['create_date'] = '25.04.2019';
$cfg['language'] = 'russian';
$cfg['creator'] = 'krain0v';
$cfg['time'] = time();
#database config#
$cfg['hostname'] = 'localhost';
$cfg['db'] = 'u0693174_animeghost';
$cfg['dbuser'] = 'u0693174_krain0v';
$cfg['dbpass'] = 'Mesina226';

#html file config#
$cfg['title_index'] = 'AnimeGhost - мир РуАниме!';
$cfg['description'] = 'Animeghost Website';
$cfg['og'] = '';
$cfg['page'] = 'index';
$cfg['ip'] = $_SERVER['REMOTE_ADDR'];

#var config#
$cfg['sex'] = ['Не указан','Мужской','Женский'];
$cfg['anime_status'] = ['1'=>'Онгоинг','2'=>'Завершен','3'=>'OVA','4'=>'ONA','5'=>'Спешл','6'=>'Видео Клип'];
$cfg['user_group'] = ['1'=>'Обычный пользователь','2'=>'Контентмейкер','3'=>'Админ','4'=>'Главный Админ'];
$cfg['day'] = ['1' => 'Понедельник','2' => 'Вторник','3' => 'Среда','4' => 'Четверг','5' => 'Пятница','6' => 'Суббота','7' => 'Воскресенье'];
$cfg['user_values'] = ['user_group' => 'Роль пользователя', 'register_date' => 'Дата регистрации', 'last_activity' => 'Последняя активность','name' => 'Имя','age' => 'Возраст','sex' => 'Пол', 'vk' => 'Вконтакте'];
$cfg['err'] = [
  'success' => 'Успех',
  'empty' => 'Пустое значение, заполните поля',
  'wrong' => 'Неправильное значение',
  'authorized' => 'Уже авторизован',
  'registered' => 'Уже зарегистрирован',
  'long' => 'Слишком длинное значение',
  'short' => 'Слишком короткое значение',
  'wrongLogin' => 'Неправильный логин',
  'wrongEmail' => 'Неправильный email',
  'wrongUserAgent' => 'Неправильный user agent',
  'invalidUser' => 'Неправильный пользователь',
  'wrongPass' => 'Неправильный пароль',
  'wrongNewPasswd' => 'Новый пароль не совпадает',
  'samePasswd' => 'Использован старый пароль',
  'noUser' => 'Нет такого пользователя',
  'checkEmail' => 'Проверьте почту',
  'unauthorized' => 'Неавторизованный пользователь',
  'access' => 'Доступ запрещен',
  'same' => 'Одинаковые данные',
  'used' => 'Уже занято',
  'wrongData' => 'Неправильные данные'
];
$cfg['season'] = ['winter' => 'зима','spring' => 'весна','summer' => 'лето','autumn' => 'осень'];
$cfg['group'] = [
	1 => 'Пользователь',
	2 => 'Админ',
  3 => 'Разработчик Сайта'
];
$cfg['email'] = '5fragswf@gmail.com';
$cfg['email_from'] = 'AnimeGhost Mail';
?>
