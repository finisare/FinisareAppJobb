<?php


class login extends Controller
{
     private static $viewName = 'login';
     private static $modelName = 'loginModel';

     private $tokenTime; // User Login - Token Time
     private $loginData; // User Login Data

     private $loginMailCode; // User Login Mail send code
     private $mailCodeSend; // User Login Mail config

     public function __construct( ){

            $this -> model = $this -> model( self::$modelName );

     }

     public function logoutStart(){
            echo 'Logeefefefout İşlemi';
     }

     public function start(  ){

               if( file_exists( documentRoot.dirnameProject.'/finisare.txt' ) ):

                       // Login Screen - Message
                       self::loginMessage();

                       if( isset( $_POST[ 'loginMailCode' ] ) ):

                            [$this -> loginMailCode , $this -> tokenTime ] = explode( '@' , $this->valueEncrypt( 'UNLOCK' , $_POST[ 'loginMailCode' ] ) );

                            if( $this -> strReplace( $_POST['securityCode'] ) == $this -> loginMailCode ):

                                  if( $this -> tokenTime < time( ) ):
                                      $this -> view( 'login-mail' , NULL , self::$viewName );
                                  else:
                                      // ['user'] -> Session Deleted
                                      $_SESSION['user'] = $_SESSION['security'];
                                      session_destroy( $_SESSION['security'] );
                                      unset( $_SESSION['security'] );
                                      // ['user'] -> Session Deleted

                                      // User - Login data update
                                      $this -> model -> loginCheckInUpdate( $this -> loginMailCode );

                                      $this -> view( 'login' , TRUE , self::$viewName );
                                  endif;

                            else:
                                  $this -> view( 'login-mail' , NULL , self::$viewName );
                            endif;

                       else:

                            if( isset( $_POST['login'] ) ):

                                 // Random - Number
                                 $this -> model -> random = $this -> random( );

                                 // UserName - Login Input
                                 $this -> model -> userName = $this->strReplace( $_POST['userName'] );

                                 // Password - Login Input
                                 $this -> model -> userPassword = $this->valueEncrypt( 'LOCK' , $this->strReplace( $_POST['userPassword'] ) );

                                 // Email - Login Input
                                 $this -> model -> userEmail = $this->valueEncrypt( 'LOCK' , $this->strReplace( $_POST['userName'] ) );


                                 if( $this -> loginData = $this -> model -> login( ) ):

                                       $this -> model -> securityToken = $_POST['_token']; // UserPost - securityToken created
                                       $this -> model -> securityCode = $this -> random( 8 ); // Login - securityCode created

                                       $this -> model -> userRandom = $this -> loginData[0]['random'];

                                       // SESSION - Created
                                       $_SESSION['security'] = [
                                          'code' => $this -> model -> securityCode,
                                          'time' => time() + $this -> loginData[0]['sessionTime'].'0',
                                          'random' => $this -> loginData[0]['random'],
                                          'name' => $this -> loginData[0]['name'],
                                          'surname' => $this -> loginData[0]['surname'],
                                          'avatar' => $this -> loginData[0]['avatar'] ? $this -> loginData[0]['avatar'] : 'avatarEmptyUser' ,
                                          'password' => $this->valueEncrypt( 'UNLOCK' , $this->strReplace( $this -> loginData[0]['password'] ) ),
                                          'email' => $this->valueEncrypt( 'UNLOCK' , $this->strReplace( $this -> loginData[0]['email'] ) ),
                                          'authority' => $this -> loginData[0]['authority'],
                                          'reference' => $this -> loginData[0]['user'],
                                       ];
                                       // SESSION - Created



                                       // SECURİTY CODE //
                                       $this -> mailCodeSend = $this -> mail() -> mailSend( [
                                            'sendEmail' => 'info@finisare.com',
                                            'sendSubject' => 'Güvenlik için buradayım.',
                                            'sendData' => $this -> model -> securityCode,
                                       ] );
                                       // SECURİTY CODE //


                                       if( $this -> mailCodeSend ):
                                            // User - Login Created
                                            $this -> model -> loginCreated();

                                            $this -> view(
                                                 'login-mail', $this->valueEncrypt( 'LOCK' , $this -> model -> securityCode.'@'.strtotime( '35 seconds' ) ) ,
                                                 self::$viewName
                                            );
                                       else:
                                            $this -> view( 'login-mail' , FALSE , self::$viewName );
                                       endif;


                                 else:
                                       $this -> view( 'login' , FALSE , self::$viewName );
                                 endif;

                            else:
                                 $this -> view( 'login' , NULL , self::$viewName );
                            endif;

                       endif;

               else:

                     if( isset( $_POST['webPageDataCreated'] ) ):
                          $this -> view( 'sign-up' , TRUE , self::$viewName );
                     else:
                          $this -> view( 'sign-up' , NULL , self::$viewName );
                     endif;

               endif;

     }

     private function loginMessage(){

             $hour = date("H");

             if($hour >= "12" && $hour < "17")
               $this -> todayMessage = "İyi Günler";
             else if($hour >= "17" && $hour < "19")
               $this -> todayMessage = "İyi Akşamlar";
             else if($hour >= "19")
               $this -> todayMessage = "İyi Geceler";
             else
               $this -> todayMessage = "Günaydın";
     }
}
