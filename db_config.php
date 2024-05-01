<?php

$dbconn = getOracleConnection();
function getOracleConnection() {
    $user = "hr"; // Your Oracle database username 
    $pass = "hr"; // Your Oracle database password
    $host = "localhost/orclpdb"; // Your Oracle database host and service name

    $dbconn = oci_connect($user, $pass, $host);
    if (!$dbconn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
        return null;
    }
    return $dbconn;
}
?>
