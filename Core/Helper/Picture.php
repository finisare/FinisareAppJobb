<?php



class Picture {

      private static $Compress = __DIR__.'/Compress.php';

      public static $simpleImage = __DIR__ .'/lib/SimpleImage.php'; // Picture Upload - Simple Image

      // Resim Yükle
      public function pictureLoad( $data = NULL ){

              if( $data != NULL ){
                  if( file_exists( self::$simpleImage ) and file_exists( self::$Compress ) ){

                      @require_once self::$simpleImage;
                      @require_once self::$Compress;
                      $foo = new upload( $data['file'] );

                      if ($foo->uploaded)
                         {
                              @$data['picture']['path'] == TRUE ? $data['picture']['path'] = '/'.$data['picture']['path'].'/' : $data['picture']['path'] = '/' ;

                              @$upload_file = documentRoot.'/images'.$data['picture']['path'];

                              $foo->image_ratio_fill = $data['picture']['ratio_fill'];


                              if( !empty( $data['picture']['width'] ) AND !empty( $data['picture']['height'] ) ){
                                    $foo->image_y = $data['picture']['height'];
                                    $foo->image_x = $data['picture']['width'];
                                    $foo->image_resize = TRUE;
                              }
                              elseif( !empty( $data['picture']['height'] ) ){
                                    $foo->image_y = $data['picture']['height'];
                                    $foo->image_x = $data['picture']['height'] / 1.5;
                                    $foo->image_resize = TRUE;
                              }
                               elseif( !empty( $data['picture']['width'] ) ){
                                   $foo->image_x = $data['picture']['width'];
                                   $foo->image_y = $data['picture']['width'] * 1.5;
                                   $foo->image_resize = TRUE;
                               }
                              else
                                 $foo->image_resize = FALSE;


                               switch ( $data['picture']['type'] ){
                                   case 'png':
                                   $foo->png_compression = 9;
                                   $type = 'png';
                                   break;

                                   case 'webp':
                                   $foo->webp_quality = 100;
                                   $type = 'webp';
                                   break;

                                   default:
                                   $foo->jpeg_quality = 100;
                                   $type = 'jpeg';
                                   break;
                               }

                               $foo->image_convert = $type;

                               $foo->image_ratio_fill = $data['picture']['ratio_fill'];

                               $foo->file_new_name_body = $data['name'];

                               $foo->Process( $upload_file );

                               if($foo->processed) {

                                     if( System\Compress\Compress::tinifyCompressFile( array_merge( $data , [
                                       $upload_file,
                                       $data['name'].'.'.$type,
                                       domain.'/images'.$data['picture']['path'].$data['name'].'.'.$type
                                    ] ) ) ) {
                                      return '/images'.$data['picture']['path'].$data['name'].'.'.$type;
                                    } else
                                    return NULL;

                               } else
                                    return NULL;


                               /*
                               $foo->image_text            = 'verot.net';
                               $foo->image_text_direction  = 'v';
                               $foo->image_text_background = '#000000';
                               $foo->image_text_font       = 2;
                               $foo->image_text_position   = 'BL';
                               $foo->image_text_padding_x  = 2;
                               $foo->image_text_padding_y  = 8;


                               $foo->image_watermark       = 'watermark.png';
                               $foo->image_watermark_position = 'R;
                               $foo->image_watermark_x     = 10;
                               $foo->image_watermark_y     = 10;

                               $foo->image_pixelate        = 10;
                               $foo->image_negative        = true;
                               $foo->image_greyscale       = true;
                               $foo->image_threshold       = 20;
                               $foo->image_opacity         = 25;
                               $foo->image_brightness      = -25;

                               $foo->image_crop            = '5 20%'; --> Vertical - Horizontal
                               $foo->image_crop            = '5 40 10% -20'; -->  Top - Right - Bottom - Left
                               */



                         }
                      else
                         return NULL;

                  } else
                      return NULL;
              } else
              return NULL;

      }
}
