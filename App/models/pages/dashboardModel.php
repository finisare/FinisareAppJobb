<?php

class dashboardModel extends Model {



      public function __construct(){

      }

      public function userLoginData( $data = NULL ){

             if( $data != NULL ):
                   return $this -> read(
                      "SELECT user, datee, ip_adres, checkLogin FROM login WHERE user=:user AND userRandom=:userRandom AND securityCode!=:securityCode ORDER BY id DESC LIMIT 6",
                      [
                        'user' => $_SESSION['user']['name'],
                        'userRandom' => $data,
                        'securityCode' => $_SESSION['user']['code'],
                      ]
                   );
             else:
                  return NULL;
             endif;
      }


      public function __destructor(){

      }

}
