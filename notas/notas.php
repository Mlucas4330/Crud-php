<?php include './inc/header.php' ?>
<?php
$sql = 'SELECT * FROM notas';
$result = mysqli_query($conn, $sql);
$notas = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<table class="table table-striped table-bordered">
    <thead class="table-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Descrição</th>
            <th scope="col">Detalhamento</th>
            <th scope="col">Data</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($notas as $nota) { ?>
            <tr>
                <th scope="row"><?= $nota['id'] ?></th>
                <td><?= $nota['descricao'] ?></td>
                <td><?= $nota['detalhamento'] ?></td>
                <td><?= $nota['data'] ?></td>
                <td><button class="btn btn-success">Editar</button><button class="btn btn-danger">Excluir</button></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php include './inc/footer.php' ?>