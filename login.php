<?php include('./php/dbconn.php'); ?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>로그인 폼</title>
  <!-- 초기화 -->
  <link rel="stylesheet" type="text/css" href="./css/reset.css">
  <!-- 기본서식 -->
  <link rel="stylesheet" type="text/css" href="./css/base.css">
  <!-- 공통서식 -->
  <link rel="stylesheet" type="text/css" href="./css/common.css">
  <!-- 아이콘폰트 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <style>
    /* 서브페이지 서식 */
    header{position:static; background: var(--m_bg_color);}
    header .gnb li a{color:var(--f_color1);}
    header i.fas{color:var(--f_color1);}

    body{background: #f1f1f1;}
    fieldset{
      border:none;
      background: #f1f1f1;
      width: 500px;
      height: 100%;
      /* margin: 0 auto; */
      padding: 30px 60px 200px;
      box-sizing: border-box;
      position:relative;
      /* position:absolute;
      top:50%;
      left:50%;
      transform: translate(-50%, -50%); */
      margin:0 auto;
    }
    legend{
      text-align: center;
      font-size:24px;
      font-weight:bold;
      padding-top: 200px;
    }
    label[for="id_txt"], label[for="pw_txt"]{display:none}
    #id_txt, #pw_txt{
      border:none;
      width: 100%;
      height: 60px;
      text-indent: 20px;
      font-size: 16px;
      margin: 10px 0;
    }
    label[for="id_save"]{font-size:14px; margin-left: 5px;}
    #login_btn{
      width: 100%;
      height: 60px;
      color: var(--m_bg_color);
      background: var(--s_color01);
      border:none;
      font-size: 16px;
      margin:10px 0;
      cursor: pointer;
    }
    .search{
      text-align: center;
      margin-top:40px;
    }
    .search a{
      font-size: 14px;
      color:var(--f_color1);
      text-decoration:none;
      padding: 0 15px; 
      border-right:1px solid var(--f_color1);
    }
    .search a:last-of-type{border:none;}
    .search a:hover{text-decoration:underline;}
  </style>
</head>
<body>
  <!-- 상단헤더영역 -->
  <header>
    <h1><a href="index.html" title="메인페이지로 바로가기">
      <img src="./images/logo-casper_black.png" alt="캐스퍼로고">
    </a></h1>
    <!-- 내비게이션 -->
    <nav class="gnb">
      <ul>
        <li><a href="#" title="소개">소개</a></li>
        <li><a href="#" title="체험">체험</a></li>
        <li><a href="#" title="이벤트">이벤트</a></li>
        <li><a href="#" title="구매하기">구매하기</a></li>
        <li><a href="#" title="고객지원">고객지원</a></li>
      </ul>
    </nav>

    <a href="login.php" title="로그인"><i class="fas fa-user"></i></a>
    <i class="fas fa-bell"></i> <!-- 알림아이콘 -->
  </header>

  <main>
    <form name="login" onsubmit="return form_check()" method="post" action="./php/login_check.php">
      <fieldset>
        <legend>로그인</legend>
        <p>
          <label for="id_txt">ID : </label>
          <input type="text" id="id_txt" name="id_txt" maxlength="16" placeholder="아이디를 입력해주세요." autocomplete="off">
        </p>
        <p>
          <label for="pw_txt">PW : </label>
          <input type="password" maxlength="16" id="pw_txt" name="pw_txt" placeholder="비밀번호를 입력해주세요." autocomplete="off">
        </p>
        <p><input type="checkbox" name="id_save" id="id_save"><label for="id_save">아이디 저장</label></p>
        <p><input type="submit" value="로그인" id="login_btn"></p>
        <p class="search">
          <a href="#" title="아이디 찾기">아이디 찾기</a>
          <a href="#" title="비밀번호 찾기">비밀번호 찾기</a>
          <a href="./php/register.php" title="회원가입">회원가입</a>
        </p>
      </fieldset>
    </form>
  </main>
  
  <!-- 푸터영역 -->
  <footer>
    <div class="f_inner">
      <h2><a href="index.html" title="메인페이지로 바로가기">
        <img src="./images/logo-hyundai.a9ebdc6.png" alt="하단로고">
      </a></h2>
      <nav class="f_lnb">
        <ul>
          <li><a href="#" title="이용약관">이용약관</a></li>
          <li><a href="#" title="개인정보 처리방침">개인정보 처리방침</a></li>
          <li><a href="#" title="저작권안내">저작권안내</a></li>
          <li><a href="#" title="공동인증서 안내">공동인증서 안내</a></li>
          <li><a href="#" title="현대자동차 홈페이지">현대자동차 홈페이지</a></li>
        </ul>
      </nav>

      <address>
        <dl>
          <dt>사업자등록번호 : </dt>
          <dd>101-00-00000</dd>
          <dt>통신판매업신고번호 : </dt>
          <dd>2022-012345</dd>
          <dt>대표이사 : </dt>
          <dd>장재훈</dd>
          <dt>주소 : </dt>
          <dd>서울시 서초구 헌릉로 12</dd>
          <dt>호스팅 서비스 제공 : </dt>
          <dd>현대오토에버(주)</dd>
        </dl>
        <p>copyright&copy; 2023 hyundai motor company, all rights reserved.</p>
      </address>
    </div>
  </footer>

  <!-- 제이쿼리 라이브러리 -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script>
    
    $(document).ready(function(){
      let key = getCookie('idChk'); //쿠키 이름 저장

      if(key!=""){ //만약에 key변수에 값이 있다면
        $('#id_txt').val(key); //id값을 저장
      }

      if($('#id_txt').val()!=""){ // 만약에 id값이 있다면
        $('#id_save').attr('checked',true); // 체크박스에 체크를 해둔다.
      }

      $('#id_save').change(function(){ //체크박스의 상태가 변경되면 아래내용 실행
        if($('#id_save').is(':checked')){ //체크박스에 체크가 된경우라면
          setCookie('idChk', $('#id_txt').val(), 7); //쿠키를 생성하고
        }else{ //그렇지 않으면
          deleteCookie('idChk'); //쿠키를 삭제한다.
        }
      });

      $('#id_txt').keyup(function(){ //체크박스에 키를 눌렀을 경우
        if($('#id_save').is(':checked')){ //체크박스에 체크가 된 경우라면
          setCookie('idChk', $('#id_txt').val(), 7); //쿠키를 생성한다
        }
      });
    });

    function setCookie(cookieName, value, exdays){
        var exdate = new Date();
        exdate.setDate(exdate.getDate() + exdays);
        var cookieValue = escape(value) + ((exdays==null) ? "" : "; expires=" + exdate.toGMTString());
        document.cookie = cookieName + "=" + cookieValue;
    }
    
    function deleteCookie(cookieName){
      var expireDate = new Date();
      expireDate.setDate(expireDate.getDate() - 1);
      document.cookie = cookieName + "= " + "; expires=" + expireDate.toGMTString();
    }
      
    function getCookie(cookieName) {
      cookieName = cookieName + '=';
      var cookieData = document.cookie;
      var start = cookieData.indexOf(cookieName);
      var cookieValue = '';
      if(start != -1){
        start += cookieName.length;
        var end = cookieData.indexOf(';', start);
        if(end == -1)end = cookieData.length;
        cookieValue = cookieData.substring(start, end);
      }
      return unescape(cookieValue);
    }

    function form_check(){
      try{
        const id_txt = document.getElementById('id_txt');
        const pw_txt = document.getElementById('pw_txt');
      if(id_txt.value.length<1){
        alert('아이디를 입력하지 않았습니다.');
        id_txt.focus();
        return false;
      }
      if(pw_txt.value.length<1){
        alert('패스워드를 입력하지 않았습니다.');
        pw_txt.focus();
        return false;
      }
      return true;
      }catch(error){
        alert(error)
      }
    }
</script>
</body>
</html>