<?php
global $conn;
$request_method = $_SERVER['REQUEST_METHOD'];

// Parse the ID from the URL
$uri = $_SERVER['REQUEST_URI'];
$uri_segments = explode('/', $uri);
$id = intval(end($uri_segments));

switch ($request_method) {
    case 'GET':
        if ($id) {
            $sql = "SELECT * FROM users WHERE id = $id";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo json_encode($result->fetch_assoc());
            } else {
                echo json_encode(["message" => "User not found"]);
            }
        } else {
            $sql = "SELECT * FROM users";
            $result = $conn->query($sql);
            $users = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $users[] = $row;
                }
            }
            echo json_encode($users);
        }
        break;

    case 'POST':
        $input = get_input_data();
        $name = $conn->real_escape_string($input['name']);
        $username = $conn->real_escape_string($input['username']);
        $password = $conn->real_escape_string($input['password']);
        $email = $conn->real_escape_string($input['email']);
        $course = $conn->real_escape_string($input['course']);
        $role = $conn->real_escape_string($input['role']);
        $sql = "INSERT INTO users (name, username, password, email, course, role) VALUES ('$name', '$username', '$password', '$email', '$course', '$role')";
        if ($conn->query($sql) === TRUE) {
            echo json_encode(["message" => "User created successfully", "id" => $conn->insert_id]);
        } else {
            echo json_encode(["message" => "Error: " . $conn->error]);
        }
        break;

    case 'PUT':
        $input = get_input_data();
        if ($id) {
            $name = $conn->real_escape_string($input['name']);
            $username = $conn->real_escape_string($input['username']);
            $password = $conn->real_escape_string($input['password']);
            $email = $conn->real_escape_string($input['email']);
            $course = $conn->real_escape_string($input['course']);
            $role = $conn->real_escape_string($input['role']);
            $sql = "UPDATE users SET name='$name', username='$username', password='$password', email='$email', course='$course', role='$role' WHERE id=$id";
            if ($conn->query($sql) === TRUE) {
                echo json_encode(["message" => "User updated successfully"]);
            } else {
                echo json_encode(["message" => "Error: " . $conn->error]);
            }
        } else {
            echo json_encode(["message" => "User ID not provided"]);
        }
        break;

    case 'DELETE':
        if ($id) {
            $sql = "DELETE FROM users WHERE id = $id";
            if ($conn->query($sql) === TRUE) {
                echo json_encode(["message" => "User deleted successfully"]);
            } else {
                echo json_encode(["message" => "Error: " . $conn->error]);
            }
        } else {
            echo json_encode(["message" => "User ID not provided"]);
        }
        break;

    default:
        echo json_encode(["message" => "Invalid request method"]);
        break;
}
?>