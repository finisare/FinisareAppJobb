<?


class userModel extends Model {

      // MySQL DB - User Field - Table Name
      private $tableName = 'user';

      // User Field - Variables
      public $random;
      public $name;
      public $surname;
      public $token;
      public $email;
      public $password;
      public $avatar;
      public $authority;
      public $sessionTime;
      // User Field - Variables


      public function __construct( ){

      }

      private function movementSave( array $data = NULL ){

              if( $data != NULL ){
                    $result = $this->create( "INSERT INTO movement SET tip = ?, random = ?, operation = ?, datee = ?, ip_adres = ?, user = ?" );
                    $result->execute( $data );
                    if( $result )
                       return TRUE;
                    else
                       return NULL;
              } else
              return NULL;
      }

      public function createBring( $data = NULL ){

             if( $data != NULL ){

                     $this->result = $this->create( "INSERT INTO $this->tableName SET
                       random = :random,
                       kimlik = :kimlik,
                       ranking = :ranking,
                       name = :name,
                       surname = :surname,
                       email = :email,
                       password = :password,
                       avatar = :avatar,
                       authority = :authority,
                       sessionTime = :sessionTime,
                       dil = :dil,
                       datee = :datee,
                       ip_adres = :ip_adres,
                       user = :user
                       " );

                     $this->result->execute( [
                       'random' => $this->random,
                       'kimlik' => identity,
                       'ranking' => self::rowCountt( $this->tableName )+1,
                       'name' => $this->name,
                       'surname' => $this->surname,
                       'email' => $this->email,
                       'password' => $this->password,
                       'avatar' => $this->avatar ? $this->avatar : FALSE ,
                       'authority' => $this->authority ? TRUE : FALSE,
                       'sessionTime' => $this->sessionTime,
                       'dil' => 'eng',
                       'datee' => dateClock,
                       'ip_adres' => ipData,
                       'user' => $_SESSION['user'] ? $_SESSION['user']['name'].' '.$_SESSION['user']['surname'] : user,
                       ] );

                       $this->movementSave = $this->movementSave( [ 'user' , $this->random , 'Kullanıcı Ekleme İşlemi başarılı' , dateClock , ipData , $_SESSION['user']['name'].' '.$_SESSION['user']['surname'] ] );

                       if ( $this->result and $this->movementSave )
                            return TRUE;
                       else
                           return FALSE;

             } else
             return NULL;

      }

      public function readBring( $data = NULL ){

            if( $data != NULL )
                return $this->read( "SELECT * FROM $this->tableName WHERE random=:random" , [ 'random' => $data ] );
            else
                return $this->read( "SELECT * FROM $this->tableName" );
      }

      public function deleteBring( $data = NULL , $classThis = NULL ){

             if( $data != NULL ){

                   // SQL - DELETE
                   $this->delete = $this->delete( "DELETE FROM $this->tableName WHERE random=:random" , [ 'random' => $data ] );

                   // MOVEMENT SAVE
                   $this->movementSave = $this->movementSave( [ 'user' , $data , 'Silme İşlemi başarılı' , dateClock , ipData , $_SESSION['user']['name'].' '.$_SESSION['user']['surname'] ] );

                   if( $this->delete AND $this->movementSave )
                        return $this->delete;
                   else
                        return FALSE;

             } else
                return NULL;
      }


      public function editBring( $data = NULL , $classThis = NULL ){

             if( $data != NULL ){

                    // SQL - UPDATE QUERY
                    $this->update = $this->update(
                      "UPDATE $this->tableName SET " . $classThis->dataTheSon( $classThis ) . 'random=:random, datee=:datee, ip_adres=:ip_adres, user=:user WHERE '.'random=:oldRandom' ,
                      array_merge(
                        $classThis->dataInput ,
                        [
                          'random' => $classThis->random,
                          'oldRandom' => $data,
                          'datee' => dateClock,
                          'ip_adres' => ipData,
                          'user' => $_SESSION['user']['name'].' '.$_SESSION['user']['surname'],
                        ] )
                    );
                    // SQL - UPDATE QUERY



                    if( $this->update ){
                        return TRUE;

                        // MOVEMENT SAVE
                        $this->movementSave = $this->movementSave( [ 'user' , $data , 'Düzenleme İşlemi başarılı' , dateClock , ipData , $_SESSION['user']['name'].' '.$_SESSION['user']['surname'] ] );

                    } else
                       return NULL;



             } else
                return NULL;
      }

}
