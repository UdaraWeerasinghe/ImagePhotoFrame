$(document).ready(function (){
    
    $("#addUser").submit(function (){
        var fName=$("#fName").val();
        var lName=$("#lName").val();
        var email=$("#email").val();
        var cn=$("#cn").val();
        var dob=$("#dob").val();
        var nic=$("#nic").val();
        var uRole=$("#uRole").val();
        var gender=$("#gender").val();
        var user_img=$("#user_img").val();
        if(fName==""){
          $("#fName").addClass("is-invalid");
          $("#fName").focus();
          return false;
        }
        if(lName==""){
          $("#lName").addClass("is-invalid");
          $("#lName").focus();
          return false;
        }
        if(email==""){
          $("#email").addClass("is-invalid");
          $("#email").focus();
          return false;
        }
        if(cn==""){
          $("#cn").addClass("is-invalid");
          $("#cn").focus();
          return false;
        }
        if(dob==""){
          $("#dob").addClass("is-invalid");
          $("#dob").focus();
          return false;
        }
        if(nic==""){
          $("#nic").addClass("is-invalid");
          $("#nic").focus();
          return false;
        }
        if(uRole==""){
          $("#uRole").addClass("is-invalid");
          $("#uRole").focus();
          return false;
        }
        if(gender==""){
          $("#gender").addClass("is-invalid");
          $("#gender").focus();
          return false;
        }
        if(user_img==""){
          $("#user_img").addClass("is-invalid");
          $("#user_img").focus();
          return false;
        }
        
//        var email_ptn = /^([a-zA-Z0-9_\.\-])+@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/;
//        var cno_ptn = /^[0]\d{9}$/;
//        var nic_ptn_new = /^[0-9]{12}$/;
//        var nic_ptn_old = /^[0-9]{9}[vVxX][1]$/;
//        
//        if (!email.match(email_ptn)){
//          $("#email").addClass("is-invalid");
//          $("#emailAlert").html("Invalid Email!");
//          $("#email").focus();
//        }
//        if (!nic.match(cno_ptn)){
//          $("#cn").addClass("is-invalid");
//          $("#cnAlert").html("Invalid phone number!");
//          $("#cn").focus();
//        }
//        if (!nic.match(nic_ptn_new) || !nic.match(nic_ptn_old)){
//          $("#nic").addClass("is-invalid");
//          $("#nicAlert").html("Invalid NIC number!");
//          $("#nic").focus();
//        }
    });
    $("#addUser").change(function (){
        var fName=$("#fName").val();
        var lName=$("#lName").val();
        var email=$("#email").val();
        var cn=$("#cn").val();
        var dob=$("#dob").val();
        var nic=$("#nic").val();
        var uRole=$("#uRole").val();
        var gender=$("#gender").val();
        var user_img=$("#user_img").val();
        if(fName!==""){
            $("#fName").removeClass("is-invalid");
            $("#fName").addClass("is-valid"); 
        }
        if(lName!==""){
            $("#lName").removeClass("is-invalid");
            $("#lName").addClass("is-valid"); 
        }
        if(email!==""){
            $("#email").removeClass("is-invalid");
            $("#email").addClass("is-valid"); 
        }
        if(cn!=""){
            $("#cn").removeClass("is-invalid");
            $("#cn").addClass("is-valid"); 
        }
        if(dob!==""){
            $("#dob").removeClass("is-invalid");
            $("#dob").addClass("is-valid"); 
        }
        if(nic!==""){
            $("#nic").removeClass("is-invalid");
            $("#nic").addClass("is-valid"); 
        }
        if(uRole!==""){
            $("#uRole").removeClass("is-invalid");
            $("#uRole").addClass("is-valid"); 
        }
          if(gender!==""){
            $("#gender").removeClass("is-invalid");
            $("#gender").addClass("is-valid"); 
        }
        if(user_img!==""){
          $("#user_img").removeClass("is-invalid");
          $("#user_img").addClass("is-valid"); 
          return false;
        }
    });
});
