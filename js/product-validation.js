$(document).ready(function (){
     
    $("#addDesign").submit(function (){
        var dNanme=$("#dNanme").val();
        var dCode=$("#dCode").val();
        var material=$("#material").val();
        var frameType=$("#frameType").val();
        var color=$("#color").val();
        var img1=$("#img1").val();
        var img2=$("#img2").val();
       
        
        if(dNanme==""){
          $("#dNanme").addClass("is-invalid");
         // $("#dNanme").focus();
          return false;
        }
        else{
            $("#dNanme").removeClass("is-invalid");
            $("#dNanme").addClass("is-valid");
        }
        if(dCode==""){
         $("#dCode").addClass("is-invalid");
          return false;
        }
        else{
            $("#dCode").removeClass("is-invalid");
            $("#dCode").addClass("is-valid");
        }
        if(material==""){
          
          $("#material").addClass("is-invalid");
          $("#material").focus();
          return false;
        }
        if(frameType==""){
          $("#vAlert").html("Frame type does not selected !");
          $("#vAlert").addClass("alert alert-danger");
          $("#frameType").focus();
          return false;
        }
        if(color==""){
          $("#vAlert").html("Color can not be empty !");
          $("#vAlert").addClass("alert alert-danger");
          $("#color").focus();
          return false;
        }
        if(img1==""){
          $("#vAlert").html("Image does not selected !");
          $("#vAlert").addClass("alert alert-danger");
          $("#img1").focus();
          return false;
        }
        if(img2==""){
          $("#vAlert").html("Image does not selected !");
          $("#vAlert").addClass("alert alert-danger");
          $("#img2").focus();
          return false;
        }
          
    });
    $("#addCategort").submit(function (){
        var cat_name=$("#cat_name").val();
        
        
        if(cat_name==""){
          $("#vAlert").html("Material can not be empyp !");
          $("#vAlert").addClass("alert alert-danger");
          $("#cat_name").focus();
          return false;
        }
        
        });
        
    navigatopage=function (x){
        
        var txt=$("#seachtext").val(); 
         var url = "../controller/product-controller.php?status=paginate";
         
        $.post(url, {page:x,txt:txt}, function (data){
            $("#empcont").html(data).show();
        });
        
        
    };
});