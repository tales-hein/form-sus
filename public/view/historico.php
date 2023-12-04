<!DOCTYPE html>

<?php
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
    <title>E-Visitas - Histórico</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../script/historico.js"></script>
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
    <div id="wrapper_conteudo_historico" style="display: flex; justify-content: center; align-items: center;">
        <div class="wrapper-sidenav-e-form">
            <div class="content-wrapper">
                    <div style="height: auto; padding-top: 2rem; padding-bottom: 2rem;" class="form-info-geral">
                        <span>Visitas cadastradas:</span>
                        <br>
                        <div style="width:100%;padding-left:15%;text-align: left;display: grid;grid-template-columns: auto;" class="input-wrapper">
                        <?php
                            $cns = $_GET['cns']; 
                            $url = 'https://formsus.api.previa.app/api/visits/list?cns='. $cns .'&start=0&rows=10';
                            $response = file_get_contents($url);
                            if ($response === false) {
                                echo "<p>Você não tem nenhuma visita cadastrada.</p>";
                            } else {
                                $decodedResponse = json_decode($response, true);
                                if(!$decodedResponse) {
                                    echo "<p style='color:black;'>Nenhuma visita foi encontrada.</p>";
                                }
                                $docs = $decodedResponse['response']['docs'];
                                foreach ($docs as $doc) {
                                    $cnsCidadao = $doc['cnsCidadao'];
                                    $nomeCompleto = $doc['nomeCompleto'];
                                    $idVisita = $doc['id'];
                                    echo '<div style="display: flex; align-items: center;">
                                            <div style="width: 360px; height: 150px; padding: 16px; border-radius: 8px; border: 1px #ABB9C0 solid; flex-direction: column; justify-content: center; align-items: flex-start; gap: 5px; display: inline-flex;">
                                                <div>
                                                    <span style="color: black; font-size: 16px; font-family: Noto Sans; font-weight: 400; word-wrap: break-word">CNS do cidadão:</span>
                                                    <span id="cns_cidadao" style="color: black; font-size: 16px; font-family: Noto Sans; font-weight: 600; word-wrap: break-word">' . $cnsCidadao . '</span>
                                                </div>
                                                <div>
                                                    <span style="color: black; font-size: 16px; font-family: Noto Sans; font-weight: 400; word-wrap: break-word">Nome do cidadão:</span>
                                                    <span id="nome_cidadao" style="color: black; font-size: 16px; font-family: Noto Sans; font-weight: 600; word-wrap: break-word">' . $nomeCompleto . '</span>
                                                </div>
                                                <br>
                                                <button class="btn-primary-menu-small" id="id_visita_' . $idVisita . '">Rever</button>
                                            </div>
                                        </div><br>';
                                        
                                }
                            }
                        ?>
                        </div>
                        <br>
                        <div class="btns-wrapper" style="justify-content: space-betwenn;">
                            <button id="btn_voltar_historico" class="btn-secondary-menu-small" type="button">Voltar</button>
                        </div>
                    </div>
            </div>
        </div>
    </div>
<!-- Footer -->

    <footer class="footer">
        <p>Contato suporte: suporte.evisitas@email.com</p>
        <p>© 2023 eVisitas</p>
    </footer>

</body>
</html>