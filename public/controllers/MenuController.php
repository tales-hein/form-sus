<?php

class MenuController {

    private $dadosRequest;

    public function __construct($dadosRequest = null) {
        $this->dadosRequest = $dadosRequest;
    }

    public function getNomeWelcome() {
        $cns = $this->dadosRequest['cns'];
        $url = 'https://formsus.api.previa.app/api/user/cns?cns=' . $cns; 
        $resultadoRequest = json_decode(file_get_contents($url));
        $resposta = [];
        if(empty($resultadoRequest->success)) {
            $resposta = [
                'status' => 500,
                'msg'    => 'Houve um erro na verificação do cns pela nossa api.'
            ];
            header('Content-Type: application/json');
            echo json_encode($resposta);
            return;
        }
        if($resultadoRequest->success == true && empty($resultadoRequest->response->name)) {
            $resposta = [
                'status' => 404,
                'msg'    => 'Nome não encontrado.'
            ];
        }
        if($resultadoRequest->success == true && !empty($resultadoRequest->response->name)) {
            $resposta = [
                'status' => 200,
                'msg'    => 'Nome do agente de saúde encontrado.',
                'dados'  => [
                    'nome_completo' => $resultadoRequest->response->name,
                ]
            ];
        }
        header('Content-Type: application/json');
        echo json_encode($resposta);
    }

}