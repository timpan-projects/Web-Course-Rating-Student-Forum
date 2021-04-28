$(window).scroll(function() {    
    var scroll = $(window).scrollTop();
    if (scroll >= 50) {
    	$("#top-bar").removeClass("top-bar");
        $("#top-bar").addClass("top-bar-small");
        $("#account-btn").removeClass("account-btn");
        $("#account-btn").addClass("account-btn-small");
        $(".left-menu").addClass("left-menu-full");    }
    else{
    	$("#top-bar").addClass("top-bar");
        $("#top-bar").removeClass("top-bar-small");
        $("#account-btn").addClass("account-btn");
        $("#account-btn").removeClass("account-btn-small");
        $(".left-menu").removeClass("left-menu-full");
    }
});