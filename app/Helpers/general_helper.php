<?php

function is_loggedin()
{
	// code...
	if (session()->has('loggedin')) {
		// code...
		return true;
	}
	return false;
}