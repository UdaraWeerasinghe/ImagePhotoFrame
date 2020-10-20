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
          $("#dNanme").focus();
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
        else{
            $("#material").removeClass("is-invalid");
            $("#material").addClass("is-valid");
        }
        if(frameType==""){
          $("#frameType").addClass("is-invalid");
          $("#frameType").focus();
          return false;
        }
        else{
            $("#frameType").removeClass("is-invalid");
            $("#frameType").addClass("is-valid");
        }
        if(color==""){
          $("#color").addClass("is-invalid");
          $("#color").focus();
          return false;
        }
        else{
            $("#color").removeClass("is-invalid");
            $("#color").addClass("is-valid");
        }
        if(img1==""){
           $("#img1").addClass("is-invalid");
           $("#img1").focus();
          return false;
        }
        else{
            $("#img1").removeClass("is-invalid");
            $("#img1").addClass("is-valid");
        }
        if(img2==""){
           $("#img2").addClass("is-invalid");
           $("#img2").focus();
          return false;
        }
        else{
            $("#img2").removeClass("is-invalid");
            $("#img2").addClass("is-valid");
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
