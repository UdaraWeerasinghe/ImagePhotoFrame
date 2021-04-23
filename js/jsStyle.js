$('#toggleLeft').click(function (){
    $(this).find("i").toggleClass("far fa-bars far fa-times");
//    $('#toggleLeft').toggleClass("margine");
    $(".module-name").toggleClass("hide-module-name");
    $("#sidemenu").toggleClass("sidemenu toggle-bar");
    $("#dashbord-body").toggleClass("dashbord-body-toggle dashbord-body");
});

