<?php
  // 회원가입폼
  include('./dbconn.php'); //데이터베이스 연결을 위해 include한다.

  // 세션정보가 있다면 회원정보를 가져오고 회원정보 수정 mode로 설정한다.
  if(isset($_SESSION['ss_mb_id'])){
    $mb_id = $_SESSION['ss_mb_id'];
    $sql = "select * from member where mb_id='$mb_id'"; //아이디가 일치하는 데이터를 찾는다.
    $result = mysqli_query($conn, $sql); //데이터베이스 조회값을 저장
    $mb = mysqli_fetch_assoc($result); //반복문을 통해 검색

    $mode = 'modify'; //회원정보가 있을 경우 수정으로 제목을 표현
    $title = '회원정보수정';
    $modify_mb_info = 'readonly';
    $href = './member_list.php';
  }else{
    $mode = 'insert'; //회원정보가 없는 경우 새로추가
    $title = '회원가입하기';
    $modify_mb_info = '';
    $href = '../login.php';
  }
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>캐스퍼 - <?php echo $title; ?></title>
  <!-- 초기화 -->
  <link rel="stylesheet" type="text/css" href="../css/reset.css">
  <!-- 기본서식 -->
  <link rel="stylesheet" type="text/css" href="../css/base.css">
  <!-- 공통서식 -->
  <link rel="stylesheet" type="text/css" href="../css/common.css">
  <!-- 아이콘폰트 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <style>
    /* 서브페이지 서식 */
    header{position:static; background: var(--m_bg_color);}
    header .gnb li a{color:var(--f_color1);}
    header i.fas{color:var(--f_color1);}

    body{background: #f1f1f1;}
    form{
      border:none;
      background: #f1f1f1;
      width: 650px;
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
      font-size: 16px;
      line-height:40px;
    }
    h3{
      text-align: center;
      font-size:24px;
      font-weight:bold;
      padding-top: 200px;
      margin-bottom: 30px;
    }
    form p{
      display:flex;
      align-items: center;
    }
    input[type="text"], input[type="password"], input[type="email"], select{
      border:none;
      width: 80%;
      height: 40px;
      text-indent: 20px;
      font-size: 16px;
      margin: 10px 0;
    }
    input[readonly]{
      background: #333;
      color:#fff;
    }
    label{
      width:20%;
      height:40px;
    }
    label[for="mb_language1"],label[for="mb_language2"],label[for="mb_language4"],label[for="mb_language5"],label[for="mb_language6"],label[for="mb_language7"]{width:10%;}
    #mb_language5{margin-left:21%;}

    .btn{
      width: 50%;
      height: 50px;
      color: var(--m_bg_color);
      background: var(--s_color01);
      border:none;
      font-size: 16px;
      margin:20px 0;
      cursor: pointer;
    }
    a.btn{
      background: var(--f_color1);
      text-align:center;
    }
  </style>
</head>
<body>
  <!-- 상단헤더영역 -->
  <header>
    <h1><a href="../index.html" title="메인페이지로 바로가기">
      <img src="../images/logo-casper_black.png" alt="캐스퍼로고">
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

    <a href="../login.php" title="로그인"><i class="fas fa-user"></i></a>
    <i class="fas fa-bell"></i> <!-- 알림아이콘 -->
  </header>

  <main>
    <form name="회원가입" method="post" action="./register_update.php" onsubmit="return form_check()">
    <fieldset>
        <h3><?php echo $title; ?></h3>
        <input type='hidden' name='mode' value="<?php echo $mode ?>">

        <p><label for="mb_id">아이디</label><input type="text" name="mb_id" id="mb_id" value="<?php echo $mb['mb_id'] ?? '' ?>" <?php echo $modify_mb_info ?>></p>
        <p><label for="mb_password">비밀번호</label><input type="password" name="mb_password" id="mb_password"></p>
        <p><label for="mb_password_re">비밀번호 확인</label><input type="password" name="mb_password_re" id="mb_password_re"></p>
        <p><label for="mb_name">이름</label><input type="text" name="mb_name" id="mb_name" value="<?php echo $mb['mb_name'] ?? '' ?>"></p>
        <!-- php문법 삼항조건 연산자 ??
          ??를 기준으로 앞 수식이 null인지 체크하고 null이면 ?? 우측을 적용하고 null이 아니면 좌측을 적용
        -->
        <p><label for="mb_email">이메일</label><input type="email" name="mb_email" id="mb_email" value="<?php echo $mb['mb_email'] ?? '' ?>"></p>
        <p><label for="mb_job">직업</label>
        <select name="mb_job" id="mb_job">
          <option value="">직업선택</option>
          <option value="선생님" <?php echo isset($mb) ? ($mb['mb_job'] =="선생님")? 'selected': '' :'' ?>>선생님</option>
          <option value="학생" <?php echo isset($mb) ? ($mb['mb_job'] =="학생") ? 'selected':'' :'' ?>>학생</option>
          <option value="주부" <?php echo  isset($mb) ?($mb['mb_job'] =="주부") ? 'selected':'':'' ?>>주부</option>
          <option value="직장인" <?php echo  isset($mb) ?($mb['mb_job'] =="직장인") ? 'selected':'':'' ?>>직장인</option>
          <option value="공무원" <?php echo  isset($mb) ?($mb['mb_job'] =="공무원") ? 'selected':'':'' ?>>공무원</option>
          <option value="무직" <?php echo  isset($mb) ?($mb['mb_job'] =="무직") ? 'selected':"":'' ?>>무직</option>
        </select></p>
        <p><label>성별</label>
        <input type="radio" name="mb_gender" id="M" value="남자" <?php echo isset($mb)?($mb['mb_gender']=="남자")?'checked':'':'' ?>><label for="M">남성</label>
        <input type="radio" name="mb_gender" id="F" value="여자" <?php echo isset($mb)?($mb['mb_gender']=="여자")?'checked':'':'' ?>><label for="F">여성</label></p>
        <p><label>관심언어</label>
        <input type="checkbox" name="mb_language[]" id="mb_language1" value="html" <?php echo isset($mb) ? str_contains($mb['mb_language'], 'html') ? 'checked' :'' : '' ?>><label for="mb_language1">html</label>
        <!-- 
          str_contains
          전체문자열, 찾을문자열을 파라미터로 받아서 있을 경우 TRUE, 없을 경우 FALSE를 return 한다.
        -->
        <input type="checkbox" name="mb_language[]" id="mb_language2" value="css" <?php echo isset($mb) ? str_contains($mb['mb_language'], 'css') ? 'checked' :'' : '' ?>><label for="mb_language2">css</label>
        <input type="checkbox" name="mb_language[]" id="mb_language3" value="javascript" <?php echo isset($mb) ? str_contains($mb['mb_language'], 'javascript') ? 'checked' :'' : '' ?>><label for="mb_language3">javascript</label>
        <input type="checkbox" name="mb_language[]" id="mb_language4" value="jquery" <?php echo isset($mb) ? str_contains($mb['mb_language'], 'jquery') ? 'checked' :'' : '' ?>><label for="mb_language4">jquery</label>
        <p><input type="checkbox" name="mb_language[]" id="mb_language5" value="php" <?php echo isset($mb) ? str_contains($mb['mb_language'], 'php') ? 'checked' :'' : '' ?>><label for="mb_language5">php</label>
        <input type="checkbox" name="mb_language[]" id="mb_language6" value="sql" <?php echo isset($mb) ? str_contains($mb['mb_language'], 'sql') ? 'checked' :'' : '' ?>><label for="mb_language6">sql</label>
        <input type="checkbox" name="mb_language[]" id="mb_language7" value="react" <?php echo isset($mb) ? str_contains($mb['mb_language'], 'react') ? 'checked' :'' : '' ?>><label for="mb_language7">react</label></p>
        <p><button type="submit" class="btn"><?php echo $title ?></button>
        <a href="<?php echo $href ?>" class="btn">취소</a></p>
      </fieldset>
    </form>
  </main>
  
  <!-- 푸터영역 -->
  <footer>
    <div class="f_inner">
      <h2><a href="../index.html" title="메인페이지로 바로가기">
        <img src="../images/logo-hyundai.a9ebdc6.png" alt="하단로고">
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
    
    function form_check(){
      try{
        const id = document.getElementById('mb_id');
        const pw = document.getElementById('mb_password');
        const pw_re = document.getElementById('mb_password_re');
        const name = document.getElementById('mb_name');
        const email = document.getElementById('mb_email');
        const job = document.getElementById('mb_job');
        const gender = document.querySelector('input[type=radio]:checked');
      if(id.value.length<1){
        alert('아이디를 입력하지 않았습니다.');
        id.focus();
        return false;
      }
      if(pw.value.length<1){
        alert('비밀번호를 입력하지 않았습니다.');
        pw.focus();
        return false;
      }
      if(pw_re.value.length<1){
        alert('비밀번호 확인을 입력하지 않았습니다.');
        pw_re.focus();
        return false;
      }
      if(name.value.length<1){
        alert('이름을 입력하지 않았습니다.');
        name.focus();
        return false;
      }
      if(email.value.length<1){
        alert('이메일을 입력하지 않았습니다.');
        email.focus();
        return false;
      }
      if(job.value.length<1){
        alert('직업을 입력하지 않았습니다.');
        job.focus();
        return false;
      }
      if(!gender){
        alert('성별을 입력하지 않았습니다.');
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
