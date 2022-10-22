<?

class categoryModel extends Model
{
      private $tableName = 'category';

      public function __construct(  ){

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
                     title = :title,
                     link = :link,
                     image = :image,
                     keywords = :keywords,
                     description = :description,
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
                     'kimlik' => "wefwefwef",
                     'ranking' => self::rowCountt( $this->tableName )+1,
                     'title' => $data->title,
                     'link' => $data->link,
                     'image' => $data->image ? $data->image : FALSE ,
                     'keywords' => $data->keywords,
                     'description' => $data->description,
                     'dil' => 'eng',
                     'datee' => dateClock,
                     'ip_adres' => ipData,
                     'user' => user
                     ] ) );

                     // MOVEMENT SAVE
                     $this->movementSave = $this->movementSave( [ 'category' , $data -> random , 'Ekleme İşlemi başarılı' , dateClock , ipData , user ] );

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
                 return $this->read( "SELECT * FROM $this->tableName ORDER BY id DESC" );
      }

      public function readBringUpCategory( $data = NULL ){

             if( $data != NULL )
                  return $this->read( "SELECT * FROM $this->tableName WHERE upmenu_random=:upmenu_random ORDER BY ranking DESC" , [ 'upmenu_random' => $data ] );
             else
                  return $this->read( "SELECT * FROM $this->tableName WHERE upmenu=:upmenu ORDER BY ranking DESC" , [ 'upmenu' => 0 ] );

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
                     $this -> movementSave = $this->movementSave( [ 'category' , $this -> random , 'Düzenleme İşlemi başarılı' , dateClock , ipData , user ] );

                     if( $this -> update and $this -> movementSave )
                         return $this -> update;
                     else
                         return NULL;

              } else
                 return NULL;
      }


      public function subCategoryDelete( $data = NULL ){

                if( $data != NULL ) {

                      @$this -> upCategoryFing = $this->read( "SELECT random FROM $this->tableName WHERE upmenu_random=:upmenu_random" , [ 'upmenu_random' => $data ] )[0]['random'];
                      @$this -> upCategoryDelete = $this->delete( "DELETE FROM $this->tableName WHERE upmenu_random=:upmenu_random" , [ 'upmenu_random' => $data ] );

                      @$this -> upCategoryFing1 = $this->read( "SELECT random FROM $this->tableName WHERE upmenu_random=:upmenu_random" , [ 'upmenu_random' => $this -> upCategoryFing ] )[0]['random'];
                      @$this -> upCategoryDelete1 = $this->delete( "DELETE FROM $this->tableName WHERE upmenu_random=:upmenu_random" , [ 'upmenu_random' => $this -> upCategoryFing ] );

                      @$this -> upCategoryFing2 = $this->read( "SELECT random FROM $this->tableName WHERE upmenu_random=:upmenu_random" , [ 'upmenu_random' => $this -> upCategoryFing1 ] )[0]['random'];
                      @$this -> upCategoryDelete2 = $this->delete( "DELETE FROM $this->tableName WHERE upmenu_random=:upmenu_random" , [ 'upmenu_random' => $this -> upCategoryFing1 ] );

                      @$this -> upCategoryFing3 = $this->read( "SELECT random FROM $this->tableName WHERE upmenu_random=:upmenu_random" , [ 'upmenu_random' => $this -> upCategoryFing2 ] )[0]['random'];
                      @$this -> upCategoryDelete3 = $this->delete( "DELETE FROM $this->tableName WHERE upmenu_random=:upmenu_random" , [ 'upmenu_random' => $this -> upCategoryFing2 ] );

                      @$this -> upCategoryFing4 = $this->read( "SELECT random FROM $this->tableName WHERE upmenu_random=:upmenu_random" , [ 'upmenu_random' => $this -> upCategoryFing3 ] )[0]['random'];
                      @$this -> upCategoryDelete4 = $this->delete( "DELETE FROM $this->tableName WHERE upmenu_random=:upmenu_random" , [ 'upmenu_random' => $this -> upCategoryFing3 ] );

                      @$this -> upCategoryFing5 = $this->read( "SELECT random FROM $this->tableName WHERE upmenu_random=:upmenu_random" , [ 'upmenu_random' => $this -> upCategoryFing4 ] )[0]['random'];
                      @$this -> upCategoryDelete5 = $this->delete( "DELETE FROM $this->tableName WHERE upmenu_random=:upmenu_random" , [ 'upmenu_random' => $this -> upCategoryFing4 ] );

                      @$this -> upCategoryFing6 = $this->read( "SELECT random FROM $this->tableName WHERE upmenu_random=:upmenu_random" , [ 'upmenu_random' => $this -> upCategoryFing5 ] )[0]['random'];
                      @$this -> upCategoryDelete6 = $this->delete( "DELETE FROM $this->tableName WHERE upmenu_random=:upmenu_random" , [ 'upmenu_random' => $this -> upCategoryFing5 ] );

                      @$this -> upCategoryFing7 = $this->read( "SELECT random FROM $this->tableName WHERE upmenu_random=:upmenu_random" , [ 'upmenu_random' => $this -> upCategoryFing6 ] )[0]['random'];
                      @$this -> upCategoryDelete7 = $this->delete( "DELETE FROM $this->tableName WHERE upmenu_random=:upmenu_random" , [ 'upmenu_random' => $this -> upCategoryFing6 ] );

                      if( $this -> upCategoryDelete and $this -> upCategoryDelete1 and $this -> upCategoryDelete2 and $this -> upCategoryDelete3 and $this -> upCategoryDelete4 and $this -> upCategoryDelete5 and $this -> upCategoryDelete6 and $this -> upCategoryDelete7  )
                          return TRUE;
                      else
                          return FALSE;
                } else
                return NULL;

                unset( $this -> upCategoryDelete , $this -> upCategoryDelete1 , $this -> upCategoryDelete2 , $this -> upCategoryDelete3 , $this -> upCategoryDelete4 , $this -> upCategoryDelete5 , $this -> upCategoryDelete6 , $this -> upCategoryDelete7 );
      }

      public function deleteBring( $data = NULL ){

             if( $data != NULL ){

                     // SQL - DELETE
                     $this->delete = $this->delete( "DELETE FROM $this->tableName WHERE random=:random" , [ 'random' => $data ] );

                     // SubMenu - Delete
                     $this->subMenuDelete = self::subCategoryDelete( $data );

                     // MOVEMENT SAVE
                     $this->movementSave = $this->movementSave( [ 'category' , $data , 'Silme İşlemi başarılı' , dateClock , ipData , user ] );

                     if( $this->delete AND $this->movementSave AND $this->subMenuDelete )
                          return $this->delete;
                     else
                          return FALSE;

             } else
                return NULL;
      }

}
