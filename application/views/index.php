<HTML>
	<HEAD>
		
		<!-- JQUERY -->
		<script type="text/javascript" language="javascript" src="assets/media/js/jquery.js"></script>
		
		<!-- BOOTSTRAP -->
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
		
		<!-- Optional theme -->
		<link rel="stylesheet" href="assets/bootstrap/css/bootstrap-theme.min.css">
		
		<!-- Latest compiled and minified JavaScript -->
		<script src="assets/bootstrap/js/bootstrap.min.js"></script>
		
		<!-- DataTables -->
		<link rel="stylesheet" type="text/css" href="assets/media/css/dataTables.bootstrap.css">
		<link rel="stylesheet" type="text/css" href="assets/media/css/dataTables.responsive.css">
		<script type="text/javascript" language="javascript" src="assets/media/js/jquery.dataTables.js"></script>
		<script type="text/javascript" language="javascript" src="assets/media/js/dataTables.responsive.js"></script>
		<script type="text/javascript" language="javascript" src="assets/media/js/dataTables.bootstrap.js"></script>
		<script type="text/javascript" language="javascript" src="assets/media/js/common.js"></script>
		<script type="text/javascript" language="javascript" >
			
			var dTable;
			// #Example adalah id pada table
			$(document).ready(function() {
				dTable = $('#example').DataTable( {
					"bProcessing": true,
					"bServerSide": true,
					"bJQueryUI": false,
					"responsive": true,
					"sAjaxSource": "serverSide.php", // Load Data
					"sServerMethod": "POST",
					"columnDefs": [
					{ "orderable": false, "targets": 0, "searchable": false },
					{ "orderable": true, "targets": 1, "searchable": true },
					{ "orderable": true, "targets": 2, "searchable": true },
					{ "orderable": true, "targets": 3, "searchable": true },
					{ "orderable": true, "targets": 4, "searchable": true }
					]
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
	</HEAD>
	<BODY>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<button onClick="showModals()" class="btn btn-primary">Tambah Data</button>
					<br>
					<hr>
					<br>
					<table id="example"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
						<thead>
							<tr>
								<th>Action</th>
								<th>Userid</th>
								<th>Real Name</th>
								<th>NPM</th>
								<th>KELAS</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
						<tfoot>
							<th>Action</th>
							<th>Userid</th>
							<th>Real Name</th>
							<th>NPM</th>
							<th>KELAS</th>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
		
		<!-- Modal Popup -->
		<div class="modal fade" id="myModals" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Add User</h4>
					</div>
					<div class="modal-body">
						
						<div class="alert alert-danger" role="alert" id="removeWarning">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Anda yakin ingin menghapus user ini
						</div>
						<br>
						<form class="form-horizontal" id="formUser">
							
							<input type="hidden" class="form-control" id="id" name="id">
							<input type="hidden" class="form-control" id="userid" name="userid">
							<input type="hidden" class="form-control" id="type" name="type">
							
							<div class="form-group">
								<label for="real_name" class="col-sm-2 control-label">Nama User</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="real_name" name="real_name" >
								</div>
							</div>
							<div class="form-group">
								<label for="npm" class="col-sm-2 control-label">NPM</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="npm" name="npm" >
								</div>
							</div>
							<div class="form-group">
								<label for="kelas" class="col-sm-2 control-label">Kelas</label>
								<div class="col-sm-10">
									<textarea type="text" class="form-control" id="kelas" name="kelas" ></textarea>
								</div>
							</div>
						</form>
						
					</div>
					<div class="modal-footer">
						<button type="button" onClick="submitUser()" class="btn btn-default" data-dismiss="modal">Submit</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		
		<script>
		
		    //Tampilkan Modal 
			function showModals( id )
			{
				waitingDialog.show();
				clearModals();
				
				// Untuk Eksekusi Data Yang Ingin di Edit atau Di Hapus 
				if( id )
				{
					$.ajax({
						type: "POST",
						url: "crud.php",
						dataType: 'json',
						data: {id:id,type:"get"},
						success: function(res) {
							waitingDialog.hide();
							setModalData( res );
						}
					});
				}
				// Untuk Tambahkan Data
				else
				{
					$("#myModals").modal("show");
					$("#myModalLabel").html("New User");
					$("#type").val("new"); 
					waitingDialog.hide();
				}
			}
			
			//Data Yang Ingin Di Tampilkan Pada Modal Ketika Di Edit 
			function setModalData( data )
			{
				$("#myModalLabel").html(data.real_name);
				$("#id").val(data.id);
				$("#type").val("edit");
				$("#userid").val(data.userid);
				$("#real_name").val(data.real_name);
				$("#npm").val(data.npm);
				$("#kelas").val(data.kelas);
				$("#myModals").modal("show");
			}
			
			//Submit Untuk Eksekusi Tambah/Edit/Hapus Data 
			function submitUser()
			{
				var formData = $("#formUser").serialize();
				waitingDialog.show();
				$.ajax({
					type: "POST",
					url: "crud.php",
					dataType: 'json',
					data: formData,
					success: function(data) {
						dTable.ajax.reload(); // Untuk Reload Tables secara otomatis
						waitingDialog.hide();	
					}
				});
			}
			
			//Hapus Data
			function deleteUser( id )
			{
				clearModals();
				$.ajax({
					type: "POST",
					url: "crud.php",
					dataType: 'json',
					data: {id:id,type:"get"},
					success: function(data) {
						$("#removeWarning").show();
						$("#myModalLabel").html("Delete User");
						$("#id").val(data.id);
						$("#userid").val(data.userid);
						$("#type").val("delete");
						$("#real_name").val(data.real_name).attr("disabled","true");
						$("#npm").val(data.npm).attr("disabled","true");
						$("#kelas").val(data.kelas).attr("disabled","true");
						$("#myModals").modal("show");
						waitingDialog.hide();			
					}
				});
			}
			
			//Clear Modal atau menutup modal supaya tidak terjadi duplikat modal
			function clearModals()
			{
				$("#removeWarning").hide();
				$("#id").val("").removeAttr( "disabled" );
				$("#userid").val("").removeAttr( "disabled" );
				$("#real_name").val("").removeAttr( "disabled" );
				$("#npm").val("").removeAttr( "disabled" );
				$("#type").val("");
				$("#kelas").val("").removeAttr( "disabled" );
			}
			
		</script>
		
	</BODY>
</HTML>