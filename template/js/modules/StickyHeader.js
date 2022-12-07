export default function StickyHeader() {
  const header = $(".header");

  $(window).scroll(function () {
    if ($(this).scrollTop() > header.height()) {
      header.addClass("is-sticky");
    } else {
      header.removeClass("is-sticky");
    }
  });
}
