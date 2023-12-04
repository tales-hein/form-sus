<!DOCTYPE html>

<?php
if (isset($_GET['idvisita'])) {
    $id = $_GET['idvisita'];
    echo "<input type='hidden' id='id_visita_revisao' value='$id'>";
}
if (isset($_GET['cns'])) {
    $cns = $_GET['cns'];
    echo "<input type='hidden' id='cns_agente_logado' value='$cns'>";
}else{
    print_r('Erro: Você não tem permissão para entrar.');
    exit();
}
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Visitas - Formulário</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../script/formulario.js"></script>
    <link rel="stylesheet" href="../styles/style.css">
    <link href='https://fonts.googleapis.com/css?family=Noto Sans' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
<!-- Header -->

    <header class="header">
        <p>Portal E-Visitas</p>
    </header>

<!-- Conteudo -->
<br><br><br>
    <div id="wrapper_conteudo_formulario" style="height: 1200px; display: flex; justify-content: center; align-items: center;">
    </div>
<!-- Footer -->

    <footer class="footer">
        <p>Contato suporte: suporte.evisitas@email.com</p>
        <p>© 2023 eVisitas</p>
    </footer>

</body>
</html>