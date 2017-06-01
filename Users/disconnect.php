<?php
	session_start();
	require "../admin/lib.php";
	disconnect();
	header("Location:../index/index.php");
