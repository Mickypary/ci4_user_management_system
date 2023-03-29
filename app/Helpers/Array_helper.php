<?php

function getRand($arr)
{
	// code...
	shuffle($arr);
	return end($arr);
}