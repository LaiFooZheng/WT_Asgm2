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
            $sql = "SELECT * FROM assessments WHERE id = $id";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo json_encode($result->fetch_assoc());
            } else {
                echo json_encode(["message" => "Assessment not found"]);
            }
        } else {
            $sql = "SELECT * FROM assessments";
            $result = $conn->query($sql);
            $assessments = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $assessments[] = $row;
                }
            }
            echo json_encode($assessments);
        }
        break;

    case 'POST':
        $input = get_input_data();
        $title = $conn->real_escape_string($input['title']);
        $description = $conn->real_escape_string($input['description']);
        $course = $conn->real_escape_string($input['course']);
        $sql = "INSERT INTO assessments (title, description, course) VALUES ('$title', '$description', '$course')";
        if ($conn->query($sql) === TRUE) {
            echo json_encode(["message" => "Assessment created successfully", "id" => $conn->insert_id]);
        } else {
            echo json_encode(["message" => "Error: " . $conn->error]);
        }
        break;

    case 'PUT':
        $input = get_input_data();
        if ($id) {
            $title = $conn->real_escape_string($input['title']);
            $description = $conn->real_escape_string($input['description']);
            $course = $conn->real_escape_string($input['course']);
            $sql = "UPDATE assessments SET title='$title', description='$description', course='$course' WHERE id=$id";
            if ($conn->query($sql) === TRUE) {
                echo json_encode(["message" => "Assessment updated successfully"]);
            } else {
                echo json_encode(["message" => "Error: " . $conn->error]);
            }
        } else {
            echo json_encode(["message" => "Assessment ID not provided"]);
        }
        break;

    case 'DELETE':
        if ($id) {
            $sql = "DELETE FROM assessments WHERE id = $id";
            if ($conn->query($sql) === TRUE) {
                echo json_encode(["message" => "Assessment deleted successfully"]);
            } else {
                echo json_encode(["message" => "Error: " . $conn->error]);
            }
        } else {
            echo json_encode(["message" => "Assessment ID not provided"]);
        }
        break;

    default:
        echo json_encode(["message" => "Invalid request method"]);
        break;
}
?>