<?php
ini_set("memory_limit", "128M");

	function objectToArray($data){
		if(is_array($data) || is_object($data)){
			$result = array();
			foreach($data as $key => $value){
				$result[$key] = objectToArray($value);
			}
			return $result;
		}
		return $data;
	}

	class AjaxHandler{

		public function __construct(  ){
			$this->msgs = array();
			$this->responseFormat = 'json';
			$this->status=true;
			$this->responseData = array();
			$this->gotJSON=false;
		}
        
        public function jsonData($data){            
            if (isset($data)) {
                
                if ( !$this->params = json_decode($data) ){
                    $this->errorOut("JSON string cannot be converted to object");
                }
                                           
            }
            else {
                $this->errorOut("Parameters not provided in REQUEST");
            }    
            
            $this->responseFormat = ai($_REQUEST,'responseFormat','json');
            $this->gotJSON=true;
            return $this->params;
        }

		public function getJSON( ){
			if ($this->gotJSON) return $this->params;
            
			if ( !$jsonStr = ai($_REQUEST,'json',false) )
				$this->errorOut("json parameter not provided in REQUEST");

            if (get_magic_quotes_gpc()) {
                $jsonStr = stripslashes($jsonStr);
            }
            //echo "@".$jsonStr."@";
			if ( !$this->params = json_decode($jsonStr) ){
                $this->errorOut("json string cannot be converted to object");
            }

			$this->responseFormat = ai($_REQUEST,'responseFormat','json');
			$this->gotJSON=true;
			return $this->params;
		}

		public function convertToArray(){
			$this->params = json_decode( json_encode($this->params), true );
		}

		public function cleanParams($db=false){
			$this->getJSON();
			if (!$db) $db = new DBE();
			foreach($this->params as $p=>$v) $this->params->$p = $db->escape( trim($v) );
		}

		public function hasParam($param){
			return oi($this->params, $param, false);
		}

		//legacy code - still used in V2
		public function requireJSONParams($rps){
			//returns false if one if the params in $rp are missing, or any of the values are null, '', 0 or false
			$this->getJSON();
			$missing=array();
			foreach($rps as $rp) if ( !oi( $this->params, $rp, false ) ) $missing[]=$rp;

			if ($missing){
				$this->addResponseData("missingParams", $missing);
				$this->errorOut("Missing required values");
			}
			return true;
		}


		public function requireParamValues($rps){
			$this->requireJSONParams($rps);
		}

		public function requireParamKeys($rps){
			//returns false if one if the params in $rp are missing,
			//returns true if all param keys are found, even if the value passed is 0, null, or false
			$this->getJSON();
			$missing=array();
			foreach($rps as $rp) if (!prop_exists( $this->params, $rp, false )) $missing[]=$rp;

			if ($missing){
				$this->addResponseData("missingParamKeys", $missing);
				$this->errorOut("Missing required keys");
			}
			return true;
		}
        
        
        
        
        
		
		public function checkLogin(){
			if (!$a=ai($_SESSION,"actioner",false)) $this->errorOut("User must be logged in to do this action");
			return $a;
		}
        
        public function addError($msg){
			$this->status=false;
			$this->msgs[] = $msg;
		}

		public function addMsg($msg){
			$this->msgs[] = $msg;
		}

		public function errorOut($msg, $reasonCode=0){
			/*
            Reason Codes:
            1 = session time out
            2 = db error
             */
			$this->addResponseData("rc",$reasonCode);
			$this->addError($msg);
			$this->out();
		}

		public function addResponseData($key, $val){
			$this->responseData[$key] = $val;
		}

		public function logSqlErrors($m){
			foreach($m->logs as $mlog) $this->addError($mlog);
			$this->out();
		}

		public function out($msg=null){
			if ($msg) $this->msgs[]=$msg;

			$msgStr="";
			foreach($this->msgs as $msg){
				$a[]=str_replace( array("\r\n","\r","\n","\t"),"",$msg );
				$msgStr.=$msg."<br/>";
			}
			$this->msgs=$a;
			if ($this->responseFormat=='html'){
				echo $msgStr;
				exit;
			}

			$responsePackage = array(
				"status"=>$this->status,
				"msg"=>$msg,
				"data"=>$this->responseData,
				"allMsgs"=>$this->msgs
			);

			//echo '{"status": '. $this->status .', "msg": "' . addslashes($msg) . '"}';
			echo json_encode($responsePackage);
			exit;
		}
	}

?>
