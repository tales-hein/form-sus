<div class="wrapper-sidenav-e-form">
    <!-- navegador lateral -->
    <?php include 'view/sidenav.php' ?>
    <!-- formulario -->
<div class="content-wrapper">
        <div style="height: 870px;" class="form-info-geral">
            <span>Motivo da Visita</span>
            <div style="width:100%;padding-left:15%;text-align: left;display: grid;grid-template-columns: auto;" class="input-wrapper">
                <p class="descricao-input">Controle ambiental/vetorial:</p>
                <div style="display: flex;align-items: center;">
                    <input class="input-checkbox-quadrado" type="checkbox" class="input-checkbox-quadrado" name="imovel_foco" id="vetorial_imovelComFoco">
                    <label style="padding-left: 5%;" for="imovel_foco">Imóvel com foco</label>
                </div>
                <br>
                <div style="display: flex;align-items: center;">
                    <input class="input-checkbox-quadrado" type="checkbox" class="input-checkbox-quadrado" name="mecanica" id="vetorial_acaoMecanica">
                    <label style="padding-left: 5%;" for="mecanica">Ação mecânica</label>
                </div>
                <br>
                <div style="display: flex;align-items: center;">
                    <input class="input-checkbox-quadrado" type="checkbox" class="input-checkbox-quadrado" name="tratam_focal" id="vetorial_tratamentoFocal">
                    <label style="padding-left: 5%;" for="tratam_focal">Tratamento focal</label>
                </div>
                <br>
            </div>
            <div style="width:100%;padding-left:15%;text-align: left;display: grid;grid-template-columns: auto;" class="input-wrapper">
                <p class="descricao-input">Geral:</p>
                <div style="display: flex;align-items: center;">
                    <input class="input-checkbox-quadrado" type="checkbox" class="input-checkbox-quadrado" name="egresso_intern" id="geral_egressoDeInternacao">
                    <label style="padding-left: 5%;" for="egresso_intern">Egresso de internação</label>
                </div>
                <br>
                <div style="display: flex;align-items: center;">
                    <input class="input-checkbox-quadrado" type="checkbox" class="input-checkbox-quadrado" name="convite_campanha" id="geral_conviteAtividadesColetivasCampanhaDeSaude">
                    <label style="padding-left: 5%;" for="convite_campanha">Convite atividades coletivas <br> campanha de saúde</label>
                </div>
                <br>
                <div style="display: flex;align-items: center;">
                    <input class="input-checkbox-quadrado" type="checkbox" class="input-checkbox-quadrado" name="orientacao_prevencao" id="geral_orientacaoPrevencao">
                    <label style="padding-left: 5%;" for="orientacao_prevencao">Orientação/prevenção</label>
                </div>
                <br>
                <div style="display: flex;align-items: center;">
                    <input class="input-checkbox-quadrado" type="checkbox" class="input-checkbox-quadrado" name="outros" id="geral_outros">
                    <label style="padding-left: 5%;" for="outros">Outros</label>
                </div>
                <br>
            </div>
            <br>
            <br>
            <div class="btns-wrapper" style="justify-content: space-betwenn;">
                <button id="btn-voltar-5" class="btn-secondary-menu-small" type="button">Voltar</button>
                <button id="btn-avancar-5" class="btn-primary-menu-small" type="button">Avançar</button>
            </div>
        </div>
</div>
</div>