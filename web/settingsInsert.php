<?php

session_start();
// DB 연결
$dbConn	= mysqli_connect("localhost","root","pw","withhome");   

$dogCheck =$_POST["dog_bark"];
$waterCheck =$_POST["boiling_water"];
$sirenCheck =$_POST["siren"];
$fireCheck =$_POST["fire_alarm"];

if($_SESSION['isLogged']=="YES"){

$userIDCheck=$_SESSION['userID'];

//업데이트 쿼리
$query = "UPDATE `user_settings` SET `dogOn`=$dogCheck,
				`waterOn`=$waterCheck,
				`sirenOn`=$sirenCheck,
				`FireOn`=$fireCheck				
				WHERE `userID`='$userIDCheck'
				";


//업데이트
$result = mysqli_query($dbConn, $query);



// 자료 업데이트 결과에 따른 출력
if($result) {
	

	print "<script>";
	print	"window.alert('설정이 저장되었습니다.');";
	print	"location.href = 'withhome_m3.php';";
	print "</script>";

}
else{
		print "<script>";
	print	"window.alert('설정 저장 실패. 다시 시도하세요.');";
	print	"location.href = 'withhome_m3.php';";
	print "</script>";


}
}else{
	print "<script>";
	print	"window.alert('로그인이 필요해요!');";
	print	"location.href = 'main.php';";
	print "</script>";
	
}


// DB 연결종료
mysqli_close($dbConn);
?>
