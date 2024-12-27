<?php 
    @session_start();
    if(@$_SESSION['idnivel'] != '4'){
	    echo "<script language='javascript'> window.location='../../' </script>";
	    exit();
    }
?>