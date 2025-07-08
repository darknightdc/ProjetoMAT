<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EDIT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <?php
    require('../include/connection.php');

    $id = $_GET['id'] ?? null;

    if (!$id) {
        echo "<div class='alert alert-danger'>ID da questão não informado.</div>";
        exit;
    }

    $stmt = $pdo->prepare("SELECT * FROM questoes WHERE id = ?");
    $stmt->execute([$id]);
    $serie = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$serie) {
        echo "<div class='alert alert-danger'>Questão não encontrada.</div>";
        exit;
    }
    ?>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">EDIT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="container mt-4 pt-5">
        <form action="#" method="post" class="pt-4">
            <input type="hidden" name="id" value="<?= $serie['id'] ?>" />
            <div class="row g-3">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Ensino" aria-label="Ensino">
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Período" aria-label="Período">
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit">EDITAR</button>
                </div>
            </div>
        </form>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>



</body>

</html>