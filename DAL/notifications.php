<?php
/*
Author:			This code was generated by DALGen version 1.0.0.0 available at https://github.com/H0r53/DALGen 
Date:			11/15/2017
Description:	Creates the DAL class for  notifications table and respective stored procedures

*/



class Notifications {

    // This is for local purposes only! In hosted environments the db_settings.php file should be outside of the webroot, such as: include("/outside-webroot/db_settings.php");
    protected static function getDbSettings() { return "DAL/db_localsettings.php"; }

    /******************************************************************/
    // Properties
    /******************************************************************/

    protected $NotificationID;
    protected $NotificationTypeID;
    protected $AccountID;
    protected $CreateDate;
    protected $SeenDate;
    protected $Seen;
    protected $TaskID;
    protected $ProjectID;
    protected $CommentID;


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
            case 9:
                self::__constructFull( $argv[0], $argv[1], $argv[2], $argv[3], $argv[4], $argv[5], $argv[6], $argv[7], $argv[8] );
        }
    }


    public function __constructBase() {
        $this->NotificationID = 0;
        $this->NotificationTypeID = 0;
        $this->AccountID = 0;
        $this->CreateDate = "";
        $this->SeenDate = "";
        $this->Seen = 0;
        $this->TaskID = 0;
        $this->ProjectID = 0;
        $this->CommentID = 0;
    }


    public function __constructPK($paramId) {
        $this->load($paramId);
    }


    public function __constructFull($paramNotificationID,$paramNotificationTypeID,$paramAccountID,$paramCreateDate,$paramSeenDate,$paramSeen,$paramTaskID,$paramProjectID,$paramCommentID) {
        $this->NotificationID = $paramNotificationID;
        $this->NotificationTypeID = $paramNotificationTypeID;
        $this->AccountID = $paramAccountID;
        $this->CreateDate = $paramCreateDate;
        $this->SeenDate = $paramSeenDate;
        $this->Seen = $paramSeen;
        $this->TaskID = $paramTaskID;
        $this->ProjectID = $paramProjectID;
        $this->CommentID = $paramCommentID;
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
    public function getNotificationTypeID(){
        return $this->NotificationTypeID;
    }
    public function setNotificationTypeID($value){
        $this->NotificationTypeID = $value;
    }
    public function getAccountID(){
        return $this->AccountID;
    }
    public function setAccountID($value){
        $this->AccountID = $value;
    }
    public function getCreateDate(){
        return $this->CreateDate;
    }
    public function setCreateDate($value){
        $this->CreateDate = $value;
    }
    public function getSeenDate(){
        return $this->SeenDate;
    }
    public function setSeenDate($value){
        $this->SeenDate = $value;
    }
    public function getSeen(){
        return $this->Seen;
    }
    public function setSeen($value){
        $this->Seen = $value;
    }
    public function getTaskID(){
        return $this->TaskID;
    }
    public function setTaskID($value){
        $this->TaskID = $value;
    }
    public function getProjectID(){
        return $this->ProjectID;
    }
    public function setProjectID($value){
        $this->ProjectID = $value;
    }
    public function getCommentID(){
        return $this->CommentID;
    }
    public function setCommentID($value){
        $this->CommentID = $value;
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
            $this->setNotificationTypeID($row['NotificationTypeID']);
            $this->setAccountID($row['AccountID']);
            $this->setCreateDate($row['CreateDate']);
            $this->setSeenDate($row['SeenDate']);
            $this->setSeen($row['Seen']);
            $this->setTaskID($row['TaskID']);
            $this->setProjectID($row['ProjectID']);
            $this->setCommentID($row['CommentID']);
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
        $stmt = $conn->prepare('CALL usp_notifications_Add(?,?,?,?,?,?,?,?)');
        $arg1 = $this->getNotificationTypeID();
        $arg2 = $this->getAccountID();
        $arg3 = $this->getCreateDate();
        $arg4 = $this->getSeenDate();
        $arg5 = $this->getSeen();
        $arg6 = $this->getTaskID();
        $arg7 = $this->getProjectID();
        $arg8 = $this->getCommentID();
        $stmt->bind_param('iissiiii',$arg1,$arg2,$arg3,$arg4,$arg5,$arg6,$arg7,$arg8);
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
        $stmt = $conn->prepare('CALL usp_notifications_Update(?,?,?,?,?,?,?,?,?)');
        $arg1 = $this->getNotificationID();
        $arg2 = $this->getNotificationTypeID();
        $arg3 = $this->getAccountID();
        $arg4 = $this->getCreateDate();
        $arg5 = $this->getSeenDate();
        $arg6 = $this->getSeen();
        $arg7 = $this->getTaskID();
        $arg8 = $this->getProjectID();
        $arg9 = $this->getCommentID();
        $stmt->bind_param('iiissiiii',$arg1,$arg2,$arg3,$arg4,$arg5,$arg6,$arg7,$arg8,$arg9);
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
                $notifications = new Notifications($row['NotificationID'],$row['NotificationTypeID'],$row['AccountID'],$row['CreateDate'],$row['SeenDate'],$row['Seen'],$row['TaskID'],$row['ProjectID'],$row['CommentID']);
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


    public static function search($paramNotificationID,$paramNotificationTypeID,$paramAccountID,$paramCreateDate,$paramSeenDate,$paramSeen,$paramTaskID,$paramProjectID,$paramCommentID) {
        include(self::getDbSettings());
        $conn = new mysqli($servername, $username, $password, $dbname);
        $stmt = $conn->prepare('CALL usp_notifications_Search(?,?,?,?,?,?,?,?,?)');
        $arg1 = Notifications::setNullValue($paramNotificationID);
        $arg2 = Notifications::setNullValue($paramNotificationTypeID);
        $arg3 = Notifications::setNullValue($paramAccountID);
        $arg4 = Notifications::setNullValue($paramCreateDate);
        $arg5 = Notifications::setNullValue($paramSeenDate);
        $arg6 = Notifications::setNullValue($paramSeen);
        $arg7 = Notifications::setNullValue($paramTaskID);
        $arg8 = Notifications::setNullValue($paramProjectID);
        $arg9 = Notifications::setNullValue($paramCommentID);
        $stmt->bind_param('iiissiiii',$arg1,$arg2,$arg3,$arg4,$arg5,$arg6,$arg7,$arg8,$arg9);
        $stmt->execute();

        $result = $stmt->get_result();
        if (!$result) die($conn->error);
        if ($result->num_rows > 0) {
            $arr = array();
            while ($row = $result->fetch_assoc()) {
                $notifications = new Notifications($row['NotificationID'],$row['NotificationTypeID'],$row['AccountID'],$row['CreateDate'],$row['SeenDate'],$row['Seen'],$row['TaskID'],$row['ProjectID'],$row['CommentID']);
                $arr[] = $notifications;
            }
            return $arr;
        }
        else {
            die("The query yielded zero results.No rows found.");
        }
    }
    public static function loadbyaccountid($paramAccountID) {
        include(self::getDbSettings());
        $conn = new mysqli($servername, $username, $password, $dbname);
        $stmt = $conn->prepare('CALL usp_notifications_LoadByAccountID(?)');
        $stmt->bind_param('i', $paramAccountID);
        $stmt->execute();

        $result = $stmt->get_result();
        if (!$result) die($conn->error);
        if ($result->num_rows > 0) {
            $arr = array();
            while ($row = $result->fetch_assoc()) {
                $notifications = new Notifications($row['NotificationID'],$row['NotificationTypeID'],$row['AccountID'],$row['CreateDate'],$row['SeenDate'],$row['Seen'],$row['TaskID'],$row['ProjectID'],$row['CommentID']);
                $arr[] = $notifications;
            }
            return $arr;
        }
        else {
            //echo "No new notifications";
        }
    }

    public static function clearnotificationsbyaccountid($paramAccountID) {
        include(self::getDbSettings());
        $conn = new mysqli($servername, $username, $password, $dbname);
        $stmt = $conn->prepare('CALL usp_notifications_ClearNotificationsByAccountID(?)');
        $stmt->bind_param('i', $paramAccountID);
        $stmt->execute();
    }
}
