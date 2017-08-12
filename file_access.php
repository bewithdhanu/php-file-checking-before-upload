<?php
function file_access($file){
	if(isset($file)) {
		$maxsize    = 5242880; //5 mb
		$acceptable = array(
			'application/pdf',
			'application/msword',
			'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
			'application/vnd.ms-excel',
			'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
			'image/jpeg',
			'image/jpg',
			'image/gif',
			'image/png'
		);
		$allowedExts = array(
			"pdf", 
			"doc", 
			"docx",
			"xls",
			"xlsx",
			"csv",
			"jpg",
			"jpeg",
			"png",
			"gif"		
		); 
		$extension = end(explode(".", $_FILES["file"]["name"]));
		if(($file['size'] >= $maxsize) || ($file["size"] == 0)) {
			return false;
		}else if ( ! ( in_array($extension, $allowedExts ) ) ) {
			return false;
		}else if(!in_array($file['type'], $acceptable)) && (!empty($file["type"]))) {
			return false;
		}else return true;

	}
}