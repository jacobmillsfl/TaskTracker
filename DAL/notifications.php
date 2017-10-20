<?php
/*
Author:			This code was generated by DALGen version 1.0.0.0 available at https://github.com/H0r53/DALGen 
Date:			10/18/2017
Description:	Creates the DAL class for  notifications table and respective stored procedures

*/



class Notifications {

	// This is for local purposes only! In hosted environments the db_settings.php file should be outside of the webroot, such as: include("/outside-webroot/db_settings.php");
	protected static function getDbSettings() { return "DAL/db_localsettings.php"; }

	/******************************************************************/
	// Properties
	/******************************************************************/

	protected $NotificationID;
	protected $AccountID;
	protected $TaskID;
	protected $NotificationTypeID;


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
			case 4:
				self::__constructFull( $argv[0], $argv[1], $argv[2], $argv[3] );
		}
	}


	public function __constructBase() {
		$this->NotificationID = 0;
		$this->AccountID = 0;
		$this->TaskID = 0;
		$this->NotificationTypeID = 0;
	}


	public function __constructPK($paramId) {
		$this->load($paramId);
	}


	public function __constructFull($paramNotificationID,$paramAccountID,$paramTaskID,$paramNotificationTypeID) {
		$this->NotificationID = $paramNotificationID;
		$this->AccountID = $paramAccountID;
		$this->TaskID = $paramTaskID;
		$this->NotificationTypeID = $paramNotificationTypeID;
	}


	/******************************************************************/
	// Accessors / Mutators
	/******************************************************************/

	public function getNotificationID(){
		return $this->NotificationID;
	}
	public function setNotificationID($value){
		$this->NotificationID = $value;
	}
	public function getAccountID(){
		return $this->AccountID;
	}
	public function setAccountID($value){
		$this->AccountID = $value;
	}
	public function getTaskID(){
		return $this->TaskID;
	}
	public function setTaskID($value){
		$this->TaskID = $value;
	}
	public function getNotificationTypeID(){
		return $this->NotificationTypeID;
	}
	public function setNotificationTypeID($value){
		$this->NotificationTypeID = $value;
	}


	/******************************************************************/
	// Public Methods
	/******************************************************************/


	public function load($paramId) {
		include(self::getDbSettings());
		$conn = new mysqli($servername, $username, $password, $dbname);
		$stmt = $conn->prepare('CALL usp_notifications_Load(?)');
		$stmt->bind_param('i', $paramId);
		$stmt->execute();

		$result = $stmt->get_result();
		if (!$result) die($conn->error);

		while ($row = $result->fetch_assoc()) {
		 $this->setNotificationID($row['NotificationID']);
		 $this->setAccountID($row['AccountID']);
		 $this->setTaskID($row['TaskID']);
		 $this->setNotificationTypeID($row['NotificationTypeID']);
		}
	}


	public function save() {
		if ($this->getNotificationID() == 0)
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
		$stmt = $conn->prepare('CALL usp_notifications_Add(?,?,?)');
		$arg1 = $this->getAccountID();
		$arg2 = $this->getTaskID();
		$arg3 = $this->getNotificationTypeID();
		$stmt->bind_param('iii',$arg1,$arg2,$arg3);
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
		$stmt = $conn->prepare('CALL usp_notifications_Update(?,?,?,?)');
		$arg1 = $this->getNotificationID();
		$arg2 = $this->getAccountID();
		$arg3 = $this->getTaskID();
		$arg4 = $this->getNotificationTypeID();
		$stmt->bind_param('iiii',$arg1,$arg2,$arg3,$arg4);
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
		$stmt = $conn->prepare('CALL usp_notifications_LoadAll()');
		$stmt->execute();

		$result = $stmt->get_result();
		if (!$result) die($conn->error);
		if ($result->num_rows > 0) {
			$arr = array();
			while ($row = $result->fetch_assoc()) {
				$notifications = new Notifications($row['NotificationID'],$row['AccountID'],$row['TaskID'],$row['NotificationTypeID']);
				$arr[] = $notifications;
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
		$stmt = $conn->prepare('CALL usp_notifications_Remove(?)');
		$stmt->bind_param('i', $paramId);
		$stmt->execute();
	}


	public static function search($paramNotificationID,$paramAccountID,$paramTaskID,$paramNotificationTypeID) {
		include(self::getDbSettings());
		$conn = new mysqli($servername, $username, $password, $dbname);
		$stmt = $conn->prepare('CALL usp_notifications_Search(?,?,?,?)');
		$arg1 = Notifications::setNullValue($paramNotificationID);
		$arg2 = Notifications::setNullValue($paramAccountID);
		$arg3 = Notifications::setNullValue($paramTaskID);
		$arg4 = Notifications::setNullValue($paramNotificationTypeID);
		$stmt->bind_param('iiii',$arg1,$arg2,$arg3,$arg4);
		$stmt->execute();

		$result = $stmt->get_result();
		if (!$result) die($conn->error);
		if ($result->num_rows > 0) {
			$arr = array();
			while ($row = $result->fetch_assoc()) {
				$notifications = new Notifications($row['NotificationID'],$row['AccountID'],$row['TaskID'],$row['NotificationTypeID']);
				$arr[] = $notifications;
			}
			return $arr;
		}
		else {
			die("The query yielded zero results.No rows found.");
		}
	}
}