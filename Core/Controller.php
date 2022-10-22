<?php

// declare(strict_types=1);


class Controller {

      private static $viewPage;



      public function errorMessage(){

             echo 'Method Bulunamadı';
      }

      public function modelError(){
             echo 'Model Bulunamadı';
      }

      public function notfile(){
             echo 'Bir şeyler ters gidiyor';
      }

      public function notFound(){
             echo 'Method Yok';
      }

      public static function sessionControl( $data = NULL ){

             //echo $_POST[ 'loginMailCode' ].' --> EWWEFWEFEWF<br><br><br><br>';

             if( $data != NULL and isset( $data ) ){

                 if( $data > time() )
                    return TRUE;
                 else
                    return FALSE; session_destroy( $data );

             } else
                return NULL; session_destroy();

             // $_SESSION['user']['time'] > time() ? $this -> login = TRUE : $this -> login = FALSE;
      }


      /*****
      Model Function ->
            -> $model -> Model Class Name -> Not Empty
            -> $file -> Model Class File Path -> Default = NULL ( if NULL - Default Home Models Path )
            -> $data -> Model Class Attribute Data's Pattern -> Default = Empty Array
            -> $namespace -> Model Class NameSpace -> Default = NULL
      *****/
      protected function model( string $model , string $file = NULL , array $data = [] , string $nameSpace = NULL ){

                !is_null( $file ) ? $file = $file.'/' : $file = $file ;

                // Model - file path create  --> strtolower( $model )
                $modelFile = documentRoot.homeDirectory.'models/' . $file . $model . '.php';

                // Model - file controll
                file_exists( $modelFile ) ? $this->modelFileExists = TRUE : $this->modelFileExists = FALSE;

                if( $this->modelFileExists ) {
                      require_once $modelFile;
                      return new $model( $data );
                } else
                   echo '<br><br>DOSYA YOK';
      }



      /****
      View -> Components files -> require
          1. Data = Components Name -> $name
          2. Data = Components Data -> $data
      ****/
      protected function view( string $view , $data = []  , $file = NULL ){

                is_null( $file ) ? $file = $file : $file = $file.'/' ;
                // extract( $data );
                $viewFile = documentRoot.homeDirectory.'views/pages/' . $file . strtolower( $view ) . '.php';

                // View Page Controll - FALSE -> $this -> viewPage == NULL
                file_exists( $viewFile ) ? require_once $viewFile : $this -> viewPage = NULL;
      }




      protected static function components( string $name = NULL , $data = [] ){

                $components = documentRoot . homeDirectory . 'views/components/' . $name .'.php';

                file_exists( $components ) ? require_once $components : self::modelError();
      }


      protected static function headerLocation( $time = 0 , $urlLocation = NULL ){

                $urlLocation == NULL ? $urlHeader = domain.dirnameProject : $urlHeader = domain.dirnameProject . '/' .$urlLocation ;

                header( "Refresh: $time; url=".$urlHeader );
      }

      public function random( $leght = NULL ) {

             if( $leght != NULL and $leght < 45 ){
                   $char = "1234567890abcdefghioumnprstvz";
                   for ($k=1;$k<=$leght;$k++)
                       {
                            $h=substr($char,mt_rand(0,strlen($char)-1),1);
                            @$random.=$h;
                       }

                   return $random;
             }  else
            return self::random( 7 );

            unset( $random , $char , $k , $h);
       }

       public function imageName( ) {
              return self::random( 25 ).'.'.md5(sha1(mktime()));
       }

       public function sefLink( $str, $options = array() ){

                $str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());
                $defaults = array(
                   'delimiter' => '-',
                   'limit' => null,
                   'lowercase' => true,
                   'replacements' => array(),
                   'transliterate' => true
                );
                $options = array_merge($defaults, $options);
                $char_map = array(
                   // Latin
                   'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'AE', 'Ç' => 'C',
                   'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I',
                   'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ő' => 'O',
                   'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ű' => 'U', 'Ý' => 'Y', 'Þ' => 'TH',
                   'ß' => 'ss',
                   'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'ae', 'ç' => 'c',
                   'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
                   'ð' => 'd', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ő' => 'o',
                   'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ű' => 'u', 'ý' => 'y', 'þ' => 'th',
                   'ÿ' => 'y',

                   // Latin symbols
                   '©' => '(c)',
                   // Greek
                   'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Ζ' => 'Z', 'Η' => 'H', 'Θ' => '8',
                   'Ι' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => '3', 'Ο' => 'O', 'Π' => 'P',
                   'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'W',
                   'Ά' => 'A', 'Έ' => 'E', 'Ί' => 'I', 'Ό' => 'O', 'Ύ' => 'Y', 'Ή' => 'H', 'Ώ' => 'W', 'Ϊ' => 'I',
                   'Ϋ' => 'Y',
                   'α' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd', 'ε' => 'e', 'ζ' => 'z', 'η' => 'h', 'θ' => '8',
                   'ι' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => '3', 'ο' => 'o', 'π' => 'p',
                   'ρ' => 'r', 'σ' => 's', 'τ' => 't', 'υ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'w',
                   'ά' => 'a', 'έ' => 'e', 'ί' => 'i', 'ό' => 'o', 'ύ' => 'y', 'ή' => 'h', 'ώ' => 'w', 'ς' => 's',
                   'ϊ' => 'i', 'ΰ' => 'y', 'ϋ' => 'y', 'ΐ' => 'i',
                   // Turkish
                   'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',
                   'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g',
                   // Russian
                   'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
                   'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
                   'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
                   'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
                   'Я' => 'Ya',
                   'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
                   'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
                   'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
                   'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
                   'я' => 'ya',
                   // Ukrainian
                   'Є' => 'Ye', 'І' => 'I', 'Ї' => 'Yi', 'Ґ' => 'G',
                   'є' => 'ye', 'і' => 'i', 'ї' => 'yi', 'ґ' => 'g',
                   // Czech
                   'Č' => 'C', 'Ď' => 'D', 'Ě' => 'E', 'Ň' => 'N', 'Ř' => 'R', 'Š' => 'S', 'Ť' => 'T', 'Ů' => 'U',
                   'Ž' => 'Z',
                   'č' => 'c', 'ď' => 'd', 'ě' => 'e', 'ň' => 'n', 'ř' => 'r', 'š' => 's', 'ť' => 't', 'ů' => 'u',
                   'ž' => 'z',
                   // Polish
                   'Ą' => 'A', 'Ć' => 'C', 'Ę' => 'e', 'Ł' => 'L', 'Ń' => 'N', 'Ó' => 'o', 'Ś' => 'S', 'Ź' => 'Z',
                   'Ż' => 'Z',
                   'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ś' => 's', 'ź' => 'z',
                   'ż' => 'z',
                   // Latvian
                   'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i', 'Ķ' => 'k', 'Ļ' => 'L', 'Ņ' => 'N',
                   'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z',
                   'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ' => 'n',
                   'š' => 's', 'ū' => 'u', 'ž' => 'z'
                );

                $str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);
                if ($options['transliterate']) {
                   $str = str_replace(array_keys($char_map), $char_map, $str);
                }

                $str =  str_replace('"', '' , str_replace("‘", '', str_replace('"', '', str_replace("'", '', str_replace('.', '', $str = str_replace('%','-', str_replace('&','-', str_replace('*','-', str_replace('|','-', str_replace('>','-', str_replace('<','-', str_replace('é','-', str_replace('^','-', str_replace('+','-', str_replace('}','-', str_replace('{','-', $str = str_replace(']','-', str_replace('[','-', str_replace('!','-', str_replace('?','-', str_replace('=','-', str_replace(',','-', str_replace(':','-', str_replace('/','-', str_replace(')','-', str_replace('(','-', preg_replace('/#/', '', preg_replace('|-+|', '-', preg_replace('/\s+/', '-', preg_replace('/&amp;amp;amp;amp;amp;amp;amp;amp;amp;.+?;/', '', $str))))))))))))))))))))))))))))) );

                $str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str)));
                $str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');
                $str = trim($str, $options['delimiter']);
                return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
       }

       public function dataDateIp(){

               /** TARİH ve IP ADRES ALANLARINI ALIYORUZ. **/
               date_default_timezone_set('Europe/Istanbul');

               $day = array('Pazar','Pazartesi','Salı','Çarşamba','Perşembe','Cuma','Cumartesi');
               $mouth = array('','Ocak','Şubat','Mart','Nisan','Mayıs','Haziran','Temmuz','Ağustos','Eylül','Ekim','Kasım','Aralık');
               $dateData = strtotime('today');

               return date('d',$dateData).' '.$mouth[date('n',$dateData)].' '.date('Y',$dateData).' | '.$day[date('w',$dateData)].' - '.date('H:i');

               unset( $day , $mouth , $dateData );
       }

       // Picture - Load
       public function pictureLoad( $data = NULL ){

                 if( $data != NULL ){

                      if( file_exists( $this->picture = documentRoot . systemDirectory . 'Helper/Picture.php' ) ){

                            require $this->picture;

                            if( class_exists( 'Picture' , FALSE ) )
                               return Picture::pictureLoad( $data );
                            else
                               return NULL;

                      } else
                         return NULL;

                 } else
                    return NULL;
       }

       // Picture - Unlink
       public function pictureUnlink( $image = NULL ){

              if( $image != NULL )
                  return unlink( documentRoot.$image );
              else
                  return NULL;
       }

       // Picture Control
       protected function pictureControl( $data = NULL ){

                 if( $data != NULL ){

                        if( $data['size'] )
                             return TRUE;
                        else
                             return FALSE;

                 } else
                     return NULL;

       }

       // Data Input Check
       public function dataInputCheck( array $data = NULL ){

              if( $data != NULL AND is_array( $data ) ){
                    if( $this->newData = array_diff( $data[0], $data[1] ) )
                        return $this->newData;
                    else
                        return NULL;
              } else
              return NULL;
       }

       public function dataTheSon( $classThis = NULL ){

               if( $classThis != NULL ){

                   $dataTheSon = NULL;
                   for ($i=0; $i < count( array_keys( $classThis->dataInput ) ); $i++)
                       $dataTheSon .= array_keys( $classThis->dataInput )[$i].'=:'.array_keys( $classThis->dataInput )[$i].', ';


                   return $dataTheSon;

               } else
                   return self::dataTheSon( $this );
       }


       public function createTag( $data = NULL ){

              if( $data != NULL )
                  return str_replace(' ', ', ', $data);
              else
                  return NULL;
       }

       public function shortenText( $text = NULL , $str = 85 ){

                if( $text != NULL ){

                        $text = explode(".", $text);

                        if ( strlen( $text[0] ) > $str)
                            return $text = substr($text[0],0,$str).' ....';
                        else
                             return $text[0].' ....';
                            /*
                        else
                           if ($uzunluk > $str/3.2) $deger = substr($text[0],0,$str);  echo $deger."[...]";
                            */


                } else
                return NULL;
       }

       public function strReplace( $text = NULL ){

              if( $text != NULL )
                   return str_replace( "'","&lsquo;", str_replace( '"',"&quot;",$text ) );
              else
                   return ' ';

       }

       public function jsonEncode( $dataJson = NULL , $jsonName = 'JsonData' ){

              if( $dataJson != NULL ) {

                  $apiArray = [];
                  $apiArray[$jsonName] = [];

                  foreach ($dataJson as $item) {

                        $apiItem = array(
                            'id'=>$item['random'],
                            'title'=>$item['baslik'],
                            'description'=>$item['aciklama'],
                            'resim_yol'=>$item['resim_yol']
                        );
                        //Push tweet_item into tweet_arr array
                        array_push($apiArray[$jsonName],$apiItem);
                  }

                  echo json_encode($dataJson, JSON_UNESCAPED_UNICODE);


                  // return json_encode($dataJson, JSON_UNESCAPED_UNICODE);
              } else
                  return NULL;
       }

       public function shorten($kelime, $str = 10) {
        		if (strlen($kelime) > $str)
        		{
        			if (function_exists("mb_substr")) $kelime = mb_substr($kelime, 0, $str, "UTF-8").'..';
        			else $kelime = substr($kelime, 0, $str).'..';
        		}
        		return $kelime;
    	 }

       public function textShorten( $data ){

               $value = explode(".", $text);

               $length = strlen($value[0]);

               if ($length > $data["limit"]):
                    echo $value = substr($value[0],0,$data["limit"]);
                    // echo $deger.space.'<a href="'.$Data["domain"].$Data["link"].'" style="color:'.$Data["renk"].'; font-weight:bold;" title="'.$Data["baslik"].'">[...]</a>';
               else:
                   if ($uzunluk > $data["limit"]/3.2)
                       echo $value = substr($value[0],0,$data["limit"]);
                       // echo $deger.space.'<a href="'.$Data["domain"].$Data["link"].'" style="color:'.$Data["renk"].'; font-weight:bold;" title="'.$Data["baslik"].'">[...]</a>';
               endif;


               unset( $data );
       }

       public function token( ){

                 if( file_exists( $this->token = documentRoot . systemDirectory . 'Helper/Token.php' ) ){

                       require $this->token;

                       if( class_exists( 'Token' , FALSE ) )
                          return new Token();
                       else
                          return 'YOK';

                       unset( $this->token );
                 } else
                    return NULL;
       }

       public function mail( $data = NULL ){

               if( file_exists( $this -> mailFile = documentRoot . systemDirectory . 'Helper/Mail.php' ) ):

                    require $this -> mailFile;

                    if( class_exists( 'Mail' , FALSE ) )
                       return new Mail( );
                    else
                       return FALSE;

                    unset( $this -> mailFile );

               else:
                    return NULL;
               endif;

               unset( $data );
       }

       public function valueEncrypt( $action = NULL, $data = NULL , $keyy = dataKey ){

              if( $action != NULL and $data != NULL and $keyy != NULL ):

                    $encrypt_method = 'AES-256-CBC'; //sifreleme yontemi
                  	$secret_key = $keyy; //sifreleme anahtari
                  	$secret_iv = '**445'; //gerekli sifreleme baslama vektoru
                  	$key = hash('sha256', $secret_key); //anahtar hast fonksiyonu ile sha256 algoritmasi ile sifreleniyor
                  	$iv = substr(hash('sha256', $secret_iv), 0, 16);

                    if( strtolower( $action ) == 'lock' ) // ŞİFRELE
                  		   return urlencode(serialize(base64_encode(gzcompress(openssl_encrypt($data,$encrypt_method, $key, 0, $iv)))));
                  	else if( strtolower( $action ) == 'unlock' ) // COZULDU
                  		   return openssl_decrypt(gzuncompress(base64_decode(unserialize(urldecode($data)))),$encrypt_method, $key, 0, $iv);
                  	else
                       return FALSE;
               else:
                    return NULL;
               endif;
        }

        public function userLoginToken( $data = NULL ){

               if( $data != NULL ):

                   $token = self::valueEncrypt( 'unlock' , $data , DB_PASSWORD );

                   /* $token = explode( '@' , $token );

                   if( $token[1] < time() )
                      return 'TOKEN Expire Oldu';
                   else
                      return 'geçerli'; */

                   return $token;

               else:
                   return NULL;
               endif;
        }

      /*
      public function arrayCreate( $data = NULL ){

            if( $data != NULL ) {

                  $dataTheSon = NULL;

                  for ($i=0; $i < count( array_keys( $data ) ); $i++) {
                      $dataTheSon .= '"'.array_keys( $data )[$i].'" =>'.'"'.array_values( $data )[$i].'", ';
                  }

                  return $dataTheSon;

            } else
                return NULL;
      }

      protected function dataVase( ){


                $dataVase = __DIR__ . '/Database.php';

                file_exists( $dataVase ) ? require_once $dataVase : self::modelError();
      }
      */

}
