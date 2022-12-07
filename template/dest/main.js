import backToTop from "../js/modules/backToTop.js";
import ToggleLang from "../js/modules/ToggleLang.js";
import ScrollSmooth from "../js/modules/ScrollSmooth.js";
import ToggleMenu from "../js/modules/ToggleMenu.js";
import AosModule from "../js/modules/AosModule.js";
import ScrollModule from "../js/modules/ScrollModule.js";
import SwiperModule from "../js/modules/SwiperModule.js";
import PopupModule from "../js/modules/PopupModule.js";
import AccordionModule from "../js/modules/AccordionModule.js";
import TabModule from "../js/modules/TabModule.js";
import SelectJourneyModule from "../js/modules/SelectJourneyModule.js";
import StickyHeader from "../js/modules/StickyHeader.js";
import TypingModule from "../js/modules/TypingModule.js";

window.addEventListener("DOMContentLoaded", () => {
  backToTop();
  ToggleLang();
  ScrollSmooth();
  ToggleMenu();
  AosModule();
  ScrollModule();
  SwiperModule();
  PopupModule();
  AccordionModule();
  TabModule();
  SelectJourneyModule();
  StickyHeader();
  TypingModule();
});
