$(document).ready(function() {

   $(".tabs_header .tab_item").not(":first").hide();
$(".tabs_header .wrapper .tab").click(function() {
  $(".tabs_header .wrapper .tab").removeClass("active").eq($(this).index()).addClass("active");
  $(".tabs_header .tab_item").hide().eq($(this).index()).fadeIn(0)
}).eq(0).addClass("active");
});