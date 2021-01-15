<?php

class conexion{

    static $o_con = null;

    static function obj(){
        if(self:: $o_con == null){
            self:: $o_con = new conexion();
          }
          return self::$o_con->instancia;
    }

    public $instancia = null;

    function __construct(){
      
        $this->instancia = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        if($this->instancia == false){
          
            echo"<script>
                 window.location = 'install.php';  
            </script>
                
              <h1>DB ERROR.</h1>
            ";
            exit();
        }
        
    }
     
    function __destruct(){
        mysqli_close($this->instancia);
    }    
}

?>