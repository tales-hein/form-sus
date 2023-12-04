<?php

class FormularioController {

    public function renderInfoGeral() {
        render('formulario-info-geral');
    }

    public function renderInfoPessoal() {
        render('formulario-info-pessoal');
    }

    public function renderPag_1() {
        render('formulario-grupo-1');
    }

    public function renderPag_2() {
        render('formulario-grupo-2');
    }

    public function renderPag_3() {
        render('formulario-grupo-3');
    }

    public function renderPag_4() {
        render('formulario-grupo-4');
    }

    public function renderPag_5() {
        render('formulario-grupo-5');
    }
    
    public function renderDesfecho() {
        render('formulario-desfecho');
    }
}