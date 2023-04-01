<?php

function is_loggedin()
{
	// code...
	if (session()->has('loggedin') || session()->has('google_user')) {
		// code...
		return true;
	}
	return false;
}