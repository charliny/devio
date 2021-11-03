<?php

namespace App\Http;

class response
{
    /**
     * Código do Statuss HTTP
     * @var integer
     */
    private $httpCode = 200;

    /**
     * Cabeçalho do Response
     * @var array
     */
    private $headers = [];

    /**
     * Tipo de conteudo que esta sendo retornado
     * @var string
     */
    private $contentType = 'text/html';

    /**
     * Contrúdo do Response
     * @var mixed
     */
    private $content;

    /**
     * Método responsavel por iniciar a classe e definir os valores 
     * @param integer
     * @param mixed
     * @param string
     */
    public function __construct($httpCode, $content, $contentType = 'text/html')
    {
        $this->httpCode     = $httpCode;
        $this->content      = $content;
        $this->setContentType($contentType);
    }

    /**
     * Método responsavel por alterar o content do response
     */
    public function setContentType($contentType)
    {
        $this->contentType = $contentType;  
        $this->addHeader('Content-Type',$contentType);  
    }

    /**
     * Método responsável por adicionar um registro no cabecalho de response
     */
    public function addHeader($key,$value)
    {
        $this->headers[$key] = $value;
    }

    /**
     * Método responsável por enviar os headers para o navegador
     */
    private function sendHeaders()
    {
        http_response_code($this->httpCode);
        foreach($this->headers as $key=>$value)
        {
            header($key.': '.$value);
        }
    }

    /**
     * Método responsavel por enviar a resposta para o usuari
     */
    public function sendResponse()
    {
        $this->sendHeaders();
        
        switch ($this->contentType) {
            case 'text/html':
                echo $this->content;
                exit;
        }
    }

}