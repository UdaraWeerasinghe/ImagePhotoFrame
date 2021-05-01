$("#customReport").submit(function (){
    var starting_date=$("#starting_date").val();
    var end_date=$("#end_date").val();
    if(starting_date==""){
            $("#starting_dateTooltip").html("Please enter the date");
            $("#starting_date").addClass("is-invalid");
          return false;
        }else{
            $("#starting_date").removeClass("is-invalid");
            $("#starting_date").addClass("is-valid");
        }
        if(end_date==""){
            $("#end_dateTooltip").html("Please enter the date");
            $("#end_date").addClass("is-invalid");
          return false;
        }else{
            $("#end_date").removeClass("is-invalid");
            $("#end_date").addClass("is-valid");
        }
});
      ///remove error msg when change
$("#starting_date").keyup(function(){
    $("#starting_date").removeClass("is-invalid");
});
$("#end_date").keyup(function(){
    $("#end_date").removeClass("is-invalid");
});