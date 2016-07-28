<!DOCTYPE html>
<html>
<head>
	<title>Monitor</title>
	<meta charset="utf-8"> 
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/mc-custom.css">
	<script src="<?php echo base_url();?>assets/js/jquery-2.2.0.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
</head>
<body style="background:black;">
	<?php foreach ($court->result() as $data) { ?>
	<div class="container-fluid inside">
		<div class="row">
			<div class="col-xs-4">
			</div>
			<div class="col-xs-4" style="background:#f0ad4e;">
				<p class="text-center" style="color:black;font-size:32px;font-weight: bold;"><?php echo $data->subclass_name;?> <?php echo $data->class_name;?></p>
			</div>
			<div class="col-xs-3">
			</div>
			<div class="col-xs-1 pull-right" style="background:#f0ad4e;">
				<p class="text-center" id="time" style="font-size:24px;color:black;font-weight: bold;"></p>
			</div>
		</div>
		<?php if($data->type_id==1){ ?>
		<div class="row">
			<?php foreach ($team1->result() as $rows) {
			$i=1; ?>
			<div class="col-xs-6">
				<div class="row" style="padding:5px;">
		     		<div class="col-xs-3">  
						<img class="pull-right" height="70px;" src="<?php echo site_url()?>assets/img/flags/<?php echo $rows->country_flag; ?>" style="margin:0px; padding:0px;">
					</div>
		     		<div class="col-xs-9 text-center" style="background:#f0ad4e;font-size:50px;color:black;font-weight: bold;">   
		      			<?php echo $rows->player_name;?>
		     		</div>
		    	</div>
			</div>
			<?php $i++; } ?>
			<?php foreach ($team2->result() as $rows) {
			$i=1; ?>
			<div class="col-xs-6">
				<div class="row" style="padding:5px;">
		     		<div class="col-xs-9 text-center" style="background:#f0ad4e;font-size:50px;color:black;font-weight: bold;">   
		      			<?php echo $rows->player_name;?>
		     		</div>
		     		<div class="col-xs-3">  
						<img height="70px;" src="<?php echo site_url()?>assets/img/flags/<?php echo $rows->country_flag; ?>" style="margin:0px; padding:0px;">
					</div>
		    	</div>
			</div>
			<?php $i++; } ?>
		</div>
		<div class="row">
			<div class="col-xs-6 text-center" style="background:#f0ad4e;font-size:30px;color:black;font-weight: bold;border:1px solid white">
				<?php echo $data->club_name1;?>
			</div>
			<div class="col-xs-6 text-center" style="background:#f0ad4e;font-size:30px;color:black;font-weight: bold;border:1px solid white">
				<?php echo $data->club_name2;?>
			</div>
		</div>
		<?php 
		}else{ ?>
		<div class="row">
			<div class="col-xs-6">
			<?php 
			$i=1; 
			foreach ($team1->result() as $rows) { ?>
				<div class="row" style="padding:5px;">
		     		<div class="col-xs-3">  
						<img class="pull-right" height="70px;" src="<?php echo site_url()?>assets/img/flags/<?php echo $rows->country_flag; ?>" style="margin:0px; padding:0px;">
					</div>
		     		<div class="col-xs-9 text-center" style="background:#f0ad4e;font-size:50px;color:black;font-weight: bold;">   
		      			<?php echo $rows->player_name;?>
		     		</div>
		    	</div>
			<?php $i++; } ?>
			</div>
			<div class="col-xs-6">
			<?php 
			$i=1; 
			foreach ($team2->result() as $rows) { ?>
				<div class="row" style="padding:5px;">
		     		<div class="col-xs-9 text-center" style="background:#f0ad4e;font-size:50px;color:black;font-weight: bold;">   
		      			<?php echo $rows->player_name;?>
		     		</div>
		     		<div class="col-xs-3">  
						<img height="70px;" src="<?php echo site_url()?>assets/img/flags/<?php echo $rows->country_flag; ?>" style="margin:0px; padding:0px;">
					</div>
		    	</div>
			<?php $i++; } ?>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-3 text-center" style="background:#f0ad4e;font-size:30px;color:black;font-weight: bold;border:1px solid white">
				<?php echo $data->club_name_doubles_1;?>
			</div>
			<div class="col-xs-3 text-center" style="background:#f0ad4e;font-size:30px;color:black;font-weight: bold;border:1px solid white">
				<?php echo $data->club_name_doubles_2;?>
			</div>
			<div class="col-xs-3 text-center" style="background:#f0ad4e;font-size:30px;color:black;font-weight: bold;border:1px solid white">
				<?php echo $data->club_name_doubles_3;?>
			</div>
			<div class="col-xs-3 text-center" style="background:#f0ad4e;font-size:30px;color:black;font-weight: bold;border:1px solid white">
				<?php echo $data->club_name_doubles_4;?>
			</div>
		</div>
		<?php } ?>
		<div class="row">
    		<div id="team_1_score" class="col-xs-4 not_active">
    			<p class="text-center" id="score_1"></p>
    		</div>
    		<div class="col-xs-4">
    			<div class="row">
		    		<div class="col-xs-6" style="color:yellow;font-size:48px;border:1px solid white;">
		    			<p class="text-center" id="score_team_1_stage_1"></p>
		    		</div>
		    		<div class="col-xs-6" style="color:yellow;font-size:48px;border:1px solid white;">
		    			<p class="text-center" id="score_team_2_stage_1"></p>
		    		</div>
    			</div>
    			<div class="row">
		    		<div class="col-xs-6" style="color:yellow;font-size:48px;border:1px solid white;">
		    			<p class="text-center" id="score_team_1_stage_2"></p>
		    		</div>
		    		<div class="col-xs-6" style="color:yellow;font-size:48px;border:1px solid white;">
		    			<p class="text-center" id="score_team_2_stage_2"></p>
		    		</div>
    			</div>
    		</div>
    		<div id="team_2_score" class="col-xs-4 not_active">
    			<p class="text-center" id="score_2"></p>
    		</div>
		</div>
		<input id="score_team_1" type="hidden">
		<input id="score_team_2" type="hidden">
	</div>
	<?php } ?>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#time').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/time');
			$('#score_1').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/score_1',function(data){
				var data = parseInt(data);
				$('#score_team_1').val(data);
			});
			$('#score_2').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/score_2',function(data){
				var data = parseInt(data);
				$('#score_team_2').val(data);
			});
			
			$('#score_team_1_stage_1').load('<?php echo site_url();?>match_control/<?php echo $this->uri->segment(2);?>/1/score_team_1');
			$('#score_team_1_stage_2').load('<?php echo site_url();?>match_control/<?php echo $this->uri->segment(2);?>/2/score_team_1');
			$('#score_team_2_stage_1').load('<?php echo site_url();?>match_control/<?php echo $this->uri->segment(2);?>/1/score_team_2');
			$('#score_team_2_stage_2').load('<?php echo site_url();?>match_control/<?php echo $this->uri->segment(2);?>/2/score_team_2');

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

			setInterval(function(){
				var score_1 = $('#score_team_1').val();
				var score_2 = $('#score_team_2').val();
				$('#time').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/time'),
				$('#score_team_1_stage_1').load('<?php echo site_url();?>match_control/<?php echo $this->uri->segment(2);?>/1/score_team_1'),
				$('#score_team_1_stage_2').load('<?php echo site_url();?>match_control/<?php echo $this->uri->segment(2);?>/2/score_team_1'),
				$('#score_team_2_stage_1').load('<?php echo site_url();?>match_control/<?php echo $this->uri->segment(2);?>/1/score_team_2'),
				$('#score_team_2_stage_2').load('<?php echo site_url();?>match_control/<?php echo $this->uri->segment(2);?>/2/score_team_2'),
				$('#score_1').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/score_1',function(data){
					var data = parseInt(data);
					$('#score_team_1').val(data);
					if (data !=score_1) {
						$("#team_1_score").removeClass("not_active");
						$("#team_1_score").removeClass("active");
						$("#team_1_score").addClass("active");
						$("#team_2_score").removeClass("not_active");
						$("#team_2_score").removeClass("active");
						$("#team_2_score").addClass("not_active");
					}
				}),
				$('#score_2').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/score_2',function(data){
					var data = parseInt(data);
					$('#score_team_2').val(data);
					if (data !=score_2) {
						$("#team_1_score").removeClass("not_active");
						$("#team_1_score").removeClass("active");
						$("#team_1_score").addClass("not_active");
						$("#team_2_score").removeClass("not_active");
						$("#team_2_score").removeClass("active");
						$("#team_2_score").addClass("active");
					}
				})
			},100);
		});
	</script>
</body>
</html>