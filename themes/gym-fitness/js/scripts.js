jQuery(document).ready(function ($) {
  //Make menu responsive
  $("#menu-menu-1").slicknav();

  //implement slider gallery for testiomnials
  $(".slider").bxSlider({
    controls: false,
    mode: "fade",
  });

  // If position is more than 300, Show the fixed navbar
  let navbar = document.querySelector(".navigation-bar");
  let rect = navbar.getBoundingClientRect();
  let topDistance = Math.abs(rect.top);

  fixedMenu(topDistance);
});

function fixedMenu(scroll) {
  let navbar = document.querySelector(".navigation-bar");

  if (scroll > 250) {
    navbar.classList.add("fixed-top");
  } else {
    navbar.classList.remove("fixed-top");
  }
}

window.onscroll = () => {
  let scroll = window.scrollY;
  fixedMenu(scroll);
};
