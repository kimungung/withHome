<!DOCTYPE HTML>
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



<!-- 입력값 유효성 검사 -->
<script type="text/javascript">
function formCheck() {


	if (!document.user.userID.value) {
		window.alert('ID를 입력해주세요.(16자 이내)');
		document.user.userID.focus();
		return false;
	}

	if (!document.user.userPassword.value) {
		window.alert('비밀번호를 입력해주세요.(16자 이내)');
		document.user.userPassword.focus();
		return false;
	}
	
	
	if (!document.user.userToken.value) {
		window.alert('토큰 정보를 입력해주세요.');
		document.user.userToken.focus();
		return false;
	}
	

	user.submit();

};
</script>


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
			<p style="color:#5522ff;font-size:16.1px;"><b>정보를 빠짐없이 입력하세요. 가입시에는 어플리케이션을 이용해주세요.<b></p>


		
<!-- 입력폼 -->
		<div data-role="fieldcontain">

			<form name="user" method="post" action="userInsert.php">

				<label>ID:</label>
				<input type="text" name="userID" id="userID" placeholder="ID(16자 이내)를 입력해주세요."/>
				<label>Password:</label>
				<input type="text" name="userPassword" id="userPassword" placeholder="비밀번호(16자 이내)를 입력해주세요."/>
				<label>Token:</label>
				<input type="text" name="userToken" id="userToken" placeholder="복사한 토큰 정보를 입력해주세요."/>

			</form>
		</div>

		<!-- 입력버튼 -->
		<button class="ui-btn ui-shadow ui-corner-all ui-icon-arrow-r ui-btn-icon-right" 
			onclick="formCheck()">회원가입 시도</button>


		</div>

		<!-- 푸터 작성 -->
		<div data-role="footer" data-theme="b">
			<p  align="center" ><a href="main.php">HOME</a></p>
		</div>
	</div>
</body>
</html>









