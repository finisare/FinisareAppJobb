<?php

namespace App\Libs;

class LibbFile {

      public static function cssLib(){

             ob_start();
             session_start();

             echo '<!DOCTYPE html>
             <html lang="en">
                   <head>
                         <meta charset="utf-8">
                         <meta http-equiv="X-UA-Compatible" content="IE=edge">
                         <meta name="viewport" content="width=device-width, initial-scale=1">
                         <meta name="author" content="Ruşan Ali NEDİM">


                         <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900&display=swap" rel="stylesheet">
                         <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap" rel="stylesheet">
                         <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
                         <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
                         <link href="'.domain.dirnameProject.'/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
                         <link href="'.domain.dirnameProject.'/assets/plugins/font-awesome/css/all.min.css" rel="stylesheet">

                         <!-- FAVİCON -->
                         <link rel="shortcut icon" type="image/x-icon" href="'.domain.dirnameProject.'/assets/images/favicon.png" />
    										 <link rel="apple-touch-icon" href="'.domain.dirnameProject.'/assets/images/favicon.png" />
    										 <link rel="apple-touch-icon" sizes="72x72" href="'.domain.dirnameProject.'/assets/images/favicon.png" />
    	 									 <link rel="apple-touch-icon" sizes="114x114" href="'.domain.dirnameProject.'/assets/images/favicon.png" />
    										 <link rel="apple-touch-icon" sizes="152x152" href="'.domain.dirnameProject.'/assets/images/favicon.png" />
    										 <link rel="apple-touch-icon" sizes="180x180" href="'.domain.dirnameProject.'/assets/images/favicon.png" />
    										 <link rel="apple-touch-icon" sizes="167x167" href="'.domain.dirnameProject.'/assets/images/favicon.png" />
                         <!-- FAVİCON -->

                         <!-- Theme Styles -->
                         <link href="'.domain.dirnameProject.'/assets/css/connect.min.css" rel="stylesheet" />
                         <link href="'.domain.dirnameProject.'/assets/css/dark_theme.css" rel="stylesheet" />
                         <link href="'.domain.dirnameProject.'/assets/css/special.css" rel="stylesheet" />
                         <link href="'.domain.dirnameProject.'/assets/css/flex.css" rel="stylesheet" />
                         <link href="'.domain.dirnameProject.'/assets/css/lightbox.min.css" rel="stylesheet" media="screen" />
                         <link href="'.domain.dirnameProject.'/assets/css/custom.css" rel="stylesheet" />
                         <link href="'.domain.dirnameProject.'/assets/plugins/select2/css/select2.min.css" rel="stylesheet">

                         <!-- JQUERY / LİBRARY -->
                         <script src="'.domain.dirnameProject.'/assets/plugins/jquery/jquery-3.4.1.min.js"></script>
                         <script src="'.domain.dirnameProject.'/assets/plugins/jquery/jquery-1.12.4.js"></script>
                         <script src="'.domain.dirnameProject.'/assets/plugins/jquery/ui/1.12.1-jquery-ui.js"></script>
                         <!-- JQUERY / LİBRARY -->

                         <!-- SORTABLE -->
                         <script src="'.domain.dirnameProject.'/assets/js/sortable.js"></script>

                         <!-- SELECT -->
                         <script src="'.domain.dirnameProject.'/assets/plugins/select2/js/select2.full.min.js"></script>
                         <script src="'.domain.dirnameProject.'/assets/js/pages/select2.js"></script>
                         <!-- SELECT -->

                         <link href="'.domain.dirnameProject.'/assets/css/jquery.dataTables.min.css" rel="stylesheet" />

                         <!--
                         <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
                         <script src="'.domain.dirnameProject.'/assets/js/vue/app.js"></script>
                         VUE -->

                         <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
                  </head>';
                  /* <!-- <script language="javascript" type="text/javascript" src="'.domain.dirnameProject.'/assets/js/ckeditor/ckeditor.js"></script> --> */
      }

      public static function jsLib() {

                       // <script src="'.domain.dirnameProject.'/'.'assets/js/lightbox-plus-jquery.min.js"></script>
                       echo '
                       <script src="'.domain.dirnameProject.'/assets/plugins/bootstrap/popper.min.js"></script>
                       <script src="'.domain.dirnameProject.'/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
                       <script src="'.domain.dirnameProject.'/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
                       <script src="'.domain.dirnameProject.'/assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
                       <script src="'.domain.dirnameProject.'/assets/plugins/apexcharts/dist/apexcharts.min.js"></script>
                       <script src="'.domain.dirnameProject.'/assets/plugins/blockui/jquery.blockUI.js"></script>
                       <script src="'.domain.dirnameProject.'/assets/plugins/flot/jquery.flot.min.js"></script>
                       <script src="'.domain.dirnameProject.'/assets/plugins/flot/jquery.flot.time.min.js"></script>
                       <script src="'.domain.dirnameProject.'/assets/plugins/flot/jquery.flot.symbol.min.js"></script>
                       <script src="'.domain.dirnameProject.'/assets/plugins/flot/jquery.flot.resize.min.js"></script>
                       <script src="'.domain.dirnameProject.'/assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
                       <script src="'.domain.dirnameProject.'/assets/js/connect.min.js"></script>
                       <script src="'.domain.dirnameProject.'/assets/js/pages/dashboard.js"></script>

                       <script src="'.domain.dirnameProject.'/assets/js/dataTable/jquery.dataTables.min.js"></script>

                       <!-- Sweetalert -->
                       <script src="'.domain.dirnameProject.'/assets/js/sweetalert.min.js"></script>
                       <!-- Sweetalert -->
                       <script>
                           ClassicEditor
                               .create( document.querySelector( \'#editor\' ), {
                                  language: \'tr\'
                               })
                               .catch( error => {
                                   console.error( error );
                               } );
                       </script>'; ?>
                       <script>
                              /*
                              window.addEventListener( 'online' , () => {
                                 swal("Bağlantı Başarılı", "Yeniden İnternet bağlantınız var.", "success");
                              }) */
                              window.addEventListener( 'offline' , () => {
                                 swal("Bağlantı Yok", "Lütfen İnternet Bağlantınızı kontrol ediniz.", "error");
                              })
                       </script><? echo '
                   </body>
               </html>';

           ob_flush();

      }

}
