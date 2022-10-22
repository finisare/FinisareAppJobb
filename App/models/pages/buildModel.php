<?php


class buildModel extends Model {

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


        // SEO - Build -> Model Function
        public function seoRead( ){

               return $this->read( "SELECT * FROM seo WHERE dil=:dil" , [ 'dil' => FALSE ] );

        }

        public function seoEdit( $data = NULL , $classThis = NULL ){

               if( $data != NULL ){

                      // SQL - UPDATE QUERY
                      $this -> update = $this -> update(
                        "UPDATE seo SET " . $classThis->dataTheSon( $classThis ) . 'random=:random, dil=:dil, datee=:datee, ip_adres=:ip_adres, user=:user WHERE '.'random=:oldRandom' ,
                        array_merge(
                          $classThis->dataInput ,
                          [
                            'random' => $classThis -> random,
                            'oldRandom' => $data,
                            'dil' => ' ',
                            'datee' => dateClock,
                            'ip_adres' => ipData,
                            'user' => user,
                          ] )
                      );
                      // SQL - UPDATE QUERY

                      // MOVEMENT SAVE
                      $this -> movementSave = $this->movementSave( [ 'seo' , $classThis -> random , 'Düzenleme İşlemi başarılı' , dateClock , ipData , user ] );


                      if( $this -> update and $this -> movementSave )
                          return TRUE;
                      else
                          return FALSE;

               } else
                  return NULL;
        }

        public function seoCreat( $data = NULL ){

               if( $data != NULL ){

                         $this->result = $this->create( "INSERT INTO seo SET
                           random = :random,
                           kimlik = :kimlik,
                           title = :title,
                           logo = :logo,
                           description = :description,
                           keywords = :keywords,
                           dil = :dil,
                           datee = :datee,
                           ip_adres = :ip_adres,
                           user = :user
                           " );

                       $this->result->execute( [
                           'random' => $data->random,
                           'kimlik' => identity,
                           'title' => $data->title,
                           'logo' => $data->logo,
                           'description' => $data->description,
                           'keywords' => $data->keywords,
                           'dil' => ' ',
                           'datee' => dateClock,
                           'ip_adres' => ipData,
                           'user' => user
                       ] );

                       // MOVEMENT SAVE
                       $this->movementSave = $this->movementSave( [ 'seo' , $data -> random , 'Ekleme İşlemi başarılı' , dateClock , ipData , user ] );

                       if( $this->result and $this->movementSave )
                          return TRUE;
                       else
                          return FALSE;

               } else
               return NULL;
        }
        // SEO - Build -> Model Function


       // MAİL - Build -> Model Function
       public function mailRead( ){

              return $this->read( "SELECT * FROM mail" );

       }

       public function mailEdit( $data = NULL , $classThis = NULL ){

              if( $data != NULL ){

                     // SQL - UPDATE QUERY
                     $this -> update = $this -> update(
                       "UPDATE mail SET " . $classThis->dataTheSon( $classThis ) . 'random=:random, dil=:dil, ip_adres=:ip_adres, user=:user WHERE '.'random=:oldRandom' ,
                       array_merge(
                         $classThis->dataInput ,
                         [
                           'random' => $classThis -> random,
                           'oldRandom' => $data,
                           'dil' => ' ',
                           'ip_adres' => ipData,
                           'user' => user,
                         ] )
                     );
                     // SQL - UPDATE QUERY

                     // MOVEMENT SAVE
                     $this -> movementSave = $this->movementSave( [ 'mail' , $classThis -> random , 'Düzenleme İşlemi başarılı' , dateClock , ipData , user ] );


                     if( $this -> update and $this -> movementSave )
                         return TRUE;
                     else
                         return FALSE;

              } else
                 return NULL;
       }

       public function mailCreat( $data = NULL ){

              if( $data != NULL ){

                        $this->result = $this->create( "INSERT INTO mail SET
                          random = :random,
                          kimlik = :kimlik,
                          host = :host,
                          username = :username,
                          password = :password,
                          fromname = :fromname,
                          charset = :charset,
                          ip_adres = :ip_adres,
                          user = :user
                          " );

                      $this->result->execute( $data );

                      // MOVEMENT SAVE
                      $this->movementSave = $this->movementSave( [ 'mail' , $data['random'] , 'Ekleme İşlemi başarılı' , dateClock , ipData , user ] );

                      if( $this->result )
                         return TRUE;
                      else
                         return FALSE;

              } else
              return NULL;
       }
       // MAİL - Build -> Model Function




       // CONTACT - Build -> Model Function
       public function contactRead(  ){

              return $this -> read( 'SELECT * FROM contact' );

       }

       public function contactEdit( $data = NULL , $classThis = NULL ){

              if( $data != NULL ){

                     // SQL - UPDATE QUERY
                     $this -> update = $this -> update(
                       "UPDATE contact SET " . $classThis->dataTheSon( $classThis ) . 'random=:random, dil=:dil, ip_adres=:ip_adres, user=:user WHERE '.'random=:oldRandom' ,
                       array_merge(
                         $classThis->dataInput ,
                         [
                           'random' => $classThis -> random,
                           'oldRandom' => $data,
                           'dil' => ' ',
                           'ip_adres' => ipData,
                           'user' => user,
                         ] )
                     );
                     // SQL - UPDATE QUERY

                     // MOVEMENT SAVE
                     $this -> movementSave = $this->movementSave( [ 'mail' , $classThis -> random , 'Düzenleme İşlemi başarılı' , dateClock , ipData , user ] );


                     if( $this -> update and $this -> movementSave )
                         return TRUE;
                     else
                         return FALSE;

              } else
                 return NULL;
       }

       public function contactCreat( $data ){

              $this->result = $this->create( "INSERT INTO contact SET
                random = :random,
                kimlik = :kimlik,
                map = :map,
                adres = :adres,
                gsm = :gsm,
                tel = :tel,
                email = :email,
                facebook = :facebook,
                twitter = :twitter,
                instagram = :instagram,
                linkedin = :linkedin,
                ip_adres = :ip_adres,
                user = :user
             ");

            $this->result->execute( $data );

            // MOVEMENT SAVE
            $this->movementSave = $this->movementSave( [ 'contact' , $data['random'] , 'Ekleme İşlemi başarılı' , dateClock , ipData , user ] );

            $result = $this->create( "INSERT INTO movement SET tip = ?, random = ?, operation = ?, datee = ?, ip_adres = ?, user = ?" );

            if( $this -> result and $this->movementSave )
               return TRUE;
            else
               return FALSE;

       }
       // CONTACT - Build -> Model Function

}
