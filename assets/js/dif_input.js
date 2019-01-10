$(document).ready(function(){
  $('.dif').click(function(){
    console.log($(this));
    var number = $(this).index();
    for (var i = 0; i < number+1; i++) {
      $(".diff-block-"+i).css("background-color","green");
      //console.log(i);
    }
    console.log(number+1);
    $(".dif-value").val(number+1);
  });
});
