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
  public function getRequestUri()
  {
    return $_SERVER['REQUEST_URI'];
  }
  public function getBaseUrl()
  {
    $script_name = $_SERVER['SCRIPT_NAME'];
    $request_uri = $this->getRequestUri();

    if (0 === strpos($request_uri, $script_name))
    {
      return $script_name;
    } elseif ( 0 === strpos($request_uri, dirname($script_name)))
    {
        return rtrim(dirname($script_name), '/');
    }
      return '';
  }
  public function getPathInfo()
  {
    $base_url = $this->getBaseUrl();
    $request_uri = $this->getRequestUri();
    
    if (false !== ($pos = strpos($request_uri, '?')))
    { 
      $request_uri = substr($request_uri, 0, $post);
    }
    
    $path_info = (string)substr($request_uri, strlen($base_url));
    return $path_info;
  }
}
