<?php

//로그인 세션 체크
session_start();


// DB 연결
$dbConn	= mysqli_connect("localhost","root","pw","withhome");   


$IDCheck = $_POST["userID"];
$passwordCheck =$_POST["userPassword"];



// 로그인 체크
$query	= "SELECT `userPassword` FROM `users_record` WHERE `userID`='$IDCheck'"; 


// 비밀번호 체크 
$result = mysqli_query($dbConn, $query);
$data =mysqli_fetch_array($result);


if( $data[0] == $passwordCheck) $loginOn=1;
else $loginOn=0;



// 결과에 따른 출력
if($result&&$loginOn==1) {

	$_SESSION['isLogged']="YES";
	$_SESSION['userID']=$IDCheck;

	print "<script>";
	print	"window.alert('로그인 성공');";
	print	"location.href = 'withhome_m3.php';";
	print "</script>";

}
else{

	$_SESSION['isLogged']="NO";
	$_SESSION['userID']='';
	print "<script>";
	print	"window.alert('로그인 정보가 일치하지 않습니다. 다시 시도하세요.');";
	print	"location.href = 'main.php';";
	print "</script>";


}



// DB 연결종료
mysqli_close($dbConn);

?>
