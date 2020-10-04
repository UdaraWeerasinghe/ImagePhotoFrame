function toggleMenu() {
  var left = document.getElementById("toggleLeft");
  var right = document.getElementById("toggleRight");
  
  if (right.style.display === "none") {
    right.style.display = "block";
    left.style.display = "none";
    
  } else {
    right.style.display = "none";
    left.style.display = "block";
  }
};
$("#toggleLeft").click(function(){
    $(".module-name").addClass("hide-module-name");
    $("#sidemenu").removeClass("sidemenu");
    $("#sidemenu").addClass("toggle-bar");
});

$("#toggleRight").click(function(){
    $(".module-name").removeClass("hide-module-name");
    $("#sidemenu").removeClass("toggle-bar");
    $("#sidemenu").addClass("sidemenu");
});

//    $("#toggleLeft").click(function(){
//       $("#sidePanel").removeClass("col-md-3");
//       $("#sidePanel").addClass("col-md-1") ;
//       $("#body").removeClass("col-md-9");
//       $("#body").addClass("col-md-11") ;
//       $(".module-name").addClass("hidemodule-name") ;
//       $(".module-icon").addClass("icon-size") ;
//       $("#toggleRight").style.color = 'red';
//    });
//   $("#toggleRight").click(function(){
//       $("#sidePanel").removeClass("col-md-1");
//       $("#sidePanel").addClass("col-md-3") ;
//       $("#body").removeClass("col-md-11");
//       $("#body").addClass("col-md-9") ;
//       $(".module-name").removeClass("hidemodule-name") ;
//       $(".module-icon").removeClass("icon-size") ;
//   });