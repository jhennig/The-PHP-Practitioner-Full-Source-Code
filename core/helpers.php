<?php

/**
 * Require a view.
 *
 * @param  string $name
 * @param  array  $data
 */
function view($name, $data = [])
{
    extract($data);
	$fullPath = dirname(__FILE__,2);
    return require $fullPath . "/app/views/{$name}.view.php";
}

/**
 * Redirect to a new page.
 *
 * @param  string $path
 */
function redirect($path)
{
    header("Location: /{$path}");
}


function arrayFieldDisplay($rows, $key , $delim=""){
		$s = "";
	foreach($rows as $row){		
		$s .= ($row[$key]??'') . $delim;
	}
	return $s;
} 

function selectedIfEqual($val1, $val2)
{
	if($val1 == $val2)
	{
		return 'selected';
	}
}
	
function dd($data)
{
	echo '<pre>';
	print_r($data);
	echo '</pre';
}	

function limitLength($str,$length){
	 return substr($str, 0, $length);	
}


function validateInteger($value){
	
	return filter_var($value, \FILTER_VALIDATE_INT) !== false;	

}