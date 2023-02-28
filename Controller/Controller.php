<?php 
namespace ApiCep\Controller;

abstract class Controller
{
   public static function GetResponseAsJson($data)
   {
     header("Access-Control-Allow-Origin: *");
     header("Content-Type:application/json; charset=utf-8");
     header("Chache-Controll: no-cache, must-revalidate");
     header("Expires: Mom, 26 Jun 1997 05:00:00 GMT");
     header("Program: public");
      exit(json_encode($data));
   }
}