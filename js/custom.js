$(document).ready(function() {

  $(".givestars").attr("clicked", "false");

  $("#rate").click(function() {
    if( $(".givestars").attr("clicked") == "false" ) {
      $(".givestars").attr("clicked", "true");
      $(".givestars").css("cssText", "top: -25px; z-index: 1; border-top: 0px; box-shadow: 0px 0px 0px #c5a8a8;");
        $(".givestars").attr("clicked", "true");

    } else if($(".givestars").attr("clicked") == "true") {

      $(".givestars").css("cssText", "top: 80px; z-index: -1");
        $(".givestars").attr("clicked", "false");

    }


  });







});
