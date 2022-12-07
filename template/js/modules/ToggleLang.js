export default function ToggleLang() {
  const tgLang = $(".toggle-lang");
  const closeLang = $(".close-lang-js");
  const tgLangList = $(".toggle-lang-list");

  let tlLang = gsap.timeline();
  tlLang.pause();
  tlLang
    .to(tgLangList, 1, {
      x: 0,
      ease: Power4.easeOut,
      opacity: 1,
    })
    .staggerFrom(
      ".lang-list .lang-item",
      1,
      {
        x: 30,
        opacity: 0,
        ease: Power4.easeOut,
      },
      0.1,
      "-=0.3"
    )
    .from(
      closeLang,
      0.5,
      {
        y: -30,
        opacity: 0,
        ease: Power4.easeOut,
      },
      "-=0.7"
    );
  function showLang() {
    tlLang.timeScale(1).play();
  }
  function hideLangList() {
    tlLang.timeScale(1.7).reverse();
    $("body").removeClass("popup-is-show");
  }
  if (closeLang) {
    closeLang.on("click", function (e) {
      hideLangList();
    });
  }
  if (tgLang && tgLangList) {
    tgLang.on("click", function (e) {
      e.preventDefault();
      showLang();
      // tgLangList.toggleClass("active");
      $("body").toggleClass("popup-is-show");
    });
    $(document).mouseup(function (e) {
      if (
        !tgLang.is(e.target) &&
        tgLang.has(e.target).length === 0 &&
        !tgLangList.is(e.target) &&
        tgLangList.has(e.target).length === 0
      ) {
        hideLangList();
      }
    });
  }
}
