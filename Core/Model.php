<?php

//


// Finisare - File require
require_once __DIR__ . '/DB/Database.php';
require_once __DIR__ . '/DB/Interface.php';

// use System\Libs\DataBase as DB;
use System\Libs\DataBase as DB;
use System\Libs\IntrFace as IntrFace;

abstract class Model extends DB implements IntrFace
{
         final public function create( $query = NULL ){

                // DB -> OPEN
                $conn = $this->openDbConn();

                if( $query != NULL )
                   return $conn->prepare( $query );
                else
                   return FALSE;

                // DB -> CLOSE
                $conn = $this->closeDbCon();

                // VARİABLE -> UNSET
                unset( $query , $conn , $data );
         }


         final public function read( $query = NULL , $data = NULL ){

                // DB -> OPEN
                $conn = $this->openDbConn();

                if( $query != NULL ){

                    $result = $conn->prepare( $query );
                    if( $result ) {

                        $data != NULL ? $result->execute( $data ) : $result->execute();

                        if( $result->rowCount() > 0 )
                           return $result->fetchAll( PDO::FETCH_ASSOC );
                        else
                           return FALSE;
                        // return $result->fetchAll( PDO::FETCH_ASSOC );

                    } else
                    return NULL;

                }
                else
                   return NULL;

                // DB -> CLOSE
                $conn = $this->closeDbCon();

                // VARİABLE -> UNSET
                unset( $query , $data , $conn , $result );
         }


         final public function update( $query = NULL, $data = NUL ){

               // DB -> OPEN
               $conn = $this->openDbConn();

               if( $query != NULL AND $data != NULL ){

                     $update = $conn->prepare ( $query );
                     $update = $update->execute( $data );
                     if( $update )
                        return TRUE;
                     else
                        return FALSE;
               } else
                return NULL;

               // DB -> CLOSE
               $conn = $this->closeDbCon();

               // VARİABLE -> UNSET
               unset( $query, $data, $update, $conn );
         }


         final public function delete( $query = NULL , $data = NUL ){

               // DB -> OPEN
               $conn = $this->openDbConn();

               if( $query != NULL AND $data != NULL ){
                   if( strpos( $query , 'WHERE' ) == TRUE ){

                         $delete = $conn->prepare ( $query );
                         $delete = $delete->execute( $data );
                         if( $delete )
                            return TRUE;
                         else
                            return FALSE;

                   } else {

                         $delete = $conn->exec( $query );
                         if( $delete == TRUE )
                            return TRUE;
                         else
                            return FALSE;
                   }
               } else
               return NULL;

               // DB -> CLOSE
               $conn = $this->closeDbCon();

               unset( $query , $data , $delete , $conn );
         }

         final public function rowCountt( $data = NULL ){

                // DB -> OPEN
                $conn = $this->openDbConn();

                if( $data != NULL ){

                    $result = $conn->prepare( "SELECT id FROM $data" );
                    if( $result ) {

                      $result->execute();
                      return $result->rowCount();

                    } else
                         return NULL;
                }
                else
                   return NULL;

                // DB -> CLOSE
                $conn = $this->closeDbCon();

                // VARİABLE -> UNSET
                unset( $data , $conn , $result );
         }
}
