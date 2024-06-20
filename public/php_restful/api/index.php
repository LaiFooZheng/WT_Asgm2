<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Accept, Origin, Authorization');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');

require_once 'config.php';

// Helper function to get input data
function get_input_data()
{
    return json_decode(file_get_contents('php://input'), true);
}

$conn = getDbConnection();

// Parse the request URL to determine the resource and ID
$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);
$path = trim($request_uri[0], '/');
$segments = explode('/', $path);

$resource = null;
$id = null;

// Determine resource and ID
if (count($segments) >= 2 && $segments[count($segments) - 2] === 'api') {
    $resource = $segments[count($segments) - 1];
} elseif (count($segments) >= 3 && $segments[count($segments) - 3] === 'api') {
    $resource = $segments[count($segments) - 2];
    $id = intval($segments[count($segments) - 1]);
}

// Output parsed URI for debugging
// Uncomment the following line to debug the parsed URI
// echo json_encode(['resource' => $resource, 'id' => $id]); exit();

// Include the appropriate resource file based on the request
switch ($resource) {
    case 'users':
        require_once 'users.php';
        break;
    case 'materials':
        require_once 'materials.php';
        break;
    case 'assessments':
        require_once 'assessments.php';
        break;
    default:
        echo json_encode(["message" => "Invalid resource"]);
        break;
}

$conn->close();
?>