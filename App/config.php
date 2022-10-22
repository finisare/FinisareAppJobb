<?php

date_default_timezone_set('Europe/Istanbul');
setlocale( LC_TIME , 'Turkish' );

define( 'link' , 'http://alinedim.com/' );
define( 'favicon' , 'http://alinedim.com/images/favicon.png' );
define(
  'domain' ,
  (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != 'on')
  ?
  $domain = 'http://'.$_SERVER['HTTP_HOST']
  :
  $domain = 'https://'.$_SERVER['HTTP_HOST']
);


/******  DataBase --> Information ********/
define( 'DB_HOST' , 'localhost' );  // 78.135.82.149
define( 'DB_DATABASE' , 'finsare_DB1' );
define( 'DB_USERNAME' , 'finsare_User1' );
define( 'DB_PASSWORD' , '@L=NXjlnz)Yt' );
define( 'CHARSET' , 'utf8' );
/******  DataBase --> Information ********/


/******  User - Message --> Information ********/
define( 'danger' , 'Bir Sorun Oluştu - Yönlendiriliyorsunuz.' );
define( 'success' , 'İşlem Başarılı - Yönlendiriliyorsunuz.' );
define( 'warning' , 'Dikkat Edilmesi gereken bir konu - Yönlendiriliyorsunuz.' );
define( 'info' , 'Değişen bir şey yok gibi duruyor - Yönlendiriliyorsunuz.' );
define( 'secondary' , 'Değer Bulunamadı - Yönlendiriliyorsunuz.' );
/******  User - Message --> Information ********/



/******  System Mail - Data  ********/
define( 'systemMailFormName' , 'Finisare - Support' );
define( 'systemMailHost' , 'mail.finisare.com' );
define( 'systemMailAccount' , 'support@finisare.com' );
define( 'systemMailPassword' , '::D6ulW@107' );
/******  System Mail - Data  ********/



/******  Constant --> Information ********/
define( 'dataKey' , DB_PASSWORD );
define( 'identity' , 'hdi1c33hs9' );
define( 'dil' , 'TR' );
setlocale(LC_TIME, strtolower(dil).'_'.dil.'.UTF-8');
define( 'dateClock' , strftime('%d %B %Y | %A - %T') );
define( 'user' , 'Ruşan Ali' );
define( 'ipData' , $_SERVER["REMOTE_ADDR"] );
define( 'urlMap' , $_SERVER["REQUEST_URI"] );
define( 'space' , '&nbsp;' );
/******  Constant --> Information ********/


/******  App / Project --> Information ********/
define( 'companyName' , 'Finisare - Dijital Medya' );
define( 'dirnameProject' , dirname($_SERVER['PHP_SELF']) );
define( 'dirnameProjectHome' , 'dashboard' );

define( 'homeRoot' , domain.dirnameProject );
define( 'documentRoot' , $_SERVER['DOCUMENT_ROOT'] );
define( 'homeDirectory' , dirnameProject.'/App/' ); // '/'.
define( 'systemDirectory' , dirnameProject.'/Core/' );
/******  App / Project --> Information ********/
