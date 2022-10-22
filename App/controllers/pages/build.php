<?php



class build extends Controller
{
       private static $viewFolder = 'build/';
       private static $modelName = 'buildModel';



       const logoConfig = [
             'type' => 'png', // png - webp - jpeg
             'ratio_fill' => TRUE, // TRUE - FALSE
             'width' => 324,
             'height' => 160,
       ];


       public function __construct(){
              $this -> model = $this -> model( self::$modelName , 'pages' );
       }

       public function seo(){

              // Seo - DB Data
              $this -> seoData = $this -> model -> seoRead();

              // Random - Number -> Create
              $this -> random = $this->random( 10 );

              if( $this -> seoData ):

                      // Mail Build -> Update - Transactions
                      if( isset( $_POST['seoUpdate'] ) ):

                            if( $this->pictureControl( $_FILES['image'] ) ):

                                // Picture Unlink
                                $this->pictureUnlink( $image = $_POST['oldData']['logo'] , $this );

                                // Picture Load
                                $this->pictureData = $this->pictureLoad(
                                 [
                                     'name' => 'logo',
                                     'file' => $_FILES['image'],
                                     'picture' => self::logoConfig
                                 ] );

                            endif;

                            // Data Control
                            $this->dataInput = $this->dataInputCheck( [
                                  [
                                    'title'  => $this->strReplace( $_POST['title'] ),
                                    'description' => $this->strReplace( $_POST['description'] ),
                                    'logo' => $this->pictureData ? $this->pictureData : $_POST['oldData']['logo'],
                                  ] ,
                                  [
                                    $this->strReplace( $_POST['oldData']['title'] ),
                                    $this->strReplace( $_POST['oldData']['description'] ),
                                    $_POST['oldData']['logo'],
                                  ]
                              ] );
                            // Data Control

                            if( is_null( $this->dataInput ) )
                               $this -> update = NULL;
                            else
                               $this -> update = $this -> model -> seoEdit( $_POST['oldData']['random'] , $this );

                            $this -> view( 'update' , $this -> token() -> tokenCheck( $_POST['_token'] ) ? $this -> update : FALSE , self::$viewFolder.'seo/' );

                      else:
                            $this -> view( 'update' , $this -> seoData , self::$viewFolder.'seo/' );
                      endif;

              else:

                  // Mail Build -> Create - Transactions
                  if( isset( $_POST['seoCreat'] ) ):

                        // Title - Create
                        $this -> title = $this->strReplace( $_POST['title'] );

                        // Description - Create
                        $this -> description = $this->strReplace( $_POST['description'] );

                        // Keywords -> Create
                        $this -> keywords = $this -> createTag( $_POST['description'] ? $_POST['description'] : $this->title );

                        // Logo -> Create
                        $this->logo = $this->pictureLoad( [
                            'name' => 'logo',
                            'file' => $_FILES['logo'],
                            'picture' => self::logoConfig
                        ] );
                        // Logo -> Create


                        $this -> view( 'creat' , $this -> token() -> tokenCheck( $_POST['_token'] ) ? $this -> model -> seoCreat( $data = $this ) : FALSE , self::$viewFolder.'seo/' );

                  else:
                        $this -> view( 'creat' , NULL , self::$viewFolder.'seo/' );
                  endif;
                  // Mail Build -> Create - Transactions

              endif;
       }

       public function mail( $data = NULL ){

                // Mail - DB Data
                $this -> mailData = $this -> model -> mailRead();

                // Random - Number -> Create
                $this -> random = $this->random( 7 );


                if( $this -> mailData ):

                        // Mail Build -> Update - Transactions
                        if( isset( $_POST['mailEdit'] ) ):

                               // Data Control
                               $this->dataInput = $this->dataInputCheck( [
                                    [
                                      'host'  => $this->valueEncrypt( 'LOCK' , $this->strReplace( $_POST['mailHost'] ) ),
                                      'username' => $this->valueEncrypt( 'LOCK' , $this->strReplace( $_POST['mailUsername'] ) ),
                                      'password' => $this->valueEncrypt( 'LOCK' , $this->strReplace( $_POST['mailPassword'] ) ),
                                      'fromname' => $this->strReplace( $_POST['mailFromname'] ),
                                      'charset' => $this->strReplace( $_POST['mailCharSet'] ),
                                    ] ,
                                    [
                                      $this->valueEncrypt( 'LOCK' , $this->strReplace( $_POST['oldData']['host'] ) ),
                                      $this->valueEncrypt( 'LOCK' , $this->strReplace( $_POST['oldData']['username'] ) ),
                                      $this->valueEncrypt( 'LOCK' , $this->strReplace( $_POST['oldData']['password'] ) ),
                                      $this->strReplace( $_POST['oldData']['fromname'] ),
                                      $this->strReplace( $_POST['oldData']['charset'] ),
                                    ]
                                ] );


                               if( is_null( $this->dataInput ) )
                                  $this -> mailUpdate = NULL;
                               else
                                  $this -> mailUpdate = $this -> model -> mailEdit( $_POST['oldData']['random'] , $this );

                                $this -> view( 'update' , $this -> token() -> tokenCheck( $_POST['_token'] ) ? $this -> mailUpdate : FALSE , self::$viewFolder.'mail/' );
                                
                        else:
                             $this -> view( 'update' , $this -> mailData , self::$viewFolder.'mail/' );
                        endif;
                        // Mail Build -> Update - Transactions

                else:
                      // Mail Build -> Create - Transactions
                      if( isset( $_POST['mailCreat'] ) ):

                            $this -> mailData = [
                                 'random' => $this -> random,
                                 'kimlik' => identity,
                                 'host' => $this->valueEncrypt( 'LOCK' , $this->strReplace( $_POST['mailHost'] ) , dataKey ), // mailHost - Create
                                 'username' => $this->valueEncrypt( 'LOCK' , $this->strReplace( $_POST['mailUsername'] ) , dataKey ), // mailUsername - Create
                                 'password' => $this->valueEncrypt( 'LOCK' , $this->strReplace( $_POST['mailPassword'] ) , dataKey ), // mailPassword - Create
                                 'fromname' => $this->strReplace( $_POST['mailFromname'] ), // mailFromname - Create
                                 'charset' => $this->strReplace( $_POST['mailCharSet'] ), // mailCharSet - Create
                                 'ip_adres' => ipData,
                                 'user' => user,
                            ];

                            $this -> view( 'creat' , $this -> token() -> tokenCheck( $_POST['_token'] ) ? $this -> model -> mailCreat( $this -> mailData ) : FALSE , self::$viewFolder.'mail/' );

                      else:
                            $this -> view( 'creat' , NULL , self::$viewFolder.'mail/' );
                      endif;
                      // Mail Build -> Create - Transactions
                endif;
       }

       public function contact(){

              // Contact Data
              $this -> contactData = $this -> model -> contactRead();

              // Random - Number -> Create
              $this -> random = $this->random( 7 );

              if( $this -> contactData ):

                    // Contact Build -> Update - Transactions
                    if( isset( $_POST['contactEdit'] ) ):

                          // Data Control
                          $this->dataInput = $this->dataInputCheck( [
                               [
                                 'map'  => $this->strReplace( $_POST['contactMap'] ),
                                 'adres' => $this->strReplace( $_POST['contactAdres'] ),
                                 'gsm' => $this->strReplace( $_POST['contactGsm'] ),
                                 'tel' => $this->strReplace( $_POST['contactTel'] ),
                                 'email' => $this->strReplace( $_POST['contactEmail'] ),
                                 'facebook' => $this->strReplace( $_POST['contactFacebook'] ),
                                 'twitter' => $this->strReplace( $_POST['contactTwitter'] ),
                                 'instagram' => $this->strReplace( $_POST['contactInstagram'] ),
                                 'linkedin' => $this->strReplace( $_POST['contactLinkedin'] ),
                               ] ,
                               [
                                  $this->strReplace( $_POST['oldData']['map'] ),
                                  $this->strReplace( $_POST['oldData']['adres'] ),
                                  $this->strReplace( $_POST['oldData']['gsm'] ),
                                  $this->strReplace( $_POST['oldData']['tel'] ),
                                  $this->strReplace( $_POST['oldData']['email'] ),
                                  $this->strReplace( $_POST['oldData']['facebook'] ),
                                  $this->strReplace( $_POST['oldData']['twitter'] ),
                                  $this->strReplace( $_POST['oldData']['instagram'] ),
                                  $this->strReplace( $_POST['oldData']['linkedin'] ),
                               ]
                           ] );

                           if( is_null( $this->dataInput ) )
                               $this -> contactEdit = NULL;
                           else
                               $this -> contactEdit = $this -> model -> contactEdit( $_POST['oldData']['random'] , $this );

                          $this -> view( 'update' , $this -> token() -> tokenCheck( $_POST['_token'] ) ? $this -> contactEdit : FALSE , self::$viewFolder.'contact/' );

                    else:
                          $this -> view( 'update' , $this -> contactData , self::$viewFolder.'contact' );
                    endif;
              else:
                    if( isset( $_POST['contactCreat'] ) ):

                          $this -> contactData = [
                                'random' => $this -> random,
                                'kimlik' => identity,
                                'map' => $this->strReplace( $_POST['contactMap'] ),
                                'adres' => $this->strReplace( $_POST['contactAdres'] ),
                                'gsm' => $this->strReplace( $_POST['contactGsm'] ),
                                'tel' => $this->strReplace( $_POST['contactTel'] ),
                                'email' => $this->strReplace( $_POST['contactEmail'] ),
                                'facebook' => $this->strReplace( $_POST['contactFacebook'] ),
                                'twitter' => $this->strReplace( $_POST['contactTwitter'] ),
                                'instagram' => $this->strReplace( $_POST['contactInstagram'] ),
                                'linkedin' => $this->strReplace( $_POST['contactLinkedin'] ),
                                'ip_adres' => ipData,
                                'user' => user,
                          ];

                          $this -> view( 'creat' , $this -> token() -> tokenCheck( $_POST['_token'] ) ? $this -> model -> contactCreat( $this -> contactData ) : FALSE , self::$viewFolder.'contact' );

                    else:
                         $this -> view( 'creat' , NULL , self::$viewFolder.'contact' );
                    endif;
              endif;

       }
}
