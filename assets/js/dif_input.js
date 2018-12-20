$(document).ready(function(){
  $('.dif').click(function(){
    console.log($(this));
    var number = $(this).position();
    console.log(number);
  });
});
