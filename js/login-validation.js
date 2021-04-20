$(document).ready(function (){
    $("#forgotPassword").submit(function (){
        var email=$("#email").val();
        
        if(email==""){
          $("#email").addClass("is-invalid");
          $("#email").focus();
          return false;
        }
         });   
         
    $("#login").submit(function (){
        var uName=$("#uName").val();
        var password=$("#password").val();
        
                if(uName==""){
                  $("#uName").addClass("is-invalid");
                  $("#uName").focus();
                  return false;
                }

                if(password==""){
                  $("#password").addClass("is-invalid");
                  $("#password").focus();
                  return false;
                }
         }); 
    $("#login").change(function (){
        var uName=$("#uName").val();
        var password=$("#password").val();
        if(uName!==""){
                    $("#uName").removeClass("is-invalid");
                    $("#uName").addClass("is-valid");
                }
        if(password!==""){
                    $("#password").removeClass("is-invalid");
                    $("#password").addClass("is-valid");
                }
        $("#warningMsg").addClass("hide-error");    //remove error msg affter change
    });
});
