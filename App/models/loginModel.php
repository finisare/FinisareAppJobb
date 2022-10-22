<?php



class loginModel extends Model {

      // Query TableName
      private $tableName = 'user';

      public $random; // User Random
      public $userName; // User Name
      public $userEmail; // User Email
      public $userPassword; // User Password
      public $securityToken; // Security - Token
      public $securityCode; // Security - Code

      public $userRandom; // Login Random Data

      public function __construct( ){


      }

      public function login( ){

             return $this->read(
               "SELECT * FROM $this->tableName WHERE email=:userEmail OR name=:userName AND password=:userPassword" ,
               [
                 'userName' => $this->userName,
                 'userEmail' => $this->userEmail,
                 'userPassword' => $this->userPassword,
               ]
             );
      }

      public function loginCheckInUpdate( $data = NULL ){


             if( $data != NULL ){

                   $this -> update = $this -> update( "UPDATE login SET checkLogin=:checkLogin, datee=:datee, ip_adres=:ip_adres WHERE securityCode=:securityCode" ,
                       [
                         'checkLogin' => 1,
                         'securityCode' => $data,
                         'datee' => dateClock,
                         'ip_adres' => ipData,
                       ]
                   );

                   if( $this -> update )
                      return TRUE;
                   else
                      return FALSE;

             } else
             return NULL;
      }


      public function loginCreated( ){

              $result = $this->create( "INSERT INTO login SET
                random = :random,
                userRandom = :userRandom,
                identity = :identity,
                securityCode = :securityCode,
                securityToken = :securityToken,
                user = :user,
                email = :email,
                dil = :dil,
                datee = :datee,
                ip_adres = :ip_adres
              " );

              $result->execute( [
                'random' => $this -> random,
                'userRandom' => $this -> userRandom,
                'identity' => identity,
                'securityCode' => $this -> securityCode,
                'securityToken' => $this -> securityToken,
                'user' => $this -> userName,
                'email' => $this -> userEmail,
                'dil' => 'eng',
                'datee' => dateClock,
                'ip_adres' => ipData
                ] );


              if( $result )
                 return TRUE;
              else
                 return NULL;

      }

}
