<?php
require_once 'functions.php';
require_once 'vendor/autoload.php';
use Firebase\JWT\JWT;

session_start();
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "cms");
define("JWT_KEY", 'waesrdxfcgvbhdddsdjnaszdxcfgvbhnjszxdcfgvbhnj');
$connection = db_connect();
