$(function(){
    $(".ham").click(function(){
    $(".menu").css("display","block");
    $(".btnClose").css("display","block");
    $(".ham").css("display","none");
  })
  $(".btnClose").click(function(){
    $(".menu").css("display","none");
    $(".btnCose").css("display","none");
    $(".ham").css("display","block");
    window.location.reload();      
  })     

})