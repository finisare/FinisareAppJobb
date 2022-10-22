<?php


// error_reporting( 0 );

class App {

      protected $controller;
      protected $method;
      protected $param;

      protected $userSession;
      protected $parseUrll;

      private $header = documentRoot.homeDirectory.'views/header.php';
      private $footer = documentRoot.homeDirectory.'views/footer.php';


      public function __construct(){

             // Parse URL -> İmport Data URL
             $this->parseUrll = self::parseUrl();


             // Css -> lib -> Loading Page
             \App\Libs\LibbFile::cssLib();


             @$this->userSession = Controller::sessionControl( $_SESSION['user']['time'] );

             if( is_null( $this->userSession ) ):

                 self::Route( [ 'login' , $data = NULL ] , self::controllerFileRequire( 'login' ) );

             else:

                 if( $this->userSession ){

                       if( $this->parseUrll ):

                             switch ( $this->parseUrll ) {

                                 case 'logout':
                                     self::Route( [ 'logout' , 'logout' , $_SESSION['user'] ] , self::controllerFileRequire( 'logout' ) );
                                 break;

                                 default:
                                     $this -> parseUrll = explode( '/' , $this->parseUrll ); // Parse URL -> Create


                                     require_once $this -> header; // HEADER -> Loading

                                        if( $this -> controllerFile = self::controllerFileRequire( $this->parseUrll[0] , 'pages' ) )
                                             self::Route( $this -> parseUrll , $this -> controllerFile );
                                        else
                                             self::Route( [ 'dashboard' , 'undefined' ] , self::controllerFileRequire( 'dashboard' , 'pages' ) );


                                     require_once $this -> footer; // FOOTER -> Loading

                                 break;
                             }

                       else:
                             self::Route( [ 'login' , $param = NULL ] , self::controllerFileRequire( 'login' ) );
                       endif;

                 } else
                    self::Route( [ 'login' , 'logout' , $param = NULL ] , self::controllerFileRequire( 'login' ) );

             endif;


             // JS -> lib
             \App\Libs\LibbFile::jsLib();
      }


      private function Route( $parseUrll , $controllerFile ){

              $this -> controller = $parseUrll[0]; // Controller -> Create
              unset( $parseUrll[0] );  // Controller -> ParseURL[0] -> UNSET -> RAM Trashing

              require_once $controllerFile; // Controller -> require
              $this -> controller = new $this -> controller; // New Class Controller start

              @$this -> method = self::methodFileRequire( [ $this -> controller , $parseUrll[1] ] ); // Controller -> Create
              unset( $parseUrll[1] ); // Method -> ParseURL[0] -> UNSET -> RAM Trashing

              $this->param = $parseUrll ? array_values( $parseUrll ) : [] ; // Param -> Create

              // CallBack -> Start
              self::callBack( [ $this -> controller, $this -> method ] , count( $parseUrll ) > 1 ? [ $this -> param ] : $this -> param );
      }


      private static function callBack( array $callBack = [] , $par = NULL ){

              @call_user_func_array( $callBack , $par != NULL ? $par : [] );
      }

      private static function controllerFileRequire( $data = NULL , $filePathUrl = NULL ){

              $filePathUrl !== NULL ? $filePathUrl = $filePathUrl.'/' : $filePathUrl ;

              $controllerFile = documentRoot.homeDirectory.'controllers/'.$filePathUrl.strtolower( $data ) .'.php';

              if( file_exists( $controllerFile ) )
                 return $controllerFile;
              else
                 return FALSE;

              unset( $data , $filePathUrl , $controllerFile );
      }

      private static function methodFileRequire( $data ){

                if( !empty( $data[1] ) )
                    if( method_exists( $data[0], $data[1] ) )
                       return $data[1];
                    else
                       return 'start'; // read
                else
                    return 'start';


              unset( $data );
      }

      public function parseUrl(){

            $Dir_Bas_Name = [ 'dirname'=>dirname($_SERVER["SCRIPT_NAME"] ), 'basename'=>basename($_SERVER["SCRIPT_NAME"]) ];

            return ltrim( filter_var( str_replace( [$Dir_Bas_Name["dirname"],$Dir_Bas_Name["basename"]], NULL, $_SERVER["REQUEST_URI"]), FILTER_SANITIZE_URL ), '/' );
      }
}
