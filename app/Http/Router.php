<?php

namespace App\Http;

use \Closure;
use \Exception;

class Router
{
    private $url = '';
    private $prefix = '';
    private $routes = [];
    private $request;

    /**
     * Médotodo responsavel por iniciar a classe
     */
    public function __construct($url = '')
    {
        $this->request = new Request();
        $this->url = $url;
        $this->setPrefix();
    }

    /**
     * Método responsável por definir o prefixo das rotas
     */
    private function setPrefix()
    {
        $parceUrl = parse_url($this->url);
        $this->prefix = $parceUrl['path'] ?? '';
    }

    /**
     * Método responsável por adicionar uma rota na classe
     * @param string
     * @param string
     * @param array
     */
    private function addRoute($method,$route,$params)
    {
        foreach ($params as $key => $value) {
            if ($value instanceof Closure) {
                $params['controller'] = $value;
                unset($params[$key]);
                continue;
            }
        }

        $patternRoute =  '/^'.str_replace('/','\/',$route).'/$';
        $this->routes[$patternRoute][$method] = $params;
    }

    /**
     * Método responsável por definir uma rota de get
     */
    public function get($route, $params=[])
    {
        return $this->addRoute('GET',$route,$params);
    }

    /**
     * Método responsável por definir uma rota de post
     */
    public function post($route, $params=[])
    {
        return $this->addRoute('POST',$route,$params);
    }

    /**
     * Metodo responsavel por retornar a uri desconsiderando o prefixo
     */
    private function getUri()
    {
        $uri = $this->request->getUri();

        $xUri = strlen($this->prefix) ? explode($this->prefix,$uri) : [$uri];

       return end($xUri);
    }

    /**
     * Método responsavel por retornar os dados da rota atual
     * @return array
     */
    private function getRoute()
    {
        $uri = $this->getUri();

        $httpMethod = $this->request->getHttpMethod();

        foreach ($this->routes as $patternRoute => $method) {
            if(preg_match($patternRoute,$uri)){
                if($method[$httpMethod]){
                    return $method[$httpMethod];
                }
                throw new Exception("Metodo nao é permitido",405);
            }
        }
        throw new Exception("URL não encontrada",404);
    }


    /**
     * Método resposáel por executar a rota atual
     * @return Response
     */
    public function run()
    {
        try {
           $route = $this->getRoute();

           if(!isset($route['controller'])){
               throw new Exception("A Url não pode ser processada.", 500);   
           }

           $args = [];
           return call_user_func_array($route['controller'],$args);
        
    
        } catch (Exception $e) {
           return new Response($e->getCode(),$e->getMessage());
        }
    }
}
