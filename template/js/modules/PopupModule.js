export default function PopupModule() {
  const btnPopup = $(".btn-popup");
  const closePopup = $(".popup-close");

  if (btnPopup) {
    btnPopup.on("click", function (e) {
      e.preventDefault();
      $(`.popup.popup-${$(this).data("popup")}`).addClass("is-show");
      $("body").addClass("popup-is-show");
    });
  }
  if (closePopup) {
    closePopup.on("click", function () {
      hideModal();
    });
  }
  function hideModal() {
    $(".popup").removeClass("is-show");
    $("body").removeClass("popup-is-show");
  }
  $(document).mouseup(function (e) {
    if (
      !btnPopup.is(e.target) &&
      btnPopup.has(e.target).length === 0 &&
      !$(".popup-content").is(e.target) &&
      $(".popup-content").has(e.target).length === 0
    ) {
      hideModal();
    }
  });
}
