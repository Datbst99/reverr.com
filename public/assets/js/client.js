/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***************************************!*\
  !*** ./resources/assets/js/client.js ***!
  \***************************************/
$(document).ready(function () {
  $('.icon-searchJs').click(function () {
    $('.searchJs').trigger('click');
  });
  $('.icon-mailJs').click(function () {
    $('.mailJs').trigger('click');
  });
  $('.ic-responSJs').click(function () {
    $('.inp-search-respon').animate({
      width: 'toggle'
    }, 350, function () {
      $('.logo').toggle();
    });
  });
  $('.menu-showJs').click(function () {
    $('.menu-sub').slideToggle();
  });
  $(window).resize(function () {
    if ($(window).width() >= 1024) {
      $('.menu-sub').css('display', 'none');
    }
  }); /// Nút back top

  var btn = $('.back-top');
  $(window).scroll(function () {
    if ($(window).scrollTop() > 300) {
      btn.css('display', 'inline-block');
    } else {
      btn.css('display', 'none');
    }
  });
  btn.on('click', function (e) {
    e.preventDefault();
    $('html, body').animate({
      scrollTop: 0
    }, '300');
  }); // Js cho slide

  $('.slider-left').slick({
    infinite: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 3500,
    prevArrow: "<button type='button' class='slick-prev custom-knot-l'><i class='fas fa-angle-left custom-pre'></i></button>",
    nextArrow: "<button type='button' class='slick-next custom-knot-r'><i class='fas fa-angle-right custom-pre'></i></button>"
  });
});
$(document).click(function (e) {
  var container = $("#header"); // Nếu click bên ngoài đối tượng container thì ẩn nó đi

  if (!container.is(e.target) && container.has(e.target).length === 0) {
    $('.menu-sub').slideUp();
  }
});
/******/ })()
;