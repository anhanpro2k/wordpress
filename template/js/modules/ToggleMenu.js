export default function ToggleMenu() {
  const toggleMenu = $(".toggle-menu");
  const navSide = $(".nav-side");
  const closeMenu = $(".close-menu");
  const expandIcon = $(".nav-side .dropdown-icon");

  let tl = gsap.timeline();
  tl.pause();
  tl.to(navSide, 2, {
    y: 0,
    ease: Power4.easeOut,
  })
    .to(
      ".sidebox-nav",
      1,
      {
        y: 0,
        opacity: 1,
      },
      "-=1"
    )
    .to(
      ".sidebox-acc",
      1,
      {
        y: 0,
        opacity: 1,
      },
      "-=1"
    );
  function showMenu() {
    tl.timeScale(1).play();
  }
  function hideMenu() {
    if (toggleMenu && navSide) {
      tl.timeScale(1.7).reverse();
      $("body").removeClass("menu-is-show");
    }
  }

  if (toggleMenu) {
    toggleMenu.on("click", function () {
      showMenu();
      $("body").toggleClass("menu-is-show");
      if (
        !$(".header").hasClass("bg-gradient") &&
        !$(".header").hasClass("is-sticky")
      ) {
        $(".header").toggleClass("menu-is-show");
      }
    });
  }

  if (expandIcon) {
    expandIcon.on("click", function (e) {
      e.preventDefault();
      $(this).parent().next().slideToggle(500);
      $(this).closest(".menu-item").toggleClass("active");
    });
  }
  $(document).mouseup(function (e) {
    if (
      !toggleMenu.is(e.target) &&
      toggleMenu.has(e.target).length === 0 &&
      !$(".sidebox-row").is(e.target) &&
      $(".sidebox-row").has(e.target).length === 0
    ) {
      hideMenu();
    }
  });
  if (closeMenu) {
    closeMenu.on("click", function () {
      hideMenu();
    });
  }
}
