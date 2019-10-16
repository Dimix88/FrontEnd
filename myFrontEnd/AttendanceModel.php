
<?php
require_once 'C:\xampp\htdocs\myFrontend\php\APIClient.php';
class StudentModel {
	
	var $BASE_URL;
	var $apiClient;
	
	function __construct() {
		$this->BASE_URL = 'http://localhost:8080/attendance';
		$this->apiClient = new APIClient();
	}
	
	function getAll(){
		return $this->apiClient->call('GET', $this->BASE_URL.'getAll/all');
	}
	
	function read($id) {
		return $this->apiClient->call('GET', $this->BASE_URL.'read/'.$studentId);
	}
	
	function create($student = array()) {
		return $this->apiClient->call('POST', $this->BASE_URL.'create', $student);
}
	function update($student = array()) {
		return $this->apiClient->call('PUT', $this->BASE_URL.'update', $studentId);
}
	function delete($id) {
		return $this->apiClient->call('DELETE', $this->BASE_URL.'delete/'.$studentId);
	}
}
?>