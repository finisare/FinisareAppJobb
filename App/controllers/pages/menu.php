<?php



class menu extends Controller {

      private static $viewFolder = 'menu';
      private static $modelName = 'menuModel';


      public function __construct(){
             $this -> model = $this -> model( self::$modelName , 'pages' );
      }

      public function start( ){ self::read(); }

      public function creat( ){

              if( isset( $_POST['menuCreate'] ) ):

                    // Random - Number -> Create
                    $this -> random = $this->random( 7 );

                    // Title -> Create
                    $this -> title = $this->strReplace( $_POST['title'] );

                    // SefLink -> Create
                    $this -> link = $this->sefLink( $_POST['title'] );

                    // Keywords -> Create
                    $this -> keywords = $this -> createTag( $_POST['description'] ? $_POST['description'] : $this->title );

                    // Description -> Create
                    $this -> description = $this->strReplace( $_POST['description'] ? $_POST['description'] : $this->title );

                    // $this -> upMenuData -> True / False --> Control
                    count( $this -> upMenuData = explode( '@' , $_POST['upmenu'] ) ) > 1 ?
                    $this -> upMenuData = [
                        'upmenu' => $this->strReplace( $this->upMenuData[0] ),
                        'upmenu_random' => $this->upMenuData[1],
                        'upmenu_id' => $this->upMenuData[2],
                        'upmenu_link' => $this->upMenuData[3]
                       ] : $this -> upMenuData = [
                        'upmenu' => 0,
                        'upmenu_random' => 0,
                        'upmenu_id' => 0,
                        'upmenu_link' => 0
                        ] ;



                  // $this -> view( 'creat' , $this -> model -> createBring( $data = $this ) , self::$viewFolder );

                   $this -> view( 'creat' , $this -> token() -> tokenCheck( $_POST['_token'] ) ? $this -> model -> createBring( $data = $this ) : FALSE , self::$viewFolder );

              else:

                    $this -> view( 'creat' , $this -> model -> readBring() , self::$viewFolder );

              endif;
      }

      public function read( ) {
             $this -> view( 'read' , $this -> model -> readBringUpMenu( ), self::$viewFolder );
      }

      public function delete( $data ){

             if( isset( $_POST['menuDelete'] ) ):
                  // $this -> view( 'delete' , $this -> model -> deleteBring( $data ) , self::$viewFolder );
                  $this -> view( 'delete' , $this -> token() -> tokenCheck( $_POST['_token'] ) ? $this -> model -> deleteBring( $data ) : FALSE , self::$viewFolder );
             else:
                  $this -> view( 'delete' ,
                     $this -> model -> readBring( $data ) ?
                     [
                       'data' => $this -> model -> readBring( $data ),
                       'menu' => $this -> model -> readBring( )
                     ] :
                     FALSE ,
                     self::$viewFolder
                  );
             endif;
      }

      public function update( $data ){

             if( isset( $_POST['menuUpdate'] ) ){

                   // Upmenü - Explode
                   $this -> upmenu = explode( '@' , $_POST['upmenu'] );

                   // Data Control
                   @$this->dataInput = $this->dataInputCheck( [
                         [
                           'title' => $this->strReplace( $_POST['title'] ),
                           'link' => $this->sefLink( $_POST['title'] ),
                           'upmenu' => $this->strReplace( $this -> upmenu[0] ),
                           'upmenu_random' => $this -> upmenu[1],
                           'upmenu_id' => $this -> upmenu[2],
                           'upmenu_link' => $this -> upmenu[3],
                           'keywords' => $this->createTag( $this->strReplace( $_POST['description'] ? $_POST['description'] : $_POST['title'] ) ),
                           'description' => $this->strReplace( $_POST['description'] ? $_POST['description'] : $_POST['title'] ),
                           'content' => $_POST['content'],
                         ] ,
                         [
                           $this->strReplace( $_POST['oldData']['title'] ),
                           $_POST['oldData']['link'],
                           $_POST['oldData']['upmenu'],
                           $_POST['oldData']['upmenu_random'],
                           $_POST['oldData']['upmenu_id'],
                           $_POST['oldData']['upmenu_link'],
                           $this->createTag( $this->strReplace( $_POST['oldData']['description'] ? $_POST['oldData']['description'] : $_POST['oldData']['title'] ) ),
                           $this->strReplace( $_POST['oldData']['description'] ? $_POST['oldData']['description'] : $_POST['oldData']['title'] ),
                           $_POST['oldData']['content'],
                         ]
                     ] );
                  // Data Control


                  if( is_null( $this->dataInput ) )
                     $this -> update = NULL;
                  else
                     $this -> update = $this -> model -> editBring( $data , $this );


                  $this -> view( 'update' , $this -> token() -> tokenCheck( $_POST['_token'] ) ? $this -> update : FALSE , self::$viewFolder );

             } else {

                   $this -> view( 'update' ,
                      $this -> model -> readBring( $data ) ?
                      [
                        'data' => $this -> model -> readBring( $data ),
                        'menu' => $this -> model -> readBring( )
                      ] :
                      FALSE ,
                      self::$viewFolder
                   );
             }
      }

      public function submenu( $data ){

             $this -> view( 'read' , $this -> model -> readBringUpMenu( $data ), self::$viewFolder );
      }
}
