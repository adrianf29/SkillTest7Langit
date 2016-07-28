<!DOCTYPE html>
<html>
<head>
	<title>Match Control</title>
	<meta charset="utf-8"> 
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/mc-custom.css">
	<script src="<?php echo base_url();?>assets/js/jquery-2.2.0.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-4 col-sm-4">
				<a href="<?php echo site_url();?>match_control/choose_type" class="btn btn-lg btn-primary tombol-awal">CREATE GAME</a>
			</div>
			<div class="col-xs-4 col-sm-4">
				<button class="btn btn-lg btn-warning tombol-awal" data-toggle="modal" data-target="#modal_choose_court">CHOOSE COURT</button>
			</div>
			<div class="col-xs-4 col-sm-4">
				<a href="<?php echo site_url();?>match_control/export" class="btn btn-lg btn-danger tombol-awal">EXPORT MATCH REPORT</a>
			</div>
		</div>
		<div class="modal" id="modal_choose_court">
			<div class="modal-dialog modal-xs">
				<div class="modal-content">
					<div class="modal-header">
						<button class="close" data-dismiss="modal">
						&times
						</button>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" id="form_choose_court" method="POST" role="form" action="<?php echo site_url()?>match_control/choose_game">
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
</body>
</html>