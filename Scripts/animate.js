$(function animate(){
    $("#opendix_e").animate({ marginLeft: "900px", opacity: "1"}, 1000);
    $("#opendix_m").animate({ marginLeft: '840px', opacity: "1" }, 1250);
    $("#opendix_o").animate({ marginLeft: '790px', opacity: "1" }, 1500);
    $("#opendix_h").animate({ marginLeft: '730px', opacity: "1" }, 1750);
    $("#opendix_s").animate({ marginLeft: '660px', opacity: "1" }, 2000);
    $("#opendix_y").animate({ marginLeft: '600px', opacity: "1" }, 2250);
    $("#opendix_a").animate({ marginLeft: '540px', opacity: "1" }, 2500);
    $("#opendix_r").animate({ marginLeft: '455px', opacity: "1" }, 3250);
    $(".logo").animate({marginTop: '80px'}, 3500);
    $(".logo_container").delay(3650).fadeOut(2000);
    $(".mainContent").delay(3650).fadeIn(2000);
});
