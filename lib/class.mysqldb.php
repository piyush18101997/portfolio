<?php

 DEFINE('DB_HOST', 'localhost');
 DEFINE('DB_NAME', 'ankushgo_studio_basic');
 DEFINE('DB_USER', 'root');
 DEFINE('DB_PW', '');



class MySqlDB{
	public $logs, $lastSelect, $autoIDs;

	public function __construct( mysqli $m=null ){
		if (!$m) $m = new mysqli(DB_HOST, DB_USER, DB_PW, DB_NAME);
		$this->Assign($m);
	}

	protected function Assign($m){
		if (mysqli_connect_errno()){
			printf("MysqlHandler construction failed : %s\n", mysqli_connect_error());
			exit();
		}
		$this->m = $m;
		$this->qList=array();
		$this->autoIDs=array();
		$this->logs=array();
	}


	public function getResultSet($sql){ $this->lastSelect=$sql; return $this->m->query($sql); }

	public function getSingleRow($sql){
		$this->lastSelect = $sql;
		if ( $r = $this->m->query($sql) ) return $r->fetch_assoc();
		//echo $sql;
		return false;
	}

	public function q($sql){ $this->qList[] = $sql; }

	public function escape($str){ return $this->m->real_escape_string($str); }

	public function runTransaction(){
		$this->m->autocommit(false);
		if ($this->attemptTransaction()){
			$committed=$this->m->commit();
			$this->qList = array(); //clear the q
		}
		else{
			$this->log('Rolling back');
			$this->m->rollback();
			$committed=false;
		}
		$this->m->autocommit(true);
		return $committed;
	}

	private function attemptTransaction(){
		$this->autoIDs = array(); //clear the auto IDs
		foreach($this->qList as $sql){
			if (!$this->m->query($sql)){
				$this->log("\nSQL FAILED: " . $sql . " " . mysqli_error($this->m));
				return false;
			}
			$this->autoIDs[]=$this->m->insert_id;
		}
		return true;
	}

	private function log($str){ $this->logs[]=$str;	}

	public function revealSQL($web = true){
		if($web) echo nl2br( implode('<br/><hr/>',$this->qList) );
		else echo(implode("\n--------------\n", $this->qList));
	}

	public function revealSQL_line(){ echo implode("\n\n",$this->qList); }

	public function revealLogs(){ echo implode("\n\n",$this->logs); }

	public function compileLogs(){ return implode("\n\n",$this->logs); }

	public function getNewID(){
		return $this->autoIDs[0];
	}

	public function OneCol($sql){
		if (!$results=$this->m->query($sql)){ echo "SQL Error: " . $sql; exit; }
		$rows=array();
		while($row=$results->fetch_array()){ $rows[]=$row[0]; }
		return $rows;
	}


	//backward compatibility handlers
	public function Select($sql){
		if (!$results=$this->m->query($sql)){
			echo "SQL Error: " . $sql;
			exit;
		}
		$rows=array();
		while($row=$results->fetch_array()){ $rows[]=$row; }
		return $rows;
	}
	public function executeInsert($sql){
		if (!$this->m->query($sql)) return false;
		if ($this->m->insert_id==0) return true;
		return $this->m->insert_id;
	}
	public function executeUpdate($sql){
		//returns # of affected rows, -1 if error
		if (!$this->m->query($sql)) return -1;
		else return $this->m->affected_rows;
	}
	public function executeDelete($sql){
		return $this->m->query($sql);
	}
	public function executeNonQuery($sql){
		return $this->m->query($sql);
	}
}
