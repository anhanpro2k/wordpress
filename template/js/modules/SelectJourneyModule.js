export default function SelectJourneyModule() {
  const arrow = document.querySelector(".journey-content .arrow-triangle");
  const panel = document.querySelectorAll(".journey-pagination .tab-panel-js");
  panel.forEach((item, index) => {
    item.addEventListener("click", () => {
      arrow.style.left = `calc(${index} * 6rem)`;
      if (index == 0) {
        console.log(index);
        arrow.style.left = `.8rem`;
      }
      if (window.innerWidth <= 360) {
        arrow.style.left = `calc(${index} * 5rem)`;
      }
    });
  });
}
