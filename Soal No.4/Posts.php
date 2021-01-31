<?php

// include('connection.php');
/**
 * 
 */
class Posts
{
	public $dbconn;

	public function __construct()
	{
		try {
			$this->dbconn = new PDO('mysql:dbname=dbschool;host=127.0.0.1', "root", "");
		} catch(PDOexception $e) {
			echo 'Connection Failed: '. $e->getMessage();
		}
	}
	
	public function index(){
		$posts = $this->dbconn->prepare('SELECT * from school_tb');
		$posts->execute();
		$data = $posts->fetchAll();
		return $data;
	}

	public function create($npsn, $name_school, $address, $logo_school, $level, $status, $user_id){
		$create = $this->dbconn->prepare('INSERT INTO school_tb (npsn, name_school, address, logo_school, school_level, status_school, user_id) VALUES (?,?,?,?,?,?,?)');

		$create->bindParam(1, $npsn);
		$create->bindParam(2, $name_school);
		$create->bindParam(3, $address);
		$create->bindParam(4, $logo_school);
		$create->bindParam(5, $level);
		$create->bindParam(6, $status);
		$create->bindParam(7, $user_id);

		$create->execute();
		return $create->rowCount();
	}

	public function show($id){
		$sql = 'SELECT school_tb.*, user.name, user.email FROM  school_tb JOIN user ON school_tb.user_id = user.id';
		$show = $this->dbconn->prepare($sql);
		$show->bindParam(1, $id);
		$show->execute();
		return $show->fetch();
	}

	public function edit($id){
		$edit = $this->dbconn->prepare('SELECT * from school_tb where id=?');
		$edit->bindParam(1, $id);
		$edit->execute();
		return $edit->fetch();
	}

	public function update($npsn, $name_school, $address, $logo_school, $level, $status){
		$update = $this->dbconn->prepare('UPDATE school_tb set npsn=?, name_school=?, address=?, logo_school=?, school_level=?, status_school=? where id=?');

		$update->bindParam(1, $npsn);
		$update->bindParam(2, $name_school);
		$update->bindParam(3, $address);
		$update->bindParam(4, $logo_school);
		$update->bindParam(5, $level);
		$update->bindParam(6, $status);

		$update->execute();
		return $update->rowCount();
	}

	public function delete($id){
		$delete = $this->dbconn->prepare('DELETE from school_tb where id=?');

		$delete->bindParam(1, $id);

		$delete->execute();
		return $delete->rowCount();
	}
}

?>