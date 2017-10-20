/*
Author:			This code was generated by DALGen version 1.0.0.0 available at https://github.com/H0r53/DALGen 
Date:			10/18/2017
Description:	Creates the tasktypes table and respective stored procedures

*/


USE smithadb;



--------------------------------------------------------------
-- Create table
--------------------------------------------------------------



CREATE TABLE `smithadb`.`tasktypes` (
TaskTypeID INT AUTO_INCREMENT,
TaskType VARCHAR(255),
Description VARCHAR(1024),
CONSTRAINT pk_tasktypes_TaskTypeID PRIMARY KEY (TaskTypeID)
);


--------------------------------------------------------------
-- Create default SCRUD sprocs for this table
--------------------------------------------------------------


DELIMITER //
CREATE PROCEDURE `smithadb`.`usp_tasktypes_Load`
(
	 IN paramTaskTypeID INT
)
BEGIN
	SELECT
		`tasktypes`.`TaskTypeID` AS `TaskTypeID`,
		`tasktypes`.`TaskType` AS `TaskType`,
		`tasktypes`.`Description` AS `Description`
	FROM `tasktypes`
	WHERE 		`tasktypes`.`TaskTypeID` = paramTaskTypeID;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE `smithadb`.`usp_tasktypes_LoadAll`()
BEGIN
	SELECT
		`tasktypes`.`TaskTypeID` AS `TaskTypeID`,
		`tasktypes`.`TaskType` AS `TaskType`,
		`tasktypes`.`Description` AS `Description`
	FROM `tasktypes`;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE `smithadb`.`usp_tasktypes_Add`
(
	 IN paramTaskType VARCHAR(255),
	 IN paramDescription VARCHAR(1024)
)
BEGIN
	INSERT INTO `tasktypes` (TaskType,Description)
	VALUES (paramTaskType, paramDescription);
	-- Return last inserted ID as result
	SELECT LAST_INSERT_ID() as id;
END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE `smithadb`.`usp_tasktypes_Update`
(
	IN paramTaskTypeID INT,
	IN paramTaskType VARCHAR(255),
	IN paramDescription VARCHAR(1024)
)
BEGIN
	UPDATE `tasktypes`
	SET TaskType = paramTaskType
		,Description = paramDescription
	WHERE		`tasktypes`.`TaskTypeID` = paramTaskTypeID;
END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE `smithadb`.`usp_tasktypes_Delete`
(
	IN paramTaskTypeID INT
)
BEGIN
	DELETE FROM `tasktypes`
	WHERE		`tasktypes`.`TaskTypeID` = paramTaskTypeID;
END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE `smithadb`.`usp_tasktypes_Search`
(
	IN paramTaskTypeID INT,
	IN paramTaskType VARCHAR(255),
	IN paramDescription VARCHAR(1024)
)
BEGIN
	SELECT
		`tasktypes`.`TaskTypeID` AS `TaskTypeID`,
		`tasktypes`.`TaskType` AS `TaskType`,
		`tasktypes`.`Description` AS `Description`
	FROM `tasktypes`
	WHERE
		COALESCE(tasktypes.`TaskTypeID`,0) = COALESCE(paramTaskTypeID,tasktypes.`TaskTypeID`,0)
		AND COALESCE(tasktypes.`TaskType`,'') = COALESCE(paramTaskType,tasktypes.`TaskType`,'')
		AND COALESCE(tasktypes.`Description`,'') = COALESCE(paramDescription,tasktypes.`Description`,'');
END //
DELIMITER ;


