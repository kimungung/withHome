<?php

// DB 연결
$dbConn	= mysqli_connect("localhost","root","pw","withhome");   



// 자료 업데이트 쿼리
$query	= "INSERT INTO `users_record`(`userID`, `userPassword`, `userToken`, `userRegdate`) 
		VALUES (" . "'" .
		$_POST["userID"] . "', '".
		$_POST["userPassword"] . "', '".
		$_POST["userToken"] . "', '".
		date("Y-m-d H:i:s") . "'" .
		")";

// 자료 삽입
$result = mysqli_query($dbConn, $query);


//create setting 쿼리
$query2	= "INSERT INTO `user_settings`(`userID`, `dogOn`, `waterOn`, `sirenOn`, `FireOn`) VALUES (" . "'" .
		$_POST["userID"] . "', "."1,1,1,1)";



//create setting
$result2 = mysqli_query($dbConn, $query2);


// 자료 삽입 결과에 따른 출력
if($result&&$result2) {
	print "<script>";
	print	"window.alert('회원가입이 완료되었습니다.');";
	print	"location.href = 'main.php';";
	print "</script>";

}
else{
	print "<script>";
	print	"window.alert('회원가입 실패. 다시 시도하세요.');";
	print	"location.href = 'withhome_m2.php';";
	print "</script>";


}
// DB 연결종료
mysqli_close($dbConn);

?>
