<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Accept, Origin, Authorization');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit();
}

require_once 'config.php';

$db = new db();
$conn = $db->connect();

$request_method = $_SERVER['REQUEST_METHOD'];
$path_info = isset($_SERVER['PATH_INFO']) ? explode('/', trim($_SERVER['PATH_INFO'], '/')) : [];
$resource = $path_info[0] ?? null;
$id = $path_info[1] ?? null;

function get_input_data()
{
    return json_decode(file_get_contents('php://input'), true);
}

function respond($data, $status = 200)
{
    http_response_code($status);
    echo json_encode($data);
    exit();
}

switch ($request_method) {
    case 'GET':
        if ($resource == 'users') {
            if ($id) {
                $stmt = $conn->prepare('SELECT * FROM users WHERE id = :id');
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($user) {
                    respond($user);
                } else {
                    respond(['message' => 'User not found'], 404);
                }
            } else {
                $stmt = $conn->query('SELECT * FROM users');
                $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
                respond($users);
            }
        } elseif ($resource == 'materials') {
            if ($id) {
                $stmt = $conn->prepare('SELECT * FROM materials WHERE id = :id');
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
                $material = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($material) {
                    respond($material);
                } else {
                    respond(['message' => 'Material not found'], 404);
                }
            } else {
                $stmt = $conn->query('SELECT * FROM materials');
                $materials = $stmt->fetchAll(PDO::FETCH_ASSOC);
                respond($materials);
            }
        } elseif ($resource == 'assessments') {
            if ($id) {
                $stmt = $conn->prepare('SELECT * FROM assessments WHERE id = :id');
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
                $assessment = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($assessment) {
                    respond($assessment);
                } else {
                    respond(['message' => 'Assessment not found'], 404);
                }
            } else {
                $stmt = $conn->query('SELECT * FROM assessments');
                $assessments = $stmt->fetchAll(PDO::FETCH_ASSOC);
                respond($assessments);
            }
        }
        break;

    case 'POST':
        $input = get_input_data();
        if ($resource == 'users') {
            $stmt = $conn->prepare('INSERT INTO users (name, username, password, email, course, role) VALUES (:name, :username, :password, :email, :course, :role)');
            $stmt->bindValue(':name', $input['name']);
            $stmt->bindValue(':username', $input['username']);
            $stmt->bindValue(':password', $input['password']);
            $stmt->bindValue(':email', $input['email']);
            $stmt->bindValue(':course', $input['course']);
            $stmt->bindValue(':role', $input['role']);
            if ($stmt->execute()) {
                respond(['message' => 'User created successfully', 'id' => $conn->lastInsertId()]);
            } else {
                respond(['message' => 'Failed to create user'], 400);
            }
        } elseif ($resource == 'materials') {
            $stmt = $conn->prepare('INSERT INTO materials (title, description, course) VALUES (:title, :description, :course)');
            $stmt->bindValue(':title', $input['title']);
            $stmt->bindValue(':description', $input['description']);
            $stmt->bindValue(':course', $input['course']);
            $stmt->execute();
            respond(['message' => 'Material created successfully', 'id' => $conn->lastInsertId()]);
        } elseif ($resource == 'assessments') {
            $stmt = $conn->prepare('INSERT INTO assessments (title, description, course) VALUES (:title, :description, :course)');
            $stmt->bindValue(':title', $input['title']);
            $stmt->bindValue(':description', $input['description']);
            $stmt->bindValue(':course', $input['course']);
            $stmt->execute();
            respond(['message' => 'Assessment created successfully', 'id' => $conn->lastInsertId()]);
        }
        break;

    case 'PUT':
        $input = get_input_data();
        if ($resource == 'users' && $id) {
            $stmt = $conn->prepare('UPDATE users SET name = :name, username = :username, password = :password, email = :email, course = :course, role = :role WHERE id = :id');
            $stmt->bindValue(':name', $input['name']);
            $stmt->bindValue(':username', $input['username']);
            $stmt->bindValue(':password', $input['password']);
            $stmt->bindValue(':email', $input['email']);
            $stmt->bindValue(':course', $input['course']);
            $stmt->bindValue(':role', $input['role']);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            respond(['message' => 'User updated successfully']);
        } elseif ($resource == 'materials' && $id) {
            $stmt = $conn->prepare('UPDATE materials SET title = :title, description = :description, course = :course WHERE id = :id');
            $stmt->bindValue(':title', $input['title']);
            $stmt->bindValue(':description', $input['description']);
            $stmt->bindValue(':course', $input['course']);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            respond(['message' => 'Material updated successfully']);
        } elseif ($resource == 'assessments' && $id) {
            $stmt = $conn->prepare('UPDATE assessments SET title = :title, description = :description, course = :course WHERE id = :id');
            $stmt->bindValue(':title', $input['title']);
            $stmt->bindValue(':description', $input['description']);
            $stmt->bindValue(':course', $input['course']);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            respond(['message' => 'Assessment updated successfully']);
        }
        break;

    case 'DELETE':
        if ($resource == 'users' && $id) {
            $stmt = $conn->prepare('DELETE FROM users WHERE id = :id');
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            respond(['message' => 'User deleted successfully']);
        } elseif ($resource == 'materials' && $id) {
            $stmt = $conn->prepare('DELETE FROM materials WHERE id = :id');
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            respond(['message' => 'Material deleted successfully']);
        } elseif ($resource == 'assessments' && $id) {
            $stmt = $conn->prepare('DELETE FROM assessments WHERE id = :id');
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            respond(['message' => 'Assessment deleted successfully']);
        }
        break;

    default:
        respond(['message' => 'Invalid request method'], 405);
        break;
}
?>