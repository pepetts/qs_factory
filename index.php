<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Q's factory</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Kosugi+Maru&display=swap" rel="stylesheet">

  <script src="jquery-3.4.1.min.js"></script>
  <script src="main.js"></script>
</head>
<body>
<div class="wrapper">
  <div class="container cf">
    <h1>計算問題を生成します</h1>
    <div id="timer">
      <p><span id="min">00</span>:<span id="sec">00</span></p>
      <input id="start_btn" class="btn"  type="button" value="スタート">
      <input id="stop_btn"  class="btn" type="button" value="ストップ">
      <input id="reset_btn" class="btn"  type="button" value="リセット">
    </div>
    <form method="post">
      <div class="select">
        <label><input type="radio" name="which" value="add">足し算</label>
        <label><input type="radio" name="which" value="sub">引き算</label>
        <label><input type="radio" name="which" value="multi">掛け算</label>
        <label><input type="radio" name="which" value="division">割り算</label>
        <br>
        <!-- <label><input type="radio" name="which" value="hex">10進数〜16進数へ</label> -->
        <!-- <label><input type="radio" name="which" value="dec">16進数〜10進数へ</label> -->
        <div class="qcount">
          問題数：
          <select name="count">
            <option selected>未選択</option>
            <?php for($i=1;$i<=100;$i++){
              echo "<option value='{$i}'>{$i}問</option>";
            } ?>
          </select>
        </div>
      </div>
      <div class="btn_a">
        <p>
          <input id="q_start_btn" type="submit" value="問題スタート">
        </p>
          <input type="button" value="答えを表示" id="show_answer" class="btn">
          <input type="button" value="答えを隠す" id="hide_answer" class="btn">
      </div>
    </form>
  </div>
    
<?php
  if(empty($_POST["which"]) || empty($_POST["count"])){
    echo "<p class='message'>問題と問題数を選んでから「問題スタート」のボタンを押してください。</p>";
  }

  if($_POST["which"] == "add"){
    add($_POST["count"]);
  }elseif($_POST["which"] == "sub"){
    sub($_POST["count"]);
  }elseif($_POST["which"] == "multi"){
    multi($_POST["count"]);
  }elseif($_POST["which"] == "division"){
    division($_POST["count"]);
  }elseif($_POST["which"] == "hex"){
    to_hex($_POST["count"]);
  }elseif($_POST["which"] == "dec"){
    to_dec($_POST["count"]);
  }


//足し算
function add($count){
  $numbers = range(0,100);
  shuffle($numbers);
  $i = 1;
  $answer = 0;
  while($i <= $count){
    $val1 = $numbers[rand(0,100)];
    $val2 = $numbers[rand(0,100)];
    echo "<div class='q'>";
    echo "<p>問{$i}：{$val1} + {$val2}</p>";
    $answer = $val1 + $val2;
    echo "<p class='answer'>答え：{$answer}</p>";
    echo "</div>";
    $i++;
  }
}


//引き算
function sub($count){
  
  $numbers = range(0,100);
  shuffle($numbers);
  $i = 1;
  $answer = 0;
  
  while($i <= $count){
    $val1 = $numbers[rand(0,100)];
    $val2 = $numbers[rand(0,100)];
    if($val1 >= $val2){
      echo "<div class='q'>";
      echo "<p>問{$i}：{$val1} - {$val2}</p>";
      $answer = $val1 - $val2;
      echo "<p class='answer'>答え：{$answer}</p>";
      echo "</div>";
      $i++;
    }
  }
}


//掛け算
function multi($count){
  $numbers = range(0,10);
  shuffle($numbers);
  $i = 1;
  $answer = 0;
  
  while($i <= $count){
    $val1 = $numbers[rand(0,10)];
    $val2 = $numbers[rand(0,10)];
    echo "<div class='q'>";
    echo "<p>問{$i}：{$val1} × {$val2}</p>";
    $answer = $val1 * $val2;
    echo "<p class='answer'>答え：{$answer}</p>";
    echo "</div>";
    $i++;
  }
}



//割り算
function division($count){
  $i = 1;
  $answer = 0;
  while($i <= $count){
    $val1 = rand(1,100);
    $val2 = rand(1,10);
    if($val1 % $val2 == 0){
      echo "<div class='q'>";
      echo "<p>問{$i}：{$val1} ÷ {$val2}</p> ";
      $answer = $val1 / $val2;
      echo "<p class='answer'>答え：{$answer}</p>";
      echo "</div>";
      $i++;
    }
  }
}

function to_hex($count){
  $i = 1;
  $answer = 0;
  echo "<p>次の10進数を16進数に変換しなさい。</p>";
  while($i <= $count){
    $val = rand(0,255);
    echo "<div class='q'>";
    echo "<p>問{$i}：{$val}</p>";
    $answer = dechex($val);
    echo "<p class='answer'>答え：{$answer}</p>";
    echo "</div>";
    $i++;
  }
}

function to_dec($count){
  $i = 1;
  $answer = 0;
  echo "<p>次の16進数を10進数に変換しなさい。</p>";
  while($i <= $count){
    $val = dechex(rand(0,255));
    echo "<div class='q'>";
    echo "<p>問{$i}：{$val}</p>";
    $answer = hexdec($val);
    echo "<p class='answer'>答え：{$answer}</p>";
    echo "</div>";
    
    $i++;
  }
  
}
?>

</div>
</body>
</html>