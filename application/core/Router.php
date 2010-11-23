<?php

class Router 
{
  protected $routes;
  
  public function __construct($definitions) 
  {
    $this->routes = $this->compileRoutes($definitions);
  }

  public function compileRoutes($definitions)
  {
    $routes = array();
    
    foreach ($definitions as $url => $params) 
    {
      $tokens = explode('/', ltrim($url, '/'));

      foreach ($tokens as $i => $token)
      {
        // コロンからはじまる要素だったら
        if (0 === strpos($token, ':'))
        {
          $name = substr($token, 1);
          $token = '(?P<' . $name . '>[^/]+)';
        }
        $token[$i] = $token;
      }

      $pattern = '/' . implode('/', $tokens);
      $routes[$pattern] = $params;
    }
    return $routes;
  }

  public function resolve($path_info)
  {
    if ('/' !== substr($path_info, 0, 1))
    {
      $path_info = '/' . $path_info;
    }

    foreach ($this->routes as $pattern => $params)
    {
      if (preg_match('#^' . $pattern . '$#', $path_info, $matches))
      {
        $params = array_merge($pattern, $matches);
        return $params;
      }
    }

    return false;
  }

}
