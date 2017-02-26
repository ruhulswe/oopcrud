<?php 

	require_once (__DIR__.'/inc/header.php');

	if(!empty($_GET['id'])){

		$id = $hp->validation($_GET['id']);

		$sql = "DELETE FROM nur WHERE id = $id";
		$updated = $db->deleting($sql);

		if($updated){
			$_SESSION['rowEffected'] = "task deleted";
			header("Location:index.php");
		}else{
			echo "something went wrong";
		}

	}else{
		header("Location:index.php");
	}

?>