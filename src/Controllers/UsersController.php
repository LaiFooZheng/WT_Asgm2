<?php
namespace App\Controllers;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UsersController
{
    protected $db;

    public function __construct(ContainerInterface $container)
    {
        $this->db = $container->get('db');
    }

    public function getAll(Request $request, Response $response, $args)
    {
        $stmt = $this->db->query("SELECT * FROM users");
        $users = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $response->getBody()->write(json_encode($users));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function get(Request $request, Response $response, $args)
    {
        $id = $args['id'];
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        $user = $stmt->fetch(\PDO::FETCH_ASSOC);
        if ($user) {
            $response->getBody()->write(json_encode($user));
            return $response->withHeader('Content-Type', 'application/json');
        }
        $response->getBody()->write(json_encode(['message' => 'User not found']));
        return $response->withStatus(404)->withHeader('Content-Type', 'application/json');
    }

    public function create(Request $request, Response $response)
    {
        $data = $request->getParsedBody();
        $stmt = $this->db->prepare("INSERT INTO users (name, username, password, email, course, role) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$data['name'], $data['username'], $data['password'], $data['email'], $data['course'], $data['role']]);
        $response->getBody()->write(json_encode(['message' => 'User created successfully', 'id' => $this->db->lastInsertId()]));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function update(Request $request, Response $response, $args)
    {
        $id = $args['id'];
        $data = $request->getParsedBody();
        $stmt = $this->db->prepare("UPDATE users SET name = ?, username = ?, password = ?, email = ?, course = ?, role = ? WHERE id = ?");
        $stmt->execute([$data['name'], $data['username'], $data['password'], $data['email'], $data['course'], $data['role'], $id]);
        $response->getBody()->write(json_encode(['message' => 'User updated successfully']));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function delete(Request $request, Response $response, $args)
    {
        $id = $args['id'];
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$id]);
        $response->getBody()->write(json_encode(['message' => 'User deleted successfully']));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function login(Request $request, Response $response)
    {
        $data = $request->getParsedBody();

        // Debugging lines
        error_log('Login Data: ' . print_r($data, true));

        if (!isset($data['username']) || !isset($data['password'])) {
            $response->getBody()->write(json_encode(['message' => 'Username and password required']));
            return $response->withStatus(400)->withHeader('Content-Type', 'application/json');
        }

        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
        $stmt->execute([$data['username'], $data['password']]);
        $user = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($user) {
            $response->getBody()->write(json_encode($user));
            return $response->withHeader('Content-Type', 'application/json');
        }

        $response->getBody()->write(json_encode(['message' => 'Invalid username or password']));
        return $response->withStatus(401)->withHeader('Content-Type', 'application/json');
    }

    public function register(Request $request, Response $response)
    {
        $data = $request->getParsedBody();
        $stmt = $this->db->prepare("INSERT INTO users (name, username, password, email, course, role) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$data['name'], $data['username'], $data['password'], $data['email'], $data['course'], $data['role']]);
        $response->getBody()->write(json_encode(['message' => 'User registered successfully', 'id' => $this->db->lastInsertId()]));
        return $response->withHeader('Content-Type', 'application/json');
    }
}

?>