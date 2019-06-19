$(function(){
  $("#show_answer").click(function(){
    $(".answer").show();
  });

  $("#hide_answer").click(function(){
    $(".answer").hide();
  });


  //Timer
  var min = 0;
  var sec = 0;
  var minInner;
  var secInner;
  
  var timer = function(){
    sec += 1;

    if(sec > 59){
      min += 1;
      sec = 0;
    }

    minInner = ("0"+min).slice(-2);
    secInner = ("0"+sec).slice(-2);

    $('#sec').text(secInner);
    $('#min').text(minInner);
  }


  var timer_obj = $('#timer');

  //タイマースタートボタン
  $('#start_btn').click(function(){
    time = setInterval(timer,1000);
    $('#start_btn').addClass('disable');
  });

  //ストップボタン
  $('#stop_btn').click(function(){
    clearInterval(time);
    $('#start_btn').removeClass('disable');
  });

  //リセットボタン
  $('#reset_btn').click(function(){
    min = 0;
    sec = 0;
    clearInterval(time);
    $('#min,#sec').text("00");
    $('#start_btn').removeClass('disable');
  });

})