<?php include './inc/header.php'; ?>
<?php require_once('class/config.php'); ?>
<?php require_once('loadClass.php'); ?>

<?php
if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['repete_senha'])) {
    $nome = test_input($_POST['nome']);
    $email = test_input($_POST['email']);
    $senha = test_input($_POST['senha']);
    $repete_senha = test_input($_POST['repete_senha']);

    if (empty($nome) || empty($email) || empty($senha) || empty($repete_senha)) {
        $erro_geral = "Todos os campos são obrigatórios";
    } else {
        $usuario = new Usuario($nome, $email, $senha);
        $usuario->set_repeticao($repete_senha);
        $usuario->validar_cadastro();

        if (empty($usuario->erro)) {
            if ($usuario->insert()) {
                header('location: index.php');
            } else {
                $erro_geral = $usuario->erro["erro_geral"];
            }
        }
    }
}
?>


<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <input type="text" name="name" placeholder="Username">
    <input type="email" name="email" placeholder="E-mail">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" value="Submit">
</form>
<?php include './inc/footer.php'; ?>