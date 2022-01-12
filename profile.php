<?php  include "header.php"; ?>
<style> 
    content      
      .title{margin-left:25%;height: 100px;font-size: 3.5rem;line-height: 6rem;font-weight: bold; 
          background: -webkit-linear-gradient(#eee, rgb(6, 70, 143));
          -webkit-background-clip: text;
          -webkit-text-fill-color: transparent;}
 
  .profile{width:1100px;display: flex;flex-wrap:wrap;overflow: hidden;margin: 1% auto 3%;}     
  .card{width: 22%;height: 330px;overflow:hidden}
  .card:hover .list{transform: scale(1.05);}
   .box1{width: 60%;height: 40px;float: right;overflow: hidden;
     text-align: center;font-weight: bold;line-height: 40px;
     border-top-left-radius: 20px;background-color: #92acbd;
     color: #eee;}
   .list{width: 100% ;height: 350px; float:right;background-color: beige;
         color:rgb(6, 70, 143); box-shadow: 4px 5px 4px rgba(0,0,0,0.15);position: relative;}
   
    h4{margin: 10% 7%;font-size: 0.9rem;line-height: 1.7rem;}
   .list i{font-size: 3.8em;position: absolute;left: 65%;bottom: 20%;}
   .icon>i{margin-top: 10%; font-size: 3.5em;}
   @media(max-width:767px){
            content{width: 100%;}
            .title{font-size:2.4em;margin-left:3%;width:95%} 
            .profile{width: 100%;padding:0;height: 800px;display:flex;flex-wrap:wrap;justify-content:space-around}
            .card{width:46%;position: static;margin: 20px 0px;background-color: #fff;}
            .list i{font-size: 3.7em;position: absolute;right: 5%;bottom: 20%;}

        }

  </style>
    <content>
       <div class="title">Profile</div>
      <div class="profile">
        <div class="card">
          <div class="box1">
              학력
          </div>
          <div class="list">
           <h4>동아대학교 법학과 졸업</h4>
           <i class="fas fa-university"></i>
          </div>
        </div>
        <div class="card">
          <div class="box1">
            경력사항
          </div>
          <div class="list">
            <h4>*영남제분, toplus어학원,<br> YBM Edu 근무<br><br>
              *스웨덴, 미국, 이스라엘 등<br> 국내 외 선교활동</h4>
              <span class="icon"><i class="fas fa-tasks"></i></span>
            </div>
          </div>
          <div class="card">
            <div class="box1">
              교육이수
            </div>
            <div class="list">
              <h4>효성정보기술아카데미<br> 반응형 웹컨텐츠과정 수료<br><br>
              <i class="fas fa-graduation-cap"></i>
           </div>
         </div>
         <div class="card">
            <div class="box1">
                보유자격
            </div>
            <div class="list">
             <h4>정보처리기사, 운전면허2종자동</h4>
             <i class="far fa-id-card"></i>
           </div>
         </div>
        
    </div>
    </content>
    <?php  include "footer.php"; ?>
  