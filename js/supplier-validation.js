$(document).ready(function () {
    $("#addSupplier").submit(function (){
          
          var cnocheck=$("#cnocheck").val();
          var emaicheck=$("#emailcheck").val();
          
          var name=$("#name").val();
          var cno=$("#cno").val();
          var email=$("#email").val();
          var address=$("#address").val();
       //////////////////check pattern///////////
//        var name_ptn = /^[a-zA-Z ]{1,}$/;
        var email_ptn = /^([a-zA-Z0-9_\.\-])+@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/;
        var cno_ptn = /^[0]\d{9}$/;
          
          ///check is emty start
          if(emaicheck==""){
          return false;
        }else{}
          
          if(cnocheck==""){
          return false;
        }else{}
          
          
          if(name==""){
            $("#nameTooltip").html("Please enter the name");
            $("#name").addClass("is-invalid");
          return false;
        }else{
            $("#name").removeClass("is-invalid");
            $("#name").addClass("is-valid");
        }
//          if (!name.match(name_ptn)){
//            $("#nameTooltip").html("Please enter valid name");
//            $("#name").addClass("is-invalid");
//            console.log("n");
//            return false;
//        } else{
//            console.log("l");
//            $("#name").removeClass("is-invalid");
//            $("#name").addClass("is-valid");
//        }
        
        
        if(cno==""){
            $("#cnoTooltip").html("Please enter the name");
            $("#cno").addClass("is-invalid");
          return false;
        }else{
            $("#cno").removeClass("is-invalid");
            $("#cno").addClass("is-valid");
        }
         if (!cno.match(cno_ptn)){
            $("#cnoTooltip").html("Please enter valid contact numbrer");
            $("#cno").addClass("is-invalid");
            return false;
        } else{
            $("#cno").removeClass("is-invalid");
            $("#cno").addClass("is-valid");
        }
        
        if(email==""){
            $("#emailTooltip").html("Please enter the name");
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
        
        if(address==""){
            $("#addressTooltip").html("Please enter the name");
            $("#address").addClass("is-invalid");
          return false;
        }else{
            $("#address").removeClass("is-invalid");
            $("#address").addClass("is-valid");
        }
        
        
         
           var  selectCount = 0; ///checkbox validation
        $(".checkbox").each(function (index){
            if ($(this).is(":checked")){
                selectCount++;
            }
        });
        if(selectCount==0){
                $("#checkTooltip").addClass("customInValidToltip");
                $("#checkTooltip").html("Please select supply material in below");
                return false;
            }else{
            }
        ///check is emty end
       
   
      });
      
      
          /////////////check exist data
$("#cno").change(function (){ ///check check contact number is exist
                    var cno=$("#cno").val();
                    var url="../controller/supplier-controller.php?status=validateCno";
                    $.post(url, {cno:cno}, function(data) {
                        var check=data;
                        if(check=="Exist"){
                            $("#cnoTooltip").html("Contact number is alredy exist!"); 
                            $("#cno").addClass("is-invalid");
                            $("#cnocheck").val(""); 
                            $("#cno").focus();

                        }else{
                            console.log("notExist");
                            $("#cno").removeClass("is-invalid");
                            $("#cno").addClass("is-valid");
                            $("#cnocheck").val("valid");
                        }
                });
            });
            
$("#email").change(function (){ ///check check contact number is exist
                    var email=$("#email").val();
                    var url="../controller/supplier-controller.php?status=validateEmail";
                    $.post(url, {email:email}, function(data) {
                        var check=data;
                        if(check=="Exist"){
                            $("#emailTooltip").html("Email is alredy exist!"); 
                            $("#email").addClass("is-invalid");
                            $("#emailcheck").val(""); 
                            $("#email").focus();

                        }else{
                            console.log("notExist");
                            $("#email").removeClass("is-invalid");
                            $("#email").addClass("is-valid");
                            $("#emailcheck").val("valid");
                        }
                });
            });
      
      ///remove error msg when change
$("#name").keyup(function(){
    $("#name").removeClass("is-invalid");
});
$("#cno").keyup(function(){
    $("#cno").removeClass("is-invalid");
});
$("#email").keyup(function(){
    $("#email").removeClass("is-invalid");
});
$("#address").keyup(function(){
    $("#address").removeClass("is-invalid");
});


        /////////update page
$("#cnoUpdate").keyup(function(){
    $("#cnoUpdate").removeClass("is-invalid");
});
$("#emailUpdate").keyup(function(){
    $("#emailUpdate").removeClass("is-invalid");
});

   ///remove error msg when change 
   //
   //
          /////////////check exist data in supplier update///////////////////
$("#cnoUpdate").change(function (){ ///check check contact number is exist
                    var cno=$("#cnoUpdate").val();
                    var supId=$("#supId").val();
                    var url="../controller/supplier-controller.php?status=validateUpdateCno";
                    $.post(url, {cno:cno,supId:supId}, function(data) {
                        var check=data;
                        if(check=="Exist"){
                            $("#cnoTooltipUpdate").html("Contact number is alredy exist!"); 
                            $("#cnoUpdate").addClass("is-invalid");
                            $("#cnocheck").val(""); 
                            $("#cnoUpdate").focus();
                           

                        }else{
                            console.log("notExist");
                            $("#cnoUpdate").removeClass("is-invalid");
                            $("#cnoUpdate").addClass("is-valid");
                            $("#cnocheck").val("valid");
                        }
                });
            });
            
$("#emailUpdate").change(function (){ ///check check contact number is exist on Update
                    var email=$("#emailUpdate").val();
                    var supId=$("#supId").val();
                    var url="../controller/supplier-controller.php?status=validateUpdateEmail";
                    $.post(url, {email:email,supId:supId}, function(data) {
                        var check=data;
                        if(check=="Exist"){
                            $("#emailTooltipUpdate").html("Email is alredy exist!"); 
                            $("#emailUpdate").addClass("is-invalid");
                            $("#emailcheck").val(""); 
                            $("#emailUpdate").focus();

                        }else{
                            console.log("notExist");
                            $("#emailUpdate").removeClass("is-invalid");
                            $("#emailUpdate").addClass("is-valid");
                            $("#emailcheck").val("valid");
                        }
                });
            });
            
$("#updateSupplier").submit(function (){
          
          var cnocheck=$("#cnocheck").val();
          var emaicheck=$("#emailcheck").val();
          
          var name=$("#name").val();
          var cnoUpdate=$("#cnoUpdate").val();
          var emailUpdate=$("#emailUpdate").val();
          var address=$("#address").val();
       //////////////////check pattern///////////
        var email_ptn = /^([a-zA-Z0-9_\.\-])+@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/;
        var cno_ptn = /^[0]\d{9}$/;
          
          ///check is emty start
          if(emaicheck==""){
          return false;
        }else{}
          
          if(cnocheck==""){
          return false;
        }else{}
          
          
          if(name==""){
            $("#nameTooltip").html("Please enter the name");
            $("#name").addClass("is-invalid");
          return false;
        }else{
            $("#name").removeClass("is-invalid");
            $("#name").addClass("is-valid");
        }

        
        if(cnoUpdate==""){
            $("#cnoTooltipUpdate").html("Please enter the name");
            $("#cnoUpdate").addClass("is-invalid");
          return false;
        }else{
            $("#cnoUpdate").removeClass("is-invalid");
            $("#cnoUpdate").addClass("is-valid");
        }
         if (!cnoUpdate.match(cno_ptn)){
            $("#cnoTooltipUpdate").html("Please enter valid contact numbrer");
            $("#cnoUpdate").addClass("is-invalid");
            return false;
        } else{
            $("#cnoUpdate").removeClass("is-invalid");
            $("#cnoUpdate").addClass("is-valid");
        }
        
        if(emailUpdate==""){
            $("#emailTooltipUpdate").html("Please enter the name");
            $("#emailUpdate").addClass("is-invalid");
          return false;
        }else{
            $("#emailUpdate").removeClass("is-invalid");
            $("#emailUpdate").addClass("is-valid");
        }
        if (!emailUpdate.match(email_ptn)){
            $("#emailTooltipUpdate").html("Please enter valid email");
            $("#emailUpdate").addClass("is-invalid");
            return false;
        } else{
            $("#emailUpdate").removeClass("is-invalid");
            $("#emailUpdate").addClass("is-valid");
        }
        
        if(address==""){
            $("#addressTooltip").html("Please enter the name");
            $("#address").addClass("is-invalid");
          return false;
        }else{
            $("#address").removeClass("is-invalid");
            $("#address").addClass("is-valid");
        }
        
        
         
//           var  selectCount = 0; ///checkbox validation
//        $(".checkbox").each(function (index){
//            if ($(this).is(":checked")){
//                selectCount++;
//            }
//        });
//        if(selectCount==0){
//                $("#checkTooltip").addClass("customInValidToltip");
//                $("#checkTooltip").html("Please select supply material in below");
//                return false;
//            }else{
//            }
        ///check is emty end
       
   
      });
});

