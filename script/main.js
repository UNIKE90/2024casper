$(document).ready(function(){

  // 모달창
  const modal=`
    <div class="modal">
      <div class="m_inner">
        <img src="./images/main_Popup_PC_450x600.jpg" alt="팝업창">
        <input type="checkbox" id="popup_week"><label for="popup_week">일주일간 열지 않음</label>
        <button id="popup_close">닫기</button>
      </div>
    </div>
  `
  $('main').append(modal);

  if($.cookie('popup')=='none'){
    $('.modal').hide();
  }

  let ch = $('#popup_week')
  function close_popup(){
    if(ch.is(':checked')){
      $.cookie('popup','none',{expired:7, path:'/'});
    }
    $('.modal').fadeOut();
  }
  $('#popup_close').click(function(){
    close_popup();
  });


  // 헤더에 마우스 올리면 서식 바꿨다가 빼기
  $("header").mouseenter(function(){
    $('header').addClass('h_act');
    $('header h1 img').attr('src','./images/logo-casper_black.png');
  });
  $('header').mouseleave(function(){
    let sPos = $(window).scrollTop();
    if(sPos<70){
      $('header').removeClass('h_act');
      $('header h1 img').attr('src','./images/logo-casper-white.png');
    }
  });
  // 헤더가 올라가면 헤더 고정하기
  $(window).scroll(function(){
    let sPos = $(this).scrollTop();
    // console.log(sPos);

    if(sPos>=70){
      $('header').addClass('h_act');
      $('header h1 img').attr('src','./images/logo-casper_black.png');
    }else{
      $('header').removeClass('h_act');
      $('header h1 img').attr('src','./images/logo-casper-white.png');
    }
  })


  // m_navi클릭시 스크롤 이벤트
  $('#m_navi a').click(function(){
    let OffsetTop = $($(this).attr("href")).offset().top;
    // alert(OffsetTop);
    $('html, body').animate({'scrollTop':OffsetTop}, 500);
  });
  // let nav = $('#m_navi > ul > li');
  // nav.click(function(e){
  //   e.preventDefault();
  //   let i=$(this).index();
  //   // let offTop = $('main section').offset().top;
  //   if(i==0){
  //     //i가 0일때 3번째 section(#intro)을 선택
  //     $('html,body').animate({scrollTop:$('#intro').offset().top},500);
  //   }else if(i==1){
  //     //i가 1일때 4번째 section(#drive)을 선택
  //     $('html,body').animate({scrollTop:$('#drive').offset().top},500);
  //   }else if(i==2){
  //     //i가 2일때 5번째 section(#event)을 선택
  //     $('html,body').animate({scrollTop:$('#event').offset().top},500);
  //   }else if(i==3){
  //   //i가 3일때 6번째 section(#buy_info)을 선택
  //     $('html,body').animate({scrollTop:$('#buy_info').offset().top},500);
  //   }else{
  //   //i가 4일때 7번째 section(#cs)을 선택
  //     $('html,body').animate({scrollTop:$('#cs').offset().top},500);
  //   }
  // });


  // 3. 소개 텍스트 스크롤시 나타나게
  $(window).scroll(function(){
    let sPos = $(this).scrollTop();
    if(sPos>=1650){
      $('.intro_title_left').addClass('act1');
      $('.intro_title_right').addClass('act2');
    }
  });


  // 7.고객지원 랜덤 배너
  let r_num = Math.ceil(Math.random()*3);
  // alert(r_num);
  // $('.random_banner img').attr("src",`./images/random_banner0${r_num}.jpg`);
  const random_banner = document.querySelector('.random_banner img');
  random_banner.src=`./images/random_banner0${r_num}.jpg`;
})