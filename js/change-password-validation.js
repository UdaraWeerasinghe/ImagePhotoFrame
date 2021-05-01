$(document).ready(function () {
    
/////////////change pass validation start
$("#oldPass").change(function (){ ///check password is math
                    var userId=$("#userId").val();
                    var oldPass=$("#oldPass").val();
                    var url="../controller/user-controller.php?status=validatePassword";
                    $.post(url, {oldPass:oldPass, userId:userId}, function(data) {
                        var checkoldPass=data;
                        if(checkoldPass=="notExist"){
                            $("#oldPassTooltip").html("Password does not match!"); 
                            $("#oldPass").addClass("is-invalid");
                            $("#passcheck").val(""); 
                            $("#oldPass").focus();

                        }else{
                            console.log("Exist");
                            $("#oldPass").removeClass("is-invalid");
                            $("#oldPass").addClass("is-valid");
                            $("#passcheck").val("valid");
                        }
                });
            });
            
 $("#frmchangePass").submit(function (){
            
    var passcheck=$("#passcheck").val(); //prevent from submit when Password incorect
    
    var oldPass=$("#oldPass").val();
    var newPass=$("#newPass").val();
    var confPass=$("#confPass").val();
    
    if(passcheck==""){  //prevent from submit when Password incorect
          return false;
        }
        if(oldPass==""){ 
            $("#oldPassTooltip").html("Plase enter curent password"); 
            $("#oldPass").addClass("is-invalid");
            $("#oldPass").focus();
          return false;
        }
        
        if(newPass==""){ 
            $("#newPassTooltip").html("Plase enter new password"); 
            $("#newPass").addClass("is-invalid");
            $("#newPass").focus();
          return false;
        }else{
            $("#newPass").removeClass("is-invalid");
            $("#newPass").addClass("is-valid");
        }
        if(confPass==""){
            $("#confPassTooltip").html("Plase confirm password"); 
            $("#confPass").addClass("is-invalid");
            $("#confPass").focus();
          return false;
        }else{
            $("#confPass").removeClass("is-invalid");
            $("#confPass").addClass("is-valid");
        }
        if(confPass!=newPass){
            $("#confPassTooltip").html("Plase confirm password"); 
            $("#confPass").addClass("is-invalid");
            $("#confPass").focus();
            return false;
        }else{
            $("#confPass").removeClass("is-invalid");
            $("#confPass").addClass("is-valid");
        }
        
 });
/////////////change pass validation end
 
});