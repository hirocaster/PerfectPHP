<?php

class ClassLoader
{
  protected $dirs;
  
  /**
   *
   * $thisのloadClassメソッドを順次コールする
   */
  public function register()
  {
    spl_autoload_register(array($this, 'loadClass'));
  }
  
  /**
   * ディレクトリを保存しておく処理
   */
  public function registerDir($dir)
  {
    $this->dirs[] = $dir;
  }
  
  /**
   * 実際にrequireする処理 引数には自動的にクラス名が入る
   */
  public function loadClass($class)
  {
    foreach($this->dirs as $dir)
      {
        $file = $dir . '/' . $class . '.php';
        if (is_readable($file))
          {
            require $file;
            return;
          }
      }
  }
  
