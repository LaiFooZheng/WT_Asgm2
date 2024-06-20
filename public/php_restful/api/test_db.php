<?php
require_once 'config.php';

$conn = getDbConnection();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connection successful";
}
?>