<!DOCTYPE html>
<html>
<head>
	<title>Match Control</title>
	<meta charset="utf-8"> 
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/select2.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/formValidation.min.css"/>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/mc-custom.css">
	<script src="<?php echo base_url();?>assets/js/jquery-2.2.0.js"></script>
	<script src="<?php echo base_url();?>assets/js/select2.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/formValidation.min.js"></script>
  	<script src="<?php echo base_url();?>assets/js/framework/bootstrap.js"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="hidden-xs col-sm-1">
			</div>
			<div class="col-xs-6 col-sm-5">
				<button class="btn btn-lg btn-primary tombol-awal" data-toggle="modal" data-target="#modal_add_new_court">+ ADD NEW GAME</button>
			</div>
			<div class="col-xs-6 col-sm-5">
				<button class="btn btn-lg btn-warning tombol-awal" data-toggle="modal" data-target="#modal_choose_game">CHOOSE COURT</button>
			</div>
			<div class="hidden-xs col-sm-1">
			</div>
		</div>
		<div class="modal" id="modal_add_new_court">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button class="close" data-dismiss="modal">
						&times
						</button>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" id="form_add_new_court" method="POST" role="form" action="<?php echo site_url()?>match_control/add_new_game">
						<div class="row">
							<div class="col-xs-12 col-sm-6" style="border-right: 2px solid #eAA;">
								<h4>Add New Court</h4>
						  		<div class="form-group">
						     		<div class="col-xs-12">   
						      			<input type="number" id="court_number" name="court_number" min="1" placeholder="Court Number" class="form-control input-lg">
						     		</div>
						    	</div>
						    	<div class="form-group">
						    		<div class="col-xs-12">   
						      			<input type="text" id="umpire_name" name="umpire_name" placeholder="Umpire Name" class="form-control input-lg">
						     		</div>
						    	</div>
						    	<div class="form-group">
						     		<div class="col-xs-12">   
						      			<select id="type_id" name="type_id" class="form-control input-lg">
					      					<option value="" disabled="disable" selected>Choose Type</option>
					      					<?php 
											foreach ($type->result() as $row) { ?>
												<option value="<?php echo $row->type_id;?>"><?php echo $row->type_name;?></option>
											<?php } ?>
					      				</select>
						     		</div>
						    	</div>
						    	<div class="form-group">
						     		<div class="col-xs-12">   
						      			<select id="class_id" name="class_id" class="form-control input-lg">
					      					<option value="" disabled="disable" selected>Choose Class</option>
					      				</select>
						     		</div>
						    	</div>
						    	<div class="form-group">
						     		<div class="col-xs-12">   
						      			<select id="subclass_id" name="subclass_id" class="form-control input-lg">
					      					<option value="" disabled="disable" selected>Choose Subclass</option>
					      					<?php 
											foreach ($subclass->result() as $row) { ?>
												<option value="<?php echo $row->subclass_id;?>"><?php echo $row->subclass_name;?></option>
											<?php } ?>
					      				</select>
						     		</div>
						    	</div>
						    	<div class="form-group">
						     		<div class="col-xs-12">   
						      			<input type="number" id="shuttlecock" name="shuttlecock" min="1" placeholder="ShuttleCock" class="form-control input-lg">
						     		</div>
						    	</div>
							    	
							</div>
							<div class="col-xs-12 col-sm-6">
								<div class="form-group">
									<div class="col-sm-3 col-xs-3">
										<h4>TEAM 1</h4>
									</div>
						     		<div class="col-sm-9 col-xs-9">   
						      			<select id="country_id_1" name="country_id_1" class="form-control input-lg js-example-templating" style="width:100%;">
					      					<option value="" disabled="disable" selected>Choose Country</option>
					      					<?php 
											foreach ($country->result() as $row) { ?>
												<option value="<?php echo $row->country_id;?>"><?php echo $row->country_name;?></option>
											<?php } ?>
					      				</select>
						     		</div>
						    	</div>
						    	<div class="form-group">
						    		<div class="col-xs-12">   
						      			<input type="text" id="player1_name1" name="player1_name1" placeholder="Player 1 Name" class="form-control input-lg">
						     		</div>
						    	</div>
						    	<div class="form-group">
						    		<div class="col-xs-12">   
						      			<input type="text" id="player1_name2" name="player1_name2" placeholder="Player 2 Name" class="form-control input-lg">
						     		</div>
						    	</div>
						    	<div class="row">
						    		<div class="col-xs-5"><hr style="border:1px solid black;" /></div>
						    		<div class="col-xs-2"><center><b><h4>VS</h4></b></center></div>
						    		<div class="col-xs-5"><hr style="border:1px solid black;"/></div>
						    	</div>
						    	<div class="form-group">
									<div class="col-sm-3 col-xs-3">
										<h4>TEAM 2</h4>
									</div>
						     		<div class="col-sm-9 col-xs-9">   
						      			<select id="country_id_2" name="country_id_2" class="form-control input-lg js-example-templating" style="width:100%;">
					      					<option value="" disabled="disable" selected>Choose Country</option>
					      					<?php 
											foreach ($country->result() as $row) { ?>
												<option value="<?php echo $row->country_id;?>"><?php echo $row->country_name;?></option>
											<?php } ?>
					      				</select>
						     		</div>
						    	</div>
						    	<div class="form-group">
						    		<div class="col-xs-12">   
						      			<input type="text" id="player2_name1" name="player2_name1" placeholder="Player 1 Name" class="form-control input-lg">
						     		</div>
						    	</div>
						    	<div class="form-group">
						    		<div class="col-xs-12">   
						      			<input type="text" id="player2_name2" name="player2_name2" placeholder="Player 2 Name" class="form-control input-lg">
						     		</div>
						    	</div>
							</div>
						</div>
						
						<div class="row">
								<div class="modal-footer">
									<div class="row">
										<div class="col-xs-9 pull-left">
										</div>
										<div class="col-xs-3">
											<input style="font-weight:bold;width:100%;" type="submit" class="btn btn-primary" value="ADD" >
										</div>
									</div>
								</div>
							</div>
					  	</form>
					</div>
				</div>
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
						<form class="form-horizontal" id="form_choose_court" method="POST" role="form" action="<?php echo site_url()?>match_control/choose_game">
					    	<div class="form-group">
					     		<div class="col-xs-12">   
					      			<select id="choose_court" name="choose_court" class="form-control input-lg" onchange="this.form.submit()">
				      					<option value="" disabled="disable" selected>Choose Court</option>
				      					<?php 
										foreach ($court->result() as $row) { ?>
											<option value="<?php echo $row->court_id;?>">Court <?php echo $row->court_number;?></option>
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
			$('#class_id').val('');
			$('#class_id').attr('disabled',true);
			$('#player1_name2').hide();
			$('#player2_name2').hide();
			$("#court_number").keypress(function(){
				$('#umpire_name').show();
			});
			$("#type_id").change(function(){
				$.post("<?php echo site_url();?>match_control/get_class",{ type : $('#type_id').val() },function(obj){
					$('#class_id').html(obj);
				});
				$('#class_id').attr('disabled',false);
				if ($("#type_id").val()=='2') {
					$('#player1_name2').show();
					$('#player2_name2').show();
				}else{
					$('#player1_name2').hide();
					$('#player2_name2').hide();
				}
			});

			function formatState (state) {
			  if (!state.id) { return state.text; }
			  var $state = $(
			    '<span><img width="20px" src="assets/img/flags/' + state.text.toLowerCase() + '.png" class="img-flag" /> ' + state.text + '</span>'
			  );
			  return $state;
			};

			$(".js-example-templating").select2({
			  templateResult: formatState
			});

			$('#form_add_new_court').formValidation({
		        message: 'Select another court.',
		        icon: {
		            valid: 'glyphicon glyphicon-ok',
		            invalid: 'glyphicon glyphicon-remove',
		            validating: 'glyphicon glyphicon-refresh'
		        },
		        fields: {
		            court_number: {
		                validators: {
		                    notEmpty: {
								message: 'Court Number must be filled.'
							},
							remote: {
		                        url: '<?php echo site_url();?>match_control/court_number_check',
		                        type: 'POST'
		                    }
		                }
		            },
		            umpire_name: {
		                validators: {
		                    notEmpty: {
								message: 'Umpire Name must be filled.'
							},
							stringLength: {
		                        min: 1,
		                        max: 50,
								message: 'Umpire Name is too long, maximum 50 characters.',
		                    },
							regexp: {
		                        regexp: /^[a-zA-Z .]+$/,
								message: 'Umpire Name shouldnt have special characters or number. '
		                    }
		                }
		            },
					type_id: {
		                validators: {
		                    notEmpty: {
								message: 'Type must be filled.'
							}
		                }
		            },
					class_id: {
		                validators: {
		                    notEmpty: {
								message: 'Class must be filled.'
							}
		                }
		            },
					subclass_id: {
		                validators: {
		                    notEmpty: {
								message: 'Subclass must be filled.'
							}
		                }
		            },
					shuttlecock: {
		                validators: {
		                    notEmpty: {
								message: 'ShuttleCock must be filled.'
							}
		                }
		            },
					country_id_1: {
		                validators: {
		                    notEmpty: {
								message: 'Country must be filled.'
							}
		                }
		            },
					player1_name1: {
		                validators: {
		                    notEmpty: {
								message: 'Player name must be filled.'
							},
							stringLength: {
		                        min: 1,
		                        max: 50,
								message: 'Player name is too long, maximum 50 characters.',
		                    },
							regexp: {
		                        regexp: /^[a-zA-Z .]+$/,
								message: 'Player Name shouldnt have special characters or number. '
		                    }
		                }
		            },
					player1_name2: {
		                validators: {
		                    notEmpty: {
								message: 'Player name must be filled.'
							},
							stringLength: {
		                        min: 1,
		                        max: 50,
								message: 'Player name is too long, maximum 50 characters.',
		                    },
							regexp: {
		                        regexp: /^[a-zA-Z .]+$/,
								message: 'Player Name shouldnt have special characters or number. '
		                    }
		                }
		            },
					country_id_2: {
		                validators: {
		                    notEmpty: {
								message: 'Country must be filled.'
							}
		                }
		            },
					player2_name1: {
		                validators: {
		                    notEmpty: {
								message: 'Player name must be filled.'
							},
							stringLength: {
		                        min: 1,
		                        max: 50,
								message: 'Player name is too long, maximum 50 characters.',
		                    },
							regexp: {
		                        regexp: /^[a-zA-Z .]+$/,
								message: 'Player Name shouldnt have special characters or number. '
		                    }
		                }
		            },
					player2_name2: {
		                validators: {
		                    notEmpty: {
								message: 'Player name must be filled.'
							},
							stringLength: {
		                        min: 1,
		                        max: 50,
								message: 'Player name is too long, maximum 50 characters.',
		                    },
							regexp: {
		                        regexp: /^[a-zA-Z .]+$/,
								message: 'Player Name shouldnt have special characters or number. '
		                    }
		                }
		            }
		        }
		    });
		});
	</script>
</body>
</html>