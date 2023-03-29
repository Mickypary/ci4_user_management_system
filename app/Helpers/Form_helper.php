<?php


function display_error($errors, $field)
{

	if (isset($errors)) {
		
		if ($errors->hasError($field)) {
			
			return $errors->getError($field);
		}else {
			return false;
		}
	}


}