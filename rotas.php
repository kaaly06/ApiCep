<?php

use ApiCep\Controller\EnderecoController;

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($url)
{
     /**
     * [ok] exemplo de Acesso: https:\\cep.metoda.com.br\localhost:8000
     */

     case '/endereco/by-cep':
        EnderecoController::getLogradouroByCep();
     break;

     /**
      * [ok] exemplo de Acesso: https:\\cep.metoda.com.br\localhost:8000
      */

      case '/logradouro/by-bairro':
        EnderecoController::getLogradouroByBairroAndCidade();
      break;

     /**
      * [ok] exemplo de Acesso: https:\\cep.metoda.com.br\localhost:8000
      */

      case '/cidade/by-uf':
        EnderecoController::getCidadesByUf();
      break;

      /**
      * [ok] exemplo de Acesso: https:\\cep.metoda.com.br\localhost:8000
      */

      case '/bairro/by-cidade':
         EnderecoController::getBairrosByIdCidade();
      break;

      /**
       * 
       */

       default:
          http_response_code(403);
       break;
}