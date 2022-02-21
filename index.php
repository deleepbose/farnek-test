<?php 

include('inc/header.php');
include('inc/container.php');

include_once 'config/Database.php';
include_once 'class/Records.php';
?>

<div class="container contact" style="min-height:500px;">
	<div class="section-title text-center">
		<h1>Dynamic Listing</h1>	
        <p class="lead">Add, Edit, Delete and List using datatables with server side pagination using PHP & MYSQL. <br>Generate each record's PDF using TCPDF Library</p>
    </div>
			
	<div class="col-lg-12 col-md-12 col-sm-9 col-xs-12">   		
		<div class="panel-heading">
			<div class="row">
				<div class="col-md-10">
					<h3 class="panel-title"></h3>
				</div>
				<div class="col-md-2" align="right">
					<button type="button" name="add" id="addRecord" class="btn btn-success">Add New Record</button>
				</div>
			</div>
		</div>
		<table id="recordListing" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>					
					<th>Age</th>					
					<th>Email</th>
					<th>Phone</th>
					<th>Designation</th>					
					<th></th>
					<th></th>
					<th></th>					
				</tr>
			</thead>
		</table>
	</div>
	<div id="viewRecordModal" class="modal fade">
    	<div class="modal-dialog">
    			<div class="modal-content">
    				<div class="modal-header">
    					<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><i class="fa fa-plus"></i> View Record</h4>
    				</div>
    				<div class="modal-body">
						<div class="form-group">
							<label for="viewID" class="control-label">ID</label>
							<span id="viewID"></span>			
						</div>
						<div class="form-group">
							<label for="viewName" class="control-label">Name</label>
							<span id="viewName"></span>			
						</div>
						<div class="form-group">
							<label for="viewAge" class="control-label">Age</label>							
							<span id="viewAge"></span>				
						</div>	   	
						<div class="form-group">
							<label for="viewEmail" class="control-label">Email</label>							
							<span id="viewEmail"></span>							
						</div>
						<div class="form-group">
							<label for="viewPhone" class="control-label">Phone</label>							
							<span id="viewPhone"></span>
						</div>	 
						<div class="form-group">
							<label for="viewDesignation" class="control-label">Designation</label>							
							<span id="viewDesignation"></span>			
						</div>						
    				</div>
    				<div class="modal-footer">
						<button type="button" class="btn btn-primary exportPDF" id="exportPDF" data-elemID="">Export PDF</button>
    					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    				</div>
    			</div>
    	</div>
    </div>
	
	<div id="recordModal" class="modal fade">
    	<div class="modal-dialog">
    		<form method="post" id="recordForm">
    			<div class="modal-content">
    				<div class="modal-header">
    					<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><i class="fa fa-plus"></i> Edit Record</h4>
    				</div>
    				<div class="modal-body">
						<div class="form-group"
							<label for="name" class="control-label">Name</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="Name" maxlength="100" required>			
						</div>
						<div class="form-group">
							<label for="age" class="control-label">Age</label>							
							<input type="number" class="form-control" id="age" name="age" placeholder="Age" maxlength="2">							
						</div>	   	
						<div class="form-group">
							<label for="email" class="control-label">Email</label>							
							<input type="email" class="form-control" id="email" name="email" placeholder="Email" maxlength="100" required>	
						</div>
						<div class="form-group">
							<label for="lastname" class="control-label">Phone</label>							
							<input type="text" class="form-control"  id="phone" name="phone" placeholder="Phone" maxlength="50" required>							
						</div>	 
						<div class="form-group">
							<label for="lastname" class="control-label">Designation</label>							
							<select class="form-control" id="designation" name="designation" required>
								<option value="">Designation</option>
								
<?php							$database = new Database();
								$db = $database->getConnection();
								$record = new Records($db);

								$jobs = json_decode($record->getJobRecords());
								
								foreach($jobs as $job)
								{
?>									<option value="<?php echo $job->job_id; ?>"><?php echo $job->job_title; ?></option>
<?php							}
?>								
							</select>							
						</div>						
    				</div>
    				<div class="modal-footer">
    					<input type="hidden" name="id" id="id" />
    					<input type="hidden" name="action" id="action" value="" />
    					<input type="submit" name="save" id="save" class="btn btn-info" value="Save" />
    					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    				</div>
    			</div>
    		</form>
    	</div>
    </div>
	
</div>	
<br/>
<?php include('inc/footer.php');?>