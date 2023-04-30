<?php

namespace App\Libraries;


/**
 * 
 */
class Csvimport
{
	// private $handle = "";
    // private $filepath = FALSE;
    // private $column_headers = FALSE;
    // private $initial_line = 0;
    // private $delimiter = ",";
    // private $detect_line_endings = FALSE;
	
	function __construct()
	{
		// code...
	}

	var $fields;/** columns names retrieved after parsing */
    var $separator = ',';/** separator used to explode each line */
    var $enclosure = '"';/** enclosure used to decorate each field */
    var $max_row_size = 0;/** maximum row size to be used for decoding */

	function parse_file($p_Filepath) {

        // opening the Sample.csv file
        $myFile = fopen($p_Filepath, 'r');
        // using the while loop to read till the end of the file
        while(($content = fgetcsv($myFile, 100, ',')) !== FALSE)
        {
        // saving the content in an array
        $arr[] = $content;
        }
        // closing the CSV file
        fclose($myFile);
        // printing the array of CSV contents
        foreach($arr as $ar) {
            echo "<pre>";
        print_r($arr);
        }
        
        // return $arr;

    }

    function escape_string($data) {
        $result = array();
        foreach ($data as $row) {
            $result[] = str_replace('"', '', $row);
        }
        return $result;
    }


} /*End Class */