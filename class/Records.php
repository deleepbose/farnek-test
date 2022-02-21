<?php
class Records {	
   
	private $recordsTable = 'live_records';
	private $jobsTable = 'jobs';
	public $id;
    public $name;
    public $phone;
    public $email;
	public $designation;
	public $age;
	private $conn;
	
	public function __construct($db){
        $this->conn = $db;
    }	    
	
	public function listRecords(){
		
		$sqlQuery = "SELECT r.*, j.job_title as designation 
					 FROM ".$this->recordsTable." r
					 LEFT JOIN ".$this->jobsTable." j ON j.job_id = r.designation ";
		
		if(!empty($_POST["search"]["value"])){
			$sqlQuery .= 'where(id LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR name LIKE "%'.$_POST["search"]["value"].'%" ';			
			$sqlQuery .= ' OR designation LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR email LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR phone LIKE "%'.$_POST["search"]["value"].'%") ';			
		}
		
		if(!empty($_POST["order"])){
			$sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
		} else {
			$sqlQuery .= 'ORDER BY id DESC ';
		}
		
		if($_POST["length"] != -1){
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}
		
		$stmt = $this->conn->prepare($sqlQuery);
		$stmt->execute();
		$result = $stmt->get_result();	
		
		$stmtTotal = $this->conn->prepare("SELECT * FROM ".$this->recordsTable);
		$stmtTotal->execute();
		$allResult = $stmtTotal->get_result();
		$allRecords = $allResult->num_rows;
		
		$displayRecords = $result->num_rows;
		$records = array();		
		while ($record = $result->fetch_assoc()) { 				
			$rows = array();			
			$rows[] = $record['id'];
			$rows[] = ucfirst($record['name']);
			$rows[] = $record['age'];		
			$rows[] = $record['phone'];	
			$rows[] = $record['email'];
			$rows[] = $record['designation'];					
			$rows[] = '<button type="button" name="view" id="'.$record["id"].'" class="btn btn-primary btn-xs view">View Details</button>';
			$rows[] = '<button type="button" name="update" id="'.$record["id"].'" class="btn btn-warning btn-xs update">Update</button>';
			$rows[] = '<button type="button" name="delete" id="'.$record["id"].'" class="btn btn-danger btn-xs delete" >Delete</button>';
			$records[] = $rows;
		}
		
		$output = array(
			"draw"	=>	intval($_POST["draw"]),			
			"iTotalRecords"	=> 	$displayRecords,
			"iTotalDisplayRecords"	=>  $allRecords,
			"data"	=> 	$records
		);
		
		echo json_encode($output);
	}
	
	public function getRecord(){
		if($this->id) {
			$sqlQuery = "
				SELECT r.*, designation, j.job_title
				FROM ".$this->recordsTable." r
				LEFT JOIN ".$this->jobsTable." j ON j.job_id = r.designation 
				WHERE id = ?";			
			$stmt = $this->conn->prepare($sqlQuery);
			$stmt->bind_param("i", $this->id);	
			$stmt->execute();
			$result = $stmt->get_result();
			$record = $result->fetch_assoc();
			
			return json_encode($record);
		}
		
		return NULL;
	}
	public function updateRecord(){
		
		if($this->id) {			
			
			$stmt = $this->conn->prepare("
			UPDATE ".$this->recordsTable." 
			SET name= ?, age = ?, phone = ?, email = ?, designation = ?
			WHERE id = ?");
	 
			$this->id = htmlspecialchars(strip_tags($this->id));
			$this->name = htmlspecialchars(strip_tags($this->name));
			$this->age = htmlspecialchars(strip_tags($this->age));
			$this->phone = htmlspecialchars(strip_tags($this->phone));
			$this->email = htmlspecialchars(strip_tags($this->email));
			$this->designation = $this->designation;
			
			
			$stmt->bind_param("sisssi", $this->name, $this->age, $this->phone, $this->email, $this->designation, $this->id);
			
			if($stmt->execute()){
				return true;
			}
			
		}	
	}
	public function addRecord(){
		
		if($this->name) {

			$stmt = $this->conn->prepare("
			INSERT INTO ".$this->recordsTable."(`name`, `age`, `phone`, `email`, `designation`)
			VALUES(?,?,?,?,?)");
		
			$this->name = htmlspecialchars(strip_tags($this->name));
			$this->age = htmlspecialchars(strip_tags($this->age));
			$this->phone = htmlspecialchars(strip_tags($this->phone));
			$this->email = htmlspecialchars(strip_tags($this->email));
			$this->designation = $this->designation;
			
			
			$stmt->bind_param("sisss", $this->name, $this->age, $this->phone, $this->email, $this->designation);
			
			if($stmt->execute()){
				return true;
			}		
		}
	}
	
	public function deleteRecord(){
		if($this->id) {			

			$stmt = $this->conn->prepare("
				DELETE FROM ".$this->recordsTable." 
				WHERE id = ?");

			$this->id = htmlspecialchars(strip_tags($this->id));

			$stmt->bind_param("i", $this->id);

			if($stmt->execute()){
				return true;
			}
		}
	}
	
	public function getJobRecords(){
		
			$sqlQuery = "SELECT * FROM ".$this->jobsTable."";			
			
			$stmt = $this->conn->prepare($sqlQuery);
			$stmt->execute();
			$result = $stmt->get_result();	
			
			$records = array();		
			
			while ($record = $result->fetch_assoc()) { 				
				$records[] = array('job_id' => $record['job_id'], 'job_title' => $record['job_title']);
			}
			
			return json_encode($records);		
	}
}
?>