<?php
class validaciones

{
public function validacadenas($texto)
 {
 $cadena = "/^[A-Z][A-Z,a-z, ]*$/";
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


}
?>