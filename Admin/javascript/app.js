$(document).ready(function () {
  const screenSize = () => {
    var currentWidth = $(window).width();

    if (currentWidth > 800) {
      $(".side-nav").addClass("side-nav-open");
      $(".side-nav").removeClass("side-nav-close");
    } else {
      $(".side-nav").addClass("side-nav-close");
      $(".side-nav").removeClass("side-nav-open");
    }
  };

  var isManageClose = true;
  $("#btnManage").click(function (e) {
    e.preventDefault();
    if (isManageClose) {
      $(".ul-manage").show();
    } else {
      $(".ul-manage").hide();
    }

    isManageClose = !isManageClose;
  });

  $("#btnOpenNav").click(function (e) {
    e.preventDefault();
    console.log("asd");
    $(".side-nav").addClass("side-nav-open");
    $(".side-nav").removeClass("side-nav-close");
  });

  $("#btnCloseNav").click(function (e) {
    console.log("asdss");
    e.preventDefault();
    $(".side-nav").addClass("side-nav-close");
    $(".side-nav").removeClass("side-nav-open");
  });

  $(window).resize(function () {
    screenSize();
  });
  
  screenSize();
});
