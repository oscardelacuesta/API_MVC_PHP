<?php

class RefranController
{
    private $refranModel;

    public function __construct($pdo)
    {
        $this->refranModel = new Refran($pdo);
    }

    public function handleRequest()
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        switch ($requestMethod) {
            case 'GET':
                if (isset($_GET['id'])) {
                    $this->obtenerPorId($_GET['id']);
                } else {
                    $this->obtenerTodos();
                }
                break;
            case 'POST':
                $this->insertar();
                break;
            case 'PUT':
                if (isset($_GET['id'])) {
                    $this->actualizar($_GET['id']);
                }
                break;
            case 'DELETE':
                if (isset($_GET['id'])) {
                    $this->eliminar($_GET['id']);
                }
                break;
            default:
                echo json_encode(['mensaje' => 'Método no permitido']);
                break;
        }
    }

    public function obtenerTodos()
    {
        $refranes = $this->refranModel->obtenerTodos();
        echo json_encode($refranes);
    }

    public function obtenerPorId($id)
    {
        $refran = $this->refranModel->obtenerPorId($id);
        echo json_encode($refran);
    }

    public function insertar()
    {
        // Leer y decodificar el cuerpo de la solicitud
        $data = json_decode(file_get_contents('php://input'), true);

        // Verificar si el JSON es válido
        if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
            echo json_encode([
                'status' => 'error',
                'message' => 'JSON inválido: ' . json_last_error_msg()
            ]);
            exit;
        }

        // Realizar la inserción
        $resultado = $this->refranModel->insertar($data);
        echo json_encode($resultado);
    }

    public function actualizar($id)
    {
        $data = json_decode(file_get_contents('php://input'), true);

        if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
            echo json_encode([
                'status' => 'error',
                'message' => 'JSON inválido: ' . json_last_error_msg()
            ]);
            exit;
        }

        $resultado = $this->refranModel->actualizar($id, $data);
        echo json_encode($resultado);
    }

    public function eliminar($id)
    {
        $resultado = $this->refranModel->eliminar($id);
        echo json_encode($resultado);
    }
}
