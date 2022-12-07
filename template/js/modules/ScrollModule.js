export default function ScrollModule() {
  let $window = $(window);
  function animate(el, className) {
    $(el).each(function () {
      let el = this;
      if (
        $(el).offset().top <
        $window.scrollTop() + ($window.height() / 10) * 8
      ) {
        $(el).addClass(className);
      }
    });
  }

  function bindImageAnimations() {
    animate(".item-scroll", "is-inview");
    animate(".load-img", "is-inview");
    $window.on("scroll", function () {
      animate(".load-img", "is-inview");
      animate(".item-scroll", "is-inview");
    });
  }

  bindImageAnimations();
}
