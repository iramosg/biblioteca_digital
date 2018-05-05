$(document).ready(function(){
  $("form .input-group .input-group-field").each(function(){
     $(this).bind('keydown keyup keypress blur',function(){
      if($(this).val().length > 0)
        $(this).find('~ label').addClass('up-label');
      else
       $(this).find('~ label').removeClass('up-label');
     });
  });
});