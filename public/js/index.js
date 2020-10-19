jQuery(document).ready(function ($) {
    $(".post-content").hide();
    $('.post').click(function(e){
      e.stopPropagation();
      $('.post-content:visible').hide();
      $(this).children(".post-content").toggle();
    });

    $(document).click(function(){
      $('.post-content:visible').hide();
    });
});
