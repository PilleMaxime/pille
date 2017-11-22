<?php
	include('includes/connexion.inc.php');
	$a=$_GET['a'];
	$b=$_GET['b'];
	if($a=='sup'){
		$sql="DELETE FROM messages WHERE id=:id";
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':id',$_GET['id']);
		$stmt->execute();
		header("location:index.php");
	}
	else if($b=='mod'){
		$sql="UPDATE messages SET contenu = :contenu WHERE id=:id";
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':id',$_GET['id']);
		$stmt->execute();
		
	}
	else{
		$sql = "INSERT INTO messages(contenu,date) VALUES (:contenu,UNIX_TIMESTAMP())";
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':contenu', $_POST['message']);
		$stmt->execute();
		header("location:index.php");
	}
	exit();
?>