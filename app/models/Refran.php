<?php

class Refran
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function obtenerTodos()
    {
        $sql = "SELECT * FROM refranes";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorId($id)
    {
        $sql = "SELECT * FROM refranes WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insertar($data)
    {
        $sql = "SELECT * FROM refranes WHERE frase = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$data['frase']]);
        if ($stmt->rowCount() > 0) {
            return ['mensaje' => 'El refrán ya existe'];
        }

        $sql = "INSERT INTO refranes (autor, fecha, frase, usuario, ubicacion, idioma, tipo, es_admin) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $data['autor'], $data['fecha'], $data['frase'],
            $data['usuario'], $data['ubicacion'], $data['idioma'],
            $data['tipo'], $data['es_admin']
        ]);
        return ['mensaje' => 'Refrán agregado exitosamente'];
    }

    public function actualizar($id, $data)
    {
        $sql = "UPDATE refranes SET autor = ?, fecha = ?, frase = ?, ubicacion = ?, idioma = ?, tipo = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $data['autor'], $data['fecha'], $data['frase'], $data['ubicacion'],
            $data['idioma'], $data['tipo'], $id
        ]);
        return ['mensaje' => 'Refrán actualizado'];
    }

    public function eliminar($id)
    {
        $sql = "SELECT * FROM refranes WHERE id = ? AND es_admin = 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);

        if ($stmt->rowCount() > 0) {
            $sql = "DELETE FROM refranes WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id]);
            return ['mensaje' => 'Refrán eliminado'];
        } else {
            return ['mensaje' => 'Solo los administradores pueden eliminar refranes'];
        }
    }
}
