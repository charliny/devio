<?php
namespace App\Http;

class Request
{
    /**
     * Método http da requisicao
     * @var string
     */
    private $httpMethod;

    /**
     * URI da página
     * @var string
     */
    private $uri;

    /**
     * Query params
     * @var array
     */
    private $queryParams = [];

    /**
     * Variaveis recebidas no POST da página ($_POST)
     * @var array
     */
    private $postVars = [];

    /**
     * Cabecalho de requisicao
     * @var array
     */
    private $headers = [];

    /**
     * Construtor da classe
     */
    public function __construct()
    {
        $this->queryParams      = $_GET ?? [];
        $this->postVars         = $_POST ?? [];
        $this->headers          = getallheaders();
        $this->httpMethod       = $_SERVER['REQUEST_METHOD'] ?? '';
        $this->uri              = $_SERVER['RESQUEST_URI'] ?? '';
    }

    /**
     * Método responsável por retornar o método HTTP da requisição
     * @return string
     */
    public function getHttpMethod()
    {
        return $this->httpMethod;
    }

    /**
     * Método responsável por retornar a URI da requisição
     * @return string
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * Método responsável por retornar os headers da requisição
     * @return array
     */
    public function getHeaders()
    {
        return $this->httpMethod;
    }

    /**
     * Método responsável por retornar a  da requisição
     * @return array 
     */
    public function getQueryParams()
    {
        return $this->queryParams;
    }

    /**
     * Método responsável por retornar as variaveis do POST da requisição
     * @return array
     */
    public function getPostVars()
    {
        return $this->postVars;
    }
}
