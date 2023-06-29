<html>
<head>
 <title>Запись в БД</title>
</head>
<body>
 <form method="POST" action="">
  <input name="name" type="text" placeholder="Имя"/>
  <input name="text" type="text" placeholder="Текст"/>
  <input type="submit" value="Запись"/>
 </form>
<?php
//параметры с формы
$name = $_POST['name'];
$text = $_POST['text'];
// Параметры для подключения
$db_host = "localhost";
$db_user = "root";
$db_password = "root";
$db_base = 'exem';
$db_table = "mytable";
// Подключение к базе данных
$mysqli = new mysqli($db_host,$db_user,$db_password,$db_base);
// проверка на правильность подключения
if ($mysqli->connect_error) {
    die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}
//Запись в БД
$result = $mysqli->query("INSERT INTO ".$db_table." (name,text) VALUES ('$name','$text')");
//Чтение
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "root";
$dbname = "exem";
// Подключаемся к mysql серверу
$link = mysql_connect($dbhost, $dbuser, $dbpassword); // старая функция
// Выбираем нашу базу данных
mysql_select_db($dbname, $link);
// делаем sql запрос
$query = "select * from mytable";
// Запрашиваем
$result = mysql_query($query, $link);
while($rows = mysql_fetch_array($result)) //возвращение результата в виде ассоциативного массива
{
printf("id:%d, name:%s, text:%s", $rows['id'],$rows['name'],$rows['text']);
?>
<br>
<?php
}
/*
// Закрываем соединение функция устарела mysqli_close не работает с постоянными соединениями
mysql_close($link);
*/
function mysql_connect($server,$username,$password,$new_link=false,$client_flags=0) {
  $GLOBALS['mysql_oldstyle_link']=mysqli_connect($server,$username,$password);
  return $GLOBALS['mysql_oldstyle_link'];
}

function mysql_query($sql,$link=NULL) {
  if ($link==NULL) $link=$GLOBALS['mysql_oldstyle_link'];
  return mysqli_query($link,$sql);
}

function mysql_fetch_row($res) {
  return mysqli_fetch_row($res);
}

function mysql_fetch_assoc($res) {
  return mysqli_fetch_assoc($res);
}

function mysql_fetch_array($res) {
  return mysqli_fetch_array($res);
}

function mysql_fetch_object($res,$classname='stdClass',$params=array()) {
  return mysqli_fetch_object($res,$classname,$params);
}

function mysql_affected_rows($link=NULL) {
  if ($link===NULL) $link=$GLOBALS['mysql_oldstyle_link'];
  return mysqli_affected_rows($link);
}

function mysql_insert_id($link=NULL) {
  if ($link===NULL) $link=$GLOBALS['mysql_oldstyle_link'];
  return mysqli_insert_id($link);
}

function mysql_select_db($database_name,$link=NULL) {
  if ($link==NULL) $link=$GLOBALS['mysql_oldstyle_link'];
  return mysqli_select_db($link,$database_name);
}

function mysql_errno($link=NULL) {
  if ($link===NULL) $link=$GLOBALS['mysql_oldstyle_link'];
  return mysqli_errno($link);
}

function mysql_error($link=NULL) {
  if ($link===NULL) $link=$GLOBALS['mysql_oldstyle_link'];
  return mysqli_error($link);
}

function mysql_num_rows($res) {
  return mysqli_num_rows($res);
}

function mysql_free_result($res) {
  return mysqli_free_result($res);
}

function mysql_close($link) {
  return mysqli_close($link);
}

function mysql_real_escape_string($sql,$link=NULL) {
  if ($link===NULL) $link=$GLOBALS['mysql_oldstyle_link'];
  return mysqli_real_escape_string($link,$sql);
}

function mysql_get_server_info($link=NULL) {
  if ($link===NULL) $link=$GLOBALS['mysql_oldstyle_link'];
  return mysqli_get_server_info($link);
}

function mysql_set_charset ($charset, $link_identifier = NULL) {
  if ($link===NULL) $link=$GLOBALS['mysql_oldstyle_link'];
  return mysqli_set_charset($link, $charset);
}
?>
</body>
</html>
