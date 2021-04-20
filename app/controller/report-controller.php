<?php
include '../model/report-model.php';
$reportObj=new Report();

$status=$_REQUEST["status"];
switch ($status){
     case "order_custom_repo":
         
         ?>
<form method="post" action="../view/order_reports.php?status=custom_order">
<!-- Modal body -->
      <div class="modal-body">
          <label>Starting Date</label>
          <input type="date" name="starting_date" class="form-control mb-4">
          <label>Ending Date</label>
          <input type="date" name="end_date" class="form-control">
      </div>
         <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" value="Genarate">
      </div>
</form>
         <?php
         break;
}