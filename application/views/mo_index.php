<!DOCTYPE html>
<html>
<head>
	<title>Monitor</title>
	<meta charset="utf-8"> 
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/formValidation.min.css"/>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/mc-custom.css">
	<script src="<?php echo base_url();?>assets/js/jquery-2.2.0.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/formValidation.min.js"></script>
  	<script src="<?php echo base_url();?>assets/js/framework/bootstrap.js"></script>
</head>
<body style="background:black;">
	<div class="container-fluid">
		<div class="row">
			<div class="hidden-xs col-sm-4">
			</div>
			<div class="col-xs-12 col-sm-4">
				<button class="btn btn-lg btn-warning tombol-awal" data-toggle="modal" data-target="#modal_choose_game">CHOOSE COURT</button>
			</div>
			<div class="hidden-xs col-sm-4">
			</div>
		</div>
		<div class="modal" id="modal_choose_game">
			<div class="modal-dialog modal-xs">
				<div class="modal-content">
					<div class="modal-header">
						<button class="close" data-dismiss="modal">
						&times
						</button>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" id="form_choose_court" method="POST" role="form" action="<?php echo site_url()?>monitor/choose_game">
					    	<div class="form-group">
					     		<div class="col-xs-12">   
					      			<select id="choose_court" name="choose_court" class="form-control input-lg" onchange="this.form.submit()">
				      					<option value="" disabled="disable" selected>Choose Court</option>
				      					<?php 
										foreach ($court->result() as $row) { ?>
											<option value="<?php echo $row->court_number;?>">Court <?php echo $row->court_number;?></option>
										<?php } ?>
				      				</select>
					     		</div>
					    	</div>
					  	</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){

		});
	</script>
</body>
</html>