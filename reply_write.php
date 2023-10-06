<?php

include 'db_conn.php';
$number = $_POST['number'];
$writer = $_POST['writer'];
$content = $_POST['content'];

$sql = "insert into reply(number, writer, content) values('$number','$writer', '$content')";
$result = $conn->query($sql); #데이터를 가져옴

$uri = 'http://';
$uri .= $_SERVER['HTTP_HOST'];
header('Location: '.$uri.'/board.php?number='.$number);

?>