<?php
namespace App\Services;

class UploadService {

    static function uploads($files, $diractoryName = 'user/post'){
		if (!isset($files)) {
	        return 0;
	    }

	    $imgs = array();
	    $img_error = false;

	    $cnt = count($files['name']);
	    for($i = 0 ; $i < $cnt ; $i++) {
	    	$path = $files['name'][$i];
	    	if($path != ''){
		    	$ext = pathinfo($path, PATHINFO_EXTENSION);
		    	if($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png' && $ext != 'gif'){
		    		$img_error = true;
		    		$this->res['message'] = 'We does not support '.$ext.' file!';
		    		break;
		    	}
		    	else if($files['error'][$i] !== 0){
		    		$img_error = true;
		    		$this->res['message'] = $path.' file contains error!';
		    		break;
		    	}
		    }
	    }

	    if($img_error){
			return 0;
	    }

	    for($i = 0 ; $i < $cnt ; $i++) {
	    	$path = $files['name'][$i];
	    	if($path != ''){
		    	$ext = pathinfo($path, PATHINFO_EXTENSION);
		        if ($files['error'][$i] === 0) {
		            $name = uniqid('img-'.date('Ymd').'-').'.'.$ext;
		            if (move_uploaded_file($files['tmp_name'][$i], __DIR__.'/../../public/uploads/'.$diractoryName.'/' . $name) === true) {
		                $imgs[] = array('name' => $name);
		            }
		        }
		    }
	    }

	    return $imgs;
	}
}