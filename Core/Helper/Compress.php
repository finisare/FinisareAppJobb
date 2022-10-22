<?php

namespace System\Compress;

class Compress {

      private static $apiKey = "LNWGsPnQ3Cc2WXXMCHBk4jBc4K6BZ43Y";

      private static $tinify = documentRoot.dirnameProject.'/vendor/autoload.php';
      

      public function tinifyCompressFile( $data = NULL ){

              require self::$tinify;

              \Tinify\setKey( self::$apiKey );

              $source = \Tinify\fromFile( $data[0] . $data[1] );
              if( $source->toFile( $data[0] . $data[1] ) == TRUE )
                 return TRUE;
              else
                 return FALSE;
              /*
              if( $data != NULL ){
                  if( move_uploaded_file( $data[2] , $data[0] . $data[1]) ){

                      try {
                          \Tinify\setKey( $this->apiKey );
                          $path_info = pathinfo($data[0] . $data[1]);

                          $source = Tinify\fromFile( $data[0] . $data[1] )->toFile( $data[0] .$path_info['filename'] . '.' . $path_info['extension'] );

                      } catch(\Tinify\AccountException $e) {
                          print("The error message is: " . $e->getMessage());
                          // Verify your API key and account limit.
                      } catch(\Tinify\ClientException $e) {
                          // Check your source image and request options.
                          print("The error message is: " . $e->getMessage());
                      } catch(\Tinify\ServerException $e) {
                          // Temporary issue with the Tinify API.
                          print("The error message is: " . $e->getMessage());
                      } catch(\Tinify\ConnectionException $e) {
                          // A network connection error occurred.
                          print("The error message is: " . $e->getMessage());
                      } catch(Exception $e) {
                          // Something else went wrong, unrelated to the Tinify API.
                          print("The error message is: " . $e->getMessage());
                      }

                      // return  $data[0] .$path_info['filename'] . '.' . $path_info['extension'];
                  } else
                  return NULL;
              }else
                  return NULL;

                  */
      }

}
