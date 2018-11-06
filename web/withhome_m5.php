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

<!-- 입력값 유효성 검사 -->
<script type="text/javascript">
function submitCheck() {


	settings.submit();

};
</script>

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
				<img src="../img/알림설정.png" width="15%">
				<h3 align="center">알림 설정</h3>


<!-- php 설정 창 -->
<?php
if($_SESSION['isLogged']=="YES"){
// DB 연결
$dbConn	= mysqli_connect("localhost","root","pw","withhome");   
$userIDCheck=$_SESSION['userID'];

$query = "SELECT `dogOn`, `waterOn`, `sirenOn`, `FireOn` FROM `user_settings` WHERE `userID`='$userIDCheck'";
$result = mysqli_query($dbConn, $query);
$data =mysqli_fetch_array($result);

}else{	
	//임의의 array 
	$data=array(1,1,1,1);	
}
?>
			
		<!-- 알림 설정 창 -->
		<div data-role="fieldcontain">
		<form name="settings" method="post" action="settingsInsert.php">
<p align="center">			
	<table border=0 width="100%">
						
<tr><td width=150 >개 짖는 소리</td>
				<td width=100 ><fieldset data-role="controlgroup" data-type="horizontal">
					<input type="radio" name="dog_bark" id="dog_on" value=1 <?php if($data[0]==1) echo "checked=\"checked\"";?> />
					<label for="dog_on">ON</label>
					<input type="radio" name="dog_bark" id="dog_off" value=0 <?php if($data[0]!=1) echo "checked=\"checked\"";?> />
					<label for="dog_off">OFF</label>

				</fieldset></td></tr>
<tr><td width=150>물 끓는 소리</td>
				<td width=100><fieldset data-role="controlgroup" data-type="horizontal">
					<input type="radio" name="boiling_water" id="radio3" value=1 <?php if($data[1]==1) echo "checked=\"checked\"";?>/>
					<label for="radio3">ON</label>
					<input type="radio" name="boiling_water" id="radio4" value=0 <?php if($data[1]!=1) echo "checked=\"checked\"";?> />
					<label for="radio4">OFF</label>

				</fieldset></td></tr>
<tr><td width=150>사이렌 소리</td>
				<td width=100><fieldset data-role="controlgroup" data-type="horizontal">
					<input type="radio" name="siren" id="radio5" value=1 <?php if($data[2]==1) echo "checked=\"checked\"";?> />
					<label for="radio5">ON</label>
					<input type="radio" name="siren" id="radio6" value=0 <?php if($data[2]!=1) echo "checked=\"checked\"";?> />
					<label for="radio6">OFF</label>

				</fieldset></td></tr>
<tr><td width=150>화재경보기 소리</td>
				<td width=100><fieldset data-role="controlgroup" data-type="horizontal">
					<input type="radio" name="fire_alarm" id="radio7" value=1 <?php if($data[3]==1) echo "checked=\"checked\"";?> />
					<label for="radio7">ON</label>
					<input type="radio" name="fire_alarm" id="radio8" value=0 <?php if($data[3]!=1) echo "checked=\"checked\"";?> />
					<label for="radio8">OFF</label>

				</fieldset></td></tr>
				
</table>
</p>

</form>
</div>




		<!-- 입력버튼 -->
		<!-- 입력버튼 -->
		<button class="ui-btn ui-shadow ui-corner-all ui-icon-arrow-r ui-btn-icon-right" 
			onclick="submitCheck()">설정 저장</button>


<!-- 이전 메뉴-->
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


<?php mysqli_close($dbConn); ?>
