<?php

$title = $_POST['title']; #제목
$content = $_POST['content']; #내용
$password = $_POST['password']; #비밀번호
$password = md5($password); #비밀번호 암호화(MD5)
include 'db_conn.php';

// 데이터 조회
$sql = "insert into boards(content,title,password) values('$title','$content','$password')";
$result = $conn->query($sql); #데이터를 가져옴

$uri = 'http://';
$uri .= $_SERVER['HTTP_HOST'];
header('Location: '.$uri.'/board_list.php');
?>