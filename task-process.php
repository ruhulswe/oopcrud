<?php

/*  session_start();
  require_once 'config/dbconfig.php';
  require_once 'helper/helper.php';
  require_once 'helper/session.php';*/

  require_once (__DIR__.'/inc/header.php');
 

/*  $db = new DatabaseConnection;
  $sc = new session();*/

  if($_SERVER['REQUEST_METHOD']=='POST')
  {

	   	if(!empty($_POST['task']))
	   	{

		  	extract($_POST);

		  	$isInserted = $db->insertion($task);

		  	if($isInserted){

		  		$_SESSION['rowEffected'] = "task inserted";
		  		header("Location:index.php");

		  	}

	  	}else{

	  		$_SESSION['empty-field'] = "task field is empty";
	  		header("Location:index.php");

	  	}

  }else{
  	header("Location:index.php");
  }

?>