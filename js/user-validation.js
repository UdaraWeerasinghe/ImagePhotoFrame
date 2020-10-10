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
        
        if(fName==""){
          $("#vAlert").html("First name can not be empty !");
          $("#vAlert").addClass("alert alert-danger");
          return false;
        }
        if(lName==""){
          $("#vAlert").html("Last name can not be empty !");
          $("#vAlert").addClass("alert alert-danger");
          return false;
        }
        if(email==""){
          $("#vAlert").html("Email can not be empty !");
          $("#vAlert").addClass("alert alert-danger");
          return false;
        }
        if(cn==""){
          $("#vAlert").html("Contact number can not be empty !");
          $("#vAlert").addClass("alert alert-danger");
          return false;
        }
        if(dob==""){
          $("#vAlert").html("Date of birth can not be empty !");
          $("#vAlert").addClass("alert alert-danger");
          return false;
        }
        if(nic==""){
          $("#vAlert").html("NIC number can not be empty !");
          $("#vAlert").addClass("alert alert-danger");
          return false;
        }
        if(uRole==""){
          $("#vAlert").html("User role can not be empty !");
          $("#vAlert").addClass("alert alert-danger");
          return false;
        }
          if(gender==""){
          $("#vAlert").html("User gender can not be empty !");
          $("#vAlert").addClass("alert alert-danger");
          return false;
        }
        
    });
});
