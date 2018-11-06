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
function loginCheck() {

	if (!document.login.userID.value) {
		window.alert('ID를 입력해주세요.');
		document.login.userID.focus();
		return false;
	}

	if (!document.login.userPassword.value) {
		window.alert('비밀번호를 입력해주세요.');
		document.login.userPassword.focus();
		return false;
	}

	login.submit();

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
					
					<td><font color=#ffffff><h3>withHOME</h3></font></td>
				</tr>
			</tbody>
		</table>
		</div>

		<!-- 본문 작성 -->
		<div data-role="content">
			<p align="center">
				<img src="../img/프로토타입_2.png" width="50%">
				
				
<?php if($_SESSION['isLogged']!="YES"){ ?>

			<h3 align="center">withHOME<br>로그인 페이지</h3>
			<!-- 로그인 폼 작성 -->
			<form name="login" method="post" action="loginCheck.php">
<div data-role="fieldcontain">

	<label for="user_org">ID:</label>
	<input type="text" name="userID" id="userID" value=""/>
</div>
<div data-role="fieldcontain">
	<label for="user_rank">password:</label>
	<input type="text" name="userPassword" id="userPassword" value=""/>
</div>
</form>

		<!-- 로그인 버튼 -->
		<button class="ui-btn ui-shadow ui-corner-all ui-icon-arrow-r ui-btn-icon-right" 
			onclick="loginCheck()">로그인</button>



<a href="withhome_m2.php" target="_top" class="ui-btn ui-icon-arrow-r ui-btn-icon-right">회원가입</a>

			</p>
			
		</div>

<?php }else{ ?>
		
		<h3 align="center">withHOME<br>[
		<?php 
			if($_SESSION['isLogged']=="YES") echo $_SESSION['userID'];
			else echo "로그인이 필요해요";
		?> 
		]님의 페이지</h3>
		<a href="withhome_m3.php" target="_top" class="ui-btn ui-icon-arrow-r ui-btn-icon-right">My page</a>
		<a href="logoutCheck.php" target="_top" class="ui-btn ui-icon-arrow-r ui-btn-icon-right">로그아웃</a>

			</p>
			
		</div>
		
		<?php } ?>
		
		<!-- 푸터 작성 -->
		<div data-role="footer" data-theme="b">
			<p  align="center"><a href="main.php">HOME</a></p>
		</div>
	</div>
</body>
</html>
