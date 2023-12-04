<div class="wrapper-sidenav-e-form">
    <!-- navegador lateral -->
    <?php include 'view/sidenav.php' ?>
    <!-- formulario -->
<div class="content-wrapper">
        <div style="height: 950px;" class="form-info-geral">
            <span>Motivo da Visita</span>
            <div style="width:100%;padding-left:15%;text-align: left;display: grid;grid-template-columns: auto;" class="input-wrapper">
                <p class="descricao-input">Geral:</p>
                <div style="display: flex;align-items: center;">
                    <input class="input-checkbox-quadrado" type="checkbox" class="input-checkbox-quadrado" name="cadastramento_atualizacao" id="geral_cadastramentoAtualizacao">
                    <label style="padding-left: 5%;" for="cadastramento_atualizacao">Cadastramento/Atualização</label>
                </div>
                <br>
                <div style="display: flex;align-items: center;">
                    <input class="input-checkbox-quadrado" type="checkbox" class="input-checkbox-quadrado" name="visita-periodica" id="geral_visitaPeriodica">
                    <label style="padding-left: 5%;" for="visita-periodica">Visita periódica</label>
                </div>
                <br>
            </div>
            <div style="width:100%;padding-left:15%;text-align: left;display: grid;grid-template-columns: auto;" class="input-wrapper">
                <p class="descricao-input">Busca ativa:</p>
                <div style="display: flex;align-items: center;">
                    <input class="input-checkbox-quadrado" type="checkbox" class="input-checkbox-quadrado" name="consulta" id="busca_consulta">
                    <label style="padding-left: 5%;" for="consulta">Consulta</label>
                </div>
                <br>
                <div style="display: flex;align-items: center;">
                    <input class="input-checkbox-quadrado" type="checkbox" class="input-checkbox-quadrado" name="exame" id="busca_exame">
                    <label style="padding-left: 5%;" for="exame">Exame</label>
                </div>
                <br>
                <div style="display: flex;align-items: center;">
                    <input class="input-checkbox-quadrado" type="checkbox" class="input-checkbox-quadrado" name="vacina" id="busca_vacina">
                    <label style="padding-left: 5%;" for="vacina">Vacina</label>
                </div>
                <br>
            </div>
            <div style="width:100%;padding-left:15%;text-align: left;display: grid;grid-template-columns: auto;" class="input-wrapper">
                <p class="descricao-input">Acompanhamento:</p>
                <div style="display: flex;align-items: center;">
                    <input class="input-checkbox-quadrado" type="checkbox" class="input-checkbox-quadrado" name="gestante" id="acompanhamento_gestante">
                    <label style="padding-left: 5%;" for="gestante">Gestante</label>
                </div>
                <br>
                <div style="display: flex;align-items: center;">
                    <input class="input-checkbox-quadrado" type="checkbox" class="input-checkbox-quadrado" name="puerpera" id="acompanhamento_puerpera">
                    <label style="padding-left: 5%;" for="puerpera">Puérpera</label>
                </div>
                <br>
            </div>
            <br>
            <br>
            <div class="btns-wrapper" style="justify-content: space-betwenn;">
                <button id="btn-voltar-1" class="btn-secondary-menu-small" type="button">Voltar</button>
                <button id="btn-avancar-1" class="btn-primary-menu-small" type="button">Avançar</button>
            </div>
        </div>
</div>
</div>