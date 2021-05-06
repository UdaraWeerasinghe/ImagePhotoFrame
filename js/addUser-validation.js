 $('document').ready(function () {
        $('#addUser').on('submit', function (e) {
            
             var fname=$("#fname").val();
             var lName=$("#lname").val();
             var nic=$("#nic").val();
             var con=$("#cno").val();
             var email=$("#email").val();
             var dob=$("#dob").val();
             var address=$("#address").val();
             var uRole=$("#uRole").val();
             
            var name_ptn = /^[a-zA-Z]{1,}$/;
            var email_ptn = /^([a-zA-Z0-9_\.\-])+@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/;
            var cno_ptn = /^[0]\d{9}$/;
            var nic_ptn_new = /^[0-9]{12}$/;
            var nic_ptn_old = /^[0-9]{9}[vVxX]{1}$/;
            
          
            if(fname==""){
            $("#fnameTooltip").html("Please enter the first name");
            $("#fname").addClass("is-invalid");
                return false;
                }else{
                    $("#fname").removeClass("is-invalid");
                    $("#fname").addClass("is-valid");
                }
            if (!fname.match(name_ptn)){
            $("#fnameTooltip").html("Please enter valid name");
            $("#fname").addClass("is-invalid");
            return false;
        } else{
            $("#fname").removeClass("is-invalid");
            $("#fname").addClass("is-valid");
        }
                
            if(lName==""){
            $("#lnameTooltip").html("Please enter the first name");
            $("#lname").addClass("is-invalid");
                return false;
                }else{
                    $("#lname").removeClass("is-invalid");
                    $("#lname").addClass("is-valid");
                }
                
            if (!lName.match(name_ptn)){
            $("#lnameTooltip").html("Please enter valid name");
            $("#lname").addClass("is-invalid");
            return false;
        } else{
            $("#lname").removeClass("is-invalid");
            $("#lname").addClass("is-valid");
        }
        if(email==""){
            $("#emailTooltip").html("Please enter the email");
            $("#email").addClass("is-invalid");
                return false;
                }else{
                    $("#email").removeClass("is-invalid");
                    $("#email").addClass("is-valid");
                }
            if (!email.match(email_ptn)){
            $("#emailTooltip").html("Please enter valid email");
            $("#email").addClass("is-invalid");
            return false;
        } else{
            $("#email").removeClass("is-invalid");
            $("#email").addClass("is-valid");
        }
        
        if(con==""){
            $("#cnoTooltip").html("Please enter the contact number");
            $("#cno").addClass("is-invalid");
            console.log(con);
                return false;
                }else{
                    $("#cno").removeClass("is-invalid");
                    $("#cno").addClass("is-valid");
                }
                
            if (!con.match(cno_ptn)){
            $("#cnoTooltip").html("Please enter valid contact number");
            $("#cno").addClass("is-invalid");
            return false;
        } else{
            $("#cno").removeClass("is-invalid");
            $("#cno").addClass("is-valid");
        }
        
        if(uRole==""){
            $("#uRoleTooltip").html("Please select user role");
            $("#uRole").addClass("is-invalid");
                return false;
                }else{
                    $("#uRole").removeClass("is-invalid");
                    $("#uRole").addClass("is-valid");
                }
            if(nic==""){
            $("#nicTooltip").html("Please enter the NIC number");
            $("#nic").addClass("is-invalid");
                return false;
                }else{
                    $("#nic").removeClass("is-invalid");
                    $("#nic").addClass("is-valid");
                }
                
            if (!nic.match(nic_ptn_old)&&!nic.match(nic_ptn_new)){
            $("#nicTooltip").html("Please enter valid NIC number");
            $("#nic").addClass("is-invalid");
            return false;
        } else{
            $("#nic").removeClass("is-invalid");
            $("#nic").addClass("is-valid");
        }
            
        
            
            if(dob==""){
            $("#dobTooltip").html("Please enter the date of birth");
            $("#dob").addClass("is-invalid");
                return false;
                }else{
                    $("#dob").removeClass("is-invalid");
                    $("#dob").addClass("is-valid");
                }
            if(address==""){
            $("#addressTooltip").html("Please enter the address");
            $("#address").addClass("is-invalid");
                return false;
                }else{
                    $("#address").removeClass("is-invalid");
                    $("#address").addClass("is-valid");
                }
          e.preventDefault();
//          var form = [0];
          var formData = new FormData($('#addUser')[0]);
          console.log(formData);
          $.ajax({
            type: 'post',
            url: '../controller/user-controller.php?status=addUser',
            data: formData,
            dataType: "text",
            processData: false,
            contentType: false,
            cache: false,
            async:true,
            enctype:"multipart/form-data",
            success: function (result) {
                console.log(result);
                if(result=="nic"){
                    $("#nicTooltip").html("NIC Number is alredy exist"); 
                    $("#nic").addClass("is-invalid");
                    $("#nic").focus();
                }
                else if(result=="tel"){
                    $("#cnoTooltip").html("Conact Number is alredy exist"); 
                    $("#cno").addClass("is-invalid");
                    $("#cno").focus();
                }
                else if(result=="email"){
                    $("#emailTooltip").html("Email is alredy exist"); 
                    $("#email").addClass("is-invalid");
                    $("#email").focus();
                }
                else if(result=="success"){
                    Swal.fire({
                        icon: 'success',
                        title: 'Registration Successfull',
                        text: 'Please check your email and activate your account',
                        showConfirmButton: true
                        
                      });  
                     
                }
            }
          });
        });
        
        //////////////////update user
         $('#updateUser').on('submit', function (e) {
            
             var fname=$("#fName").val();
             var lName=$("#lName").val();
             var nic=$("#nic").val();
             var con=$("#cn").val();
             var email=$("#email").val();
             var dob=$("#dob").val();
             var address=$("#address").val();
             var uRole=$("#uRole").val();
             
            var name_ptn = /^[a-zA-Z]{1,}$/;
            var email_ptn = /^([a-zA-Z0-9_\.\-])+@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/;
            var cno_ptn = /^[0]\d{9}$/;
            var nic_ptn_new = /^[0-9]{12}$/;
            var nic_ptn_old = /^[0-9]{9}[vVxX]{1}$/;
            
          
            if(fname==""){
            $("#fnameTooltip").html("Please enter the first name");
            $("#fName").addClass("is-invalid");
                return false;
                }else{
                    $("#fName").removeClass("is-invalid");
                    $("#fName").addClass("is-valid");
                }
            if (!fname.match(name_ptn)){
            $("#fnameTooltip").html("Please enter valid name");
            $("#fName").addClass("is-invalid");
            return false;
        } else{
            $("#fName").removeClass("is-invalid");
            $("#fName").addClass("is-valid");
        }
                
            if(lName==""){
            $("#lnameTooltip").html("Please enter the first name");
            $("#lname").addClass("is-invalid");
                return false;
                }else{
                    $("#lname").removeClass("is-invalid");
                    $("#lname").addClass("is-valid");
                }
                
            if (!lName.match(name_ptn)){
            $("#lnameTooltip").html("Please enter valid name");
            $("#lname").addClass("is-invalid");
            return false;
        } else{
            $("#lname").removeClass("is-invalid");
            $("#lname").addClass("is-valid");
        }
        if(email==""){
            $("#emailTooltip").html("Please enter the email");
            $("#email").addClass("is-invalid");
                return false;
                }else{
                    $("#email").removeClass("is-invalid");
                    $("#email").addClass("is-valid");
                }
            if (!email.match(email_ptn)){
            $("#emailTooltip").html("Please enter valid email");
            $("#email").addClass("is-invalid");
            return false;
        } else{
            $("#email").removeClass("is-invalid");
            $("#email").addClass("is-valid");
        }
        
        if(con==""){
            $("#cnoTooltip").html("Please enter the contact number");
            $("#cno").addClass("is-invalid");
            console.log(con);
                return false;
                }else{
                    $("#cno").removeClass("is-invalid");
                    $("#cno").addClass("is-valid");
                }
                
            if (!con.match(cno_ptn)){
            $("#cnoTooltip").html("Please enter valid contact number");
            $("#cno").addClass("is-invalid");
            return false;
        } else{
            $("#cno").removeClass("is-invalid");
            $("#cno").addClass("is-valid");
        }
        
        if(uRole==""){
            $("#uRoleTooltip").html("Please select user role");
            $("#uRole").addClass("is-invalid");
                return false;
                }else{
                    $("#uRole").removeClass("is-invalid");
                    $("#uRole").addClass("is-valid");
                }
            if(nic==""){
            $("#nicTooltip").html("Please enter the NIC number");
            $("#nic").addClass("is-invalid");
                return false;
                }else{
                    $("#nic").removeClass("is-invalid");
                    $("#nic").addClass("is-valid");
                }
                
            if (!nic.match(nic_ptn_old)&&!nic.match(nic_ptn_new)){
            $("#nicTooltip").html("Please enter valid NIC number");
            $("#nic").addClass("is-invalid");
            return false;
        } else{
            $("#nic").removeClass("is-invalid");
            $("#nic").addClass("is-valid");
        }
            
        
            
            if(dob==""){
            $("#dobTooltip").html("Please enter the date of birth");
            $("#dob").addClass("is-invalid");
                return false;
                }else{
                    $("#dob").removeClass("is-invalid");
                    $("#dob").addClass("is-valid");
                }
            if(address==""){
            $("#addressTooltip").html("Please enter the address");
            $("#address").addClass("is-invalid");
                return false;
                }else{
                    $("#address").removeClass("is-invalid");
                    $("#address").addClass("is-valid");
                }
          e.preventDefault();
//          var form = [0];
          var formData = new FormData($('#updateUser')[0]);
          console.log(formData);
          $.ajax({
            type: 'post',
            url: '../controller/user-controller.php?status=updateUser',
            data: formData,
            dataType: "text",
            processData: false,
            contentType: false,
            cache: false,
            async:true,
            enctype:"multipart/form-data",
            success: function (result) {
                console.log(result);
                if(result=="nic"){
                    $("#nicTooltip").html("NIC Number is alredy exist"); 
                    $("#nic").addClass("is-invalid");
                    $("#nic").focus();
                }
                else if(result=="tel"){
                    $("#conTooltip").html("Conact Number is alredy exist"); 
                    $("#con").addClass("is-invalid");
                    $("#con").focus();
                }
                else if(result=="email"){
                    $("#emailTooltip").html("Email is alredy exist"); 
                    $("#email").addClass("is-invalid");
                    $("#email").focus();
                }
                else if(result=="success"){
                    Swal.fire({
                        icon: 'success',
                        title: 'Update Successfull',
//                        text: 'Please check your email and activate your account',
                        showConfirmButton: true
                        
                      });  
                     
                }
            }
          });
        });
      });