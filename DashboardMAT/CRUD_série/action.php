<?php

require('../include/connection.php');

if (isset($_POST['action']) && $_POST['action'] === 'create') {

    $ensino = $_POST['ensino'];
    $periodo = $_POST['período'];

    try {
        $stmt = $pdo->prepare("INSERT INTO serie (ensino, periodo) VALUES ( :ensino, :periodo)");

        $stmt->execute([
            ':ensino' => $ensino,
            ':periodo' => $periodo
        ]);

        $ultimoId = $pdo->lastInsertId();
        echo "Questão salva com sucesso! ID: $ultimoId";

    } catch (PDOException $e) {
        echo "Erro ao salvar questão: " . $e->getMessage();
    }
}


if (isset($_POST['action']) && $_POST['action'] === 'delete') {

}

if (isset($_POST['action']) && $_POST['action'] === 'edit') {

    $id = $_POST['id'] ?? null;

    if (!$id) {
        die("ID da questão não especificado.");
    }

    // Consulta atual da questão

    $stmt = $pdo->prepare("SELECT * FROM serie WHERE id = ?");
    $stmt->execute([$id]);
    $serie = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$serie) {
        die("Questão não encontrada para o ID: $id");
    }

    $ensino = $_POST['ensino'];
    $periodo = $_POST['período'];



    try {
        $stmt = $pdo->prepare("UPDATE serie SET ensino = :ensino, periodo = :periodo WHERE id = :id");

        $stmt->execute([
            ':ensino' => $ensino,
            ':periodo' => $periodo
        ]);

        echo "Questão atualizada com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao atualizar: " . $e->getMessage();
    }
}

?>