<?php

class user extends Controller
{
     private static $viewFolder = 'user/';
     private static $modelName = 'userModel';

     // Picture - Create info
     const pictureConfig = [
       'path' => 'user',
       'type' => 'png', // png - webp - jpeg
       'ratio_fill' => TRUE, // TRUE - FALSE
       'width' => 300,
       'height' => 300,
     ];
     // Picture - Create info

     public function __construct(){
            $this->model = $this->model( self::$modelName , 'pages' );
     }

     public function creat(  ){

            if( isset( $_POST['userCreat'] ) ):

                    // Random - Number -> Create
                    $this->model->random = $this->random( 7 );

                    // Username Create
                    $this->model->name = $this->strReplace( $_POST['userName'] );

                    // Username Create
                    $this->model->surname = $this->strReplace( $_POST['userSurname'] );

                    // Email Create - Lock
                    $this->model->email = $this->valueEncrypt( 'LOCK' , $this->strReplace( $_POST['userEmail'] ) , dataKey );

                    // Password Create - Lock
                    $this->model->password = $this->valueEncrypt( 'LOCK' , $this->strReplace( $_POST['userPassword'] ) , dataKey );

                    // Authority Create - Lock
                    $this->model->authority = $this->strReplace( $_POST['userAuthority'] );

                    // SessionTime - Creat
                    $this->model->sessionTime = $this->strReplace( $_POST['userTimeSession'] );


                    // User Avatar -> Create
                    $this->model->avatar = $this->pictureLoad( [
                        'name' => $this->imageName(),
                        'file' => $_FILES['avatar'],
                        'picture' => self::pictureConfig
                    ] );
                    // User Avatar -> Create


                    $this->view ( 'creat' , $this->token() -> tokenCheck( $_POST['_token'] ) ? $this->model -> createBring( $data = $this ) : FALSE , self::$viewFolder );

            else:
                    $this->view( 'creat' , NULL , self::$viewFolder );
            endif;

     }

     public function read(  ){

            $this->view( 'read' , $this->model -> readBring() , self::$viewFolder );

     }

     public function delete( $data ){

            if( isset( $_POST['userDelete'] ) ):

                // Picture - Unlink
                if( $_POST['oldData']['avatar'] ) $this->pictureUnlink = $this->pictureUnlink( $_POST['oldData']['avatar'] );

                $this->view( 'delete' , $this->token() -> tokenCheck( $_POST['_token'] ) ? $this->model -> deleteBring( $data , $this ) : FALSE , self::$viewFolder );

            else:
                $this->view( 'delete' , $this->model -> readBring( $data ) , self::$viewFolder );
            endif;

     }

     public function update( $data ){



             if( isset( $_POST['userUpdate'] ) ):

                      // RANDOM -> Create
                      $this->random = $this->random();

                      // Picture - Create
                      $this->avatar = $this->pictureLoad(
                       [
                           'name' => $this->imageName(),
                           'file' => $_FILES['avatar'],
                           'picture' => self::pictureConfig
                       ] );

                     // Picture Control
                     $this->avatar
                     ?
                       $this->avatar = $this->avatar and  // New image data
                       $this->pictureUnlink( $_POST['oldData']['avatar'] ) and // Old image Unlink
                       $_SESSION['user']['avatar'] = $this->avatar
                     :
                     $this->avatar = $_POST['oldData']['avatar'];

                     // Data Control
                     $this->dataInput = $this->dataInputCheck( [
                           [
                             'name'  => $this->strReplace( $_POST['userName'] ),
                             'surname' => $this->strReplace( $_POST['userSurname'] ),
                             'password' => $this->valueEncrypt( 'LOCK' , $this->strReplace( $_POST['userPassword'] ) , dataKey ),
                             'email' => $this->valueEncrypt( 'LOCK' , $this->strReplace( $_POST['userEmail'] ) , dataKey ),
                             'authority'  => $this->strReplace( $_POST['userAuthority'] ),
                             'avatar' => $this->avatar,
                           ] ,
                           [
                             $this->strReplace( $_POST['oldData']['name'] ),
                             $this->strReplace( $_POST['oldData']['surname'] ),
                             $this->strReplace( $_POST['oldData']['password'] ),
                             $this->strReplace( $_POST['oldData']['email'] ),
                             $this->strReplace( $_POST['oldData']['authority'] ),
                             $_POST['oldData']['avatar'],
                           ]
                       ] );
                   // Data Control

                   if( is_null( $this->dataInput ) ):
                       $this->update = NULL;
                   else:
                       $this->update = $this->model -> editBring( $data , $this );
                       $_SESSION['user']['random'] = $this->random;
                   endif;


                   $this->view( 'update' , $this->token() -> tokenCheck( $_POST['_token'] ) ? $this->update : FALSE , self::$viewFolder );

             else:
                   $this->view( 'update' , $this->model -> readBring( $data ) , self::$viewFolder );
             endif;
     }

}
