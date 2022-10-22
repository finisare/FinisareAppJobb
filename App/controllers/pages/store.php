<?

class Store extends Controller {

      private static $viewFolder = 'store';
      private static $modelName = 'storeModel';


      // Theme - Create info
      const themeConfig = [
        'path' => 'store/theme',
        'type' => 'webp', // png - webp - jpeg
        'ratio_fill' => TRUE, // TRUE - FALSE
        'width' => 792, // 3264
        'height' => 1220, // 2448
      ];
      // Theme - Create info


      // Plugin - Create info
      const pluginConfig = [
        'path' => 'store/plugin',
        'type' => 'webp', // png - webp - jpeg
        'ratio_fill' => TRUE, // TRUE - FALSE
        'width' => 250, // 3264
        'height' => 250, // 2448
      ];
      // Plugin - Create info

      public function __construct(){
             $this -> model = $this -> model( self::$modelName , 'pages' );
      }

      public function start(  ){
             self::read();
      }

      public function theme(){
             echo 'Theme-lar';
      }

      public function plugin(){
             echo 'Plugin -> ler';
      }

      public function creat(){




             if( isset( $_POST['storeCreate'] ) ):

                   /*
                   // Random - Number -> Create
                   $this -> random = $this->random( 7 );

                   // Title - Create
                   $this -> title = $this->strReplace( $_POST['title'] );

                   // SefLink -> Create
                   $this -> link = $this->sefLink( $_POST['title'] );

                   // Description -> Create
                   $this -> description = $this->strReplace( $_POST['description'] ? $_POST['description'] : $this->title );

                   // Category -> Create
                   $this -> category = $this->sefLink( $_POST['category'] );

                   // pictureConfig -> Create
                   $this -> category == 'plugin' ? $this -> pictureConfig = self::pluginConfig : $this -> pictureConfig = self::themeConfig;

                   // Images -> Create
                   $this->image = $this->pictureLoad( [
                       'name' => $this->imageName(),
                       'file' => $_FILES['image'],
                       'picture' => $this -> pictureConfig
                   ] );
                   // Images -> Create
                   */

             else:

                   $this -> view( 'creat' , [ ] , self::$viewFolder );

             endif;
      }

      public function read( ){

             $this -> view( 'read' , [ ] , self::$viewFolder );

      }

}
