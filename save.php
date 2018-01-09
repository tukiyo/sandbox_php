<?php
$dbh = new PDO('mysql:host=localhost;dbname=chat1;charset=utf8', 'root', 'root');
if(!isset($_SESSION)) session_start();

$msg = "<p>名前と文章を入力して送信ボタンを押してください。</p>";
$name = isset($_SESSION["name"]) ? $_SESSION["name"] : "" ;
$name = isset($_POST["name"]) ? $_POST["name"] : $name ;
$text = isset($_POST["text"]) ? $_POST["text"] : "" ;
$action = isset($_POST["action"]) ? $_POST["action"] : "" ;

if($action){
	if(!$name) $err[] = "名前 を入力してください";
	if(mb_strlen($name)>4) $err[] = "名前 は4文字以内で入力してください";
	if(!$text) $err[] = "文章 を入力してください";
	if(mb_strlen($text)>50) $err[] = "文章 は50文字以内で入力してください";

	if(!count($err)){
		// セッションに名前を登録
		$_SESSION["name"] = $name;
		$stmt = $dbh->prepare('insert into chat (date, name, text) values (now(), ?, ?)');
		$stmt->execute(array($name, $text));
	}else{
		$msg = showerr($err);
	}
}

// チャット内容の取得
$_chat = array();
$stmt = $dbh->prepare('select * from chat order by date desc');
$stmt->execute();
foreach($stmt->fetchAll() as $row) {
	$_chat[$col["chid"]] = $row;
}

// 直近のIDをセッションに登録
$_SESSION["max_chid"] = count($_chat) ? max(array_keys($_chat)) : 0;
