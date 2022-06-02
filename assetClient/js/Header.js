/*---------------ce code pour fixé la 2ème navbar------------------*/
var fixmeTop = $(".second_navbar").offset().top;
$(window).scroll(function () {
  var currentScroll = $(window).scrollTop();
  if (currentScroll >= fixmeTop) {
    $(".second_navbar").addClass("fixe");
  } else {
    $(".second_navbar").removeClass("fixe");
  }
});







