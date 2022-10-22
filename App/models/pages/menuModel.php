<?php


class menuModel extends Model {

      private $tableName = 'menu';

      public function __construct(  ){

      }

      private function movementSave( array $data = NULL ){

              if( $data != NULL ){
                    $result = $this->create( "INSERT INTO movement SET tip = ?, random = ?, operation = ?, datee = ?, ip_adres = ?, user = ?" );
                    $result->execute( $data ); // -> array_merge( $data, [ 'BURAYA EKLE' ] )
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
                       ranking = :ranking,
                       title = :title,
                       link = :link,
                       keywords = :keywords,
                       description = :description,
                       content = :content,
                       upmenu = :upmenu,
                       upmenu_random = :upmenu_random,
                       upmenu_id = :upmenu_id,
                       upmenu_link = :upmenu_link,
                       dil = :dil,
                       datee = :datee,
                       ip_adres = :ip_adres,
                       user = :user
                       " );

                     $this->result->execute( array_merge( $data -> upMenuData , [
                       'random' => $data->random,
                       'kimlik' => 'wefwefwef',
                       'ranking' => self::rowCountt( $this->tableName )+1,
                       'title' => $data->title,
                       'link' => $data->link,
                       'keywords' => $data->keywords,
                       'description' => $data->description,
                       'content' => $_POST['content'],
                       'dil' => 'eng',
                       'datee' => dateClock,
                       'ip_adres' => ipData,
                       'user' => user
                       ] ) );

                 $this->movementSave = $this->movementSave( [ 'menu' , $data -> random , 'Ekleme İşlemi başarılı' , dateClock , ipData , user ] );

                 if ( $this->result and $this->movementSave )
                     return TRUE;
                 else
                     return FALSE;

             } else
               return NULL;
      }

      /*
      public function readBringMen( $data = NULL ){

             if( $data != NULL )
                return $this->read( "SELECT * FROM $this->tableName WHERE upmenu_random!=:upmenu_random ORDER BY ranking DESC" , [ 'upmenu_random' => $data ] );
             else
                return 'BİTTİ';
                // return $this->read( "SELECT * FROM $this->tableName" );
      }


      public function subMenuSearch( $data = NULL ){
             if( $data != NULL )
                return $this->read( "SELECT * FROM $this->tableName WHERE upmenu_random=:upmenu_random ORDER BY ranking DESC" , [ 'upmenu_random' => $data ] );
             else
                return 'BİTTİ';
      }
      */

      public function readBring( $data = NULL ){
             if( $data != NULL )
                 return $this->read( "SELECT * FROM $this->tableName WHERE random=:random" , [ 'random' => $data ] );
             else
                 return $this->read( "SELECT * FROM $this->tableName" );
      }

      public function readBringUpMenu( $data = NULL ){

             if( $data != NULL )
                  return $this->read( "SELECT * FROM $this->tableName WHERE upmenu_random=:upmenu_random ORDER BY ranking DESC" , [ 'upmenu_random' => $data ] );
             else
                  return $this->read( "SELECT * FROM $this->tableName WHERE upmenu=:upmenu ORDER BY ranking DESC" , [ 'upmenu' => 0 ] );
      }

      public function subMenuDelete( $data = NULL ){

                if( $data != NULL ) {

                      @$this -> upMenuFing = $this->read( "SELECT random FROM $this->tableName WHERE upmenu_random=:upmenu_random" , [ 'upmenu_random' => $data ] )[0]['random'];
                      @$this -> upMenuDelete = $this->delete( "DELETE FROM $this->tableName WHERE upmenu_random=:upmenu_random" , [ 'upmenu_random' => $data ] );

                      @$this -> upMenuFing1 = $this->read( "SELECT random FROM $this->tableName WHERE upmenu_random=:upmenu_random" , [ 'upmenu_random' => $this -> upMenuFing ] )[0]['random'];
                      @$this -> upMenuDelete1 = $this->delete( "DELETE FROM $this->tableName WHERE upmenu_random=:upmenu_random" , [ 'upmenu_random' => $this -> upMenuFing ] );

                      @$this -> upMenuFing2 = $this->read( "SELECT random FROM $this->tableName WHERE upmenu_random=:upmenu_random" , [ 'upmenu_random' => $this -> upMenuFing1 ] )[0]['random'];
                      @$this -> upMenuDelete2 = $this->delete( "DELETE FROM $this->tableName WHERE upmenu_random=:upmenu_random" , [ 'upmenu_random' => $this -> upMenuFing1 ] );

                      @$this -> upMenuFing3 = $this->read( "SELECT random FROM $this->tableName WHERE upmenu_random=:upmenu_random" , [ 'upmenu_random' => $this -> upMenuFing2 ] )[0]['random'];
                      @$this -> upMenuDelete3 = $this->delete( "DELETE FROM $this->tableName WHERE upmenu_random=:upmenu_random" , [ 'upmenu_random' => $this -> upMenuFing2 ] );

                      @$this -> upMenuFing4 = $this->read( "SELECT random FROM $this->tableName WHERE upmenu_random=:upmenu_random" , [ 'upmenu_random' => $this -> upMenuFing3 ] )[0]['random'];
                      @$this -> upMenuDelete4 = $this->delete( "DELETE FROM $this->tableName WHERE upmenu_random=:upmenu_random" , [ 'upmenu_random' => $this -> upMenuFing3 ] );

                      @$this -> upMenuFing5 = $this->read( "SELECT random FROM $this->tableName WHERE upmenu_random=:upmenu_random" , [ 'upmenu_random' => $this -> upMenuFing4 ] )[0]['random'];
                      @$this -> upMenuDelete5 = $this->delete( "DELETE FROM $this->tableName WHERE upmenu_random=:upmenu_random" , [ 'upmenu_random' => $this -> upMenuFing4 ] );

                      @$this -> upMenuFing6 = $this->read( "SELECT random FROM $this->tableName WHERE upmenu_random=:upmenu_random" , [ 'upmenu_random' => $this -> upMenuFing5 ] )[0]['random'];
                      @$this -> upMenuDelete6 = $this->delete( "DELETE FROM $this->tableName WHERE upmenu_random=:upmenu_random" , [ 'upmenu_random' => $this -> upMenuFing5 ] );

                      @$this -> upMenuFing7 = $this->read( "SELECT random FROM $this->tableName WHERE upmenu_random=:upmenu_random" , [ 'upmenu_random' => $this -> upMenuFing6 ] )[0]['random'];
                      @$this -> upMenuDelete7 = $this->delete( "DELETE FROM $this->tableName WHERE upmenu_random=:upmenu_random" , [ 'upmenu_random' => $this -> upMenuFing6 ] );

                      if( $this -> upMenuDelete and $this -> upMenuDelete1 and $this -> upMenuDelete2 and $this -> upMenuDelete3 and $this -> upMenuDelete4 and $this -> upMenuDelete5 and $this -> upMenuDelete6 and $this -> upMenuDelete7  )
                          return TRUE;
                      else
                          return FALSE;
                } else
                return NULL;

                unset( $this -> upMenuDelete , $this -> upMenuDelete1 , $this -> upMenuDelete2 , $this -> upMenuDelete3 , $this -> upMenuDelete4 , $this -> upMenuDelete5 , $this -> upMenuDelete6 , $this -> upMenuDelete7 );
      }

      public function deleteBring( $data = NULL ){

             if( $data != NULL ){

                     // SQL - DELETE
                     $this->delete = $this->delete( "DELETE FROM $this->tableName WHERE random=:random" , [ 'random' => $data ] );

                     // SubMenu - Delete
                     $this->subMenuDelete = self::subMenuDelete( $data );

                     // MOVEMENT SAVE
                     $this->movementSave = $this->movementSave( [ 'menu' , $data , 'Silme İşlemi başarılı' , dateClock , ipData , user ] );

                     if( $this->delete AND $this->movementSave AND $this->subMenuDelete )
                          return $this->delete;
                     else
                          return FALSE;

             } else
                return NULL;
      }

      public function editBring( $data = NULL , $classThis = NULL ){

              if( $data != NULL ){

                    // RANDOM -> Create
                    $this -> random = $classThis->random();

                    if( $classThis->dataInput['link'] ){

                          $this->upMenuUpdate = $this -> update( "UPDATE $this->tableName SET upmenu=:upmenu, upmenu_random=:upmenu_random, upmenu_link=:upmenu_link WHERE upmenu_random=:data" , [
                            'data' => $data,
                            'upmenu' => $classThis->dataInput['title'],
                            'upmenu_link' => $classThis->dataInput['link'],
                            'upmenu_random' => $this -> random
                            ] );

                    } else {

                          switch ( $classThis->dataInput ) {

                                case $classThis->dataInput['upmenu_id']==TRUE:
                                    if( $classThis->dataInput['link'] ){

                                          $this->upMenuUpdate = $this -> update( "UPDATE $this->tableName SET upmenu=:upmenu, upmenu_random=:upmenu_random, upmenu_link=:upmenu_link WHERE upmenu_random=:data" , [
                                            'data' => $data,
                                            'upmenu' => $classThis->dataInput['title'],
                                            'upmenu_random' => $this -> random,
                                            'upmenu_link' => $classThis->dataInput['link'],
                                            ] );

                                    } else {

                                        $this->upMenuUpdate = $this -> update( "UPDATE $this->tableName SET upmenu=:upmenu, upmenu_random=:upmenu_random, upmenu_id=:upmenu_id, upmenu_link=:upmenu_link WHERE random=:data" , [
                                          'data' => $data,
                                          'upmenu' => $classThis->dataInput['upmenu'],
                                          'upmenu_random' => $this -> random,
                                          'upmenu_id' => $classThis->dataInput['upmenu_id'],
                                          'upmenu_link' => $classThis->dataInput['upmenu_link'],
                                          ] );

                                        $this->upMenuUpdate = $this -> update( "UPDATE $this->tableName SET upmenu_random=:upmenu_random WHERE upmenu_random=:data" , [
                                          'data' => $data,
                                          'upmenu_random' => $this -> random
                                          ] );

                                    }
                                break;

                                case $classThis->dataInput['upmenu_id']==FALSE:

                                      if( $classThis->dataInput['link'] ) {

                                          $this->upMenuUpdate = $this -> update( "UPDATE $this->tableName SET upmenu_random=:upmenu_random, upmenu=:upmenu, upmenu_link=:upmenu_link WHERE upmenu_random=:data" , [
                                            'data' => $data,
                                            'upmenu' => $classThis->dataInput['title'],
                                            'upmenu_link' => $classThis->dataInput['link'],
                                            'upmenu_random' => $this -> random
                                            ] );

                                      } else {

                                          $this->upMenuUpdate = $this -> update( "UPDATE $this->tableName SET upmenu_random=:upmenu_random WHERE upmenu_random=:data" , [
                                            'data' => $data,
                                            'upmenu_random' => $this -> random
                                            ] );

                                      }
                                break;

                                default:
                                return NULL;
                                break;
                          }

                    }


                    // SQL - UPDATE
                    $this -> update = $this -> update( "UPDATE $this->tableName SET " . $classThis->dataTheSon( $classThis ) . 'random=:random, datee=:datee, ip_adres=:ip_adres, user=:user WHERE '.' random=:oldRandom' , array_merge( $classThis->dataInput ,
                     [
                       'random' => $this -> random,
                       'oldRandom' => $data,
                       'datee' => dateClock,
                       'ip_adres' => ipData,
                       'user' => user
                     ] ) );
                     // SQL - UPDATE


                     // MOVEMENT SAVE
                     $this -> movementSave = $this->movementSave( [ 'menu' , $this -> random , 'Düzenleme İşlemi başarılı' , dateClock , ipData , user ] );

                     if( $this -> update and $this -> movementSave )
                         return $this -> update;
                     else
                         return NULL;

              } else
                 return NULL;
      }
}
