<?php




define( 'DB_HOST' , 'localhost' );  // 78.135.82.149
define( 'DB_DATABASE' , 'finsare_DB1' );
define( 'DB_USERNAME' , 'finsare_User1' );
define( 'DB_PASSWORD' , '@L=NXjlnz)Yt' );
define( 'CHARSET' , 'utf8' );

define(
  'domain' ,
  (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != 'on')
  ?
  $domain = 'http://'.$_SERVER['HTTP_HOST']
  :
  $domain = 'https://'.$_SERVER['HTTP_HOST']
);

class ApiDB {

        public function openDbConn(){

            try {
                  $DB = new PDO( 'mysql:host=' . DB_HOST . ';dbname=' . DB_DATABASE , DB_USERNAME , DB_PASSWORD );
                  $DB->query('SET CHARACTER SET ' . 'utf8');
                  $DB->query('SET NAMES ' . 'utf8');
                  $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                  $DB->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                  return $DB;
              }
           catch(PDOException $e) {
                 echo "Bağlantı hatası: " . $e->getMessage();
              }
        }

        public function closeDbCon( $DB = NULL ) { return $DB = null; }
}



?>
