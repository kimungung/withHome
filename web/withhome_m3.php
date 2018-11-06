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
				<img src="../img/프로토타입_2.png" width="50%">
				<h3 align="center">withHOME [
				<?php 
				if($_SESSION['isLogged']=="YES") echo $_SESSION['userID'];
				else echo "로그인이 필요해요";
				?>
				]님</h3>
				

<a href="withhome_m4.php" target="_top" class="ui-btn ui-icon-arrow-r ui-btn-icon-right">최근 기록</a>
<a href="withhome_m5.php" target="_top" class="ui-btn ui-icon-arrow-r ui-btn-icon-right">알림 설정</a>


			</p>
		</div>

		<!-- 푸터 작성 -->
		<div data-role="footer" data-theme="b">
			<p  align="center"><a href="main.php">HOME</a></p>
		</div>
	</div>
</body>
</html>
