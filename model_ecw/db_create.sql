/*  Drop (Delete) a DDBB */
DROP DATABASE databasename;

/*  Create a DDBB */
CREATE DATABASE databasename;

/* --------- Query to delete "USERS" table if exists and create if it doesn't --------- */

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usercod` varchar(20) NOT NULL DEFAULT '',
  `pid` varchar(1000) NOT NULL DEFAULT '',
  `name` varchar(1000) NOT NULL DEFAULT '',
  `login` varchar(20) NOT NULL DEFAULT '',
  `spent_time` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;


/* Query to Select only "Mouse-Click" into a "USER1" table */
SELECT * FROM USER1 WHERE all_act LIKE 'm-c%'

/* QUERY to GET Login_time (Login_time) */
ALTER TABLE users ADD COLUMN (calc DECIMAL);
UPDATE users SET calc=login/1000;
ALTER TABLE users ADD COLUMN (login_time DATETIME);
UPDATE users SET login_time = from_unixtime(calc);
ALTER TABLE users DROP COLUMN calc;

/* QUERY TO GET the Spent time ‘SPENT_TIME_SEC’ in seconds */
ALTER TABLE users ADD COLUMN (spent_time_sec DECIMAL);
UPDATE users SET spent_time_sec = spent_time/1000;

/* ========================================================== */
/* --------- QUERY TO PROCESS "USERS" TABLE --------- */
/* Query to DELETE columns */
ALTER TABLE users
  DROP COLUMN login_time,
  DROP COLUMN spent_time_sec;

/* Query to INSERT a column into an existing DB */
ALTER TABLE `takefeedback2`
    ADD COLUMN `RATING1` INT(10) AFTER `firstCol`;

ALTER TABLE `takefeedback2`
    ADD COLUMN `RATING1` tinyint(4) AFTER `RATING`;

/* Query to CHANGE a column-NAME in a exiting TABLE */
ALTER TABLE TABLE_NAME CHANGE old_name new_name COLUMN_TYPE;
ALTER TABLE `takefeedback2` CHANGE RATING1 RATING2 tinyint;
ALTER TABLE REGISTER CHANGE NAME FIRSTNAME VARCHAR(50);

/* ================================================= */

/* INSERT a data into a table.*/
/* Note: the 'id' column is 'AUTO-INCREMENT' type that is why it is set as 'NULL' */
INSERT INTO user10 (id, usercod, pid, name,time,all_act)
VALUES (NULL, 'usercode', 'pi20','name20','time20','click all 20');

/* +++++++  other queries ++++++++++++++ */
/* Rename a table */
RENAME TABLE `tb1` TO `tb2`, tb3 TO tb4;

/* Create a table with FORMAT from an existing table. Here: 'takefeedback4' is a new table. It'll take format from 'takefeedback2' */
CREATE TABLE takefeedback4 LIKE takefeedback2;

/* Load CSV data into an existing table (Format of columns from CSV and MySQL table must match) */
/* 'F:/WRESTORE/takefeedback_json3.csv' is the CSV file. 'takefeedback3' is the SQL table */
LOAD DATA LOCAL INFILE 'F:/WRESTORE/takefeedback_json3.csv'
INTO TABLE takefeedback3
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS;/*it ignores the first row*/

/* TAbles for Register */
DROP TABLE IF EXISTS `register`;
CREATE TABLE `register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `lastname` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

/* Query to add columns */
ALTER TABLE `REGISTER`
    ADD COLUMN `LULC_Q1` VARCHAR(50) AFTER `password`,
    ADD COLUMN `LULC_Q2` VARCHAR(50) AFTER `LULC_Q1`,
    ADD COLUMN `LULC_Q3` VARCHAR(50) AFTER `LULC_Q2`,
    ADD COLUMN `LULC_Q4` VARCHAR(50) AFTER `LULC_Q3`,
    ADD COLUMN `LULC_Q5` VARCHAR(50) AFTER `LULC_Q4`,
    ADD COLUMN `LULC_Q6` VARCHAR(50) AFTER `LULC_Q5`;


UPDATE REGISTER SET LULC_Q1 = '160', LULC_Q2 = '145', LULC_Q3 = '145', LULC_Q4 = '145',
                    LULC_Q5 = '145', LULC_Q6 = '145' WHERE id = 182;

ALTER TABLE `REGISTER`
    ADD COLUMN `EXP_Q1` VARCHAR(40) AFTER `LULC_Q6`,/*One options*/
    ADD COLUMN `EXP_Q2` VARCHAR(40) AFTER `EXP_Q1`,/*Several options*/
    ADD COLUMN `EXP_Q3` VARCHAR(40) AFTER `EXP_Q2`,/*Several options*/
    ADD COLUMN `EXP_Q4` VARCHAR(40) AFTER `EXP_Q3`,/*Several options*/
    ADD COLUMN `EXP_Q5` VARCHAR(40) AFTER `EXP_Q4`,/*One options*/
    ADD COLUMN `EXP_Q6` VARCHAR(40) AFTER `EXP_Q5`,/*One options*/
    ADD COLUMN `EXP_Q7` VARCHAR(40) AFTER `EXP_Q6`,/*One options*/
    ADD COLUMN `EXP_Q8` VARCHAR(40) AFTER `EXP_Q7`,/*One options*/
    ADD COLUMN `EXP_Q9` VARCHAR(40) AFTER `EXP_Q8`,/*One options*/
    ADD COLUMN `EXP_Q10` VARCHAR(40) AFTER `EXP_Q9`,/*One options*/
    ADD COLUMN `EXP_Q11` VARCHAR(40) AFTER `EXP_Q10`,/*One options*/
    ADD COLUMN `EXP_Q12` VARCHAR(40) AFTER `EXP_Q11`,/*One options*/
    ADD COLUMN `EXP_Q13` VARCHAR(40) AFTER `EXP_Q12`,/*Several options*/
    ADD COLUMN `EXP_Q14` VARCHAR(40) AFTER `EXP_Q13`,/*One options*/
    ADD COLUMN `EXP_Q15` VARCHAR(40) AFTER `EXP_Q14`,/*One options*/
    ADD COLUMN `EXP_Q16` VARCHAR(40) AFTER `EXP_Q15`,/*One options*/
    ADD COLUMN `EXP_Q17` FLOAT(24) AFTER `EXP_Q16`,/*Positive number. Decimals allow*/
    ADD COLUMN `EXP_Q18` FLOAT(24) AFTER `EXP_Q17`,/*Positive number. Decimals allow*/
    ADD COLUMN `EXP_Q19` FLOAT(24) AFTER `EXP_Q18`,/*Positive number. Decimals allow*/
    ADD COLUMN `EXP_Q20` FLOAT(24) AFTER `EXP_Q19`,/*Positive number. Decimals allow*/
    ADD COLUMN `EXP_Q21` VARCHAR(40) AFTER `EXP_Q20`;/*One options*/

ALTER TABLE `REGISTER`
    ADD COLUMN `EXP_Q1` VARCHAR(40) AFTER `LULC_Q6`,/*One options*/
    ADD COLUMN `EXP_Q2` VARCHAR(40) AFTER `EXP_Q1`,/*Several options*/
    ADD COLUMN `EXP_Q17` FLOAT(24) AFTER `EXP_Q2`;


/* Rename a Column name */
/*To rename a column, use RENAME COLUMN:*/
ALTER TABLE table_name CHANGE `old_col_name` `new_col_name` VARCHAR(50);