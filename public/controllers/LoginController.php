<?php

class LoginController {
    
    private $dadosRequest;

    public function __construct($dadosRequest = null) {
        $this->dadosRequest = $dadosRequest;
    }

    public function index() {
        include(__DIR__ . '/../view/login.php');
    }

    public function renderLoginInicial() {
        render('login-inicial');
    }

    public function renderLoginJaCadastrado() {
        render('login-ja-cadastrado');
    }

    public function renderLoginPrimeiroAcesso() {
        render('login-primeiro-acesso');
    }

    public function processarCnsLogin() {   
        $cns = $this->dadosRequest['cns'];
        $url = 'https://formsus.api.previa.app/api/user/cns?cns=' . $cns; 
        $resultadoRequest = json_decode(file_get_contents($url));
        $resposta = [];
        if(empty($resultadoRequest->success)) {
            $resposta = [
                'status' => 500,
                'msg'    => 'Houve um erro na verificação do cns pela nossa api.'
            ];
        }
        if($resultadoRequest->success == true && !empty($resultadoRequest->response->password)) {
            $resposta = [
                'status' => 200,
                'next'   => 'ja-cadastrado',
                'msg'    => 'Agente de saúde encontrado.',
                'dados'  => [
                    'cns' => $resultadoRequest->response->cns,
                ]
            ];
        }
        if($resultadoRequest->success == true && empty($resultadoRequest->response->password)) {
            $resposta = [
                'status' => 200,
                'next'   => 'primeiro-acesso',
                'msg'    => 'Agente de saúde encontrado.',
                'dados'  => [
                    'nome_completo' => $resultadoRequest->response->name,
                    'cns'           => $resultadoRequest->response->cns,
                ]
            ];
        }
        header('Content-Type: application/json');
        echo json_encode($resposta);
    }

    public function cadastrarAgente() {
        $cns = $this->dadosRequest['cns'];
        $url = 'https://formsus.api.previa.app/api/user/signup';
        $contexto = stream_context_create([
            'http' => [
                'header'  => "Content-Type: application/json\r\n",
                'method'  => 'POST',
                'content' => json_encode([
                    'data' => [
                        'cns'   => $cns,
                        'senha' => $this->dadosRequest['senha'],
                        'repeatPassword' => $this->dadosRequest['repeticao_senha']
                    ]
                ])
            ]
        ]);
        $resultadoRequest = json_decode(file_get_contents($url, false, $contexto));
        $resposta = [];
        if(empty($resultadoRequest->success)) {
            $resposta = [
                'status' => 500,
                'msg'    => 'Houve um erro no cadastro dos dados de login pela nossa api.'
            ];
        }
        if($resultadoRequest->success == true) {
            routeTo('menu-principal', ['cns' => $cns, 'key' => gerarAssinatura($cns)]);
        }
        header('Content-Type: application/json');
        echo json_encode($resposta);
    }

    public function validarLoginSenha() {
        $cns = $this->dadosRequest['cns'];
        $url = 'https://formsus.api.previa.app/api/user/signin';
        $contexto = stream_context_create([
            'http' => [
                'header'  => "Content-Type: application/json\r\n",
                'method'  => 'POST',
                'content' => json_encode([
                    'data' => [
                        'cns'   => $cns,
                        'senha' => $this->dadosRequest['senha'],
                    ]
                ])
            ]
        ]);
        $resultadoRequest = json_decode(file_get_contents($url, false, $contexto));
        $resposta = [];
        if(empty($resultadoRequest->success)) {
            $resposta = [
                'status' => 500,
                'msg'    => 'Houve um erro na verificação dos dados de login pela nossa api.'
            ];
        }
        if($resultadoRequest->success == true) {
            routeTo('menu-principal', ['cns' => $cns, 'key' => gerarAssinatura($cns)]);
        }
        header('Content-Type: application/json');
        echo json_encode($resposta);
    }
}