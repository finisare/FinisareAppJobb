<?php

class blog extends Controller {

     private static $viewName = 'blog';
     private static $modelName = 'blogModel';

     public function __construct(){
            $this -> model = $this -> model( self::$modelName , 'pages' );
     }

     public function creat(){

            $this -> view( 'creat' , NULL , self::$viewName );

     }


     public function read(){

     }

     public function update(){

     }

     public function delete(){

     }

}
