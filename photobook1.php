<?php
session_start();  
include "header.php"; ?>
<style> 
    content{width: 70%;}       
      .title{margin-left:20%;height: 100px;font-size: 3.5rem;line-height: 6rem;font-weight: bold; 
          background: -webkit-linear-gradient(#eee, rgb(6, 70, 143));
          -webkit-background-clip: text;
          -webkit-text-fill-color: transparent;}
       .title-nav{width: 60%;padding-bottom: 5px;font-size: 1.5rem;margin-left: 20%;}
       select, input[type=search]{width:8em;border:1px solid #999;font-family: sans-serif;padding: 3px 5px;}
        input[type=search]{padding:4.65px;width:12em;position:relative;}
        /* input[type=button]{font-size: .7em;position:absolute;display: inline-block;padding: 3px 4px 1px;margin-top:2px} */
      
      .content{width:65%;display: flex;flex-wrap: wrap;justify-content: space-between; }      
        .list{width: 32%;height: 420px;position: relative;margin-bottom: 20px;overflow:hidden;}
        .list:hover img, .num{transform:scale(1.05);}
        .list>a>img{width: 100%;height: 330px;position: relative;}
        .num{width: 35px;height: 35px; background-color: rgba(225,225,225,0.5);position:absolute;
            color: #263343;z-index: 5;text-align: center;line-height: 35px;font-weight: bold;}
        .caption{width: 95%;height: 90px;line-height: 50px;background-color:rgba(159, 175, 175, 0.4);
                 position:absolute;top: 330px;color: #333;padding-left: 5%;border-radius: 3px;}

        .add{width:40%;height: 50px;text-align:center;}  
        .btn{font-weight: bold;border-radius:15px;width: 100px;height: 25px;
          background-color: rgb(36,100,171);color: azure;border: none;}          
        .btn:hover{color: goldenrod;cursor: pointer;}
        .pager{width: 60%;text-align: center;color: #b99c45;padding-bottom: 1em;}
        .pager>a>i{color: brown;}
        .pager>a:hover{color: brown;}
        @media(max-width:767px){
            .content{width: 95%;height: 2500px;}
            .title{font-size:2.4em}       
            .title, .title-nav{margin-left:5%;width:100%} 
            .list{height: 320px;}
            .list>a>img{height: 260px;}
            .caption{height:60px;top: 260px;line-height:30px}
            .btn{display:block;width:6em}
            .add{width:40%;display:flex;justify-content:center;}
            .pager{width:100%}
        }
  </style>
  <content>
    <div class="title">사진첩</div>
    <div class="content">
          <div class="list">
            <a href="">
              <div class="num">1</div>
              <img src="images/nam1.jpg">
              <div class="caption">
                <h3>Lovely boy</h3>
                <p>2021.05.05</p>
              </div>
            </a>
          </div>
          <div class="list">
              <a href="">
                <div class="num">2</div>
             <img src="images/nam2.jpg">
             <div class="caption">
             <h3>Lovely boy</h3>
              <p>2021.05.05</p>
            </div>
          </a>
           </div>
           <div class="list">
               <a href="">              
            <div class="num">3</div>
            <img src="images/nam3.jpg">
            <div class="caption">
              <h3>Lovely boy</h3>
              <p>2021.05.05</p>
            </div>
          </a>
          </div>
          <div class="list">
              <a href="">
            <div class="num">4</div>
            <img src="images/sibling6.jpg">
            <div class="caption">
              <h3>Lovely boy</h3>
              <p>2021.05.05</p>
            </div>
          </a>
          </div>
          <div class="list">
              <a href="">
                <div class="num">5</div>
            <img src="images/nam5.jpg">
            <div class="caption">
              <h3>Lovely boy</h3>
              <p>2021.05.05</p>
            </div>
          </a>
         </div>
         <div class="list">
             <a href="">
              <div class="num">6</div>
            <img src="images/nam6.jpg">
            <div class="caption">
              <h3>Lovely boy</h3>
              <p>2021.05.05</p>
            </div>
          </a>
          </div>
          <div class="list">
              <a href="">
                <div class="num">7</div>
           <img src="images/nam7.jpg">
           <div class="caption">
            <h3>Lovely boy</h3>
            <p>2021.05.05</p>
          </div>
        </a>
         </div>
         <div class="list">
             <a href="">
            <div class="num">8</div>
           <img src="images/nam8.jpg">
           <div class="caption">
            <h3>Lovely boy</h3>
            <p>2021.05.05</p>
          </div>
        </a>
         </div>
         <div class="list">
             <a href="">
              <div class="num">9</div>
            <img src="images/nam9.jpg">
            <div class="caption">
              <h3>Lovely boy</h3>
              <p>2021.05.05</p>
            </div>
           </a>       
          </div>
         <div class="list">
             <a href="">
              <div class="num">10</div>
            <img src="images/nam10.jpg">
            <div class="caption">
              <h3>Lovely boy</h3>
              <p>2021.05.05</p>
            </div>
          </a>
          </div>
          <div class="list">
              <a href="">
            <div class="num">11</div>
           <img src="images/nam11.jpg">
           <div class="caption">
            <h3>Lovely boy</h3>
                <p>2021.05.05</p>
              </div>
            </a>
         </div>
         <div class="list">
             <a href="">
           <div class="num">12</div>
           <img src="images/nam12.jpg">
           <div class="caption">
            <h3>Lovely boy</h3>
            <p>2021.05.05</p>
          </div>
        </a>
         </div>
         <div class="list">
             <a href="">
            <div class="num">13</div>
           <img src="images/nam13.jpg">
           <div class="caption">
            <h3>Lovely boy</h3>
            <p>2021.05.05</p>
          </div>
        </a>
        </div>
        <div class="list">
            <a href="">
            <div class="num">14</div>
           <img src="images/nam14.jpg">
           <div class="caption">
            <h3>Lovely boy</h3>
                <p>2021.05.05</p>
              </div>
            </a>
         </div>
         <div class="list">
             <a href="">
              <div class="num">15</div>
          <img src="images/nam15.jpg">
          <div class="caption">
           <h3>Lovely boy</h3>
                <p>2021.05.05</p>
              </div>
            </a>
        </div>
        <div class="list">
            <a href="">
              <div class="num">16</div>
          <img src="images/nam16.jpg">
          <div class="caption">
           <h3>Lovely boy</h3>
                <p>2021.05.05</p>
              </div>
            </a>
        </div>   
          <div class="list">
              <a href="">
                <div class="num">17</div>
             <img src="images/nam19.jpg">
             <div class="caption">
              <h3>Lovely boy</h3>
                <p>2021.05.05</p>
              </div>
            </a>
           </div>
           <div class="list">
             <a href="">
              <div class="num">18</div>
               <img src="images/nam20.jpg">
               <div class="caption">
                 <h3>Lovely boy</h3>
                  <p>2021.05.05</p>
               </div>
            </a>
          </div>
          <div class="list">
              <a href="">
              <div class="num">19</div>
            <img src="images/sibling1.jpg">
            <div class="caption">
              <h3>Lovely boy</h3>
              <p>2021.05.05</p>
            </div>
           </a>
          </div>

          <div class="list">
              <a href="">
            <div class="num">20</div>
            <img src="images/sibling2.jpg"></a>
            <div class="caption">
              <h3>Lovely boy</h3>
              <p>2021.05.05</p>
            </div>
          </a>
          </div>
          <div class="list">
              <a href="">
            <div class="num">21</div>
            <img src="images/sibling3.jpg"></a>
            <div class="caption">
              <h3>Lovely boy</h3>
              <p>2021.05.05</p>
            </div>
          </a>
          </div>

     <div class="pager">
            <!-- <?php
            $startPage=($group-1)*5+1;
            $endPage=$startPage+4;
            if($group>1){
                $first=1;
                echo "<a hfef='qna.php?page=$first'>[〈〈 ]</a>";
                $prevPage=($group-2)*5+1;
                echo "<a href='qna.php?page=$prevPage'>[〈 ]</a>";
            }
            for($i=$startPage;$i<=$endPage;$i++){
             if($i>$pageCount){break;}
             if($i==$page){
                 echo "<a href='qna.php?page=$i'><font color='firebrick'>[$i]</font></a>";
             }else{
                echo "<a href='qna.php?page=$i'>[$i]</a>";
                }
          }
            if($group<$pageCount){
                $nextPage=$group*5+1;
                echo "<a href='qna.php?page=$nextPage'>[ 〉]</a>";
                $last=$pageCount;
                echo "<a href='qna.php?page=$last'>[ 〉〉]</a>";
            } ?> -->
      </div>
    </div>
    <div class="add">
      <input type="button" value="사진첩가기" class="btn" onclick="location.href='photo.php'" >&nbsp; 
      <?php
        if(isset($_SESSION["id"])){ 
          if($_SESSION["id"]=="admin"){ ?>    
          <input type="button" value="사진추가" class="btn" onclick="location.href='photo-add.php'">
        <?php }} ?>
    </div>
  </content>
  <?php  include "footer.php"; ?>
