<?php
session_start();
session_destroy();
include('/config.php');

header('Refresh: 2; URL = '.$root_directory.'/signin.php');
