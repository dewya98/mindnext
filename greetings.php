<?php  include "header.php"; ?>
<style>
    content{text-align: center;width:1000px;}       
    .phr1{height: 2.2em;margin: 1.1em;}
     .phr1 p{color:rgb(59, 184, 241); font-size: 2.1em;font-weight: bold;}
     .logo1{text-align: center; ;font-size: 1.5em;
     background: -webkit-linear-gradient(#eee, #333);line-height: 2em;
    -webkit-background-clip: text;-webkit-text-fill-color: transparent;
    text-shadow:0px 3px 0px #b2a98f,0px 14px 10px rgba(0,0,0,0.15),
    0px 24px 2px rgba(0,0,0,0.1),0px 34px 30px rgba(0,0,0,0.1);
    font-family: 'Stick No Bills', sans-serif;
       }
    .phr2{height: 43em;margin-top:70px}
    .phr2 p{font-family:sans-serif; font-size: 1.2em ;line-height: 2.6em;color: #666;}
         .accent{color: steelblue;font-weight: bold;font-size: 2.1rem;font-family: 'Nanum Pen Script', cursive;letter-spacing: 0.2rem;}
         .accent2{color:tomato;font-weight: bold;font-family: 'Nanum Pen Script', cursive; font-size: 2.1rem;letter-spacing: 0.2rem;}
    .sign{width:60%;height:6.1em;font-size: 1.8em;line-height: 6.1em;text-align:right;overflow: hidden;
         font-family: 'Nanum Myeongjo', serif;font-weight: bold;}
      .sign>img{width: 22%;height: 3em;vertical-align:middle;transform: rotate(-5deg);}
      @media(max-width:767px){
          content{width:97%}
          .phr1 p{color:rgb(59, 184, 241); font-size: 1.3em;font-weight: bold;}
          .phr2 p{font-family:sans-serif; font-size: 1em ;color: #555;}
          .sign{font-size:1.4em;width:80%}
        .accent{font-size:1.8em;letter-spacing:.2px}
        .accent2{font-size:1.8em;}
      }
    </style>
    <content>
        <div class="phr1"><p>다음을 생각하는 마음 <span class="logo1">Mind Next</span> 에 오신 것을 환영합니다!</p></div> 
        <div class="phr2"><p>다음 세대에게 우리가 나눌 수 있는 것은 무엇일까요?</p>
                        <p>이 질문에서 마인드 넥스트는 고민하기 시작했습니다.</p><br>
                        <p><span class="accent">이대로 괜찮은 걸까?</span></p><br>
                        <p><span class="accent2">좀 더 살기 좋은 환경을 위해 무엇을 하면 좋을까?</span></p><br>
                        <p>수 많은 질문들 속에서 마인드 넥스트는 <br>한 가닥씩 해결해 나가보기로 했습니다.</p>
                        <p>우리 모두의 미래를 위해 <span class="accent">  마인드 넥스트와 함께</span> <br>
                            그 가닥을 풀어나갈 <span class="accent2"> 여러분을 환영합니다!</span></p>
                         <div class="sign">대표 &nbsp; 김 영 아 <img src="images/sign.png" alt="sign"></div>
        </div>
    </content>
    <?php  include "footer.php"; ?>
