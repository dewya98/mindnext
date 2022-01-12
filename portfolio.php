<?php  include "header.php"; ?>
<style>
 content{width: 70%;}       
      .title{margin-left:18%;font-size: 3.3rem;line-height: 6rem;font-weight: bold; 
          background: -webkit-linear-gradient(#eee, rgb(6, 70, 143));
          -webkit-background-clip: text;
          -webkit-text-fill-color: transparent;}
          .title-nav{width: 60%;padding-bottom: 5px;font-size: 1.5rem;margin-left: 20%;}
       select, input[type=search]{width:8em;border:1px solid #999;font-family: sans-serif;padding: 3px 5px;}
        input[type=search]{padding:4.65px;width:12em;position:relative;}
        input[type=button]{font-size: .7em;position:absolute;display: inline-block;padding: 3px 4px 1px;margin-top:2px}
      
        .section{width:64%; height: 800px;margin:0 auto;display:flex;flex-wrap:wrap;justify-content:space-around}
        .list{width: 32%;height: 300px;margin:20px 0;background-color: #fff;
            border:3px solid #ddd;overflow: hidden;}
        .list img{width: 80%;height: 130px;object-fit:contain;padding:0 10%}
        h3{color:#333;padding: 20px;}
        @media(max-width:767px){
            content{width: 100%;height:200vh;}
            .title{font-size:2.4em}       
            .title, .title-nav{margin-left:5%;width:100%} 
            .section{width: 100%;height:1000px;padding:0;height: 70em;}
            .list{width:46%;position: static;margin: 20px 0;background-color: #fff;}
        }

</style>
    <content>
       <div class="title">Portfolio</div>
       <!-- <form name="frm1">
        <div class="title-nav">
            <a href="index.php"><i class="fas fa-home"></i></a>
            <select name="opt">
                <option value="title">제목</option>
                <option value="tag">태그</option>
                <option value="content">내용</option>
                <option value="all">통합</option>
            </select>
            <input type="search" name="keyword" placeholder="검색어를 입력하세요">
            <input type="button" value="검색" onclick="search()">
            </form>
        </div>  -->
        <div class="section">
          <div class="list">
             <a href="../yg/yg.html">&nbsp;<img src="images/yglogo.png"></a>
             <h3>YG 홈페이지 <br>
                YG 메인홈페이지 <br>
                메뉴얼 별도 제작
             </h3>
          </div>
          <div class="list">
            <a href="../hshotel/hshotel.html">
            <img src="images/hslogo.gif"></a>
            <h3>HS 호텔 사이트 리뉴얼<br>
                부트 스트랩<br>
                상세페이지 전체 제작
             </h3>
         </div>
         <div class="list">
             <a href="../tour/index.html">
            <img src="images/tourlogo.png"></a>
            <h3>간다투어 사이트 제작<br>
                조별 프로젝트<br>
                상세페이지 전체 제작<br>
             </h3>
         </div>
         <div class="list">
             <a href="../wavve/wavve.html">
            <img src="images/wavve.png" style="background-color:#224;"></a>
            <h3>WAVVE 사이트 제작<br>
                개인별 프로젝트<br>
                메인 페이지 제작<br>
             </h3>
         </div>
         <div class="list">
             <a href="../dah/index.php">
            <img src="images/뮤지엄다로고_blue.jpg"></a>
            <h3>뮤지엄 다 사이트 리뉴얼<br>
                개인별 프로젝트<br>
                상세페이지 전체 제작<br>
             </h3>
         </div>
         <div class="list">
             <a href="../haeun/haeun.html">
            <img src="images/haeunlogo.png"></a>
            <h3>해운대중학교 사이트제작<br>
                반응형 홈페이지<br>
                메인페이지 제작<br>
             </h3>
         </div>
      </div>
    </content>
    <?php  include "footer.php"; ?>
