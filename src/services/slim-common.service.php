<?php

class SlimCommonService {
	
	public function returnJSON($data, $message='') {
		$successObj = new stdClass();
		$successObj->success = TRUE;
		if($data === FALSE) {
			$successObj->success = FALSE;
		}
		$successObj->data = $data;
		
		if($message) {
			$successObj->message = $message;
		}
		
		return json_encode($successObj);
	}
	
	public function returnError($error) {
		$errorObj = new stdClass();
		$errorObj->success = FALSE;
		$errorObj->data = NULL;
		$errorObj->error = $error;
		return json_encode($errorObj);
	}
}