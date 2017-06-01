<?php
	session_start();
	require "../admin/lib.php";
	AdminDisconnect();
	header("Location:../index/index.php");
