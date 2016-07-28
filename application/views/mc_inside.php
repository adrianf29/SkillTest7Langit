<!DOCTYPE html>
<html>
<head>
	<title>Match Control</title>
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
	<?php foreach ($court->result() as $data) { ?>
	<div class="container-fluid inside">
		<form class="form-horizontal" id="form_add_new_court" method="POST" role="form" action="<?php echo site_url();?>match_control/add_new_court">
			<div class="row">
				<div class="col-xs-7">
					<h4 style="color:white;">Court <?php echo $data->court_number;?></h4>
				</div>
				<div class="col-xs-5">
					<div class="form-group" style="background:#FFDEAD; padding:5px;">
			     		<div class="col-xs-3">  
							<p style="font-size:24px;">Umpire</p>
						</div>
			     		<div class="col-xs-9">   
			      			<input type="text" id="umpire_name" name="umpire_name" placeholder="Umpire Name" class="form-control input-lg">
			     		</div>
			    	</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-3">
				</div>
				<div class="col-xs-6" style="padding:5px;">
					<center><p style="font-size:30px;font-weight: bold; color:white;">Match</p></center>
				</div>
				<div class="col-xs-3">
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6">
					<a class="btn btn-lg <?php if($data->type_id==1){ echo 'btn-warning';}else{ echo 'btn-danger';}?> tombol-inside">Singles</a>
				</div>
				<div class="col-xs-6">
					<a class="btn btn-lg <?php if($data->type_id==2){ echo 'btn-warning';}else{ echo 'btn-danger';}?> tombol-inside">Doubles</a>
				</div>
			</div>
			<?php if($data->type_id==1){ ?>
			<div class="row">
				<?php foreach ($team1->result() as $rows) {
				$i=1; ?>
				<div class="col-xs-6">
					<div class="form-group" style="padding:5px;">
			     		<div class="col-xs-3">  
							<p style="font-size:24px;color:white;">Name</p>
						</div>
			     		<div class="col-xs-9">   
			      			<input type="text" id="player<?php echo $i;?>_name1" name="player<?php echo $i;?>_name1" placeholder="Court Number" class="form-control input-lg" value="<?php echo $rows->player_name;?>">
			     		</div>
			    	</div>
				</div>
				<?php $i++; } ?>
				<?php foreach ($team2->result() as $rows) {
				$i=1; ?>
				<div class="col-xs-6">
					<div class="form-group" style="padding:5px;">
			     		<div class="col-xs-3">  
							<p style="font-size:24px;color:white;">Name</p>
						</div>
			     		<div class="col-xs-9">   
			      			<input type="text" id="player<?php echo $i;?>_name1" name="player<?php echo $i;?>_name1" placeholder="Court Number" class="form-control input-lg" value="<?php echo $rows->player_name;?>">
			     		</div>
			    	</div>
				</div>
				<?php $i++; } ?>
			</div>
			<?php 
			}else{ ?>
			<div class="row">
				<div class="col-xs-6">
				<?php 
				$i=1; 
				foreach ($team1->result() as $rows) { ?>
					<div class="form-group" style="padding:5px;">
			     		<div class="col-xs-3">  
							<p style="font-size:24px;color:white;">Name</p>
						</div>
			     		<div class="col-xs-9">   
			      			<input type="text" id="player1_name<?php echo $i;?>" name="player1_name<?php echo $i;?>" placeholder="Court Number" class="form-control input-lg" value="<?php echo $rows->player_name;?>">
			     		</div>
			    	</div>
				<?php $i++; } ?>
				</div>
				<div class="col-xs-6">
				<?php 
				$i=1; 
				foreach ($team2->result() as $rows) { ?>
					<div class="form-group" style="padding:5px;">
			     		<div class="col-xs-3">  
							<p style="font-size:24px;color:white;">Name</p>
						</div>
			     		<div class="col-xs-9">   
			      			<input type="text" id="player2_name<?php echo $i;?>" name="player2_name<?php echo $i;?>" placeholder="Court Number" class="form-control input-lg" value="<?php echo $rows->player_name;?>">
			     		</div>
			    	</div>
				<?php $i++; } ?>
				</div>
			</div>
			<?php } ?>
			<div class="row">
				<?php 
				$i=1; foreach ($country->result() as $val) { ?>
				<div class="col-xs-6">
					<div class="form-group" style="padding:5px;">
			     		<div class="col-xs-3">  
							<p style="font-size:24px;color:white;">Nat.</p>
						</div>
						<div class="col-xs-2">   
			      			<img width="100%" src="<?php echo site_url()?>assets/img/flags/<?php echo $val->country_flag; ?>" style="margin:0px; padding:0px;">
			     		</div>
			     		<div class="col-xs-7">   
			      			<select id="country_id_1" name="country_id_1" class="form-control input-lg js-example-templating" style="width:100%;">
		      					<option value="" disabled="disable">Choose Country</option>
		      					<?php 
								foreach ($country->result() as $row) { ?>
									<option value="<?php echo $row->country_id;?>" <?php if($row->country_id==$val->country_id){ echo "selected";} ?>><?php echo $row->country_name;?></option>
								<?php } ?>
		      				</select>
			     		</div>
			    	</div>
			    	<div class="row" style="padding-bottom: 50px;">
			    		<div class="col-xs-2">
			    		</div>
			    		<div class="col-xs-2"  style="background:white;color:black;font-size:48px;">
			    			<p class="text-center" id="score_team_<?php echo $i;?>_stage_1"></p>
			    		</div>
			    		<div class="col-xs-1">
			    		</div>
			    		<div class="col-xs-2" style="background:white;color:black;font-size:48px;">
			    			<p class="text-center" id="score_team_<?php echo $i;?>_stage_2"></p>
			    		</div>
			    		<div class="col-xs-1">
			    		</div>
			    		<div class="col-xs-2" style="background:white;color:black;font-size:48px;">
			    			<p class="text-center" id="score_team_<?php echo $i;?>_stage_3"></p>
			    		</div>
			    		<div class="col-xs-5">
			    			
			    		</div>
			    	</div>
				</div>
				<?php $i++; } ?>

			</div>
			<div class="row">
				<div class="col-xs-1">
					<h4 style="color:white;font-size:24px;">Class</h4>
				</div>
				<?php if($data->type_id==1){ ?>
				<div class="col-xs-1">
					<button class="btn btn-lg <?php if($data->class_id==1){ echo 'btn-warning';}else{ echo 'btn-danger';}?> tombol-inside" data-toggle="modal" data-target="#modal_choose_game">MS</button>
				</div>
				<div class="col-xs-1">
					<button class="btn btn-lg <?php if($data->class_id==2){ echo 'btn-warning';}else{ echo 'btn-danger';}?> tombol-inside" data-toggle="modal" data-target="#modal_choose_game">WS</button>
				</div>
				<?php }else{ ?>
				<div class="col-xs-1">
					<button class="btn btn-lg <?php if($data->class_id==3){ echo 'btn-warning';}else{ echo 'btn-danger';}?> tombol-inside" data-toggle="modal" data-target="#modal_choose_game">MD</button>
				</div>
				<div class="col-xs-1">
					<button class="btn btn-lg <?php if($data->class_id==4){ echo 'btn-warning';}else{ echo 'btn-danger';}?> tombol-inside" data-toggle="modal" data-target="#modal_choose_game">WD</button>
				</div>
				<div class="col-xs-1">
					<button class="btn btn-lg <?php if($data->class_id==5){ echo 'btn-warning';}else{ echo 'btn-danger';}?> tombol-inside" data-toggle="modal" data-target="#modal_choose_game">XD</button>
				</div>
				<?php } ?>
	     		<div class="col-xs-1">  
					<p style="color:white;font-size:24px;">Subclass</p>
				</div>
	     		<div class="col-xs-1">
					<button class="btn btn-lg <?php if($data->subclass_id==1){ echo 'btn-warning';}else{ echo 'btn-danger';}?> tombol-inside" data-toggle="modal" data-target="#modal_choose_game">U13</button>
				</div>
				<div class="col-xs-1">
					<button class="btn btn-lg <?php if($data->subclass_id==2){ echo 'btn-warning';}else{ echo 'btn-danger';}?> tombol-inside" data-toggle="modal" data-target="#modal_choose_game">U15</button>
				</div>
				<div class="col-xs-1">
					<button class="btn btn-lg <?php if($data->subclass_id==3){ echo 'btn-warning';}else{ echo 'btn-danger';}?> tombol-inside" data-toggle="modal" data-target="#modal_choose_game">U17</button>
				</div>
				<div class="col-xs-1 pull-right" style="background:white;border:1px solid white;">
					<p id="time" style="font-size:24px;color:black;"></p>
				</div>
			</div>
		</form>
	</div>
	<?php } ?>
	<script type="text/javascript">
		$(document).ready(function(){

			$('#umpire_name').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/umpire_name',function(data){
				$('#umpire_name').val(data);
			});
			$('#type_name').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/type_name');
			$('#class_name').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/class_name');
			$('#subclass_name').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/subclass_name');
			$('#time').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/time');
			
			$('#score_team_1_stage_1').load('<?php echo site_url();?>match_control/<?php echo $this->uri->segment(2);?>/1/score_team_1');
			$('#score_team_1_stage_2').load('<?php echo site_url();?>match_control/<?php echo $this->uri->segment(2);?>/2/score_team_1');
			$('#score_team_1_stage_3').load('<?php echo site_url();?>match_control/<?php echo $this->uri->segment(2);?>/3/score_team_1');
			$('#score_team_2_stage_1').load('<?php echo site_url();?>match_control/<?php echo $this->uri->segment(2);?>/1/score_team_2');
			$('#score_team_2_stage_2').load('<?php echo site_url();?>match_control/<?php echo $this->uri->segment(2);?>/2/score_team_2');
			$('#score_team_2_stage_3').load('<?php echo site_url();?>match_control/<?php echo $this->uri->segment(2);?>/3/score_team_2');
			$('#shuttlecock').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/shuttlecock',function(data){
				var data = parseInt(data);
				$('#shuttlecock_value').val(data);
			});
			$('#stage_number').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/stage_number',function(data){
				var data = parseInt(data);
				$('#stage_number_value').val(data);
			});
			setInterval(function(){
				$('#umpire_name').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/umpire_name'),
				$('#type_name').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/type_name'),
				$('#class_name').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/class_name'),
				$('#subclass_name').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/subclass_name'),
				$('#time').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/time'),
				$('#score_team_1_stage_1').load('<?php echo site_url();?>match_control/<?php echo $this->uri->segment(2);?>/1/score_team_1'),
				$('#score_team_1_stage_2').load('<?php echo site_url();?>match_control/<?php echo $this->uri->segment(2);?>/2/score_team_1'),
				$('#score_team_1_stage_3').load('<?php echo site_url();?>match_control/<?php echo $this->uri->segment(2);?>/3/score_team_1'),
				$('#score_team_2_stage_1').load('<?php echo site_url();?>match_control/<?php echo $this->uri->segment(2);?>/1/score_team_2'),
				$('#score_team_2_stage_2').load('<?php echo site_url();?>match_control/<?php echo $this->uri->segment(2);?>/2/score_team_2'),
				$('#score_team_2_stage_3').load('<?php echo site_url();?>match_control/<?php echo $this->uri->segment(2);?>/3/score_team_2'),
				$('#shuttlecock').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/shuttlecock',function(data){
					var data = parseInt(data);
					$('#shuttlecock_value').val(data);
				});
			},1000);

			setInterval(function(){
				$.post("<?php echo site_url();?>monitor/<?php echo $this->uri->segment(2);?>/status",function(data){
					if (data == 1) {
						var reload = "1";
						$.post("<?php echo site_url();?>monitor/<?php echo $this->uri->segment(2);?>/reload",{ reload : reload });
						<?php if($this->session->userdata('reload')=="0"){ ?>
							setTimeout(function(){ location.reload(); }, 1000);
						<?php } ?>
					}else{
						var reload = "0";
						$.post("<?php echo site_url();?>monitor/<?php echo $this->uri->segment(2);?>/reload",{ reload : reload });
						<?php if($this->session->userdata('reload')=="1"){ ?>
							setTimeout(function(){ location.reload(); }, 1000);
						<?php } ?>
					}
				});
			},1000);
		});
	</script>
</body>
</html>