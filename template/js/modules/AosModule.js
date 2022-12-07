
export default function AosModule() {
  AOS.init({
    duration: 1500,
    once: true,
    mirror: true,
    disable: function () {
      var maxWidth = 768;
      return window.innerWidth < maxWidth;
    },
  });
}
