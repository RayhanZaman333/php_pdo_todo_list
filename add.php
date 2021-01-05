<?php

	if(isset($_POST['title'])){
	    require '../dbconfig.php';

	    $title = $_POST['title'];

	    if(empty($title)){
	        header("Location: ../index.php?msg=error");
	    }else {
	        $stmt = $conn->prepare("INSERT INTO todos(title) VALUE(?)");
	        $res = $stmt->execute([$title]);

	        if($res){
	            header("Location: ../index.php?msg=success"); 
	        }else {
	            header("Location: ../index.php");
	        }

	        $conn = null;
	        exit();
	    }
	    
	}else {
	    header("Location: ../index.php?msg=error");
	}