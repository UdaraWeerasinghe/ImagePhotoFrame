$(document).ready(function () {
    $("#subject").click(function (){
        console.log("c");
    });
    
    $("#mailSend").submit(function (){
          
          var subject=$("#subject").val();
          var body=$("#body").val();
          
          if(subject==""){
            $("#subjectTooltip").html("Please enter the subject");
            $("#subject").addClass("is-invalid");
              return false;
          }else{
              $("#subject").removeClass("is-invalid");
              $("#subject").addClass("is-valid");
          }
          
          var bodyLen = body.length;
          if(bodyLen<50){
            $("#bodyTooltip").html("Please enter at least 20 letters");
            $("#body").addClass("is-invalid");
              return false;
          }else{
              $("#body").removeClass("is-invalid");
              $("#body").addClass("is-valid");
          }
      });     
    });