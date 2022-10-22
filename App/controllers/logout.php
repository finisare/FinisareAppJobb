<?php

class logout extends Controller{

      private static $viewFolderName = 'login';

      public function __construct(){

      }

      public function start( $data ){

             if( session_destroy() )
                $this -> view( 'logout' , TRUE , self::$viewFolderName );
             else
                $this -> view( 'logout' , FALSE , self::$viewFolderName );
      }

}
