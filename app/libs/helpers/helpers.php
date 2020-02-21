<?php


function dnd($data)
{
	d($data);
	die;
}

function d($data)
{
	echo "<pre>";
//	echo '<br/><br/><span style="color:red;">Debug backtrace</span><br/>';
//	var_dump(debug_print_backtrace());
	echo '<br/><span style="color:red;">Data</span><br/>';
	var_dump($data);
	echo "</pre>";
}

function sanitize($dirty)
{
	return htmlentities($dirty, ENT_QUOTES, 'UTF-8');
}

function currentUser()
{
	return Users::currentLoggedInUser();
}

function posted_values($post)
{
	$clean_array = [];
	
	foreach ($post as $key => $value)
	{
		$clean_array[$key] = sanitize($value);
	}
	
	return $clean_array;
}

function currentPage()
{
	$currentPage = $_SERVER['REQUEST_URI'];
	
	if ($currentPage == PROOT || $currentPage == PROOT . DS . 'home/index')
	{
		$currentPage = PROOT . DS . 'home';
	}
	
	return $currentPage;
}

function displayName($object)
{
	return $object->fname . ' ' . $object->lname;
}