<!DOCTYPE html>
<html>
<head>
	<title>Match Control</title>
	<meta charset="utf-8"> 
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/select2.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/formValidation.min.css"/>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/mc-custom.css">
	<script src="<?php echo base_url();?>assets/js/jquery-2.2.0.js"></script>
	<script src="<?php echo base_url();?>assets/js/select2.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/formValidation.min.js"></script>
  	<script src="<?php echo base_url();?>assets/js/framework/bootstrap.js"></script>
	
	<!-- DataTables -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/datatables/media/css/dataTables.bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/datatables/media/css/dataTables.responsive.css">
	<script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/datatables/media/js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/datatables/media/js/dataTables.responsive.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/datatables/media/js/dataTables.bootstrap.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/datatables/media/js/common.js"></script><script type="text/javascript">
		$(document).ready(function(){

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

			$('#form_create_game').formValidation({
		        message: 'Select another play.',
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
							}
		                }
		            },
		            order_of_play: {
		                validators: {
		                    notEmpty: {
								message: 'Main ke must be filled.'
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
					club_name1: {
		                validators: {
		                    notEmpty: {
								message: 'Club name must be filled.'
							},
							stringLength: {
		                        min: 1,
		                        max: 50,
								message: 'Club name is too long, maximum 50 characters.',
		                    }
		                }
		            },
					club_name2: {
		                validators: {
		                    notEmpty: {
								message: 'Club name must be filled.'
							},
							stringLength: {
		                        min: 1,
		                        max: 50,
								message: 'Club name is too long, maximum 50 characters.',
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
	<script type="text/javascript" language="javascript" >
		
		var dTable;
		// #Example adalah id pada table
		$(document).ready(function() {
		$('#example').DataTable( {
				
			} );
			
			$('#example').removeClass( 'display' ).addClass('table table-striped table-bordered');
			$('#example tfoot th').each( function () {
				
				//Agar kolom Action Tidak Ada Tombol Pencarian
				if( $(this).text() != "Action" ){
					var title = $('#example thead th').eq( $(this).index() ).text();
					$(this).html( '<input type="text" placeholder="Search '+title+'" class="form-control" />' );
				}
			} );
			
			// Untuk Pencarian, di kolom paling bawah
			dTable.columns().every( function () {
				var that = this;
				
				$( 'input', this.footer() ).on( 'keyup change', function () {
					that
					.search( this.value )
					.draw();
				} );
			} );
		} );
		
		
	</script>
</head>
<body>
	<?php 
	
	function getField($select,$field,$where,$tabel){
    $ci = &get_instance();
    $sql = $ci->db->where($where,$field)->get($tabel)->result();
    foreach($sql as $row){
        return $row->$select;
    }
}

	if ($this->session->flashdata('message')) { ?>
		<div class='alert alert-warning'><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a><?php echo $this->session->flashdata('message'); ?></div>
	<?php	} ?>
	<center><h3>CREATE DOUBLES GAME</h3></center>
	<div id="modal_edit" class="modal fade" style="font-weight: normal;">
    <div class="modal-dialog">
          <div class="modal-content">

          </div>
    </div>
</div>
	<div class="container-fluid" style="overflow:auto;">
		<form class="form-inline" id="form_create_game" method="POST" role="form" action="<?php echo site_url()?>match_control/create_game_doubles" style="width: 3400px;padding:10px;">
			<div class="row">
		    	<div class="form-group">  
      				<input type="text" id="player1_name1" name="player1_name1" placeholder="Player 1a Name" class="form-control">
		    	</div>
				<div class="form-group">  
      				<input type="text" id="club_name1" name="club_name1" placeholder="Player 1a Club Name" class="form-control">
		    	</div>
		    	<div class="form-group">
	      			<input type="text" id="player1_name2" name="player1_name2" placeholder="Player 1b Name" class="form-control">
		    	</div>
				<div class="form-group">  
      				<input type="text" id="club_name2" name="club_name2" placeholder="Player 1b Club Name" class="form-control">
		    	</div>
		    	
				<div class="form-group">  
	      			<select id="country_id_1" name="country_id_1" class="form-control js-example-templating" style="width:100%;">
      					<option value="" disabled="disable" selected>Choose Country</option>
      					<?php 
						foreach ($country->result() as $row) { ?>
							<option value="<?php echo $row->country_id;?>"><?php echo $row->country_name;?></option>
						<?php } ?>
      				</select>
		     	</div>
		     	<div class="form-group">  
	      			<p style="font-size:20px;">VS</p>
		     	</div>
		    	<div class="form-group">
	      			<input type="text" id="player2_name1" name="player2_name1" placeholder="Player 2a Name" class="form-control">
		    	</div>
				<div class="form-group">  
      				<input type="text" id="club_name3" name="club_name3" placeholder="Player 2a Club Name" class="form-control">
		    	</div>
		    	<div class="form-group"> 
	      			<input type="text" id="player2_name2" name="player2_name2" placeholder="Player 2b Name" class="form-control">
		    	</div>
				<div class="form-group">  
      				<input type="text" id="club_name4" name="club_name4" placeholder="Player 2b Club Name" class="form-control">
		    	</div>
		    	<div class="form-group">
	      			<select id="country_id_2" name="country_id_2" class="form-control js-example-templating" style="width:100%;">
      					<option value="" disabled="disable" selected>Choose Country</option>
      					<?php 
						foreach ($country->result() as $row) { ?>
							<option value="<?php echo $row->country_id;?>"><?php echo $row->country_name;?></option>
						<?php } ?>
      				</select>
		    	</div>
		    	<div class="form-group"> 
	      			<input type="text" id="umpire_name" name="umpire_name" placeholder="Umpire Name" class="form-control">
		    	</div>
		    	<div class="form-group">
		     		<select id="class_id" name="class_id" class="form-control">
	      				<option value="" disabled="disable" selected>Choose Class</option>
	      					<?php 
						foreach ($class->result() as $row) { ?>
							<option value="<?php echo $row->class_id;?>"><?php echo $row->class_name;?></option>
						<?php } ?>
	      			</select>
		    	</div>
		    	<div class="form-group"> 
	      			<select id="subclass_id" name="subclass_id" class="form-control">
      					<option value="" disabled="disable" selected>Choose Subclass</option>
      					<?php 
						foreach ($subclass->result() as $row) { ?>
							<option value="<?php echo $row->subclass_id;?>"><?php echo $row->subclass_name;?></option>
						<?php } ?>
      				</select>
		    	</div>
		    	<div class="form-group"> 
	      			<input type="number" min="1" id="order_of_play" name="order_of_play" placeholder="Main ke" class="form-control">
		    	</div>
		    	<div class="form-group">
	      			<input type="number" id="shuttlecock" name="shuttlecock" min="1" placeholder="ShuttleCock" class="form-control">
		    	</div>
		    	
		    	<div class="form-group">
		     		<input style="font-weight:bold;width:100%;" type="submit" class="btn btn-primary" value="Submit" >
		    	</div>
			</div>
	  	</form>	
		
	</div>
	<div class="container-fluid" style="overflow: auto;">
	
		<div class="row">
			<div class="col-md-12">
				<table id="example"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
					<thead>
						<tr>
							<th>No</th>
							<th>Player 1a Name</th>
							<th>Player 1b Name</th>
							<th>Club Name 1</th>
							<th>Club Name 1</th>
							<th>Country Player 1</th>
							<th>Player 2a Name</th>
							<th>Player 2b Name</th>
							<th>Club Name 2</th>
							<th>Club Name 2</th>
							<th>Country Player 2</th>
							<th>Umpire</th>
							<th>Subclass</th>
							<th>Shuttle Cock</th>
							<th>Main Ke</th>
							<th>Status</th>
							<th>Court</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php $no = 1; foreach($list as $row){  ?>
                                <tr>
                                    <td><?=$no;?></td>
                                    <td><?=$row->player_name_3;?></td>
									<td><?=$row->player_name_4;?></td>
                                    <td><?=$row->club_name_doubles_1;?></td>
									<td><?=$row->club_name_doubles_2;?></td>
                                    <td><?= getField('country_name',$row->country_id1,'country_id','tbl_country') ?></td>
                                    <td><?=$row->player_name_1;?></td>
									<td><?=$row->player_name_2;?></td>
                                    <td><?=$row->club_name_doubles_3;?></td>
									<td><?=$row->club_name_doubles_4;?></td>
                                    <td><?= getField('country_name',$row->country_id2,'country_id','tbl_country') ?></td>
                                    <td><?=$row->umpire_name;?></td>
                                    <th><?= getField('subclass_name',$row->subclass_id,'subclass_id','tbl_subclass')?></th>
									<th><?=$row->shuttle_cock;?></th>
                                    <th><?=$row->order_of_play;?></th>
                                    <td><?php if($row->status=='0') {?>
									
									Belum Main
									<?php } if($row->status=='2'){ ?>
									Done
									<?php } if($row->status=='1'){?>
									Play
									<?php }?>
									</td>
									<th><?=$row->court_number;?></th>
                                    <td>
									
									<?php 
									
									//$a=1;
									$a= getField('status',$row->court_id,'court_id','tbl_court'); 
									$b = $this->db->where('court_id',$row->court_id)->from('tbl_court')->get()->row();
									$s = $b->status;
									//print_r($s);die;
									if($s==0){?>
		
									<a href='#modal_edit' class='modalButton' style='color:#000;' data-court-id=<?php echo $row->court_id?> data-status='1'  data-toggle='modal' data-target='#modal_edit' data-popup='tooltip' title='Edit' data-container='body'>
											<span class="label label-success">Play Game</span>
										</a>
									<?php } else if($s==1){ ?>
										 <span class="label label-warning">Sedang Main</span>
									
									<?php} else {?>
									 <span class="label label-succes">Done</span>
									<?php }?>
								</td>
                                </tr>
                                <?php $no++;  } ?>
					</tbody>
					<!--<tfoot>
						<th>No</th>
						<th>Player 1 Name</th>
						<th>Country Player 1</th>
						<th>Player 2 Name</th>
						<th>Country Player 2</th>
						<th>Umpire</th>
						<th>Subclass</th>
						<th>Shuttle Cock</th>
						<th>Main Ke</th>
						<th>Status</th>
						<th>Action</th>
					</tfoot>-->
				</table>
			</div>
		</div>
	</div>
	<script>
    $('.modalButton').click(function(){
        var court_id = $(this).attr('data-court-id');
		var status = $(this).attr('data-status');
        $.ajax({url:"<?php echo site_url();?>ajax_modal_edit.php?court_id="+court_id+"&status="+status,cache:false,success:function(result){
            $(".modal-content").html(result);
        }});
    });
</script>
	
	
	<script type="text/javascript">
		$(document).ready(function(){

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

			$('#form_create_game').formValidation({
		        message: 'Select another play.',
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
							}
		                }
		            },
		            order_of_play: {
		                validators: {
		                    notEmpty: {
								message: 'Main ke must be filled.'
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