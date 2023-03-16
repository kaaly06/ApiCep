<?php

namespace APP\Model;

use app\DAO\EnderecoDAO;
use App\Model\Model;
use Exception;

class EnderecoModel extends Model
{
    public $id_logradouro, $tipo, $descricao, $id_cidade, $uf, $complemento, $descricao_sem_numero, $descricao_cidade, $codigo_cidade_ibge,
    $descricao_bairro;

     public $arr_cidades;



     public function getLogradouroByBairroAndCidade(string $bairro, int $id_cidade)
     {
        try
        {
          $dao = new EnderecoDAO();

          $this->rows = $dao->selectLogradouroByBairroAndCidade($bairro, $id_cidade);

        }catch(Exception $e)
        {
            throw $e;
        }
     }

     public function getCepByLogradouro(int $cep)
     {
      try 
      {
        $dao = new EnderecoDAO();
        return $dao->selectByCep($cep);
      }catch(Exception $e)
      {
        throw $e;
      }
     }
    
     public function getBairroByIdCidade(int $id_cidade)
     {
      try
      {
        $dao = new EnderecoDAO();

        $this->rows = $dao->selectBairroByIdCidade($id_cidade);

      }catch(Exception $e) 
      {
        echo $e->getMessage();
      }
     }
}