<?php


class Token {

      public function generate(){

              if( !isset( $_POST['_token'] ) )
                  $_SESSION['_token'] = md5(sha1(time().mt_rand( rand(0,9999) )));

              return '<input type="hidden" name="_token" value="'.$_SESSION['_token'].'" />';
      }

      public function loginGenerate(){
            if( !isset( $_POST['_token'] ) )
                return md5(sha1(time().mt_rand( rand(0,9999) )));
      }

      public function tokenCheck( $token = NULL ){

              if( $token != NULL ):

                    if( !isset( $token ) ):
                        return FALSE;
                    else:
                        if( $token === $_SESSION['_token'] )
                            return TRUE;
                        else
                            return FALSE;
                    endif;

              else:
                   return NULL;
              endif;

              unset( $token );
      }

}
