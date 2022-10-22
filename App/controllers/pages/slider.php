<?php

class slider extends Controller {

        private static $viewFolder = 'slider';
        private static $modelName = 'sliderModel';

        // Picture - Create info
        const pictureConfig = [
          'path' => 'slider',
          'type' => 'webp', // png - webp - jpeg
          'ratio_fill' => FALSE, // TRUE - FALSE
          'width' => 1760, // 3264
          'height' => 1173, // 2448
        ];
        // Picture - Create info

        public function __construct(){
               $this -> model = $this -> model( self::$modelName , 'pages' );

        }

        public function start(){
               self::read();
        }

        public function creat( ){

               if( isset ( $_POST['sliderCreate'] ) ){

                      // Random - Number -> Create
                      $this -> random = $this->random( 7 );

                      // Title - Create
                      $this -> title = $this->strReplace( $_POST['title'] );

                      // Seflink - Create
                      $this -> link = $this->sefLink( $_POST['title'] );

                      // Description - Create
                      $this -> description = $this->strReplace( $_POST['description'] );
                      // $this->strReplace( $_POST['description'] )

                      // Images -> Create
                      $this->image = $this->pictureLoad( [
                          'name' => $this->imageName(),
                          'file' => $_FILES['image'],
                          'picture' => self::pictureConfig
                      ] );
                      // Images -> Create

                      $this -> view (
                        'creat',
                        $this -> token() -> tokenCheck( $_POST['_token'] ) ? $this -> model -> createBring( $data = $this ) : FALSE,
                        self::$viewFolder
                      );

               }  else
                  $this -> view(
                    'creat',
                    NULL,
                    self::$viewFolder
                  );
        }

        public function read(){

               echo '<script src="'.domain.dirnameProject.'/'.'assets/js/lightbox-plus-jquery.min.js"></script>';
               $this -> view(
                 'read',
                 $this -> model -> readBring(),
                 self::$viewFolder
               );
        }

        public function delete( $data = NULL ){

               if( isset( $_POST['sliderDelete'] ) ):
                    // Picture - Unlink
                    $this -> pictureUnlink = $this->pictureUnlink( $_POST['oldData']['image'] );

                    $this -> view(
                      'delete',
                      $this -> token() -> tokenCheck( $_POST['_token'] ) and $this -> pictureUnlink ? $this -> model -> deleteBring( $data , $this ) : FALSE,
                      self::$viewFolder
                    );

               else:

                    $this -> view(
                      'delete' ,
                      $this -> model -> readBring( $data ) ? $this -> model -> readBring( $data ) : NULL ,
                      self::$viewFolder
                    );

               endif;
        }

        public function update( $data = NULL ){

               if( isset( $_POST['sliderUpdate'] ) ):

                        // RANDOM -> Create
                        $this -> random = $this->random();

                        // Picture - Create
                        $this -> picture = $this->pictureLoad(
                         [
                             'name' => $this->imageName(),
                             'file' => $_FILES['image'],
                             'picture' => self::pictureConfig
                         ] );

                       // Picture Control
                       $this->picture
                       ?
                         $this->picture = $this->picture and  // New image data
                         $this->pictureUnlink( $_POST['oldData']['image'] ) // Old image Unlink
                       :
                       $this->picture = $_POST['oldData']['image'];

                       // Data Control
                       $this->dataInput = $this->dataInputCheck( [
                             [
                               'title'  => $this->strReplace( $_POST['title'] ),
                               'link' => $this->sefLink( $_POST['title'] ),
                               'description' => $this->strReplace( $_POST['description'] ),
                               'image' => $this->picture
                             ] ,
                             [
                               $this->strReplace( $_POST['oldData']['title'] ),
                               $_POST['oldData']['link'],
                               $this->strReplace( $_POST['oldData']['description'] ),
                               $_POST['oldData']['image'],
                             ]
                         ] );
                     // Data Control


                     if( is_null( $this->dataInput ) )
                        $this -> update = NULL;
                     else
                        $this -> update = $this -> model -> editBring( $data , $this );

                     $this -> view(
                       'update',
                       $this -> token() -> tokenCheck( $_POST['_token'] ) ? $this -> update : FALSE,
                       self::$viewFolder
                     );


               else:
                    $this -> view(
                      'update',
                      $this -> model -> readBring( $data ),
                      self::$viewFolder
                    );
               endif;
        }

        public function config(){
               echo 'Slider -> AYAR FONKSİYONU';
        }
  }
