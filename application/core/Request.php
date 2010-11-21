<?php
class Request  
{
  public function __construct() 
  {
    
  }

  public function isPost()
  {
    return ($_SERVER['REQUEST_METHOD'] === 'POST') ?  true :  false;
  }
  public function getGet($name, $default = null)
  {
    return (isset($_GET[$name])) ? $_GET[$name] : $default;
  }
  public function getPost($name, $default = null)
  {
    return (isset($_POST[$name])) ? $_POST[$name] : $default;
  }
  public function getHost()
  {
    return (!empty($_SERVER['HTTP_HOST'])) ? $_SERVER['HTTP_HOST'] : $_SERVER['SERVER_NAME'];
  }
  public function isSsl()
  {
    return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? true : false;
  }
  public function getRequest()
  {
    return $_SERVER['REQUEST_URI'];
  }
}
