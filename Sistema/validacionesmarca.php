<?php
class validaciones
{
public function validacadenas($texto)
 {
 $cadena = "/^[A-Z][A-Z,a-z, ,0-9]*$/";
  if (preg_match($cadena,$texto))
  {
  return "valido";
  }
  else
  {
  return "error";
  }  
 }


 public function validanumero($texto)
 {
 $cadena = "/^([0-9])*$/";
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