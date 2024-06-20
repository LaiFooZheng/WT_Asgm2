<?php
namespace App\Controllers;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AssessmentsController
{
    protected $db;

    public function __construct(ContainerInterface $container)
    {
        $this->db = $container->get('db');
    }

    public function getAll(Request $request, Response $response)
    {
        $stmt = $this->db->query("SELECT * FROM assessments");
        $assessments = $stmt->fetchAll();
        $response->getBody()->write(json_encode($assessments));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function get(Request $request, Response $response, $args)
    {
        $id = $args['id'];
        $stmt = $this->db->prepare("SELECT * FROM assessments WHERE id = ?");
        $stmt->execute([$id]);
        $assessment = $stmt->fetch();
        if ($assessment) {
            $response->getBody()->write(json_encode($assessment));
            return $response->withHeader('Content-Type', 'application/json');
        }
        $response->getBody()->write(json_encode(['message' => 'Assessment not found']));
        return $response->withStatus(404)->withHeader('Content-Type', 'application/json');
    }

    public function create(Request $request, Response $response)
    {
        $data = $request->getParsedBody();
        $stmt = $this->db->prepare("INSERT INTO assessments (title, description, course) VALUES (?, ?, ?)");
        $stmt->execute([$data['title'], $data['description'], $data['course']]);
        $response->getBody()->write(json_encode(['message' => 'Assessment created successfully', 'id' => $this->db->lastInsertId()]));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function update(Request $request, Response $response, $args)
    {
        $id = $args['id'];
        $data = $request->getParsedBody();
        $stmt = $this->db->prepare("UPDATE assessments SET title = ?, description = ?, course = ? WHERE id = ?");
        $stmt->execute([$data['title'], $data['description'], $data['course'], $id]);
        $response->getBody()->write(json_encode(['message' => 'Assessment updated successfully']));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function delete(Request $request, Response $response, $args)
    {
        $id = $args['id'];
        $stmt = $this->db->prepare("DELETE FROM assessments WHERE id = ?");
        $stmt->execute([$id]);
        $response->getBody()->write(json_encode(['message' => 'Assessment deleted successfully']));
        return $response->withHeader('Content-Type', 'application/json');
    }
}
