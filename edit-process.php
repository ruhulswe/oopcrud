<?php 

	require_once (__DIR__.'/inc/header.php');

	if($_SERVER['REQUEST_METHOD']=='POST'){

		$id = $hp->validation($_POST['id']);
		$task = $hp->validation($_POST['task']);

		$sql = "UPDATE nur SET task = '$task' WHERE id = $id";
		$updated = $db->updating($sql);

		if($updated){
			$_SESSION['rowEffected'] = "task updated";
			header("Location:index.php");
		}else{
			echo "something went wrong";
		}

	}

?>