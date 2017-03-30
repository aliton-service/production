$(function(){
    function WindowResize(){
        var WindowHeight = $(window).outerHeight();
        var WindowWidth = $(window).outerWidth();
        
        var PageHeaderHeight = $("#page_header").outerHeight();
        
        var ResultHeight = WindowHeight - PageHeaderHeight;
        
        $("#container_body").css("min-height", (ResultHeight - 40) + "px");
        $("#container_menu").css("min-height", ResultHeight + "px");
        
        var DisplayMenu = $("#container_menu").css("display");
        
        if (DisplayMenu === "block") {
            $("#container_body").css("min-width", "738px");
            $("#container_body").outerWidth(WindowWidth - 222);
        }
        else {
            $("#container_body").css("min-width", "960px");
            $("#container_body").outerWidth(WindowWidth);
        }
    }
    
    $(window).resize(function(){
        console.log('WindowResize');
        WindowResize();
    });
    
//    function MenuShowAndHide() {
//        $nav = $('#page_container .nav')
//        if ($nav.is(':hidden')) {
//            $nav.show();
//            $('#sidebar>.portlet').addClass('nav-open')
//            $(this).addClass('active')
//        }
//        else {
//            $nav.hide(0);
//            $('#sidebar>.portlet').removeClass('nav-open')
//            $(this).removeClass('active')
//        }
//        WindowResize();
//    }
//    
//    $('body').on('click','.toggler-navbar', function(){
//        MenuShowAndHide();
//    })
//    
//    WindowResize();
});




