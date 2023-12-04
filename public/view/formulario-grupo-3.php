<div class="wrapper-sidenav-e-form">
    <!-- navegador lateral -->
    <?php include 'view/sidenav.php' ?>
    <!-- formulario -->
<div class="content-wrapper">
        <div style="height: 820px;" class="form-info-geral">
            <span>Motivo da Visita</span>
            <div style="width:100%;padding-left:15%;text-align: left;display: grid;grid-template-columns: auto;" class="input-wrapper">
                <p class="descricao-input">Acompanhamento:</p>
                <div style="display: flex;align-items: center;">
                    <input class="input-checkbox-quadrado" type="checkbox" class="input-checkbox-quadrado" name="dpoc_enfisema" id="acompanhamento_pessoaComDPOCEnfisema">
                    <label style="padding-left: 5%;" for="dpoc_enfisema">Pessoa com DPOC/enfisema</label>
                </div>
                <br>
                <div style="display: flex;align-items: center;">
                    <input class="input-checkbox-quadrado" type="checkbox" class="input-checkbox-quadrado" name="cancer" id="acompanhamento_pessoaComCancer">
                    <label style="padding-left: 5%;" for="cancer">Pessoa com câncer</label>
                </div>
                <br>
                <div style="display: flex;align-items: center;">
                    <input class="input-checkbox-quadrado" type="checkbox" class="input-checkbox-quadrado" name="doenca_cronica" id="acompanhamento_pessoaComOutrasDoencasCronicas">
                    <label style="padding-left: 5%;" for="doenca_cronica">Pessoa com outras doenças crônicas</label>
                </div>
                <br>
                <div style="display: flex;align-items: center;">
                    <input class="input-checkbox-quadrado" type="checkbox" class="input-checkbox-quadrado" name="hanseniase" id="acompanhamento_pessoaComHanseniase">
                    <label style="padding-left: 5%;" for="hanseniase">Pessoa com hanseníase</label>
                </div>
                <br>
                <div style="display: flex;align-items: center;">
                    <input class="input-checkbox-quadrado" type="checkbox" class="input-checkbox-quadrado" name="tuberculose" id="acompanhamento_pessoaComTuberculose">
                    <label style="padding-left: 5%;" for="tuberculose">Pessoa com tuberculose</label>
                </div>
                <br>
                <div style="display: flex;align-items: center;">
                    <input class="input-checkbox-quadrado" type="checkbox" class="input-checkbox-quadrado" name="respiratorio" id="acompanhamento_sintomaticosRespiratorios">
                    <label style="padding-left: 5%;" for="respiratorio">Sintomáticos respiratórios</label>
                </div>
                <br>
                <div style="display: flex;align-items: center;">
                    <input class="input-checkbox-quadrado" type="checkbox" class="input-checkbox-quadrado" name="tabagista" id="acompanhamento_tabagista">
                    <label style="padding-left: 5%;" for="tabagista">Tabagista</label>
                </div>
                <br>
            </div>
            <br>
            <br>
            <div class="btns-wrapper" style="justify-content: space-betwenn;">
                <button id="btn-voltar-3" class="btn-secondary-menu-small" type="button">Voltar</button>
                <button id="btn-avancar-3" class="btn-primary-menu-small" type="button">Avançar</button>
            </div>
        </div>
</div>
</div>