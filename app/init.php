<?php

	require_once 'core/App.php';
	require_once 'core/Controller.php';
	require_once 'core/Model.php';

	// display errors, warnings, and notices
	ini_set("display_errors", true);
    error_reporting(E_ALL);

    // enable sessions
    session_start();