<?php
$court_id = $_GET['court_id'];
$status = $_GET['status'];

// Use this `$teacherid` in query to get all required/appropriate field
?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    
</div>
<form action="http://localhost/pbsi/match_control/confirmapprove3" method="POST">
    <div class="modal-body">
	<input type="hidden" name="court_id" id="court_id" value="<?php echo $court_id?>">
<input type="hidden" name="status" id="status" value="<?php echo $status?>">	
        <div class="form-group">  
	      			<select id="court_number" name="court_number" class="form-control">
      					<option value="" disabled="disable" selected>Choose Court</option>
      					<option value="1">1</option>
      					<option value="2">2</option>
      					<option value="3">3</option>
      					<option value="4">4</option>
      					<option value="5">5</option>
      					<option value="6">6</option>
      				</select>
		    	</div>
        <div class="modal-footer">
            <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>