<div class="wrapper-sidenav-e-form">
    <!-- navegador lateral -->
    <?php include 'view/sidenav.php' ?>
    <!-- formulario -->
<div class="content-wrapper">
        <div class="form-info-pessoal">
            <span>Dados Pessoais do Cidadão</span>
            <div class="input-wrapper">
                <p class="descricao-input">CNS*</p>
                <input type="text" class="input" name="cns" id="cns-cidadao">
            </div>
            <div class="input-wrapper">
                <p class="descricao-input">Nome Completo*</p>
                <input type="text" class="input" name="nome_completo" id="nome_completo">
            </div>
            <div class="input-wrapper">
                <p class="descricao-input">Data de nascimento*</p>
                <input type="text" class="input" name="data_nascimento" id="data_nascimento">
            </div>
            <div class="input-wrapper">
                <p class="descricao-input">Sexo*</p>
                <select style="background-color: white; width: 384px; height: 54px;" class="input" name="select_sexo" id="select_sexo">
                    <option value="">&#8212; Selecione &#8212;</option>
                    <option value="M">Masculino</option>
                    <option value="F">Feminino</option>
                </select>
            </div>
            <div class="input-wrapper">
                <p class="descricao-input">Peso*</p>
                <input type="text" class="input" name="peso" id="peso">
            </div>
            <div class="input-wrapper">
                <p class="descricao-input">Altura*</p>
                <input type="text" class="input" name="altura" id="altura">
            </div>
            <br>
            <br>
            <div class="btns-wrapper" style="justify-content: space-betwenn;">
                <button id="btn-voltar-pessoal" class="btn-secondary-menu-small" type="button">Voltar</button>
                <button id="btn-avancar-pessoal" class="btn-primary-menu-small" type="button">Avançar</button>
            </div>
        </div>
</div>
</div>