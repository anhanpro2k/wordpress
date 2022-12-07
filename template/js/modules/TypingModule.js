export default function TypingModule() {
  let typing = document.querySelectorAll(".text-ani");
  if (typing) {
    typing.forEach((item) => {
      let text = item.innerHTML;

      item.innerHTML = "";
      let typed = new Typed(item, {
        strings: [`${text}`],
        typeSpeed: 100,
      });
    });
  }

  let titleBanner = document.querySelector(
    ".banner-home__content .title strong"
  );
  if (titleBanner) {
    let bannerText = titleBanner.innerHTML;
    titleBanner.innerHTML = "";
    let typed = new Typed(titleBanner, {
      strings: [`${bannerText}`],
      typeSpeed: 150,
      backDelay: 1500,
      backSpeed: 50,
      loop: true,
    });
  }
}
