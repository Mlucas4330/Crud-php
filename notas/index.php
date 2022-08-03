<?php include './inc/header.php'; ?>

<?php
$desc = $det = '';
$descErr = $detErr = '';
$sucess = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['descricao'])) {
        $descErr = 'Descrição requerida';
    } else {
        $desc = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }
    if (empty($_POST['detalhamento'])) {
        $detErr = 'Detalhamento requerido';
    } else {
        $det = filter_input(INPUT_POST, 'detalhamento', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }
    if (empty($descErr) && empty($detErr)) {
        $sql = "INSERT INTO notas (descricao, detalhamento) VALUES ('$desc', '$det')";

        if (mysqli_query($conn, $sql)) {
            $sucess = 'Enviado com sucesso.';
        } else {
            echo 'Error: ' . mysqli_error($conn);
        }
    }
}
?>


<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="w-50 p-3">
    <h1 class="text-center">Hello, world!</h1>
    <hr class="border border-dark opacity-100">
    <div class="mb-3">
        <input placeholder="Descrição" class="form-control <?= $descErr ? "is-invalid" : null ?>" type="text" name="descricao">
        <div class="invalid-feedback"><?= $descErr ?></div>
    </div>
    <div class="mb-3">
        <input placeholder="Detalhamento" class="form-control <?= $descErr ? "is-invalid" : null ?>" type="text" name="detalhamento">
        <div class="invalid-feedback"><?= $detErr ?></div>
    </div>
    <div class="d-flex justify-content-center">
        <input class="w-75" type="submit" value="Submit">
    </div>
    <?= $sucess ?: '' ?>
</form>
<?php include './inc/footer.php'; ?>