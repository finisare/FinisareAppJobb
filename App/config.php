<?php

date_default_timezone_set('Europe/Istanbul');
setlocale( LC_TIME , 'Turkish' );

define( 'link' , 'http://domain.com/' );
define( 'favicon' , 'http://domain.com/images/favicon.png' );
define(
  'domain' ,
  (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != 'on')
  ?
  $domain = 'http://'.$_SERVER['HTTP_HOST']
  :
  $domain = 'https://'.$_SERVER['HTTP_HOST']
);


/******  DataBase --> Information ********/
define( 'DB_HOST' , 'DB_HOST' );  // 78.135.82.149
define( 'DB_DATABASE' , 'DB_DATABASE' );
define( 'DB_USERNAME' , 'DB_USERNAME' );
define( 'DB_PASSWORD' , 'DB_PASSWORD' );
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
define( 'systemMailFormName' , 'systemMailFormName' );
define( 'systemMailHost' , 'systemMailHost' );
define( 'systemMailAccount' , 'systemMailAccount' );
define( 'systemMailPassword' , 'systemMailPassword' );
/******  System Mail - Data  ********/



/******  Constant --> Information ********/
define( 'dataKey' , dataKey );
define( 'identity' , 'identity' );
define( 'dil' , 'TR' );
setlocale(LC_TIME, strtolower(dil).'_'.dil.'.UTF-8');
define( 'dateClock' , strftime('%d %B %Y | %A - %T') );
define( 'user' , 'Ruşan Ali' );
define( 'ipData' , $_SERVER["REMOTE_ADDR"] );
define( 'urlMap' , $_SERVER["REQUEST_URI"] );
define( 'space' , '&nbsp;' );
/******  Constant --> Information ********/


/******  App / Project --> Information ********/
define( 'companyName' , 'companyName' );
define( 'dirnameProject' , dirname($_SERVER['PHP_SELF']) );
define( 'dirnameProjectHome' , 'dashboard' );

define( 'homeRoot' , domain.dirnameProject );
define( 'documentRoot' , $_SERVER['DOCUMENT_ROOT'] );
define( 'homeDirectory' , dirnameProject.'/App/' ); // '/'.
define( 'systemDirectory' , dirnameProject.'/Core/' );
/******  App / Project --> Information ********/
