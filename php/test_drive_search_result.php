<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>시승신청조회</title>
  <!-- 초기화 -->
  <link rel="stylesheet" type="text/css" href="../css/reset.css">
  <!-- 기본서식 -->
  <link rel="stylesheet" type="text/css" href="../css/base.css">
  <!-- 공통서식 -->
  <link rel="stylesheet" type="text/css" href="../css/common.css">
  <!-- 아이콘폰트 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <!-- 서브페이지 서식 -->
  <style>
    header{position:static; background: var(--m_bg_color);}
    header .gnb li a{color:var(--f_color1);}
    header i.fas{color:var(--f_color1);}

    .sub_test_d_bg{
      position:relative;
      text-align: center;
      background: url(../images/bg-main-test-driving.125a037.jpg);
      width: 100%;
      height: 300px;
      background-position:center;
      color:var(--m_bg_color);
    }
    .sub_test_d_bg nav{
      text-align: left;
      width: 1200px;
      margin: 0 auto;
      transform: translateY(20px);
    }
    .sub_test_d_bg nav b{font-weight: bold;}
    .sub_test_d_bg h2{
      padding-top:100px;
      font-size:36px;
      font-weight:bold;
    }
    .sub_test_d_bg p{line-height:40px;}

    section h2{
      display: none;
      text-align: center;
    }
    section table{
      width:1200px;
      margin:0 auto;
      text-align:center;
      font-size: 1rem;
      border-collapse: collapse;
    }
    section table caption{
      font-size: 24px;
      font-weight: bold;
      margin:30px 0;      
    }
    section table th{background:#333; color:#fff;}
    section table th, section table td{
      border: 1px solid #ccc;
      padding:10px;
    }

    section p{
      margin:30px auto;
      border:1px solid #333;
      width: 120px;
      height:30px;
      line-height:30px;
      text-align:center;
      display: block;
    }
    section legend, section label{display:none;}
    section fieldset{
      width: 1200px;
      margin: 0 auto;
      background: #ccc;
      text-align:center;
      padding: 16px 0px;
      margin-bottom: 100px;
    }
    section fieldset input{
      display: inline-block;
      vertical-align: middle;
    }
    section fieldset input[type="text"]{
      height: 24px;
      width: 300px;
    }
    section fieldset input[type="submit"]{
      height:34px;
      border:none;
      background:#333;
      color:#fff;
      text-align:center;
      width: 120px;
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
  
  <!-- 메인콘텐츠영역 -->
  <main>
    <article class="sub_test_d_bg">
      <nav>홈 &gt; 체험 &gt; <b>시승 신청 조회</b></nav>
      <h2>시승 신청 조회</h2>
      <p>캐스퍼가 제공하는 편리한 시승 서비스를 이용해보세요.</p>
    </article>
    
    <form name="예약조회" method="post" action="test_drive_search_result.php">
    <section>
      <h2>시승신청 온라인 조회결과</h2>
      <?php
        // 1. 변수선언(서버주소, 아이디, 패스워드, 데이터베이스명)
        $mysql_host='localhost';
        $mysql_user='root';
        $mysql_password='1234';
        $mysql_db='product';
        
        $search_txt = $_POST['search_txt'];

        // 2. 데이터베이스 계정연결 변수
        $conn = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_db);

        // 3. 데이터베이스 연결 테스트
        if(!$conn){
          die('연결실패 : '.mysqli_connect_error());
        }

        // 4. 데이터베이스 자료 조회(select)하여 결과 변수에 담기
        $query = "select name, region, s_car, e_date from test_drive where name='$search_txt'";

        // 5. 조회한 최종 결과값을 변수에 담는다.
        $result = mysqli_query($conn, $query);

        // 6. 변수출력하기
        // echo $result; / 데이터베이스 자료는 여러개이기 떄문에 배열로 담아서 출려갷야 한다.

        // 출력방법 echo, print
        print "<table><caption>현대자동차 시승신청 예약현황</caption>".
              "<th>성명</th>".
              "<th>희망지점</th>".
              "<th>시승차</th>".
              "<th>예약날짜</th></tr>";

        // 반복문 for, while, do while
        // while
        while($row = mysqli_fetch_row($result)){
          print "<tr><td>".$row[0]."</td>".
                "<td>".$row[1]."</td>".
                "<td>".$row[2]."</td>".
                "<td>".$row[3]."</td></tr>";
        }

        print "</table>";

        mysqli_free_result($result);
        mysqli_close($conn);
      ?>

      <p>
        <a href="../test_drive.html" title="시승신청 예약하기">시승신청 예약하기</a>
      </p>

      <fieldset>
        <legend>예약조회하기(이름)</legend>
        <label for="search_txt">예약자 이름 : </label>
        <input type="text" id="search_txt" name="search_txt" placeholder="예약자 이름 예)홍길동">
        <input type="submit" value="예약조회하기">
      </fieldset>
    </section>
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
</body>
</html>