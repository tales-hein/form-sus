<div class="wrapper-sidenav-e-form">
    <!-- navegador lateral -->
    <?php include 'view/sidenav.php' ?>
    <!-- formulario -->
<div class="content-wrapper">
        <div style="height: 1000px;" class="form-info-geral">
            <span>Informações gerais da visita</span>
            <div class="input-wrapper">
                <p class="descricao-input">Turno*</p>
                <input type="text" class="input" name="turno" id="turno">
            </div>
            <div class="input-wrapper">
                <p class="descricao-input">Microárea*</p>
                <input type="text" class="input" name="microarea" id="microarea">
            </div>
            <div class="input-wrapper">
                <p class="descricao-input">Tipo de imóvel*</p>
                <input type="text" class="input" name="tipo-imovel" id="tipo_imovel">
            </div>
            <div class="input-wrapper">
                <p class="descricao-input">Núm. prontuário</p>
                <input type="text" class="input" name="num-prontuario" id="num_prontuario">
            </div>
            <div class="input-wrapper">
                <div class="checkboxes-visita-comp">
                    <p class="descricao-input">Visita compartilhada com outro profissional?*</p>
                    <div>
                        <input type="checkbox" class="checkbox-redondo" name="visita_comp_sim" id="visita_comp_sim" value="1">
                        <label for="visita_comp_sim">Sim</label>
                    </div>
                    <br>
                    <div>
                        <input type="checkbox" class="checkbox-redondo" name="visita_comp_nao" id="visita_comp_nao" value="0">
                        <label for="visita_comp_nao">Não</label>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="btns-wrapper" style="justify-content: space-betwenn;">
                <button id="btn-voltar-infogeral" class="btn-secondary-menu-small" type="button">Cancelar</button>
                <button id="btn-avancar-infogeral" class="btn-primary-menu-small" type="button">Avançar</button>
            </div>
        </div>
</div>
</div>