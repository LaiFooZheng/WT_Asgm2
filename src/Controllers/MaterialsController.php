<?php
namespace App\Controllers;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class MaterialsController
{
    protected $db;

    public function __construct(ContainerInterface $container)
    {
        $this->db = $container->get('db');
    }

    public function getAll(Request $request, Response $response)
    {
        $stmt = $this->db->query("SELECT * FROM materials");
        $materials = $stmt->fetchAll();
        $response->getBody()->write(json_encode($materials));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function get(Request $request, Response $response, $args)
    {
        $id = $args['id'];
        $stmt = $this->db->prepare("SELECT * FROM materials WHERE id = ?");
        $stmt->execute([$id]);
        $material = $stmt->fetch();
        if ($material) {
            $response->getBody()->write(json_encode($material));
            return $response->withHeader('Content-Type', 'application/json');
        }
        $response->getBody()->write(json_encode(['message' => 'Material not found']));
        return $response->withStatus(404)->withHeader('Content-Type', 'application/json');
    }

    public function create(Request $request, Response $response)
    {
        $data = $request->getParsedBody();
        $stmt = $this->db->prepare("INSERT INTO materials (title, description, course) VALUES (?, ?, ?)");
        $stmt->execute([$data['title'], $data['description'], $data['course']]);
        $response->getBody()->write(json_encode(['message' => 'Material created successfully', 'id' => $this->db->lastInsertId()]));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function update(Request $request, Response $response, $args)
    {
        $id = $args['id'];
        $data = $request->getParsedBody();
        $stmt = $this->db->prepare("UPDATE materials SET title = ?, description = ?, course = ? WHERE id = ?");
        $stmt->execute([$data['title'], $data['description'], $data['course'], $id]);
        $response->getBody()->write(json_encode(['message' => 'Material updated successfully']));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function delete(Request $request, Response $response, $args)
    {
        $id = $args['id'];
        $stmt = $this->db->prepare("DELETE FROM materials WHERE id = ?");
        $stmt->execute([$id]);
        $response->getBody()->write(json_encode(['message' => 'Material deleted successfully']));
        return $response->withHeader('Content-Type', 'application/json');
    }
}
