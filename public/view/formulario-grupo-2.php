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
                    <input class="input-checkbox-quadrado" type="checkbox" class="input-checkbox-quadrado" name="recem_nascido" id="acompanhamento_recemNascido">
                    <label style="padding-left: 5%;" for="recem_nascido">Recém-nascido</label>
                </div>
                <br>
                <div style="display: flex;align-items: center;">
                    <input class="input-checkbox-quadrado" type="checkbox" class="input-checkbox-quadrado" name="crianca" id="acompanhamento_crianca">
                    <label style="padding-left: 5%;" for="crianca">Criança</label>
                </div>
                <br>
                <div style="display: flex;align-items: center;">
                    <input class="input-checkbox-quadrado" type="checkbox" class="input-checkbox-quadrado" name="pessoa_desnutricao" id="acompanhamento_pessoaComDesnutricao">
                    <label style="padding-left: 5%;" for="pessoa_desnutricao">Pessoa com desnutrição</label>
                </div>
                <br>
                <div style="display: flex;align-items: center;">
                    <input class="input-checkbox-quadrado" type="checkbox" class="input-checkbox-quadrado" name="pessoa_rehab_def" id="acompanhamento_pessoaEmReabilitacaoOuComDeficiencia">
                    <label style="padding-left: 5%;" for="pessoa_rehab_def">Pessoa em reabilitação <br>ou com deficiência</label>
                </div>
                <br>
                <div style="display: flex;align-items: center;">
                    <input class="input-checkbox-quadrado" type="checkbox" class="input-checkbox-quadrado" name="hipertensao" id="acompanhamento_pessoaComHipertensao">
                    <label style="padding-left: 5%;" for="hipertensao">Pessoa com hipertensão</label>
                </div>
                <br>
                <div style="display: flex;align-items: center;">
                    <input class="input-checkbox-quadrado" type="checkbox" class="input-checkbox-quadrado" name="diabetes" id="acompanhamento_pessoaComDiabetes">
                    <label style="padding-left: 5%;" for="diabetes">Pessoa com diabetes</label>
                </div>
                <br>
                <div style="display: flex;align-items: center;">
                    <input class="input-checkbox-quadrado" type="checkbox" class="input-checkbox-quadrado" name="asma" id="acompanhamento_pessoaComAsma">
                    <label style="padding-left: 5%;" for="asma">Pessoa com asma</label>
                </div>
                <br>
            </div>
            <br>
            <br>
            <div class="btns-wrapper" style="justify-content: space-betwenn;">
                <button id="btn-voltar-2" class="btn-secondary-menu-small" type="button">Voltar</button>
                <button id="btn-avancar-2" class="btn-primary-menu-small" type="button">Avançar</button>
            </div>
        </div>
</div>
</div>