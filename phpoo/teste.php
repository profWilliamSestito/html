<?php
    class MyClass
    {
      public $propriedade = "Sou uma propriedade de classe!";
    
      public function __construct()
      {
          echo 'A classe "', __CLASS__, '" foi instanciada!<br />';
      }
      public function __destruct()
        {
            echo 'A classe "', __CLASS__, '" foi destruída.<br />';
        }
      public function setProperty($novovalor)
      {
          $this->propriedade = $novovalor;
      }
    
      public function getProperty()
      {
          return $this->propriedade . "<br />";
      }
    }
    // Cria um novo objeto
    $obj = new MyClass;

    // Mostra o objeto como uma string
    echo $obj;

    // Destrói o objeto
    unset($obj);

    // Mostra uma mensagem ao final do arquivo
    echo "Fim do arquivo.<br />";
?>


