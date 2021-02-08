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
        
//        if(fName==""){
//          $("#vAlert").html("First name can not be empty !");
//          $("#vAlert").addClass("alert alert-danger");
//          return false;
//        }
 
        if(fName==""){
          $("#fName").addClass("is-invalid");
          $("#fName").focus();
          return false;
        }else{
           $("#fName").addClass("is-valid"); 
        }
        if(lName==""){
          $("#lName").addClass("is-invalid");
          $("#lName").focus();
          return false;
        }else{
           $("#lName").addClass("is-valid"); 
        }
        if(email==""){
          $("#email").addClass("is-invalid");
          $("#email").focus();
          return false;
        }else{
           $("#email").addClass("is-valid"); 
        }
        if(cn==""){
          $("#cn").addClass("is-invalid");
          $("#cn").focus();
          return false;
        }else{
           $("#cn").addClass("is-valid"); 
        }
        if(dob==""){
          $("#dob").addClass("is-invalid");
          $("#dob").focus();
          return false;
        }else{
           $("#dob").addClass("is-valid"); 
        }
        if(nic==""){
          $("#nic").addClass("is-invalid");
          $("#nic").focus();
          return false;
        }else{
           $("#nic").addClass("is-valid"); 
        }
        if(uRole==""){
          $("#uRole").addClass("is-invalid");
          $("#uRole").focus();
          return false;
        }else{
           $("#uRole").addClass("is-valid"); 
        }
          if(gender==""){
          $("#gender").addClass("is-invalid");
          $("#gender").focus();
          return false;
        }else{
           $("#gender").addClass("is-valid"); 
        }
        
        var email_ptn = /^([a-zA-Z0-9_\.\-])+@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/;
        var cno_ptn = /^[0]\d{9}$/;
        var nic_ptn_new = /^[0-9]{12}$/;
        var nic_ptn_old = /^[0-9]{9}[vVxX][1]$/;
        
        if (!email.match(email_ptn)){
          $("#email").addClass("is-invalid");
          $("#emailAlert").html("Invalid Email!");
          $("#email").focus();
        }
        if (!nic.match(cno_ptn)){
          $("#cn").addClass("is-invalid");
          $("#cnAlert").html("Invalid phone number!");
          $("#cn").focus();
        }
        if (!nic.match(nic_ptn_new) || !nic.match(nic_ptn_old)){
          $("#nic").addClass("is-invalid");
          $("#nicAlert").html("Invalid NIC number!");
          $("#nic").focus();
        }
    });
});
