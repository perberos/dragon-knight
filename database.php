<?php

function database_connect ($server, $user, $pass, $name)
{
	$link = mysqli_connect ($server, $user, $pass);

	mysqli_select_db ($link, $name) or die (database_error ($link));

	return $link;
}

function database_query ($link, $query)
{
	$result = mysqli_query ($link, $query);

	// or die (database_error ($link));

	return $result;
}

function database_escape_string ($link, $string)
{
	return mysqli_escape_string ($link, $string);
}

function database_error ($link)
{
	return mysqli_error ($link);
}

function database_fetch_array ($result)
{
	return mysqli_fetch_array ($result);
}

function database_num_rows ($result)
{
	return mysqli_num_rows ($result);
}