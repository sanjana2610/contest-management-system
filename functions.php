<?php
use Firebase\JWT\JWT;
function clean($string = "")
{
    global $connection;
    return mysqli_real_escape_string($connection, $string);
}

function h($str)
{
    return htmlspecialchars($str);
}

function db_connect()
{
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME) or die("Connect Error");
    confirm_db_connect();
    return $connection;
}

function startSession($jwt)
{
    // $cookie_name = "token";
    // $cookie_value = $jwt;
    session_start();
    $_SESSION['token'] = $jwt;
    // setcookie($cookie_name, $cookie_value, time() + 3600, "/");
}

function destroySession()
{
    unset($_SESSION['token']);  
    session_destroy(); 
}

function verifySession()
{
    if (isset($_SESSION['token'])) {
        $user = verify_jwt($_SESSION['token']);
        if (isset($user)) {
            return true;
        }

    }
    return false;
}

function getUsername()
{
    $jwt = $_SESSION['token'];
    $key = JWT_KEY;
    try {
        $decoded = JWT::decode($jwt, $key, array('HS256'));
        $decoded_array = (array) $decoded;
        return $decoded_array['username'];
    } catch (\Exception $e) {
        return null;
    }
}

function confirm_db_connect()
{
    if (mysqli_connect_errno()) {
        $msg = "Database connection failed. ";
        $msg .= mysqli_connect_error();
        $msg .= " (" . mysqli_connect_errno() . ")";
        exit($msg);
    }
}

function query($sql)
{
    global $connection;
    $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));
    return $res;
}

function verify_jwt($jwt)
{
    $key = JWT_KEY;
    try {
        $decoded = JWT::decode($jwt, $key, array('HS256'));
        $decoded_array = (array) $decoded;
        return $decoded_array['username'];
    } catch (\Exception $e) {
        return null;
    }
}

function getAuthorizationHeader()
{
    $headers = null;
    if (isset($_SERVER['Authorization'])) {
        $headers = trim($_SERVER["Authorization"]);
    } else if (isset($_SERVER['HTTP_AUTHORIZATION'])) { //Nginx or fast CGI
        $headers = trim($_SERVER["HTTP_AUTHORIZATION"]);
    } elseif (function_exists('apache_request_headers')) {
        $requestHeaders = apache_request_headers();
        // Server-side fix for bug in old Android versions (a nice side-effect of this fix means we don't care about capitalization for Authorization)
        $requestHeaders = array_combine(array_map('ucwords', array_keys($requestHeaders)), array_values($requestHeaders));
        //print_r($requestHeaders);
        if (isset($requestHeaders['Authorization'])) {
            $headers = trim($requestHeaders['Authorization']);
        }
    }
    return $headers;
}

function getBearerToken()
{
    $headers = getAuthorizationHeader();
    // HEADER: Get the access token from the header
    if (!empty($headers)) {
        if (preg_match('/Bearer\s(\S+)/', $headers, $matches)) {
            return $matches[1];
        }
    }
    return null;
}
