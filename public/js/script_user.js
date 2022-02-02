$(function () {
  AOS.init({
    duration: 600,
    anchorPlacement: "top-top",
    once: false,
  });
  // window.addEventListener("load", AOS.refresh);
  onElementHeightChange(document.body, function () {
    AOS.refresh();
  });
});
