<?php




class sliderModel extends Model {

      private $tableName = 'slider';

      public function __construct(  ){

      }

      private function movementSave( array $data = NULL ){

              if( $data != NULL ){
                    $result = $this->create( "INSERT INTO movement SET tip = ?, random = ?, operation = ?, datee = ?, ip_adres = ?, user = ?" );
                    $result->execute( $data );
                    if( $result == TRUE )
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
                     title = :title,
                     description = :description,
                     link = :link,
                     image = :image,
                     dil = :dil,
                     datee = :datee,
                     ip_adres = :ip_adres,
                     user = :user
                     " );

                   $this->result->execute( [
                     'random' => $data->random,
                     'kimlik' => 'wefwefwef',
                     'title' => $data -> title,
                     'description' => $data -> description,
                     'link' => $data -> link,
                     'image' => $data->image ? $data->image : FALSE ,
                     'dil' => 'eng',
                     'datee' => dateClock,
                     'ip_adres' => ipData,
                     'user' => $_SESSION['user'] ? $_SESSION['user']['name'].' '.$_SESSION['user']['surname'] : user,
                     ] );


               $this->movementSave = $this->movementSave( [ 'slider' , $data -> random , 'Slider Ekleme İşlemi başarılı' , dateClock , ipData , $_SESSION['user'] ? $_SESSION['user']['name'] : user ] );

               if ( $this -> result and $this->movementSave )
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
                return $this->read( "SELECT * FROM $this->tableName ORDER BY id DESC" );
      }

      public function deleteBring( $data = NULL , $classThis = NULL ){

             if( $data != NULL ){

                   // SQL - DELETE
                   $this->delete = $this->delete( "DELETE FROM $this->tableName WHERE random=:random" , [ 'random' => $data ] );

                   // MOVEMENT SAVE
                   $this->movementSave = $this->movementSave( [ 'slider' , $data , 'Silme İşlemi başarılı' , dateClock , ipData , $_SESSION['user'] ? $_SESSION['user']['name'] : user ] );

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
                    $this -> update = $this -> update(
                      "UPDATE $this->tableName SET " . $classThis->dataTheSon( $classThis ) . 'random=:random, datee=:datee, ip_adres=:ip_adres, user=:user WHERE '.'random=:oldRandom' ,
                      array_merge(
                        $classThis->dataInput ,
                        [
                          'random' => $classThis -> random,
                          'oldRandom' => $data,
                          'datee' => dateClock,
                          'ip_adres' => ipData,
                          'user' => $_SESSION['user'] ? $_SESSION['user']['name'].' '.$_SESSION['user']['surname'] : user,
                        ] )
                    );
                    // SQL - UPDATE QUERY

                    // MOVEMENT SAVE
                    $this -> movementSave = $this->movementSave( [ 'slider' , $classThis -> random , 'Düzenleme İşlemi başarılı' , dateClock , ipData , user ] );

                    if( $this -> update and $this -> movementSave )
                       return TRUE;
                   else
                       return NULL;
                    // MOVEMENT SAVE


             } else
                return NULL;
      }

      public function __destructor(){

      }
}
