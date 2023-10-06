<?php

$id = $_GET['id']; #아이디
$pass = $_GET['pass']; #비밀번호
$servername = "localhost"; #서버의 실제주소
$username = "root"; #mysql ID
$password = "kdt_test"; # mysql password
$dbname = "kdt_test"; #사용할 데이터베이스 이름
// MySQL 연결
$conn = new mysqli($servername, $username, $password, $dbname);
// 연결 확인
if ($conn->connect_error) {
die("MySQL 연결 실패: " . $conn->connect_error);
}
// 데이터 조회
$sql = "SELECT * FROM users WHERE username = '$id'";
$result = $conn->query($sql); #데이터를 가져옴
$row = $result->fetch_array(); # 보기좋게 정리함


#로그인 판별
if(($row != null) && ($row[1] == $pass)){
    print("로그인 성공");
    $uri = 'http://';
    $uri .= $_SERVER['HTTP_HOST'];
    header('Location: '.$uri.'/board_list.php');
}
else{
    print("로그인 실패");
}

?>