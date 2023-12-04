<div class="wrapper-sidenav-e-form">
    <!-- navegador lateral -->
    <?php include 'view/sidenav.php' ?>
    <!-- formulario -->
<div class="content-wrapper">
        <div style="height: 870px;" class="form-info-geral">
            <span>Motivo da Visita</span>
            <div style="width:100%;padding-left:15%;text-align: left;display: grid;grid-template-columns: auto;" class="input-wrapper">
                <p class="descricao-input">Acompanhamento:</p>
                <div style="display: flex;align-items: center;">
                    <input class="input-checkbox-quadrado" type="checkbox" class="input-checkbox-quadrado" name="domiciliado_acamado" id="acompanhamento_domiciliadosAcamados">
                    <label style="padding-left: 5%;" for="domiciliado_acamado">Domiciliados/Acamados</label>
                </div>
                <br>
                <div style="display: flex;align-items: center;">
                    <input class="input-checkbox-quadrado" type="checkbox" class="input-checkbox-quadrado" name="vulnerabilidade_social" id="acompanhamento_condicoesDeVulnerabilidadeSocial">
                    <label style="padding-left: 5%;" for="vulnerabilidade_social">Condições de vulnerabilidade social</label>
                </div>
                <br>
                <div style="display: flex;align-items: center;">
                    <input class="input-checkbox-quadrado" type="checkbox" class="input-checkbox-quadrado" name="bolsa_familia" id="acompanhamento_condicionalidadesDoBolsaFamilia">
                    <label style="padding-left: 5%;" for="bolsa_familia">Condicionalidades do Bolsa Família</label>
                </div>
                <br>
                <div style="display: flex;align-items: center;">
                    <input class="input-checkbox-quadrado" type="checkbox" class="input-checkbox-quadrado" name="mental" id="acompanhamento_saudeMental">
                    <label style="padding-left: 5%;" for="mental">Saúde mental</label>
                </div>
                <br>
                <div style="display: flex;align-items: center;">
                    <input class="input-checkbox-quadrado" type="checkbox" class="input-checkbox-quadrado" name="alcool" id="acompanhamento_usuarioDeAlcool">
                    <label style="padding-left: 5%;" for="alcool">Usuário de álcool</label>
                </div>
                <br>
                <div style="display: flex;align-items: center;">
                    <input class="input-checkbox-quadrado" type="checkbox" class="input-checkbox-quadrado" name="drogas" id="acompanhamento_usuarioDeOutrasDrogas">
                    <label style="padding-left: 5%;" for="drogas">Usuário de outras drogas</label>
                </div>
                <br>
            </div>
            <div style="width:100%;padding-left:15%;text-align: left;display: grid;grid-template-columns: auto;" class="input-wrapper">
                <p class="descricao-input">Controle ambiental/vetorial:</p>
                <div style="display: flex;align-items: center;">
                    <input class="input-checkbox-quadrado" type="checkbox" class="input-checkbox-quadrado" name="educativa" id="vetorial_acaoEducativa">
                    <label style="padding-left: 5%;" for="educativa">Ação educativa</label>
                </div>
                <br>
            </div>
            <br>
            <br>
            <div class="btns-wrapper" style="justify-content: space-betwenn;">
                <button id="btn-voltar-4" class="btn-secondary-menu-small" type="button">Voltar</button>
                <button id="btn-avancar-4" class="btn-primary-menu-small" type="button">Avançar</button>
            </div>
        </div>
</div>
</div>