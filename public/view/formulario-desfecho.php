<div class="wrapper-sidenav-e-form">
    <!-- navegador lateral -->
    <?php include 'view/sidenav.php' ?>
    <!-- formulario -->
<div class="content-wrapper">
        <div style="height: 450px;top:150px;" class="form-info-geral">
            <span>Desfecho da visita:</span>
            <br>
            <div style="width:100%;padding-left:15%;text-align: left;display: grid;grid-template-columns: auto;" class="input-wrapper">
                <div style="display: flex;align-items: center;">
                    <input class="checkbox-redondo" type="checkbox" name="realizada" id="realizada">
                    <label style="padding-left: 5%;" for="realizada">Visita realizada</label>
                </div>
                <br>
                <div style="display: flex;align-items: center;">
                    <input class="checkbox-redondo" type="checkbox" name="recusada" id="recusada">
                    <label style="padding-left: 5%;" for="recusada">Visita recusada</label>
                </div>
                <br>
                <div style="display: flex;align-items: center;">
                    <input class="checkbox-redondo" type="checkbox" name="ausente" id="ausente">
                    <label style="padding-left: 5%;" for="ausente">Ausente</label>
                </div>
                <br>
            </div>
            <br>
            <br>
            <div class="btns-wrapper" style="justify-content: space-betwenn;">
                <button id="btn-voltar-desfecho" class="btn-secondary-menu-small" type="button">Voltar</button>
                <button id="btn-gravar-formulario" class="btn-primary-menu-small" type="button">Gravar</button>
            </div>
        </div>
</div>
</div>