<!DOCTYPE HTML>
<?php session_start(); ?>
<html>
<head>
	<title>withHome</title>

	<!-- 한글처리를 위한 meta 태그 -->
	<meta charset="utf-8">

	<!-- 모바일 웹페이지를 viewport 설정 -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- jQuery Mobile 기능을 이용하기 위한 css, js 파일을 웹 상에서 불러오기 -->
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
	<script src="http://code.jquery.com/jquery-1.12.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>




</head>


<body>
	<!-- 페이지 설정 -->
	<div data-role="page">

		<!-- 헤더 작성 -->
		<div data-role="header" data-theme="b">
		<table>
		        <tbody>
			        <tr>
					
					<td><h3>withHOME</h3></td>
				</tr>
			</tbody>
		</table>
		</div>

		<!-- 본문 작성 -->
		<div data-role="content">
			<p align="center">
				<img src="../img/danger.png" width="15%">
				<h3 align="center">[				
				<?php 
				if($_SESSION['isLogged']=="YES") echo $_SESSION['userID'];
				else echo "로그인이 필요해요";
				?>
				
				]님 최근 기록</h3>

				
				
				
				
<!--TABLE 출력 파트 --> 
<p align="center">			
	<table border=1 width="100%">
	<tr><td width=150 align=center>RecordTime</td>
	<td width=100 align=center>SoundType</td></tr>
	
<?php
//소리 분류 후 출력
function printSound($soundNum,$recordTime,$data2){
		
	switch($soundNum){	
		case 0:  if($data2['sirenOn']==1){ 
		echo "<tr><td align=center>$recordTime</td> "; 
		echo "<td align=center> 사이렌 </td>"; 
		} break;
		case 1: if($data2['FireOn']==1) { 
		echo "<tr><td align=center>$recordTime</td> "; 
		echo "<td align=center> 화재경보기 </td>";} 
		break;
		case 2: if($data2['waterOn']==1) { 
		echo "<tr><td align=center>$recordTime</td> "; 
		echo "<td align=center> 물 끓는 소리 </td>"; 
		} break;
		case 3: if($data2['dogOn']==1) { 
		echo "<tr><td align=center>$recordTime</td> "; 
		echo "<td align=center> 개짖는 소리 </td>"; 
		} break;
		default: 
		echo "<tr><td align=center>$recordTime</td> "; 
		echo "<td align=center> 미분류소리 </td>"; 
		break;					
	}
}

if($_SESSION['isLogged']=="YES"){
	
	// DB 연결
	$dbConn	= mysqli_connect("localhost","root","pw","withhome");   
	$userIDCheck=$_SESSION['userID'];
	
	//테이블 출력용
	$query = "SELECT `soundType`, `recordDate` 
			 FROM `sound_record` 
			 WHERE `userID`='$userIDCheck' order by `recordDate` DESC";
	$result = mysqli_query($dbConn, $query);
	
	//설정 가져오기용
	$query2 = "SELECT `dogOn`, `waterOn`, `sirenOn`, `FireOn` 
			  FROM `user_settings` 
			  WHERE `userID`='$userIDCheck'";
	$result2 = mysqli_query($dbConn, $query2);
	$data2 =mysqli_fetch_array($result2);
	
	if($result){
		while($data =mysqli_fetch_array($result)){
			
			$soundType=$data['soundType'];
			$recordTime=$data[1];
			printSound($soundType,$recordTime,$data2);
			
		}			
	}
			mysqli_close($dbConn);		
}			
?>

</table>
</p>


<a href="withhome_m3.php" target="_top" class="ui-btn ui-icon-arrow-r ui-btn-icon-right">이전 메뉴</a>

			</p>
		</div>

		<!-- 푸터 작성 -->
		<div data-role="footer" data-theme="b">
			<p  align="center"><a href="main.php">HOME</a></p>
		</div>
	</div>
</body>
</html>
