export default function AccordionModule() {
  const acc = $(".acc-js");

  if (acc) {
    acc.each(function () {
      if ($(this).hasClass("active")) {
        $(this).next().css("display", "block");
      }
    });

    acc.on("click", function () {
      acc.removeClass("active");
      acc.next().slideUp(500);
      if ($(this).next().css("display") == "none") {
        $(this).addClass("active");
        $(this).next().slideDown(500);
      }
    });
  }
}
