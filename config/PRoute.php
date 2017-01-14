<?php
class PRoute{
  var $variable=null;
  var $local   =null;
  var $string  =null;
  public function __construct()
  {
      $this->local="http://localhost/demomvc1/index.php/";
  }
  // chuyen huong duong dan
  public function Route($string,$aslocal=null){
      $str=bin2hex($aslocal);
      $this->string = $this->local . $string.$str;
      return $this->string;
  }
  //cat string ;
  public function url($string){
       $this->string=explode("/",$string);
       return $this->string;
  }
  public function move($string,$variable=null){
      $str=bin2hex($variable);
      header('Location:'.$this->Route($string)."//".$str);
  }
  public function  view($string){
       include ($string);
  }
}
$Route=new PRoute();
?>