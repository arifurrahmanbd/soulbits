<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update_application_model extends CI_Controller {
	public $tables =  array(
    "CMS_NOTICE_BOARD"=>1,
    "CMS_ABOUT"=>1,
	"CMS_ADMINISTRATION"=>1,
	"CMS_DEPARTMENT"=>1,
	"CMS_ACADEMIC"=>1,
	"CMS_TEACHERS"=>1,
	"CMS_STUDENTS"=>1,
	"CMS_LOGIN"=>1,
	"CMS_REGISTRATION"=>1,
	"CMS_HOME"=>1,
	"SCHOOL_SYS_NOTIFICATION"=>1
    );
	public function index(){
		$this->load->database();
		echo '<h2>Table Delete Actions</h2>';
		foreach ($this->tables as $table_name => $status){
			if ($status == 1) {
				$sql = "DROP TABLE IF EXISTS ".$table_name;
				if ($this->db->simple_query($sql)){
					echo "Table ".$table_name." deleted successfully<br>";
				}else{
					echo "Error deleting table: ";
				}
			}
			
		}		
		echo '<h2>Table Create Actions</h2>';
		////////////////////////////////////////////////////////////// Drop All Table if exists
				
		// sql to create table->CMS_NOTICE_BOARD
		$sql = "CREATE TABLE IF NOT EXISTS CMS_NOTICE_BOARD (
		noticeId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		noticeType VARCHAR(30) NOT NULL,
		headline VARCHAR(30) NOT NULL,
		details VARCHAR(500),
		additionalLink VARCHAR(50),
		createdBy VARCHAR(50),
		createdDate TIMESTAMP,
		expiredDate TIMESTAMP
		)";
		if ($this->db->simple_query($sql)){
			echo "Table CMS_NOTICE_BOARD created successfully<br>";
		}else{
			echo "Error deleting table: ";
		} 
		// sql to create table->CMS_ABOUT
		$sql = "CREATE TABLE IF NOT EXISTS CMS_ABOUT (
		aboutId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		aboutType VARCHAR(30) NOT NULL,
		headline VARCHAR(30) NOT NULL,
		details VARCHAR(500),
		additionalLink VARCHAR(50),
		createdBy VARCHAR(50),
		createdDate TIMESTAMP,
		expiredDate TIMESTAMP
		)";
		
	    if ($this->db->simple_query($sql)){
			echo "Table CMS_ABOUT created successfully<br>";
		}else{
			echo "Error creating table: ";
		} 
		// sql to create table->CMS_ADMINISTRATION
		$sql = "CREATE TABLE IF NOT EXISTS CMS_ADMINISTRATION (
		administrId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		administrType VARCHAR(30) NOT NULL,
		headline VARCHAR(30) NOT NULL,
		details VARCHAR(500),
		additionalLink VARCHAR(50),
		createdBy VARCHAR(50),
		createdDate TIMESTAMP,
		expiredDate TIMESTAMP
		)";
		
	    if ($this->db->simple_query($sql)){
			echo "Table CMS_ADMINISTRATION created successfully<br>";
		}else{
			echo "Error creating table: ";
		} 
		// sql to create table->CMS_DEPARTMENT
		$sql = "CREATE TABLE IF NOT EXISTS CMS_DEPARTMENT (
		deptId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		deptType VARCHAR(30) NOT NULL,
		headline VARCHAR(30) NOT NULL,
		details VARCHAR(500),
		additionalLink VARCHAR(50),
		createdBy VARCHAR(50),
		createdDate TIMESTAMP,
		expiredDate TIMESTAMP
		)";
		
	    if ($this->db->simple_query($sql)){
			echo "Table CMS_DEPARTMENT created successfully<br>";
		}else{
			echo "Error creating table: ";
		} 
		// sql to create table->CMS_ACADEMIC
		$sql = "CREATE TABLE IF NOT EXISTS CMS_ACADEMIC (
		academicId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		academicType VARCHAR(30) NOT NULL,
		headline VARCHAR(30) NOT NULL,
		details VARCHAR(500),
		additionalLink VARCHAR(50),
		createdBy VARCHAR(50),
		createdDate TIMESTAMP,
		expiredDate TIMESTAMP
		)";
		
	    if ($this->db->simple_query($sql)){
			echo "Table CMS_ACADEMIC created successfully<br>";
		}else{
			echo "Error creating table: ";
		} 
		// sql to create table->CMS_TEACHERS
		$sql = "CREATE TABLE IF NOT EXISTS CMS_TEACHERS (
		teachersId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		headline VARCHAR(30) NOT NULL,
		details VARCHAR(500),
		additionalLink VARCHAR(50),
		createdBy VARCHAR(50),
		createdDate TIMESTAMP,
		expiredDate TIMESTAMP
		)";
		
	    if ($this->db->simple_query($sql)){
			echo "Table CMS_TEACHERS created successfully<br>";
		}else{
			echo "Error creating table: ";
		} 
		
		// sql to create table->CMS_STUDENTS
		$sql = "CREATE TABLE IF NOT EXISTS CMS_STUDENTS (
		stdInfoId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		headline VARCHAR(30) NOT NULL,
		details VARCHAR(500),
		additionalLink VARCHAR(50),
		createdBy VARCHAR(50),
		createdDate TIMESTAMP,
		expiredDate TIMESTAMP
		)";
		
	    if ($this->db->simple_query($sql)){
			echo "Table CMS_STUDENTS created successfully<br>";
		}else{
			echo "Error creating table: ";
		} 
		
		// sql to create table->CMS_LOGIN
		$sql = "CREATE TABLE IF NOT EXISTS CMS_LOGIN (
		loginPageId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		headline VARCHAR(30) NOT NULL,
		details VARCHAR(500),
		additionalLink VARCHAR(50),
		createdBy VARCHAR(50),
		createdDate TIMESTAMP,
		expiredDate TIMESTAMP
		)";
		
	    if ($this->db->simple_query($sql)){
			echo "Table CMS_LOGIN created successfully<br>";
		}else{
			echo "Error creating table: ";
		} 
		
		// sql to create table->CMS_REGISTRATION
		$sql = "CREATE TABLE IF NOT EXISTS CMS_REGISTRATION (
		regPageId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		headline VARCHAR(30) NOT NULL,
		details VARCHAR(500),
		additionalLink VARCHAR(50),
		createdBy VARCHAR(50),
		createdDate TIMESTAMP,
		expiredDate TIMESTAMP
		)";
		
	    if ($this->db->simple_query($sql)){
			echo "Table CMS_REGISTRATION created successfully<br>";
		}else{
			echo "Error creating table: ";
		} 
		
	// sql to create table->CMS_HOME
		$sql = "CREATE TABLE IF NOT EXISTS CMS_HOME (
		homeNewsId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		headline VARCHAR(30) NOT NULL,
		details VARCHAR(500),
		additionalLink VARCHAR(50),
		createdBy VARCHAR(50),
		createdDate TIMESTAMP,
		expiredDate TIMESTAMP
		)";
		
	    if ($this->db->simple_query($sql)){
			echo "Table CMS_HOME created successfully<br>";
		}else{
			echo "Error creating table: ";
		} 
		// sql to create table->SCHOOL_SYS_NOTIFICATION
		$sql = "CREATE TABLE IF NOT EXISTS SCHOOL_SYS_NOTIFICATION (
		notificationId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		notification_type VARCHAR(500),
		notification VARCHAR(30) NOT NULL,
		created_by VARCHAR(50),
		created_date TIMESTAMP
		)";
		
		if ($this->db->simple_query($sql)){
			echo "Table SCHOOL_SYS_NOTIFICATION created successfully<br>";
		}else{
			echo "Error creating table: ";
		}
		$this->db->close();
		    $this->load->helper('url');
		    $this->load->view('show_database_success_message');
		}
	}