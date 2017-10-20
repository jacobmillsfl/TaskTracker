/*
Author:			This code was generated by DALGen version 1.0.0.0 available at https://github.com/H0r53/DALGen 
Date:			10/18/2017
Description:	Creates the teams table and respective stored procedures

*/


USE smithadb;



--------------------------------------------------------------
-- Create table
--------------------------------------------------------------



CREATE TABLE `smithadb`.`teams` (
TeamID INT AUTO_INCREMENT,
Name VARCHAR(255),
Description VARCHAR(1025),
CONSTRAINT pk_teams_TeamID PRIMARY KEY (TeamID)
);


--------------------------------------------------------------
-- Create default SCRUD sprocs for this table
--------------------------------------------------------------


DELIMITER //
CREATE PROCEDURE `smithadb`.`usp_teams_Load`
(
	 IN paramTeamID INT
)
BEGIN
	SELECT
		`teams`.`TeamID` AS `TeamID`,
		`teams`.`Name` AS `Name`,
		`teams`.`Description` AS `Description`
	FROM `teams`
	WHERE 		`teams`.`TeamID` = paramTeamID;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE `smithadb`.`usp_teams_LoadAll`()
BEGIN
	SELECT
		`teams`.`TeamID` AS `TeamID`,
		`teams`.`Name` AS `Name`,
		`teams`.`Description` AS `Description`
	FROM `teams`;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE `smithadb`.`usp_teams_Add`
(
	 IN paramName VARCHAR(255),
	 IN paramDescription VARCHAR(1025)
)
BEGIN
	INSERT INTO `teams` (Name,Description)
	VALUES (paramName, paramDescription);
	-- Return last inserted ID as result
	SELECT LAST_INSERT_ID() as id;
END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE `smithadb`.`usp_teams_Update`
(
	IN paramTeamID INT,
	IN paramName VARCHAR(255),
	IN paramDescription VARCHAR(1025)
)
BEGIN
	UPDATE `teams`
	SET Name = paramName
		,Description = paramDescription
	WHERE		`teams`.`TeamID` = paramTeamID;
END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE `smithadb`.`usp_teams_Delete`
(
	IN paramTeamID INT
)
BEGIN
	DELETE FROM `teams`
	WHERE		`teams`.`TeamID` = paramTeamID;
END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE `smithadb`.`usp_teams_Search`
(
	IN paramTeamID INT,
	IN paramName VARCHAR(255),
	IN paramDescription VARCHAR(1025)
)
BEGIN
	SELECT
		`teams`.`TeamID` AS `TeamID`,
		`teams`.`Name` AS `Name`,
		`teams`.`Description` AS `Description`
	FROM `teams`
	WHERE
		COALESCE(teams.`TeamID`,0) = COALESCE(paramTeamID,teams.`TeamID`,0)
		AND COALESCE(teams.`Name`,'') = COALESCE(paramName,teams.`Name`,'')
		AND COALESCE(teams.`Description`,'') = COALESCE(paramDescription,teams.`Description`,'');
END //
DELIMITER ;


