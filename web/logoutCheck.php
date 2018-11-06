<?php


session_start();

session_destroy();
	print "<script>";
	print	"window.alert('로그아웃 되셨습니다.');";
	print	"location.href = 'main.php';";
	print "</script>";

?>
