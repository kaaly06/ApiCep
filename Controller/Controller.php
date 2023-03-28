<?php 

namespace ApiCep\Controller;
use Exception;

abstract class Controller
{
   public static function getResponseAsJson($data)
   {
     header("Access-Control-Allow-Origin: *");
     header("Content-Type:application/json; charset=utf-8");
     header("Chache-Controll: no-cache, must-revalidate");
     header("Expires: Mom, 26 Jun 1997 05:00:00 GMT");
     header("Program: public");
      exit(json_encode($data));
   }

   protected static function getExceptionsAsJson(Exception $e)
   {
      $exception = [
         'message' => $e->getMessage(),
         'code'  => $e->getCode(),
         'file'  => $e->getFile(),
         'line'  => $e->getLine(),
         'traceAsString' => $e->getTraceAsString(),
         'previous' => $e->getPrevious(),
      ];

      http_response_code(400);

     header("Access-Control-Allow-Origin: *");
     header("Content-Type:application/json; charset=utf-8");
     header("Chache-Controll: no-cache, must-revalidate");
     header("Expires: Mom, 26 Jun 1997 05:00:00 GMT");
     header("Program: public");
     exit(json_encode($exception));
   }

   protected static function setResponseAsJson($data, $request_status = true)
   {
      $response = array('response_data' => $data, 'response_successful' => $request_status);

      header("Access-Control-Allow-Origin: *");
      header("Content-type: application/json; charset=utf-8");
      header("Cache-Control: no-cache, must-revalidate");
      header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
      header("Pragma: public");

      exit(json_encode($response)); 
   }

   protected static function isGet()
   {
      if($_SERVER['REQUEST_METHOD'] !== 'GET')
         throw new Exception("O método de requisição deve ser GET");
   }

   protected static function isPost()
   {
      if($_SERVER['REQUEST_METHOD'] !== 'POST')
         throw new Exception("O método de requisição deve ser POST");
   }

   protected static function getIntFromUrl($var_get, $var_name = null) : int 
   {
      self::isGet();

      if(!empty($$var_get))
            return (int) $var_get;
     else
     throw new Exception("Variavel $var_name não identificada.");
   }

   protected static function getStringFromUrl($var_get, $var_name = null) : string
   {
      self::isGet();

      if(!empty($var_get))
           return (string) $var_get;
      else
      throw new Exception("Variavel $var_name não identificada.");
   }
}