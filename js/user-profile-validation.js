$(document).ready(function () {
    
    $("#email").change(function (){ ///check user email exist or not
                    var userId=$("#userId").val();
                    var email=$("#email").val();
                    var url="../controller/user-controller.php?status=validateUserProfileEmail";
                    $.post(url, {email:email, userId:userId}, function(data) {
                        var checkEmail=data;
                        if(checkEmail=="exist"){
                            $("#emailTooltip").html("Email is alredy exist"); 
                            $("#email").addClass("is-invalid");
                            $("#emailcheck").val("");
                            $("#email").focus();

                        }else{
                            $("#email").removeClass("is-invalid");
                            $("#email").addClass("is-valid");
                            $("#emailcheck").val("valid");
                        }
                });
            });
    $("#cno").change(function (){             //check user contact no exist or not
                    var userId=$("#userId").val();
                    var cno=$("#cno").val();
                    
                    var url="../controller/user-controller.php?status=validateUserProfileCno";
                    $.post(url, {cno:cno, userId:userId}, function(data) {
                        var checkCno=data;
                        if(checkCno=="exist"){
                            $("#cnoTooltip").html("Contact number is alredy exist"); 
                            $("#cno").addClass("is-invalid");
                            $("#cnocheck").val("");
                            $("#cno").focus();

                        }else{
                            $("#cno").removeClass("is-invalid");
                            $("#cno").addClass("is-valid");
                            $("#cnocheck").val("valid");
                        }
                });
            });
            
            
             $("#nic").change(function (){             //check user contact no exist or not
                    var userId=$("#userId").val();
                    var nic=$("#nic").val();
                    var url="../controller/user-controller.php?status=validateUserProfileNic";
                    $.post(url, {nic:nic, userId:userId}, function(data) {
                        var checkNic=data;
                        if(checkNic=="exist"){
                            $("#nicTooltip").html("NIC number is alredy exist"); 
                            $("#nic").addClass("is-invalid");
                            $("#niccheck").val("");
                            $("#nic").focus();

                        }else{
                            $("#nic").removeClass("is-invalid");
                            $("#nic").addClass("is-valid");
                            $("#niccheck").val("valid");
                        }
                });
            });
            
     $("#updateProfile").submit(function (){
          var emailcheck=$("#emailcheck").val(); //prevent from submit
          var cnocheck=$("#cnocheck").val();    //prevent from submit
          var niccheck=$("#niccheck").val();    //prevent from submit
          
          var fname=$("#fname").val();
          var lname=$("#lname").val();
          var email=$("#email").val();
          var cno=$("#cno").val();
          var nic=$("#nic").val();
          var address=$("#address").val();
          var dob=$("#dob").val();
          
          if(emailcheck==""){  //prevent from submit
          return false;
        }
        if(cnocheck==""){    //prevent from submit
          return false;
        }
        if(niccheck==""){  //prevent from submit
          return false;
        }
        
        if(nic==""){
            $("#nicTooltip").html("Please enter the NIC number");
            $("#nic").addClass("is-invalid");
          return false;
        }else{
            $("#nic").removeClass("is-invalid");
            $("#nic").addClass("is-valid");
        }
        
        if(fname==""){
            $("#fnameTooltip").html("Please enter the first name");
            $("#fname").addClass("is-invalid");
          return false;
        }else{
            $("#fname").removeClass("is-invalid");
            $("#fname").addClass("is-valid");
        }
        
        if(lname==""){
            $("#lnameTooltip").html("Please enter the last name");
            $("#lname").addClass("is-invalid");
          return false;
        }else{
            $("#lname").removeClass("is-invalid");
            $("#lname").addClass("is-valid");
        }
        
        if(email==""){
            $("#emailTooltip").html("Please enter the email address");
            $("#email").addClass("is-invalid");
          return false;
        }else{
            $("#email").removeClass("is-invalid");
            $("#email").addClass("is-valid");
        }
        
        if(cno==""){
            $("#cnoTooltip").html("Please enter the contact number");
            $("#cno").addClass("is-invalid");
          return false;
        }else{
            $("#cno").removeClass("is-invalid");
            $("#cno").addClass("is-valid");
        }
        
        if(address==""){
            $("#addressTooltip").html("Please enter the address");
            $("#address").addClass("is-invalid");
          return false;
        }else{
            $("#address").removeClass("is-invalid");
            $("#address").addClass("is-valid");
        }
        
        if(dob==""){
            $("#dobTooltip").html("Please enter the address");
            $("#dob").addClass("is-invalid");
          return false;
        }else{
            $("#dob").removeClass("is-invalid");
            $("#dob").addClass("is-valid");
        }
        
        var name_ptn = /^[a-zA-Z]{1,}$/;
        var email_ptn = /^([a-zA-Z0-9_\.\-])+@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/;
        var cno_ptn = /^[0]\d{9}$/;
        var nic_ptn_new = /^[0-9]{12}$/;
        var nic_ptn_old = /^[0-9]{9}[vVxX]{1}$/;
        
        if (!fname.match(name_ptn)){
            $("#fnameTooltip").html("Please enter valid name");
            $("#fname").addClass("is-invalid");
            return false;
        } else{
            $("#fname").removeClass("is-invalid");
            $("#fname").addClass("is-valid");
        }
        
        if (!lname.match(name_ptn)){
            $("#lnameTooltip").html("Please enter valid name");
            $("#lname").addClass("is-invalid");
            return false;
        } else{
            $("#lname").removeClass("is-invalid");
            $("#lname").addClass("is-valid");
        }
        
        if (!email.match(email_ptn)){
            $("#emailTooltip").html("Please enter valid email address");
            $("#email").addClass("is-invalid");
            return false;
        } else{
            $("#email").removeClass("is-invalid");
            $("#email").addClass("is-valid");
        }
        
        if (!cno.match(cno_ptn)){
            $("#cnoTooltip").html("Please enter valid contact number");
            $("#cno").addClass("is-invalid");
            return false;
        } else{
            $("#cno").removeClass("is-invalid");
            $("#cno").addClass("is-valid");
        }
        if (!nic.match(nic_ptn_new) && !nic.match(nic_ptn_old)){
            $("#nicTooltip").html("Please enter valid NIC number");
            $("#nic").addClass("is-invalid");
            return false;
        } else{
            $("#nic").removeClass("is-invalid");
            $("#nic").addClass("is-valid");
        }
        
       
        
        
     }); 
$("#fname").keyup(function(){
    $("#fname").removeClass("is-invalid");
});
$("#lname").keyup(function(){
    $("#lname").removeClass("is-invalid");
});
$("#email").keyup(function(){
    $("#email").removeClass("is-invalid");
});
$("#cno").keyup(function(){
    $("#cno").removeClass("is-invalid");
});
$("#nic").keyup(function(){
    $("#nic").removeClass("is-invalid");
});
$("#address").keyup(function(){
    $("#address").removeClass("is-invalid");
});
$("#dob").keyup(function(){
    $("#dob").removeClass("is-invalid");
});
    
});


function readURL(input) {  ///change img prev
        if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img_prev')
            .attr('src', e.target.result)
            .height(200)
            .width(200);
        };

        reader.readAsDataURL(input.files[0]);
    }
}


