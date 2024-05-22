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


  
})