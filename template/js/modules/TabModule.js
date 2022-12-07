export default function TabModule() {
  const tabBlock = document.querySelectorAll(".tab-block-js");
  tabBlock.forEach((item) => {
    const tabPanel = item.querySelectorAll(".tab-panel-js");
    const tabContent = item.querySelectorAll(".tab-content-js");
    tabPanel.forEach((panel, index) => {
      panel.addEventListener("click", (e) => {
        e.preventDefault();
        tabPanel.forEach((item) => item.classList.remove("active"));
        panel.classList.add("active");
        tabContent.forEach((item) => item.classList.remove("active"));
        tabContent[index].classList.add("active");
      });
    });
  });
}
