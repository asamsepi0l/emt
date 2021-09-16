<?php
class validaciones
{
public function validacadenas($texto)
 {
 $cadena = "/^[A-Z][A0-Z,a-z, ,#,0-9]*$/";
  if (preg_match($cadena,$texto))
  {
  return "valido";
  }
  else
  {
  return "error";
  }  
 }


public function validaidcli($texto)

{

$expresion = "/^[0-9]*$/";


  
       if (preg_match($expresion,$texto))
     
     {
     
     return "ok";
     
     }
     
     else
     
     {
     
     return "error";
     
     }
     
}

 public function validanumero($texto)
 {
 $cadena = "/^[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]$/";
  if (preg_match($cadena,$texto))
  {
  return "valido";
  }
  else
  {
  return "error";
  }  
 }

 public function validaEmail($texto)
 {
 $cadena = "/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i";
  if (preg_match($cadena,$texto))
  {
  return "valido";
  }
  else
  {
  return "error";
  }  
 }
 
  public function validaweb($texto)
 {
 $cadena = "/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \?=.-]*)*\/?$/ ";
  if (preg_match($cadena,$texto))
  {
  return "valido";
  }
  else
  {
  return "error";
  }  
 }
 



}
?>