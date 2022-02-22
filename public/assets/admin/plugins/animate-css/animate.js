$( document ).ready(function() {
  $.fn.extend({
      animated: function () {

          var animationConfig = $(this).data('anim').split(",");
          var animationName = animationConfig[0].replace('[', '');
          var animationDelay = animationConfig[1].replace(']', '');

          var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
          this.css({
            "animation-duration": animationDelay, "animation-delay": animationDelay,
            "-moz-animation-duration": animationDelay, "-moz-animation-delay": animationDelay,
            "-webkit-animation-duration": animationDelay, "-webkit-animation-delay": animationDelay,
            "-o-animation-duration": animationDelay, "-o-animation-delay": animationDelay,
            "-ms-animation-duration": animationDelay, "-ms-animation-delay": animationDelay
          }); 
          this.addClass(animationName).one(animationEnd, function() {
              $(this).removeClass('animated ' + animationName);
          });
      }
  });

  $.fn.extend({
      makeAnimated: function () {

          var animationName = $(this).data('anim');

          var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
          this.addClass('animated ' + animationName).one(animationEnd, function() {
              $(this).removeClass('animated ' + animationName);
          });
      }
  });

  $.fn.exists = function () {
      return this.length !== 0;
  }

  //Cal the all animate here
  if($('.animated').exists()){
    $('.animated').animated();
  }
});

