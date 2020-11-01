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
    $("#dashbord-body").removeClass("dashbord-body");
    $("#dashbord-body").addClass("dashbord-body-toggle");
});

$("#toggleRight").click(function(){
    $(".module-name").removeClass("hide-module-name");
    $("#sidemenu").removeClass("toggle-bar");
    $("#sidemenu").addClass("sidemenu");
    $("#dashbord-body").removeClass("dashbord-body-toggle");
    $("#dashbord-body").addClass("dashbord-body");
    
});
