<?php

namespace ApiCep\Controller;

use ApiCep\Model\{ EnderecoModel, CidadeModel };
use Exception;

class EnderecoController extends Controller
{
    public static function getCepByLogradouro() : void //não requer um retorno
    {
       try{
          $logradouro = $_GET['logradouro'];

          $model = new EnderecoModel();
          $model->getCepByLogradouro($logradouro);

          parent::GetResponseAsJson($model->rows);
       }catch (Exception $e)
       {
        parent::getExceptionsAsJson($e);
       }
    }

    public static function getLogradouroByBairroAndCidade() : void 
    {
       try{
          $bairro = parent::getStringFromUrl(
            isset($_GET['bairro']) ? $_GET['bairro']: null, 'bairro');
            $id_cidade = parent::getIntFromUrl(
               isset($_GET['id_cidade']) ? $_GET['id_cidade']:null, 'cep');

               $model = new EnderecoModel();

               $model->getLogradouroByBairroAndcidade($bairro, $id_cidade);

               parent::GetResponseAsJson($model->rows);          
       }
       catch(Exception $e)
       {
         parent::getExceptionsAsJson($e);
       }    
    }

    public static function getLogradouroByCep() : void
    {
      try
      {
          $cep = parent::getIntFromUrl(isset($_GET['cep'])? $_GET['CEP']:null);

          $model = new EnderecoModel();

          parent::getResponseAsJson($model->getCepByLogradouro($cep));
      }
     catch(Exception $e)
     {
      parent::getExceptionsAsJson($e);
     }
    }

    public static function getBairrosByIdCidade() : void
    {
       try
       {
         $id_cidade = parent::getIntFromUrl(
            isset($_GET['id_cidade'])? $_GET['id_cidade']:null);

            $model = new EnderecoModel();
            $model->getBairrosByIdCidade($id_cidade);
            
            parent::getResponseAsJson($model->rows);
       }
       catch (Exception $e)
       {
         parent::getExceptionsAsJson($e);
       }
    }

    public static function getCidadesByUf() : void
    {
      try
      {
         $uf = $_GET['UF'];

         $model = new CidadeModel();
         $model->getCidadesByUf($uf);

         parent::GetResponseAsJson($model->rows);  
      }
      catch(Exception $e)
      {
         parent::getExceptionsAsJson($e);
      }
     
    }
}







