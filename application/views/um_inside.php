<!DOCTYPE html>
<html>
<head>
	<title>Umpire</title>
	<meta charset="utf-8"> 
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/mc-custom.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/court.css">
	<script src="<?php echo base_url();?>assets/js/jquery-2.2.0.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
</head>
<body style="background:black;">
	<?php if ($this->session->userdata('play_game')){ ?>
	<?php foreach ($court->result() as $data) { ?>
	<div class="container-fluid inside">
		<div class="row">
			<div class="col-xs-3" style="background:blue;border:1px solid white;">
				<p id="umpire_name" style="font-size:24px;color:white;"></p>
			</div>
			<div class="col-xs-1">
			</div>
			<div class="col-xs-2" style="background:blue;border:1px solid white;">
				<p id="type_name" style="font-size:24px;color:white;"></p>
			</div>
			<div class="col-xs-3" style="background:blue;border:1px solid white;">
				<p id="class_name" style="font-size:24px;color:white;"></p>
			</div>
			<div class="col-xs-1" style="background:blue;border:1px solid white;">
				<p id="subclass_name" style="font-size:24px;color:white;"></p>
			</div>
			<div class="col-xs-1 pull-right text-center" style="background:white;border:1px solid white;">
				<p id="time" style="font-size:24px;color:black;"></p>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12" style="padding:10px;">
				<center>
					<input type="hidden" id="stage_number_value">
					<p style="color:white;font-size: 24px;">GAME <span id="stage_number" style="color:white;"></span></p>
				</center>
			</div>
		</div>
		<?php if ($this->session->userdata('reverse')=='yes'){ ?>
		<div class="row court-box">
			<div class="col-xs-2" style="padding-left:0px;margin:0px;">
				<button id="add_score_team2" class="court" style="width:100%;height:400px;font-size:34px;">+1</button>
			</div>
			<div class="col-xs-4" >
				<div class="row">
					<div class="col-xs-12 court-main-height" style="border:2px solid white;border-left:1px solid white;height:400px;">
						<div class="row" >
							<div id="ganjil1_player2" class="col-xs-2 court-side-height <?php if($this->session->userdata('serve')=='ganjil_player2'){ echo 'player-serve'; } ?>" style="border-right:2px solid white;border-bottom:1px solid white; height:200px;">
								<div class="row">
									<div class="col-xs-12 court-top-height" style="border-bottom:2px solid white; height:50px;">
										
									</div>
								</div>
							</div>
							<div id="ganjil2_player2" class="col-xs-7 court-side-height <?php if($this->session->userdata('serve')=='ganjil_player2'){ echo 'player-serve'; } ?>" style="border-right:2px solid white;border-bottom:1px solid white; height:200px;">
								<div class="row">
									<div class="col-xs-12 court-top-height" style="border-bottom:2px solid white; height:50px;">
										<p class="text-center court-bottom-label" id="player2_name2" style="color:white;font-size:20px;padding-top:80px;"></p>
									</div>
								</div>
							</div>
							<div class="col-xs-3 court-top-height" style="border-bottom:2px solid white; height:50px;">
							</div>
						</div>
						<div class="row" >
							<div id="genap2_player2" class="col-xs-2 court-side-bottom-height<?php if($this->session->userdata('serve')=='genap_player2'){ echo 'player-serve'; } ?>" style="border-right:2px solid white;border-top:1px solid white; height:197px;">
								<div class="row">
									<div class="col-xs-12 court-bottom-height" style="border-bottom:2px solid white; height:150px;">
										
									</div>
								</div>
							</div>
							<div id="genap1_player2" class="col-xs-7 court-side-bottom-height <?php if($this->session->userdata('serve')=='genap_player2'){ echo 'player-serve'; } ?>" style="border-right:2px solid white;border-top:1px solid white; height:197px;">
								<div class="row">
									<div class="col-xs-12 court-bottom-height" style="border-bottom:2px solid white; height:150px;">
										
										<p class="text-center court-bottom-label" id="player2_name1" style="color:white;font-size:20px;padding-top:80px;"></p>
									</div>
								</div>
							</div>
							<div class="col-xs-3 court-bottom-height" style="border-bottom:2px solid white; height:150px;">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-4" >
				<div class="row">
					<div class="col-xs-12 court-main-height" style="border:2px solid white;border-right:1px solid white;height:400px;">
						<div class="row" >
							<div class="col-xs-3 court-top-height" style="border-bottom:2px solid white; height:50px;">
							</div>
							<div id="genap1_player1" class="col-xs-7 court-side-height <?php if($this->session->userdata('serve')=='genap_player1'){ echo 'player-serve'; } ?>" style="border-left:2px solid white;border-bottom:1px solid white; height:200px;">
								<div class="row">
									<div class="col-xs-12 court-top-height" style="border-bottom:2px solid white; height:50px;">
										<p class="text-center court-top-label" id="player1_name1" style="color:white;font-size:20px;padding-top:80px;"></p>
									</div>
								</div>
							</div>
							<div id="genap2_player1" class="col-xs-2 court-side-height <?php if($this->session->userdata('serve')=='genap_player1'){ echo 'player-serve'; } ?>" style="border-left:2px solid white;border-bottom:1px solid white; height:200px;">
								<div class="row">
									<div class="col-xs-12 court-top-height" style="border-bottom:2px solid white; height:50px;">
										
									</div>
								</div>
							</div>
						</div>
						<div class="row" >
							<div class="col-xs-3 court-bottom-height" style="border-bottom:2px solid white; height:150px;">
							</div>
							<div id="ganjil1_player1" class="col-xs-7 court-side-bottom-height <?php if($this->session->userdata('serve')=='ganjil_player1'){ echo 'player-serve'; } ?>" style="border-left:2px solid white;border-top:1px solid white; height:197px;">
								<div class="row">
									<div class="col-xs-12 court-bottom-height" style="border-bottom:2px solid white; height:150px;">
										<p class="text-center court-bottom-label" id="player1_name2" style="color:white;font-size:20px;padding-top:80px;"></p>
									</div>

								</div>
							</div>
							<div id="ganjil2_player1" class="col-xs-2 court-side-bottom-height <?php if($this->session->userdata('serve')=='ganjil_player1'){ echo 'player-serve'; } ?>" style="border-left:2px solid white;border-top:1px solid white; height:197px;">
								<div class="row">
									<div class="col-xs-12 court-bottom-height" style="border-bottom:2px solid white; height:150px;">
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-2" style="padding-right:0px;margin:0px;">
				<button id="add_score_team1" class="court-main-height" style="width:100%;height:400px;font-size:34px;">+1</button>
			</div>
		</div>
		<?php 
		}else{ ?>
		<div class="row court-box">
			<div class="col-xs-2" style="padding-left:0px;margin:0px;">
				<button id="add_score_team1" class="court-main-height court" style="width:100%;height:400px;font-size:34px;">+1</button>
			</div>
			<div class="col-xs-4" >
				<div class="row">
					<div class="col-xs-12 court-main-height" style="border:2px solid white;border-right:1px solid white;height:400px;">
						<div class="row" >
							<div id="ganjil2_player1" class="col-xs-2 court-side-height <?php if($this->session->userdata('serve')=='ganjil_player1'){ echo 'player-serve'; } ?>" style="border-right:2px solid white;border-bottom:1px solid white; height:200px;">
								<div class="row">
									<div class="col-xs-12 court-top-height" style="border-bottom:2px solid white; height:50px;">
										
									</div>
								</div>
							</div>
							<div id="ganjil1_player1" class="col-xs-7 court-side-height <?php if($this->session->userdata('serve')=='ganjil_player1'){ echo 'player-serve'; } ?>" style="border-right:2px solid white;border-bottom:1px solid white; height:200px;">
								<div class="row">
									<div class="col-xs-12 court-top-height" style="border-bottom:2px solid white; height:50px;">
										<p class="text-center" id="player1_name2" style="color:white;font-size:20px;padding-top:80px;"></p>
									</div>
								</div>
							</div>
							<div class="col-xs-3 court-top-height" style="border-bottom:2px solid white; height:50px;">
							</div>
						</div>
						<div class="row" >
							<div id="genap2_player1" class="col-xs-2 court-side-bottom-height <?php if($this->session->userdata('serve')=='genap_player1'){ echo 'player-serve'; } ?>" style="border-right:2px solid white;border-top:1px solid white; height:197px;">
								<div class="row">
									<div class="col-xs-12 court-bottom-height" style="border-bottom:2px solid white; height:150px;">
										
									</div>
								</div>
							</div>
							<div id="genap1_player1" class="col-xs-7 court-side-bottom-height <?php if($this->session->userdata('serve')=='genap_player1'){ echo 'player-serve'; } ?>" style="border-right:2px solid white;border-top:1px solid white; height:197px;">
								<div class="row">
									<div class="col-xs-12 court-bottom-height" style="border-bottom:2px solid white; height:150px;">
										<p class="text-center court-bottom-label" id="player1_name1" style="color:white;font-size:20px;padding-top:80px;"></p>
									</div>

								</div>
							</div>
							<div class="col-xs-3 court-bottom-height" style="border-bottom:2px solid white; height:150px;">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-4" >
				<div class="row">
					<div class="col-xs-12 court-main-height" style="border:2px solid white;border-left:1px solid white;height:400px;">
						<div class="row" >
							<div class="col-xs-3 court-top-height" style="border-bottom:2px solid white; height:50px;">
							</div>
							<div id="genap2_player2" class="col-xs-7 court-side-height <?php if($this->session->userdata('serve')=='genap_player2'){ echo 'player-serve'; } ?>" style="border-left:2px solid white;border-bottom:1px solid white; height:200px;">
								<div class="row">
									<div class="col-xs-12 court-top-height" style="border-bottom:2px solid white; height:50px;">
										<p class="text-center court-top-label" id="player2_name1" style="color:white;font-size:20px;padding-top:80px;"></p>
									</div>
								</div>
							</div>
							<div id="genap1_player2" class="col-xs-2 court-side-height <?php if($this->session->userdata('serve')=='genap_player2'){ echo 'player-serve'; } ?>" style="border-left:2px solid white;border-bottom:1px solid white; height:200px;">
								<div class="row">
									<div class="col-xs-12 court-top-height" style="border-bottom:2px solid white; height:50px;">
										
									</div>
								</div>
							</div>
						</div>
						<div class="row" >
							<div class="col-xs-3 court-bottom-height" style="border-bottom:2px solid white; height:150px;">
							</div>
							<div id="ganjil1_player2" class="col-xs-7 court-side-bottom-height <?php if($this->session->userdata('serve')=='ganjil_player2'){ echo 'player-serve'; } ?>" style="border-left:2px solid white;border-top:1px solid white; height:197px;">
								<div class="row">
									<div class="col-xs-12 court-bottom-height" style="border-bottom:2px solid white; height:150px;">
										
										<p class="text-center court-top-label" id="player2_name2" style="color:white;font-size:20px;padding-top:80px;"></p>
									</div>
								</div>
							</div>
							<div id="ganjil2_player2" class="col-xs-2 court-side-bottom-height <?php if($this->session->userdata('serve')=='ganjil_player2'){ echo 'player-serve'; } ?>" style="border-left:2px solid white;border-top:1px solid white; height:197px;">
								<div class="row">
									<div class="col-xs-12 court-bottom-height" style="border-bottom:2px solid white; height:150px;">
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-2" style="padding-right:0px;margin:0px;">
				<button id="add_score_team2" class="court-main-height" style="width:100%;height:400px;font-size:34px;">+1</button>
			</div>
		</div>
		 <?php } ?>
		<input type="hidden" id="player_name1_team1">
		<input type="hidden" id="player_name2_team1">
		<input type="hidden" id="player_name1_team2">
		<input type="hidden" id="player_name2_team2">
		<input type="hidden" id="type_name_val">
		<input type="hidden" id="clicked">
		<div class="row" style="margin-top:50px;">
			<div class="col-xs-2" style="background:blue;border:1px solid white;">
				<p style="font-size:24px;color:white;">ShuttleCock</p>
			</div>
			<a id="shuttlecock_add" href="#">
			<div class="col-xs-1" style="background:blue;border:1px solid white;">
				<input type="hidden" id="shuttlecock_value">
				<input type="hidden" id="time_process">
				<input type="hidden" id="time_now">
				<p id="shuttlecock" style="font-size:24px;color:white;"></p>
			</div>
			</a>
			<?php if ($this->session->userdata('reverse')=='yes'){ ?>
				<div class="col-xs-1" style="padding-right:0px;">
					<button id="undo_2" class="btn btn-default btn-lg" style="width: 100%;margin:0px;">Undo</button>
				</div>
				<div class="col-xs-2" >
					<?php 
					if ($this->session->userdata('serve')=='team1'){ ?>
						<div id="css_score_team_2" class="col-xs-12 score">
							<input type="hidden" id="score_team_2">
							<input type="hidden" id="serve2" value="team2" >
							<center><p id="score_2"></p></center>
						</div>
					<?php }else{ ?>
						<div id="css_score_team_2" class="col-xs-12 score-serve">
							<input type="hidden" id="score_team_2">
							<input type="hidden" id="serve2" value="team2" >
							<center><p id="score_2"></p></center>
						</div>
					<?php } ?>
				</div>
				<div class="col-xs-2">
					<?php 
					if ($this->session->userdata('serve')=='team1'){ ?>
						<div id="css_score_team_1" class="col-xs-12 score-serve">
							<input type="hidden" id="score_team_1">
							<input type="hidden" id="serve1" value="team1" >
							<center><p id="score_1"></p></center>
						</div>
					<?php }else{ ?>
						<div id="css_score_team_1" class="col-xs-12 score">
							<input type="hidden" id="score_team_1">
							<input type="hidden" id="serve1" value="team1" >
							<center><p id="score_1"></p></center>
						</div>
					<?php } ?>
				</div>
				<div class="col-xs-1" style="padding-left:0px;">
					<button id="undo_1" class="btn btn-default btn-lg" style="width: 100%;">Undo</button>
				</div>
		<?php 
		}else{ ?>
			<div class="col-xs-1" style="padding-right:0px;">
				<button id="undo_1" class="btn btn-default btn-lg" style="width: 100%;">Undo</button>
			</div>
			<div class="col-xs-2" >
				<?php 
				if ($this->session->userdata('serve')=='team1'){ ?>
					<div id="css_score_team_1" class="col-xs-12 score-serve">
						<input type="hidden" id="score_team_1">
						<input type="hidden" id="serve1" value="team1" >
						<center><p id="score_1"></p></center>
					</div>
				<?php }else{ ?>
					<div id="css_score_team_1" class="col-xs-12 score">
						<input type="hidden" id="score_team_1">
						<input type="hidden" id="serve1" value="team1" >
						<center><p id="score_1"></p></center>
					</div>
				<?php } ?>
			</div>
			<div class="col-xs-2">
				<?php 
				if ($this->session->userdata('serve')=='team1'){ ?>
					<div id="css_score_team_2" class="col-xs-12 score">
						<input type="hidden" id="score_team_2">
						<input type="hidden" id="serve2" value="team2" >
						<center><p id="score_2"></p></center>
					</div>
				<?php }else{ ?>
					<div id="css_score_team_2" class="col-xs-12 score-serve">
						<input type="hidden" id="score_team_2">
						<input type="hidden" id="serve2" value="team2" >
						<center><p id="score_2"></p></center>
					</div>
				<?php } ?>
			</div>
			<div class="col-xs-1" style="padding-left:0px;">
				<button id="undo_2" class="btn btn-default btn-lg" style="width: 100%;">Undo</button>
			</div>
		 <?php } ?>
		</div>
		<div class="modal" id="modal_first_serve">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body">
						<p>Click Name to choose First Serve</p>
						<center><button class="btn btn-primary btn-lg" data-dismiss="modal" style="width:50%">OK</button></center>
					</div>
				</div>
			</div>
		</div>
		<div class="modal" id="modal_game_finish">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body">
						<p>Game has been finished</p>
						<center><button id="game_finished" class="btn btn-primary btn-lg" data-dismiss="modal" style="width:50%">OK</button></center>
					</div>
				</div>
			</div>
		</div>
		<div class="modal" id="modal_undo_1">
			<div class="modal-dialog">
				<div class="modal-content">
					 	<div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					        <h4 class="modal-title">Undo Last Point</h4>
				      	</div>
					<div class="modal-body">
						<p>Are you sure?</p>
					</div>
					<div class="modal-footer">
						<button class="btn btn-primary btn-lg" data-dismiss="modal">Cancel</button>
						<button id="undo_confirm_1" class="btn btn-warning btn-lg" data-dismiss="modal">OK</button>
			      	</div>
				</div>
			</div>
		</div>
		<div class="modal" id="modal_undo_2">
			<div class="modal-dialog">
				<div class="modal-content">
					 	<div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					        <h4 class="modal-title">Undo Last Point</h4>
				      	</div>
					<div class="modal-body">
						<p>Are you sure?</p>
					</div>
					<div class="modal-footer">
						<button class="btn btn-primary btn-lg" data-dismiss="modal">Cancel</button>
						<button id="undo_confirm_2" class="btn btn-warning btn-lg" data-dismiss="modal">OK</button>
			      	</div>
				</div>
			</div>
		</div>
		<div class="modal" id="modal_countdown">
			<div class="modal-dialog">
				<div class="modal-content">
					 	<div class="modal-header">
					        <h3 class="modal-title">Countdown</h3>
				      	</div>
					<div class="modal-body">
						<p id="countdown" class="text-center" style="font-size:24px;font-weight: bold;"></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
	<?php }else{ ?>
	<div class="container-fluid">
	<?php foreach ($court->result() as $data) { ?>
		<?php if ($this->session->userdata('reverse')=='yes'){ ?>
		<div class="row" style="padding:50px;">
			<div class="col-xs-6" >
				<div class="row">
					<div class="col-xs-12" style="border:2px solid white;border-left:1px solid white;height:400px;">
						<div class="row" >
							<div id="ganjil1_player2" class="col-xs-2 <?php if($this->session->userdata('serve')=='ganjil_player2'){ echo "player-serve"; } ?>" style="border-right:2px solid white;border-bottom:1px solid white; height:200px;">
								<div class="row">
									<div class="col-xs-12" style="border-bottom:2px solid white; height:50px;">
										
									</div>
								</div>
							</div>
							<div id="ganjil2_player2" class="col-xs-7 <?php if($this->session->userdata('serve')=='ganjil_player2'){ echo "player-serve"; } ?>" style="border-right:2px solid white;border-bottom:1px solid white; height:200px;">
								<div class="row">
									<div class="col-xs-12" style="border-bottom:2px solid white; height:50px;">
										<p class="text-center" id="player2_name2" style="color:white;font-size:20px;padding-top:80px;"></p>
									</div>
								</div>
							</div>
							<div class="col-xs-3" style="border-bottom:2px solid white; height:50px;">
							</div>
						</div>
						<div class="row" >
							<div id="genap2_player2" class="col-xs-2 <?php if($this->session->userdata('serve')=='genap_player2'){ echo "player-serve"; } ?>" style="border-right:2px solid white;border-top:1px solid white; height:197px;">
								<div class="row">
									<div class="col-xs-12" style="border-bottom:2px solid white; height:150px;">
										
									</div>
								</div>
							</div>
							<div id="genap1_player2" class="col-xs-7 <?php if($this->session->userdata('serve')=='genap_player2'){ echo "player-serve"; } ?>" style="border-right:2px solid white;border-top:1px solid white; height:197px;">
								<div class="row">
									<div class="col-xs-12" style="border-bottom:2px solid white; height:150px;">
										
										<p class="text-center" id="player2_name1" style="color:white;font-size:20px;padding-top:80px;"></p>
									</div>
								</div>
							</div>
							<div class="col-xs-3" style="border-bottom:2px solid white; height:150px;">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6" >
				<div class="row">
					<div class="col-xs-12" style="border:2px solid white;border-right:1px solid white;height:400px;">
						<div class="row" >
							<div class="col-xs-3" style="border-bottom:2px solid white; height:50px;">
							</div>
							<div id="genap1_player1" class="col-xs-7 <?php if($this->session->userdata('serve')=='genap_player1'){ echo 'player-serve'; } ?>" style="border-left:2px solid white;border-bottom:1px solid white; height:200px;">
								<div class="row">
									<div class="col-xs-12" style="border-bottom:2px solid white; height:50px;">
										<p class="text-center" id="player1_name1" style="color:white;font-size:20px;padding-top:80px;"></p>
									</div>
								</div>
							</div>
							<div id="genap2_player1" class="col-xs-2 <?php if($this->session->userdata('serve')=='genap_player1'){ echo 'player-serve'; } ?>" style="border-left:2px solid white;border-bottom:1px solid white; height:200px;">
								<div class="row">
									<div class="col-xs-12" style="border-bottom:2px solid white; height:50px;">
										
									</div>
								</div>
							</div>
						</div>
						<div class="row" >
							<div class="col-xs-3" style="border-bottom:2px solid white; height:150px;">
							</div>
							<div id="ganjil1_player1" class="col-xs-7 <?php if($this->session->userdata('serve')=='ganjil_player1'){ echo 'player-serve'; } ?>" style="border-left:2px solid white;border-top:1px solid white; height:197px;">
								<div class="row">
									<div class="col-xs-12" style="border-bottom:2px solid white; height:150px;">
										<p class="text-center" id="player1_name2" style="color:white;font-size:20px;padding-top:80px;"></p>
									</div>

								</div>
							</div>
							<div id="ganjil2_player1" class="col-xs-2 <?php if($this->session->userdata('serve')=='ganjil_player1'){ echo 'player-serve'; } ?>" style="border-left:2px solid white;border-top:1px solid white; height:197px;">
								<div class="row">
									<div class="col-xs-12" style="border-bottom:2px solid white; height:150px;">
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3" style="font-size:24px;color:white;">
				<?php if ($this->session->userdata('reverse_confirm')==NULL) { ?>
				<p>Serving Side</p>
				<form role="form">
				    <div class="radio">
				      <label><input type="radio" id="left" name="radio" checked>Left</label>
				    </div>
				    <div class="radio">
				      <label><input type="radio" id="right" name="radio" >Right</label>
				    </div>
				</form>
				<?php } ?>
			</div>
			<div class="col-sm-1">
				<?php if ($this->session->userdata('reverse_confirm')==NULL&&$data->type_id==2) { ?>
				<a href="#" id="reverse_team_2">
					<img class="center-block" width="50px" src="<?php echo site_url();?>assets/img/reverse.png">
				</a>
				<?php } ?>
			</div>
			<div class="col-sm-1">
				
			</div>
			<div class="col-sm-1">
				<?php if ($this->session->userdata('reverse_confirm')==NULL) { ?>
				<form id="reverse_form1" method="post" action="<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2)?>/reverse">
					<input type="hidden" name="reverse" value="no" >
					<a href="#" onclick="document.getElementById('reverse_form1').submit();">
						<img class="center-block img-responsive" src="<?php echo site_url();?>assets/img/reverse.png">
					</a>
				</form>
				<?php } ?>
			</div>
			<div class="col-sm-1">
				<?php if ($this->session->userdata('reverse_confirm')==NULL) { ?>
				<form id="reverse_confirm_form1" method="post" action="<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2)?>/reverse_confirm" >
					<a href="#" onclick="document.getElementById('reverse_confirm_form1').submit();">
						<img class="center-block img-responsive" src="<?php echo site_url();?>assets/img/check.png">
					</a>
				</form>
				<?php } ?>
			</div>
			<div class="col-sm-1">
				
			</div>
			<div class="col-sm-1">
				<?php if ($this->session->userdata('reverse_confirm')==NULL&&$data->type_id==2) { ?>
				<a href="#" id="reverse_team_1">
					<img class="center-block" width="50px" src="<?php echo site_url();?>assets/img/reverse.png">
				</a>
				<?php } ?>
			</div>
			<div class="col-sm-3">
				<?php if ($this->session->userdata('reverse_confirm')) { ?>
				<button id="play_game" class="btn btn-primary btn-lg" style="font-size:24px;width:100%;padding:30px;">Start Match <span class="glyphicon glyphicon-play"></span></button>
				<?php } ?>
			</div>
		</div>
		<?php 
		}else{ ?>
		<div class="row" style="padding:50px;">
			<div class="col-xs-6" >
				<div class="row">
					<div class="col-xs-12" style="border:2px solid white;border-right:1px solid white;height:400px;">
						<div class="row" >
							<div id="ganjil2_player1" class="col-xs-2 <?php if($this->session->userdata('serve')=='ganjil_player1'){ echo "player-serve"; } ?>" style="border-right:2px solid white;border-bottom:1px solid white; height:200px;">
								<div class="row">
									<div class="col-xs-12" style="border-bottom:2px solid white; height:50px;">
										
									</div>
								</div>
							</div>
							<div id="ganjil1_player1" class="col-xs-7 <?php if($this->session->userdata('serve')=='ganjil_player1'){ echo "player-serve"; } ?>" style="border-right:2px solid white;border-bottom:1px solid white; height:200px;">
								<div class="row">
									<div class="col-xs-12" style="border-bottom:2px solid white; height:50px;">
										<p class="text-center" id="player1_name2" style="color:white;font-size:20px;padding-top:80px;"></p>
									</div>
								</div>
							</div>
							<div class="col-xs-3" style="border-bottom:2px solid white; height:50px;">
							</div>
						</div>
						<div class="row" >
							<div id="genap2_player1" class="col-xs-2 <?php if($this->session->userdata('serve')=='genap_player1'){ echo "player-serve"; } ?>" style="border-right:2px solid white;border-top:1px solid white; height:197px;">
								<div class="row">
									<div class="col-xs-12" style="border-bottom:2px solid white; height:150px;">
										
									</div>
								</div>
							</div>
							<div id="genap1_player1" class="col-xs-7 <?php if($this->session->userdata('serve')=='genap_player1'){ echo "player-serve"; } ?>" style="border-right:2px solid white;border-top:1px solid white; height:197px;">
								<div class="row">
									<div class="col-xs-12" style="border-bottom:2px solid white; height:150px;">
										<p class="text-center" id="player1_name1" style="color:white;font-size:20px;padding-top:80px;"></p>
									</div>

								</div>
							</div>
							<div class="col-xs-3" style="border-bottom:2px solid white; height:150px;">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6" >
				<div class="row">
					<div class="col-xs-12" style="border:2px solid white;border-left:1px solid white;height:400px;">
						<div class="row" >
							<div class="col-xs-3" style="border-bottom:2px solid white; height:50px;">
							</div>
							<div id="genap2_player2" class="col-xs-7 <?php if($this->session->userdata('serve')=='genap_player2'){ echo "player-serve"; } ?>" style="border-left:2px solid white;border-bottom:1px solid white; height:200px;">
								<div class="row">
									<div class="col-xs-12" style="border-bottom:2px solid white; height:50px;">
										<p class="text-center" id="player2_name1" style="color:white;font-size:20px;padding-top:80px;"></p>
									</div>
								</div>
							</div>
							<div id="genap1_player2" class="col-xs-2 <?php if($this->session->userdata('serve')=='genap_player2'){ echo "player-serve"; } ?>" style="border-left:2px solid white;border-bottom:1px solid white; height:200px;">
								<div class="row">
									<div class="col-xs-12" style="border-bottom:2px solid white; height:50px;">
										
									</div>
								</div>
							</div>
						</div>
						<div class="row" >
							<div class="col-xs-3" style="border-bottom:2px solid white; height:150px;">
							</div>
							<div id="ganjil1_player2" class="col-xs-7 <?php if($this->session->userdata('serve')=='ganjil_player2'){ echo "player-serve"; } ?>" style="border-left:2px solid white;border-top:1px solid white; height:197px;">
								<div class="row">
									<div class="col-xs-12" style="border-bottom:2px solid white; height:150px;">
										
										<p class="text-center" id="player2_name2" style="color:white;font-size:20px;padding-top:80px;"></p>
									</div>
								</div>
							</div>
							<div id="ganjil2_player2" class="col-xs-2 <?php if($this->session->userdata('serve')=='ganjil_player2'){ echo "player-serve"; } ?>" style="border-left:2px solid white;border-top:1px solid white; height:197px;">
								<div class="row">
									<div class="col-xs-12" style="border-bottom:2px solid white; height:150px;">
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3"  style="font-size:24px;color:white;">
				<?php if ($this->session->userdata('reverse_confirm')==NULL) { ?>
					<p>Serving Side</p>
					<form role="form">
					    <div class="radio">
					      <label><input type="radio" id="left" name="radio" checked>Left</label>
					    </div>
					    <div class="radio">
					      <label><input type="radio" id="right" name="radio" >Right</label>
					    </div>
					</form>
				<?php } ?>
			</div>
			<div class="col-sm-1">
				<?php if ($this->session->userdata('reverse_confirm')==NULL&&$data->type_id==2) { ?>
				<a href="#" id="reverse_team_1">
					<img class="center-block" width="50px" src="<?php echo site_url();?>assets/img/reverse.png">
				</a>
				<?php } ?>
			</div>
			<div class="col-sm-1">
				
			</div>
			<div class="col-sm-1">
				<?php if ($this->session->userdata('reverse_confirm')==NULL) { ?>
				<form id="reverse_form1" method="post" action="<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2)?>/reverse">
					<input type="hidden" name="reverse" value="yes" >
					<a href="#" onclick="document.getElementById('reverse_form1').submit();">
						<img class="center-block img-responsive" src="<?php echo site_url();?>assets/img/reverse.png">
					</a>
				</form>
				<?php } ?>
			</div>
			<div class="col-sm-1">
				<?php if ($this->session->userdata('reverse_confirm')==NULL) { ?>
				<form id="reverse_confirm_form1" method="post" action="<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2)?>/reverse_confirm" >
					<a href="#" onclick="document.getElementById('reverse_confirm_form1').submit();">
						<img class="center-block img-responsive" src="<?php echo site_url();?>assets/img/check.png">
					</a>
				</form>
				<?php } ?>
			</div>
			<div class="col-sm-1">
				
			</div>
			<div class="col-sm-1">
				<?php if ($this->session->userdata('reverse_confirm')==NULL&&$data->type_id==2) { ?>
				<a href="#" id="reverse_team_2">
					<img class="center-block" width="50px" src="<?php echo site_url();?>assets/img/reverse.png">
				</a>
				<?php } ?>
			</div>
			<div class="col-sm-3">
				<?php if ($this->session->userdata('reverse_confirm')) { ?>
				<button id="play_game" class="btn btn-primary btn-lg" style="font-size:24px;width:100%;padding:30px;">Start Match <span class="glyphicon glyphicon-play"></span></button>
				<?php } ?>
			</div>
		</div>
		<?php } ?>
		<input type="hidden" id="type_name_val">
		<div class="modal" id="modal_reverse">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body">
						<p>Choose “circle” to change position and “check” if done</p>
						<center><button class="btn btn-primary btn-lg" data-dismiss="modal" style="width:50%">OK</button></center>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	</div>
	<?php } ?>
	<script type="text/javascript">
		$(document).ready(function(){
			var clicked_team = $('#clicked').val();
			var type_name = $('#type_name_val').val();
			<?php if ($this->session->userdata('serve')=="genap_player1"||$this->session->userdata('serve')=="ganjil_player1") { ?>
				if (clicked_team=='') {
					$('#clicked').val('team1');
				}
			<?php }elseif ($this->session->userdata('serve')=="genap_player2"||$this->session->userdata('serve')=="ganjil_player2") { ?>
				if (clicked_team=='') {
					$('#clicked').val('team2');
				}
			<?php } ?>
			<?php if ($this->session->userdata('reverse_team_1')=="yes"&&$this->session->userdata('reverse_team_2')=="yes") { ?>
				$('#player1_name1').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player1_name2',function(data){
					$('#player_name2_team1').val(data);
				});
				$('#player1_name2').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player1_name1',function(data){
					$('#player_name1_team1').val(data);
				});
				$('#player2_name1').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player2_name2',function(data){
					$('#player_name2_team2').val(data);
				});
				$('#player2_name2').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player2_name1',function(data){
					$('#player_name1_team2').val(data);
				});
			<?php }elseif ($this->session->userdata('reverse_team_1')=="yes"&&$this->session->userdata('reverse_team_2')=="no") { ?>
				$('#player1_name1').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player1_name2',function(data){
					$('#player_name2_team1').val(data);
				});
				$('#player1_name2').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player1_name1',function(data){
					$('#player_name1_team1').val(data);
				});
				$('#player2_name1').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player2_name1',function(data){
					$('#player_name1_team2').val(data);
				});
				$('#player2_name2').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player2_name2',function(data){
					$('#player_name2_team2').val(data);
				});
			<?php }elseif ($this->session->userdata('reverse_team_2')=="yes"&&$this->session->userdata('reverse_team_1')=="no"){ ?> 
				$('#player1_name1').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player1_name1',function(data){
					$('#player_name1_team1').val(data);
				});
				$('#player1_name2').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player1_name2',function(data){
					$('#player_name2_team1').val(data);
				});
				$('#player2_name1').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player2_name2',function(data){
					$('#player_name2_team2').val(data);
				});
				$('#player2_name2').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player2_name1',function(data){
					$('#player_name1_team2').val(data);
				});

			<?php }elseif ($this->session->userdata('rubber')=="yes") { ?> 
				$('#player1_name2').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player1_name1',function(data){
					$('#player_name1_team1').val(data);
				});
				$('#player1_name1').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player1_name2',function(data){
					$('#player_name2_team1').val(data);
				});
				$('#player2_name2').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player2_name1',function(data){
					$('#player_name1_team2').val(data);
				});
				$('#player2_name1').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player2_name2',function(data){
					$('#player_name2_team2').val(data);
				});
			<?php }else{ ?>
				$('#player1_name1').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player1_name1',function(data){
					$('#player_name1_team1').val(data);
				});
				$('#player1_name2').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player1_name2',function(data){
					$('#player_name2_team1').val(data);
				});
				$('#player2_name1').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player2_name1',function(data){
					$('#player_name1_team2').val(data);
				});
				$('#player2_name2').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player2_name2',function(data){
					$('#player_name2_team2').val(data);
				});
			<?php } ?>

			$('#umpire_name').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/umpire_name');
			$('#type_name').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/type_name',function(data){
				$('#type_name_val').val(data);
			});
			$('#class_name').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/class_name');
			$('#subclass_name').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/subclass_name');
			$('#time').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/time',function(data){
				$('#time_now').val(data);
			});
			$('#time_process').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/time_process',function(data){
				$('#time_process').val(data);
				<?php if(($this->session->userdata('play_game')==NULL)){ ?>
					if (data=="00:00:00") {
						$("#modal_reverse").modal("show");
						
					}
				<?php } ?>
			});
			$('#score_1').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/score_1',function(data){
				var data = parseInt(data);
				$('#score_team_1').val(data);
				if (data == 0) {
					$("#undo_1").attr("disabled", true);
				}
			});
			$('#score_2').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/score_2',function(data){
				var data = parseInt(data);
				$('#score_team_2').val(data);
				if (data == 0) {
					$("#undo_2").attr("disabled", true);
				}
			});
			$('#shuttlecock').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/shuttlecock',function(data){
				var data = parseInt(data);
				$('#shuttlecock_value').val(data);
			});
			$('#stage_number').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/stage_number',function(data){
				var data = parseInt(data);
				$('#stage_number_value').val(data);
			});

			<?php
			if ($this->session->userdata('play_game')==NULL&&$this->session->userdata('reverse')) { ?>
				$("#modal_play_game").modal("show");
			<?php }
			if ($this->session->userdata('play_game')&&$this->session->userdata('reverse')&&$this->session->userdata('reverse_confirm')&&$this->session->userdata('serve')==NULL) { ?>
				$("#modal_first_serve").modal("show");
			<?php } ?>
			
			setInterval(function(){
				$('#time').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/time'),
				$('#time_process').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/time_process',function(data){
					<?php if($this->session->userdata('play_game')) { ?>
						var hms = data;
						var a = hms.split(':'); 

						String.prototype.toHHMMSS = function () {
						    var sec_num = parseInt(this, 10); // don't forget the second param
						    var hours   = Math.floor(sec_num / 3600);
						    var minutes = Math.floor((sec_num - (hours * 3600)) / 60);
						    var seconds = sec_num - (hours * 3600) - (minutes * 60);

						    if (hours   < 10) {hours   = "0"+hours;}
						    if (minutes < 10) {minutes = "0"+minutes;}
						    if (seconds < 10) {seconds = "0"+seconds;}
						    return hours+':'+minutes+':'+seconds;
						}

						var seconds = (+a[0]) * 60 * 60 + (+a[1]) * 60 + (+a[2]); 
						var seconds = parseInt(seconds);
						var seconds = seconds + 10;
						var seconds = seconds.toString();
						var seconds = seconds.toHHMMSS();
						$.post("<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/add_time",{ seconds : seconds });
					<?php } ?>
				})
			},10000);

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

			$("#reverse_team_1").click(function(){
				window.location.assign("<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/reverse_team_1");
			});

			$("#reverse_team_2").click(function(){
				window.location.assign("<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/reverse_team_2");
			});

			$("#left").click(function(){
				<?php if($this->session->userdata('reverse')=="yes"){ ?>
					$.post("<?php echo site_url();?>umpire/serve_genap_player_2");
					$("#genap1_player1").removeClass("player-serve");
					$("#genap2_player1").removeClass("player-serve");
					$("#ganjil1_player1").removeClass("player-serve");
					$("#ganjil2_player1").removeClass("player-serve");
					$("#genap1_player2").removeClass("player-serve");
					$("#genap2_player2").removeClass("player-serve");
					$("#ganjil1_player2").removeClass("player-serve");
					$("#ganjil2_player2").removeClass("player-serve");
					$("#genap1_player2").addClass("player-serve");
					$("#genap2_player2").addClass("player-serve");
				<?php }else{ ?>
					$.post("<?php echo site_url();?>umpire/serve_genap_player_1");
					$("#genap1_player1").removeClass("player-serve");
					$("#genap2_player1").removeClass("player-serve");
					$("#ganjil1_player1").removeClass("player-serve");
					$("#ganjil2_player1").removeClass("player-serve");
					$("#genap1_player2").removeClass("player-serve");
					$("#genap2_player2").removeClass("player-serve");
					$("#ganjil1_player2").removeClass("player-serve");
					$("#ganjil2_player2").removeClass("player-serve");
					$("#genap1_player1").addClass("player-serve");
					$("#genap2_player1").addClass("player-serve");
				<?php } ?>
			});
			
			$("#right").click(function(){
				<?php if($this->session->userdata('reverse')=="yes"){ ?>
					$.post("<?php echo site_url();?>umpire/serve_genap_player_1");
					$("#genap1_player1").removeClass("player-serve");
					$("#genap2_player1").removeClass("player-serve");
					$("#ganjil1_player1").removeClass("player-serve");
					$("#ganjil2_player1").removeClass("player-serve");
					$("#genap1_player2").removeClass("player-serve");
					$("#genap2_player2").removeClass("player-serve");
					$("#ganjil1_player2").removeClass("player-serve");
					$("#ganjil2_player2").removeClass("player-serve");
					$("#genap1_player1").addClass("player-serve");
					$("#genap2_player1").addClass("player-serve");
				<?php }else{ ?>
					$.post("<?php echo site_url();?>umpire/serve_genap_player_2");
					$("#genap1_player1").removeClass("player-serve");
					$("#genap2_player1").removeClass("player-serve");
					$("#ganjil1_player1").removeClass("player-serve");
					$("#ganjil2_player1").removeClass("player-serve");
					$("#genap1_player2").removeClass("player-serve");
					$("#genap2_player2").removeClass("player-serve");
					$("#ganjil1_player2").removeClass("player-serve");
					$("#ganjil2_player2").removeClass("player-serve");
					$("#genap1_player2").addClass("player-serve");
					$("#genap2_player2").addClass("player-serve");
				<?php } ?>
			});

			$("#undo_1").click(function(){
				$("#modal_undo_1").modal("show");
			});

			$("#undo_2").click(function(){
				$("#modal_undo_2").modal("show");
			});

			$("#undo_confirm_1").click(function(){
				var clicked = $('#clicked').val();
				var player1_name1 = $('#player1_name1').html();
				var player1_name2 = $('#player1_name2').html();
				var player2_name1 = $('#player2_name1').html();
				var player2_name2 = $('#player2_name2').html();
				$('#clicked').val("team1");
				var type_name = $('#type_name_val').val();
				var score1 = parseInt($('#score_team_1').val());
				var score = score1 - 1;
				var stage_number = parseInt($('#stage_number_value').val());
				$.post("<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/"+stage_number+"/add_score_1",{ score : score });
				setTimeout(function(){ 
					$('#score_1').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/score_1',function(data){
						var data = parseInt(data);
						$('#score_team_1').val(data);
					}); 
				}, 500);
				if (score==0) {
					$("#undo_1").attr("disabled", true);
				}else{
					$("#undo_1").attr("disabled", false);
				}

				if (score%2==0) {
					$.post("<?php echo site_url();?>umpire/serve_genap_player_1");
				}else{
					$.post("<?php echo site_url();?>umpire/serve_ganjil_player_1");
				}
				if (score%2==0){
					<?php if($this->session->userdata('reverse')=='yes'){ ?>
						$("#genap1_player1").removeClass("player-serve");
						$("#genap2_player1").removeClass("player-serve");
						$("#ganjil1_player1").removeClass("player-serve");
						$("#ganjil2_player1").removeClass("player-serve");
						$("#genap1_player2").removeClass("player-serve");
						$("#genap2_player2").removeClass("player-serve");
						$("#ganjil1_player2").removeClass("player-serve");
						$("#ganjil2_player2").removeClass("player-serve");
						$("#genap1_player1").addClass("player-serve");
						$("#genap2_player1").addClass("player-serve");
						if (type_name=="Singles") {
							$('#player1_name2').empty();
							$('#player2_name2').empty();
							$('#player1_name1').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player1_name1');
							$('#player2_name1').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player2_name1');
						}
					<?php } else{ ?>
						$("#genap1_player1").removeClass("player-serve");
						$("#genap2_player1").removeClass("player-serve");
						$("#ganjil1_player1").removeClass("player-serve");
						$("#ganjil2_player1").removeClass("player-serve");
						$("#genap1_player2").removeClass("player-serve");
						$("#genap2_player2").removeClass("player-serve");
						$("#ganjil1_player2").removeClass("player-serve");
						$("#ganjil2_player2").removeClass("player-serve");
						$("#genap1_player1").addClass("player-serve");
						$("#genap2_player1").addClass("player-serve");
						if (type_name=="Singles") {
							$('#player1_name2').empty();
							$('#player2_name2').empty();
							$('#player1_name1').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player1_name1');
							$('#player2_name1').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player2_name1');
						}
					<?php } ?>
				}else{
					<?php if($this->session->userdata('reverse')=='yes'){ ?>
						$("#genap1_player1").removeClass("player-serve");
						$("#genap2_player1").removeClass("player-serve");
						$("#ganjil1_player1").removeClass("player-serve");
						$("#ganjil2_player1").removeClass("player-serve");
						$("#genap1_player2").removeClass("player-serve");
						$("#genap2_player2").removeClass("player-serve");
						$("#ganjil1_player2").removeClass("player-serve");
						$("#ganjil2_player2").removeClass("player-serve");
						$("#ganjil1_player1").addClass("player-serve");
						$("#ganjil2_player1").addClass("player-serve");
						if (type_name=="Singles") {
							$('#player1_name1').empty();
							$('#player2_name1').empty();
							$('#player1_name2').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player1_name1');
							$('#player2_name2').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player2_name1');
						}
					<?php } else{ ?>
						$("#genap1_player1").removeClass("player-serve");
						$("#genap2_player1").removeClass("player-serve");
						$("#ganjil1_player1").removeClass("player-serve");
						$("#ganjil2_player1").removeClass("player-serve");
						$("#genap1_player2").removeClass("player-serve");
						$("#genap2_player2").removeClass("player-serve");
						$("#ganjil1_player2").removeClass("player-serve");
						$("#ganjil2_player2").removeClass("player-serve");
						$("#ganjil1_player1").addClass("player-serve");
						$("#ganjil2_player1").addClass("player-serve");
						if (type_name=="Singles") {
							$('#player1_name1').empty();
							$('#player2_name1').empty();
							$('#player1_name2').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player1_name1');
							$('#player2_name2').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player2_name1');
						}
					<?php } ?>
				}
				if (type_name=="Doubles") {
					if (clicked=="team1") {
						if (player1_name1 == $('#player_name1_team1').val()) {
							$.post("<?php echo site_url();?>umpire/reverse_stage_team_1");
							$('#player1_name2').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player1_name1');
							$('#player1_name1').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player1_name2');
						}else if (player1_name1 != $('#player_name1_team1').val()){
							$.post("<?php echo site_url();?>umpire/reverse_stage_team_1");
							$('#player1_name1').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player1_name1');
							$('#player1_name2').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player1_name2');
						}
					}
				}
				$("#css_score_team_1").removeClass("score");
				$("#css_score_team_1").removeClass("score-serve");
				$("#css_score_team_1").addClass("score-serve");
				$("#css_score_team_2").removeClass("score");
				$("#css_score_team_2").removeClass("score-serve");
				$("#css_score_team_2").addClass("score");
			});
			
			$("#undo_confirm_2").click(function(){
				var clicked = $('#clicked').val();
				var player1_name1 = $('#player1_name1').html();
				var player1_name2 = $('#player1_name2').html();
				var player2_name1 = $('#player2_name1').html();
				var player2_name2 = $('#player2_name2').html();
				var type_name = $('#type_name_val').val();
				$('#clicked').val("team2");

				var score2 = parseInt($('#score_team_2').val());
				var score = score2 - 1;
				var stage_number = parseInt($('#stage_number_value').val());
				$.post("<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/"+stage_number+"/add_score_2",{ score : score });
				setTimeout(function(){ 
					$('#score_2').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/score_2',function(data){
						var data = parseInt(data);
						$('#score_team_2').val(data);
					}); 
				}, 500);
				if (score==0) {
					$("#undo_2").attr("disabled", true);
				}

				if (score%2==0) {
					$.post("<?php echo site_url();?>umpire/serve_genap_player_2");
				}else{
					$.post("<?php echo site_url();?>umpire/serve_ganjil_player_2");
				}
				if (score%2==0){
					<?php if($this->session->userdata('reverse')=='yes'){ ?>
						$("#genap1_player1").removeClass("player-serve");
						$("#genap2_player1").removeClass("player-serve");
						$("#ganjil1_player1").removeClass("player-serve");
						$("#ganjil2_player1").removeClass("player-serve");
						$("#genap1_player2").removeClass("player-serve");
						$("#genap2_player2").removeClass("player-serve");
						$("#ganjil1_player2").removeClass("player-serve");
						$("#ganjil2_player2").removeClass("player-serve");
						$("#genap1_player2").addClass("player-serve");
						$("#genap2_player2").addClass("player-serve");
						if (type_name=="Singles") {
							$('#player1_name2').empty();
							$('#player2_name2').empty();
							$('#player1_name1').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player1_name1');
							$('#player2_name1').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player2_name1');
						}
					<?php } else{ ?>
						$("#genap1_player1").removeClass("player-serve");
						$("#genap2_player1").removeClass("player-serve");
						$("#ganjil1_player1").removeClass("player-serve");
						$("#ganjil2_player1").removeClass("player-serve");
						$("#genap1_player2").removeClass("player-serve");
						$("#genap2_player2").removeClass("player-serve");
						$("#ganjil1_player2").removeClass("player-serve");
						$("#ganjil2_player2").removeClass("player-serve");
						$("#genap1_player2").addClass("player-serve");
						$("#genap2_player2").addClass("player-serve");
						if (type_name=="Singles") {
							$('#player2_name1').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player2_name1');
							$('#player1_name1').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player1_name1');
							$('#player2_name2').empty();
							$('#player1_name2').empty();
						}
					<?php } ?>
				}else{
					<?php if($this->session->userdata('reverse')=='yes'){ ?>
						$("#genap1_player1").removeClass("player-serve");
						$("#genap2_player1").removeClass("player-serve");
						$("#ganjil1_player1").removeClass("player-serve");
						$("#ganjil2_player1").removeClass("player-serve");
						$("#genap1_player2").removeClass("player-serve");
						$("#genap2_player2").removeClass("player-serve");
						$("#ganjil1_player2").removeClass("player-serve");
						$("#ganjil2_player2").removeClass("player-serve");
						$("#ganjil1_player2").addClass("player-serve");
						$("#ganjil2_player2").addClass("player-serve");
						if (type_name=="Singles") {
							$('#player1_name1').empty();
							$('#player2_name1').empty();
							$('#player1_name2').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player1_name1');
							$('#player2_name2').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player2_name1');
						}
					<?php } else{ ?>
						$("#genap1_player1").removeClass("player-serve");
						$("#genap2_player1").removeClass("player-serve");
						$("#ganjil1_player1").removeClass("player-serve");
						$("#ganjil2_player1").removeClass("player-serve");
						$("#genap1_player2").removeClass("player-serve");
						$("#genap2_player2").removeClass("player-serve");
						$("#ganjil1_player2").removeClass("player-serve");
						$("#ganjil2_player2").removeClass("player-serve");
						$("#ganjil1_player2").addClass("player-serve");
						$("#ganjil2_player2").addClass("player-serve");
						if (type_name=="Singles") {
							$('#player2_name1').empty();
							$('#player1_name1').empty();
							$('#player2_name2').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player2_name1');
							$('#player1_name2').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player1_name1');
						}
					<?php } ?>
				}

				if (type_name=="Doubles") {
					if (clicked=="team2") {
						if (player2_name1 == $('#player_name1_team2').val()) {
							$.post("<?php echo site_url();?>umpire/reverse_stage_team_2");
							$('#player2_name2').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player2_name1');
							$('#player2_name1').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player2_name2');
						}else if (player2_name1 != $('#player_name1_team2').val()){
							$.post("<?php echo site_url();?>umpire/reverse_stage_team_2");
							$('#player2_name1').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player2_name1');
							$('#player2_name2').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player2_name2');
						}
					}
				}
				$("#css_score_team_2").removeClass("score");
				$("#css_score_team_2").removeClass("score-serve");
				$("#css_score_team_2").addClass("score-serve");
				$("#css_score_team_1").removeClass("score");
				$("#css_score_team_1").removeClass("score-serve");
				$("#css_score_team_1").addClass("score");

			});

			$("#play_game").click(function(){
				$.post("<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/play_game");
				setTimeout(function(){ location.reload(); }, 1000);
			});

			$("#game_finished").click(function(){
				window.location.assign("<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/game_over");
			});

			$("#add_score_team1").click(function(){
				var clicked = $('#clicked').val();
				var player1_name1 = $('#player1_name1').html();
				var player1_name2 = $('#player1_name2').html();
				var player2_name1 = $('#player2_name1').html();
				var player2_name2 = $('#player2_name2').html();
				var score1 = parseInt($('#score_team_1').val());
				var score = score1 + 1;
				var serve_continue = $('#serve1').val();
				var stage_number = parseInt($('#stage_number_value').val());
				var type_name = $('#type_name_val').val();
				var score_team_2 = parseInt($('#score_team_2').val());
				$('#clicked').val("team1");

				if (score%2==0) {
					$.post("<?php echo site_url();?>umpire/serve_genap_player_1");
				}else{
					$.post("<?php echo site_url();?>umpire/serve_ganjil_player_1");
				}
				$.post("<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/"+stage_number+"/add_score_1",{ score : score });
				$.post("<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/serve_continue",{ serve : serve_continue });
				setTimeout(function(){ 
					$('#score_1').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/score_1',function(data){
						var data = parseInt(data);
						$('#score_team_1').val(data);
					}); 
				}, 500);
				if ((score==30)&&(score_team_2==29)) {
					if (stage_number==3) {
						$('#modal_game_finish').modal({
						  backdrop: 'static',
						  keyboard: true
						}); 
					}else if (stage_number==2){
						$.post("<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/stage_check",function(data){
							if (data=="finish"){
								$('#modal_game_finish').modal({
								  backdrop: 'static',
								  keyboard: true
								}); 
							}else{
								$.post("<?php echo site_url();?>umpire/_1");
								$.post("<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/stage_reverse");
								$.post("<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/add_new_stage");
								setTimeout(function(){ location.reload(); }, 1000);
							}
						});
					}else{
						$.post("<?php echo site_url();?>umpire/serve_genap_player_1");
						$.post("<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/stage_reverse");
						$.post("<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/add_new_stage");
						setTimeout(function(){ location.reload(); }, 1000);
					}
				}else if (((score>=20) && (score<=29)) && ((score_team_2>=20) && (score_team_2<=29))) {
					if (score - score_team_2==2) {
						if (stage_number==3) {
							$('#modal_game_finish').modal({
							  backdrop: 'static',
							  keyboard: true
							}); 
						}else if (stage_number==2){
							$.post("<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/stage_check",function(data){
								if (data=="finish"){
									$('#modal_game_finish').modal({
									  backdrop: 'static',
									  keyboard: true
									}); 
								}else{
									if (type_name=="Doubles") {
										if (score%2==1) {
											$.post("<?php echo site_url();?>umpire/reverse_stage_team_1");
										}
									}
									$.post("<?php echo site_url();?>umpire/serve_genap_player_1");
									$.post("<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/stage_reverse");
									$.post("<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/add_new_stage");
									setTimeout(function(){ location.reload(); }, 1000);
								}
							});
						}else{
							if (type_name=="Doubles") {
								if (score%2==1) {
									$.post("<?php echo site_url();?>umpire/reverse_stage_team_1");
								}
							}
							$.post("<?php echo site_url();?>umpire/serve_genap_player_1");
							$.post("<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/stage_reverse");
							$.post("<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/add_new_stage");
							setTimeout(function(){ location.reload(); }, 1000);
						}
					}
				}else if ((score==21) && (score_team_2<=19)){
					if (stage_number==3) {
						$('#modal_game_finish').modal({
						  backdrop: 'static',
						  keyboard: true
						}); 
					}else if (stage_number==2){
						if (type_name=="Doubles") {
							$.post("<?php echo site_url();?>umpire/reverse_stage_team_1");
						}
						$.post("<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/stage_check",function(data){
							if (data=="finish"){
								$('#modal_game_finish').modal({
								  backdrop: 'static',
								  keyboard: true
								}); 
							}else{
								$.post("<?php echo site_url();?>umpire/serve_genap_player_1");
								$.post("<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/stage_reverse");
								$.post("<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/add_new_stage");
								setTimeout(function(){ location.reload(); }, 1000);
							}
						});

					}else{
						if (type_name=="Doubles") {
							$.post("<?php echo site_url();?>umpire/reverse_stage_team_1");
						}
						$.post("<?php echo site_url();?>umpire/serve_genap_player_1");
						$.post("<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/stage_reverse");
						$.post("<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/add_new_stage");
						setTimeout(function(){ location.reload(); }, 1000);
					}
				}else if ((score==11)&&(score>score_team_2)&&(stage_number==3)){
					$.post("<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/stage_reverse");
					if (type_name=="Singles") {
						$.post("<?php echo site_url();?>umpire/reverse_rubber_single");
					}
					$.post("<?php echo site_url();?>umpire/serve_ganjil_player_1");
					setTimeout(function(){ location.reload(); }, 1000);
					/*$('#modal_countdown').modal({
					  backdrop: 'static',
					  keyboard: true
					}); 
					function startTimer(duration, display) {
					    var timer = duration, minutes, seconds;
					    setInterval(function () {
					        minutes = parseInt(timer / 60, 10);
					        seconds = parseInt(timer % 60, 10);

					        minutes = minutes < 10 ? "0" + minutes : minutes;
					        seconds = seconds < 10 ? "0" + seconds : seconds;

					        display.text(minutes + ":" + seconds);

					        if (--timer == 0) {
					        }
					    }, 1000);
					}

					jQuery(function ($) {
					    var Minutes = 60 * 2,
					        display = $('#countdown');
					    startTimer(Minutes, display);
					});*/
				}else if((score==11)&&(score>score_team_2)&&(stage_number!=3)){
					/*$('#modal_countdown').modal({
					  backdrop: 'static',
					  keyboard: true
					}); 
					function startTimer(duration, display) {
					    var timer = duration, minutes, seconds;
					    setInterval(function () {
					        minutes = parseInt(timer / 60, 10);
					        seconds = parseInt(timer % 60, 10);

					        minutes = minutes < 10 ? "0" + minutes : minutes;
					        seconds = seconds < 10 ? "0" + seconds : seconds;

					        display.text(minutes + ":" + seconds);

					        if (--timer == 0) {
								$("#modal_countdown").modal("hide");
					        }
					    }, 1000);
					}

					jQuery(function ($) {
					    var Minutes = 60 * 2,
					        display = $('#countdown');
					    startTimer(Minutes, display);
					});*/
				}
				if (score%2==0){
					<?php if($this->session->userdata('reverse')=='yes'){ ?>
						$("#genap1_player1").removeClass("player-serve");
						$("#genap2_player1").removeClass("player-serve");
						$("#ganjil1_player1").removeClass("player-serve");
						$("#ganjil2_player1").removeClass("player-serve");
						$("#genap1_player2").removeClass("player-serve");
						$("#genap2_player2").removeClass("player-serve");
						$("#ganjil1_player2").removeClass("player-serve");
						$("#ganjil2_player2").removeClass("player-serve");
						$("#genap1_player1").addClass("player-serve");
						$("#genap2_player1").addClass("player-serve");
						if (type_name=="Singles") {
							$('#player1_name2').empty();
							$('#player2_name2').empty();
							$('#player1_name1').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player1_name1');
							$('#player2_name1').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player2_name1');
						}
					<?php } else{ ?>
						$("#genap1_player1").removeClass("player-serve");
						$("#genap2_player1").removeClass("player-serve");
						$("#ganjil1_player1").removeClass("player-serve");
						$("#ganjil2_player1").removeClass("player-serve");
						$("#genap1_player2").removeClass("player-serve");
						$("#genap2_player2").removeClass("player-serve");
						$("#ganjil1_player2").removeClass("player-serve");
						$("#ganjil2_player2").removeClass("player-serve");
						$("#genap1_player1").addClass("player-serve");
						$("#genap2_player1").addClass("player-serve");
						if (type_name=="Singles") {
							$('#player1_name2').empty();
							$('#player2_name2').empty();
							$('#player1_name1').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player1_name1');
							$('#player2_name1').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player2_name1');
						}
					<?php } ?>
				}else{
					<?php if($this->session->userdata('reverse')=='yes'){ ?>
						$("#genap1_player1").removeClass("player-serve");
						$("#genap2_player1").removeClass("player-serve");
						$("#ganjil1_player1").removeClass("player-serve");
						$("#ganjil2_player1").removeClass("player-serve");
						$("#genap1_player2").removeClass("player-serve");
						$("#genap2_player2").removeClass("player-serve");
						$("#ganjil1_player2").removeClass("player-serve");
						$("#ganjil2_player2").removeClass("player-serve");
						$("#ganjil1_player1").addClass("player-serve");
						$("#ganjil2_player1").addClass("player-serve");
						if (type_name=="Singles") {
							$('#player1_name1').empty();
							$('#player2_name1').empty();
							$('#player1_name2').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player1_name1');
							$('#player2_name2').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player2_name1');
						}
					<?php } else{ ?>
						$("#genap1_player1").removeClass("player-serve");
						$("#genap2_player1").removeClass("player-serve");
						$("#ganjil1_player1").removeClass("player-serve");
						$("#ganjil2_player1").removeClass("player-serve");
						$("#genap1_player2").removeClass("player-serve");
						$("#genap2_player2").removeClass("player-serve");
						$("#ganjil1_player2").removeClass("player-serve");
						$("#ganjil2_player2").removeClass("player-serve");
						$("#ganjil1_player1").addClass("player-serve");
						$("#ganjil2_player1").addClass("player-serve");
						if (type_name=="Singles") {
							$('#player1_name1').empty();
							$('#player2_name1').empty();
							$('#player1_name2').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player1_name1');
							$('#player2_name2').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player2_name1');
						}
					<?php } ?>
				}
				if (type_name=="Doubles") {
					<?php if($this->session->userdata('reverse')=='yes'){ ?>
					if (clicked=="team1") {
						if (player1_name1 == $('#player_name1_team1').val()) {
							$.post("<?php echo site_url();?>umpire/reverse_stage_team_1");
							$('#player1_name1').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player1_name2',function(data){
								$('#player_name2_team1').val(data);
							});
							$('#player1_name2').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player1_name1',function(data){
								$('#player_name1_team1').val(data);
							});
						}else{
							$.post("<?php echo site_url();?>umpire/reverse_stage_team_1");
							$('#player1_name2').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player1_name2',function(data){
								$('#player_name2_team1').val(data);
							});
							$('#player1_name1').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player1_name1',function(data){
								$('#player_name1_team1').val(data);
							});
						}
					}
					<?php } else{ ?>
					if (clicked=="team1") {
						if (player1_name1 == $('#player_name1_team1').val()) {
							$.post("<?php echo site_url();?>umpire/reverse_stage_team_1");
							$('#player1_name1').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player1_name2');
							$('#player1_name2').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player1_name1');
						}else if (player1_name1 != $('#player_name1_team1').val()){
							$.post("<?php echo site_url();?>umpire/reverse_stage_team_1");
							$('#player1_name2').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player1_name2');
							$('#player1_name1').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player1_name1');
						}
					}
					<?php } ?>
				}
				$("#css_score_team_1").removeClass("score");
				$("#css_score_team_1").removeClass("score-serve");
				$("#css_score_team_1").addClass("score-serve");
				$("#css_score_team_2").removeClass("score");
				$("#css_score_team_2").removeClass("score-serve");
				$("#css_score_team_2").addClass("score");
				$("#undo_1").attr("disabled", false);
			});

			$("#add_score_team2").click(function(){
				var clicked = $('#clicked').val();
				var player1_name1 = $('#player1_name1').html();
				var player1_name2 = $('#player1_name2').html();
				var player2_name1 = $('#player2_name1').html();
				var player2_name2 = $('#player2_name2').html();
				var score2 = parseInt($('#score_team_2').val());
				var score = score2 + 1;
				var serve_continue = $('#serve2').val();
				var stage_number = parseInt($('#stage_number_value').val());

				var type_name = $('#type_name_val').val();
				var score_team_1 = parseInt($('#score_team_1').val());
				$('#clicked').val("team2");

				if (score%2==0) {
					$.post("<?php echo site_url();?>umpire/serve_genap_player_2");
				}else{
					$.post("<?php echo site_url();?>umpire/serve_ganjil_player_2");
				}
				$.post("<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/"+stage_number+"/add_score_2",{ score : score });
				$.post("<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/serve_continue",{ serve : serve_continue });
				setTimeout(function(){ 
					$('#score_2').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/score_2',function(data){
						var data = parseInt(data);
						$('#score_team_2').val(data);
					}); 
				}, 500);
				if ((score==30)&&(score_team_1==29)) {
					if (stage_number==3) {
						$('#modal_game_finish').modal({
						  backdrop: 'static',
						  keyboard: true
						}); 
					}else if (stage_number==2){
						$.post("<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/stage_check",function(data){
							if (data=="finish"){
								$('#modal_game_finish').modal({
								  backdrop: 'static',
								  keyboard: true
								}); 
							}else{
								$.post("<?php echo site_url();?>umpire/serve_genap_player_2");
								$.post("<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/stage_reverse");
								$.post("<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/add_new_stage");
								setTimeout(function(){ location.reload(); }, 1000);
							}
						});
					}else{
						$.post("<?php echo site_url();?>umpire/serve_genap_player_2");
						$.post("<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/stage_reverse");
						$.post("<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/add_new_stage");
						setTimeout(function(){ location.reload(); }, 1000);
					}
				}else if (((score>=20) && (score<=29)) && ((score_team_1>=20) && (score_team_1<=29))) {
					if (score - score_team_1==2) {
						if (stage_number==3) {
							$('#modal_game_finish').modal({
							  backdrop: 'static',
							  keyboard: true
							}); 
						}else if (stage_number==2){
							$.post("<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/stage_check",function(data){
								if (data=="finish"){
									$('#modal_game_finish').modal({
									  backdrop: 'static',
									  keyboard: true
									}); 
								}else{
									if (type_name=="Doubles") {
										if (score%2==1) {
											$.post("<?php echo site_url();?>umpire/reverse_stage_team_2");
										}
									}
									$.post("<?php echo site_url();?>umpire/serve_genap_player_2");
									$.post("<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/stage_reverse");
									$.post("<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/add_new_stage");
									setTimeout(function(){ location.reload(); }, 1000);
								}
							});
						}else{
							if (type_name=="Doubles") {
								if (score%2==1) {
									$.post("<?php echo site_url();?>umpire/reverse_stage_team_2");
								}
							}
							$.post("<?php echo site_url();?>umpire/serve_genap_player_2");
							$.post("<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/stage_reverse");
							$.post("<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/add_new_stage");
							setTimeout(function(){ location.reload(); }, 1000);
						}
					}
				}else if ((score==21) && (score_team_1<=19)){
					if (stage_number==3) {
						$('#modal_game_finish').modal({
						  backdrop: 'static',
						  keyboard: true
						}); 
					}else if (stage_number==2){
						$.post("<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/stage_check",function(data){
							if (data=="finish"){
								$("#modal_game_finish").modal("show");
							}else{
								if (type_name=="Doubles") {
									$.post("<?php echo site_url();?>umpire/reverse_stage_team_2");
								}
								$.post("<?php echo site_url();?>umpire/serve_genap_player_2");
								$.post("<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/stage_reverse");
								$.post("<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/add_new_stage");
								setTimeout(function(){ location.reload(); }, 1000);
							}
						});
					}else{
						if (type_name=="Doubles") {
							$.post("<?php echo site_url();?>umpire/reverse_stage_team_2");
						}
						$.post("<?php echo site_url();?>umpire/serve_genap_player_2");
						$.post("<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/stage_reverse");
						$.post("<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/add_new_stage");
						setTimeout(function(){ location.reload(); }, 1000);
					}
				}else if ((score==11)&&(score>score_team_1)&&(stage_number==3)){
					$.post("<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/stage_reverse");
					if (type_name=="Singles") {
						$.post("<?php echo site_url();?>umpire/reverse_rubber_single");
					}
					$.post("<?php echo site_url();?>umpire/serve_ganjil_player_2");
					setTimeout(function(){ location.reload(); }, 1000);
					/*$('#modal_countdown').modal({
					  backdrop: 'static',
					  keyboard: true
					}); 
					function startTimer(duration, display) {
					    var timer = duration, minutes, seconds;
					    setInterval(function () {
					        minutes = parseInt(timer / 60, 10);
					        seconds = parseInt(timer % 60, 10);

					        minutes = minutes < 10 ? "0" + minutes : minutes;
					        seconds = seconds < 10 ? "0" + seconds : seconds;

					        display.text(minutes + ":" + seconds);

					        if (--timer == 0) {
					        }
					    }, 1000);
					}

					jQuery(function ($) {
					    var Minutes = 60 * 2,
					        display = $('#countdown');
					    startTimer(Minutes, display);
					});*/
				}else if((score==11)&&(score>score_team_1)&&(stage_number!=3)){
					/*$('#modal_countdown').modal({
					  backdrop: 'static',
					  keyboard: true
					}); 
					function startTimer(duration, display) {
					    var timer = duration, minutes, seconds;
					    setInterval(function () {
					        minutes = parseInt(timer / 60, 10);
					        seconds = parseInt(timer % 60, 10);

					        minutes = minutes < 10 ? "0" + minutes : minutes;
					        seconds = seconds < 10 ? "0" + seconds : seconds;

					        display.text(minutes + ":" + seconds);

					        if (--timer == 0) {
								$("#modal_countdown").modal("hide");
					        }
					    }, 1000);
					}

					jQuery(function ($) {
					    var Minutes = 60 * 2,
					        display = $('#countdown');
					    startTimer(Minutes, display);
					});*/
				}

				if (score%2==0){
					<?php if($this->session->userdata('reverse')=='yes'){ ?>
						$("#genap1_player1").removeClass("player-serve");
						$("#genap2_player1").removeClass("player-serve");
						$("#ganjil1_player1").removeClass("player-serve");
						$("#ganjil2_player1").removeClass("player-serve");
						$("#genap1_player2").removeClass("player-serve");
						$("#genap2_player2").removeClass("player-serve");
						$("#ganjil1_player2").removeClass("player-serve");
						$("#ganjil2_player2").removeClass("player-serve");
						$("#genap1_player2").addClass("player-serve");
						$("#genap2_player2").addClass("player-serve");
						if (type_name=="Singles") {
							$('#player1_name2').empty();
							$('#player2_name2').empty();
							$('#player1_name1').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player1_name1');
							$('#player2_name1').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player2_name1');
						}
					<?php } else{ ?>
						$("#genap1_player1").removeClass("player-serve");
						$("#genap2_player1").removeClass("player-serve");
						$("#ganjil1_player1").removeClass("player-serve");
						$("#ganjil2_player1").removeClass("player-serve");
						$("#genap1_player2").removeClass("player-serve");
						$("#genap2_player2").removeClass("player-serve");
						$("#ganjil1_player2").removeClass("player-serve");
						$("#ganjil2_player2").removeClass("player-serve");
						$("#genap1_player2").addClass("player-serve");
						$("#genap2_player2").addClass("player-serve");
						if (type_name=="Singles") {
							$('#player2_name1').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player2_name1');
							$('#player1_name1').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player1_name1');
							$('#player2_name2').empty();
							$('#player1_name2').empty();
						}
					<?php } ?>
				}else{
					<?php if($this->session->userdata('reverse')=='yes'){ ?>
						$("#genap1_player1").removeClass("player-serve");
						$("#genap2_player1").removeClass("player-serve");
						$("#ganjil1_player1").removeClass("player-serve");
						$("#ganjil2_player1").removeClass("player-serve");
						$("#genap1_player2").removeClass("player-serve");
						$("#genap2_player2").removeClass("player-serve");
						$("#ganjil1_player2").removeClass("player-serve");
						$("#ganjil2_player2").removeClass("player-serve");
						$("#ganjil1_player2").addClass("player-serve");
						$("#ganjil2_player2").addClass("player-serve");
						if (type_name=="Singles") {
							$('#player1_name1').empty();
							$('#player2_name1').empty();
							$('#player1_name2').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player1_name1');
							$('#player2_name2').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player2_name1');
						}
					<?php } else{ ?>
						$("#genap1_player1").removeClass("player-serve");
						$("#genap2_player1").removeClass("player-serve");
						$("#ganjil1_player1").removeClass("player-serve");
						$("#ganjil2_player1").removeClass("player-serve");
						$("#genap1_player2").removeClass("player-serve");
						$("#genap2_player2").removeClass("player-serve");
						$("#ganjil1_player2").removeClass("player-serve");
						$("#ganjil2_player2").removeClass("player-serve");
						$("#ganjil1_player2").addClass("player-serve");
						$("#ganjil2_player2").addClass("player-serve");
						if (type_name=="Singles") {
							$('#player2_name1').empty();
							$('#player1_name1').empty();
							$('#player2_name2').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player2_name1');
							$('#player1_name2').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player1_name1');
						}
					<?php } ?>
				}

				if (type_name=="Doubles") {
					<?php if($this->session->userdata('reverse')=='yes'){ ?>
					if (clicked=="team2") {
						if (player2_name1 == $('#player_name1_team2').val()) {
							$.post("<?php echo site_url();?>umpire/reverse_stage_team_2");
							$('#player2_name1').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player2_name2');
							$('#player2_name2').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player2_name1');
						}else if (player2_name1 != $('#player_name1_team2').val()){
							$.post("<?php echo site_url();?>umpire/reverse_stage_team_2");
							$('#player2_name1').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player2_name1');
							$('#player2_name2').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player2_name2');
						}
					}
					<?php } else{ ?>
					if (clicked=="team2") {
						if (player2_name1 == $('#player_name1_team2').val()) {
							$.post("<?php echo site_url();?>umpire/reverse_stage_team_2");
							$('#player2_name1').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player2_name2');
							$('#player2_name2').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player2_name1');
						}else if (player2_name1 != $('#player_name1_team2').val()){
							$.post("<?php echo site_url();?>umpire/reverse_stage_team_2");
							$('#player2_name1').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player2_name1');
							$('#player2_name2').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/player2_name2');
						}
					}
					<?php } ?>
				}
				$("#css_score_team_2").removeClass("score");
				$("#css_score_team_2").removeClass("score-serve");
				$("#css_score_team_2").addClass("score-serve");
				$("#css_score_team_1").removeClass("score");
				$("#css_score_team_1").removeClass("score-serve");
				$("#css_score_team_1").addClass("score");
				$("#undo_2").attr("disabled", false);
			});
			
			$('#shuttlecock_add').click(function(){
				var shuttlecock = parseInt($('#shuttlecock_value').val());
				var shuttlecock = shuttlecock + 1;
				$.post("<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/add_shuttlecock",{ shuttlecock : shuttlecock });
				setTimeout(function(){ 
					$('#shuttlecock').load('<?php echo site_url();?>umpire/<?php echo $this->uri->segment(2);?>/shuttlecock',function(data){
						var data = parseInt(data);
						$('#shuttlecock_value').val(data);
					});
				}, 500);
			});
		});
	</script>
</body>
</html>