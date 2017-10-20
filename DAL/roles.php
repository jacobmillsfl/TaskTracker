<?php
/*
Author:			This code was generated by DALGen version 1.0.0.0 available at https://github.com/H0r53/DALGen 
Date:			10/18/2017
Description:	Creates the DAL class for  roles table and respective stored procedures

*/



class Roles {

	// This is for local purposes only! In hosted environments the db_settings.php file should be outside of the webroot, such as: include("/outside-webroot/db_settings.php");
	protected static function getDbSettings() { return "DAL/db_localsettings.php"; }

	/******************************************************************/
	// Properties
	/******************************************************************/

	protected $RoleID;
	protected $Role;
	protected $Description;


	/******************************************************************/
	// Constructors
	/******************************************************************/
	public function __construct() {
		$argv = func_get_args();
		switch( func_num_args() ) {
			case 0:
				self::__constructBase();
				break;
			case 1:
				self::__constructPK( $argv[0] );
				break;
			case 3:
				self::__constructFull( $argv[0], $argv[1], $argv[2] );
		}
	}


	public function __constructBase() {
		$this->RoleID = 0;
		$this->Role = "";
		$this->Description = "";
	}


	public function __constructPK($paramId) {
		$this->load($paramId);
	}


	public function __constructFull($paramRoleID,$paramRole,$paramDescription) {
		$this->RoleID = $paramRoleID;
		$this->Role = $paramRole;
		$this->Description = $paramDescription;
	}


	/******************************************************************/
	// Accessors / Mutators
	/******************************************************************/

	public function getRoleID(){
		return $this->RoleID;
	}
	public function setRoleID($value){
		$this->RoleID = $value;
	}
	public function getRole(){
		return $this->Role;
	}
	public function setRole($value){
		$this->Role = $value;
	}
	public function getDescription(){
		return $this->Description;
	}
	public function setDescription($value){
		$this->Description = $value;
	}


	/******************************************************************/
	// Public Methods
	/******************************************************************/


	public function load($paramId) {
		include(self::getDbSettings());
		$conn = new mysqli($servername, $username, $password, $dbname);
		$stmt = $conn->prepare('CALL usp_roles_Load(?)');
		$stmt->bind_param('i', $paramId);
		$stmt->execute();

		$result = $stmt->get_result();
		if (!$result) die($conn->error);

		while ($row = $result->fetch_assoc()) {
		 $this->setRoleID($row['RoleID']);
		 $this->setRole($row['Role']);
		 $this->setDescription($row['Description']);
		}
	}


	public function save() {
		if ($this->getRoleID() == 0)
			$this->insert();
		else
			$this->update();
	}

	/******************************************************************/
	// Private Methods
	/******************************************************************/



	private function insert() {
		include(self::getDbSettings());
		$conn = new mysqli($servername, $username, $password, $dbname);
		$stmt = $conn->prepare('CALL usp_roles_Add(?,?)');
		$arg1 = $this->getRole();
		$arg2 = $this->getDescription();
		$stmt->bind_param('ss',$arg1,$arg2);
		$stmt->execute();

		$result = $stmt->get_result();
		if (!$result) die($conn->error);
		while ($row = $result->fetch_assoc()) {
			// By default, the DALGen generated INSERT procedure returns the scope identity as id
			$this->load($row['id']);
		}
	}


	private function update() {
		include(self::getDbSettings());
		$conn = new mysqli($servername, $username, $password, $dbname);
		$stmt = $conn->prepare('CALL usp_roles_Update(?,?,?)');
		$arg1 = $this->getRoleID();
		$arg2 = $this->getRole();
		$arg3 = $this->getDescription();
		$stmt->bind_param('iss',$arg1,$arg2,$arg3);
		$stmt->execute();
	}

	private static function setNullValue($value){
		if ($value == "")
			return null;
		else
			return $value;
	}

	/******************************************************************/
	// Static Methods
	/******************************************************************/



	public static function loadall() {
		include(self::getDbSettings());
		$conn = new mysqli($servername, $username, $password, $dbname);
		$stmt = $conn->prepare('CALL usp_roles_LoadAll()');
		$stmt->execute();

		$result = $stmt->get_result();
		if (!$result) die($conn->error);
		if ($result->num_rows > 0) {
			$arr = array();
			while ($row = $result->fetch_assoc()) {
				$roles = new Roles($row['RoleID'],$row['Role'],$row['Description']);
				$arr[] = $roles;
			}
			return $arr;
		}
		else {
			die("The query yielded zero results.No rows found.");
		}
	}


	public static function remove($paramId) {
		include(self::getDbSettings());
		$conn = new mysqli($servername, $username, $password, $dbname);
		$stmt = $conn->prepare('CALL usp_roles_Remove(?)');
		$stmt->bind_param('i', $paramId);
		$stmt->execute();
	}


	public static function search($paramRoleID,$paramRole,$paramDescription) {
		include(self::getDbSettings());
		$conn = new mysqli($servername, $username, $password, $dbname);
		$stmt = $conn->prepare('CALL usp_roles_Search(?,?,?)');
		$arg1 = Roles::setNullValue($paramRoleID);
		$arg2 = Roles::setNullValue($paramRole);
		$arg3 = Roles::setNullValue($paramDescription);
		$stmt->bind_param('iss',$arg1,$arg2,$arg3);
		$stmt->execute();

		$result = $stmt->get_result();
		if (!$result) die($conn->error);
		if ($result->num_rows > 0) {
			$arr = array();
			while ($row = $result->fetch_assoc()) {
				$roles = new Roles($row['RoleID'],$row['Role'],$row['Description']);
				$arr[] = $roles;
			}
			return $arr;
		}
		else {
			die("The query yielded zero results.No rows found.");
		}
	}
}