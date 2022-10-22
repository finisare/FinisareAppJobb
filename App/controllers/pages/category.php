<?


class Category extends Controller {

     private static $modelName = 'categoryModel';
     private static $viewFolder = 'category';

     // Picture - Create info
     const pictureConfig = [
       'path' => 'category',
       'type' => 'jpeg', // png - webp - jpeg
       'ratio_fill' => TRUE, // TRUE - FALSE
       'width' => 1006,
       'height' => 670,
     ];
     // Picture - Create info

     public function __construct(){
            $this -> model = $this -> model( self::$modelName , 'pages' );
     }

     public function start(){
            return 'Start -> Function';
     }

     public function creat(  ){

             if( isset( $_POST['categoryCreate'] ) ):

                     // Random - Number -> Create
                     $this -> random = $this->random( 7 );

                     // Title - Create
                     $this -> title = $this->strReplace( $_POST['title'] );

                     // Seflink - Create
                     $this -> link = $this->sefLink( $_POST['title'] );

                     // Keywords -> Create
                     $this -> keywords = $this -> createTag( $_POST['description'] ? $_POST['description'] : $this->title );

                     // Description -> Create
                     $this -> description = $this->strReplace( $_POST['description'] ? $_POST['description'] : $this->title );

                     // $this -> upMenuData -> True / False --> Control
                     count( $this -> upMenuData = explode( '@' , $_POST['upmenu'] ) ) > 1 ?
                     $this -> upMenuData = [
                         'upmenu' => $this->strReplace( $this->upMenuData[0] ),
                         'upmenu_random' => $this->upMenuData[1],
                         'upmenu_id' => $this->upMenuData[2],
                         'upmenu_link' => $this->upMenuData[3]
                        ] : $this -> upMenuData = [
                         'upmenu' => 0,
                         'upmenu_random' => 0,
                         'upmenu_id' => 0,
                         'upmenu_link' => 0
                         ] ;


                      // Images -> Create
                      $this->image = $this->pictureLoad( [
                          'name' => $this -> imageName(),
                          'file' => $_FILES['image'],
                          'picture' => self::pictureConfig
                      ] );
                      // Images -> Create


                 $this -> view( 'creat' , $this -> token() -> tokenCheck( $_POST['_token'] ) ? $this -> model -> createBring( $data = $this ) : FALSE , self::$viewFolder );

             else:

                 $this -> view( 'creat' , $this -> model -> readBring( ) , self::$viewFolder );

             endif;
     }

     public function read( $data = NULL ){

            if( $data != NULL )
               $this -> view( 'read' , $this -> model -> readBringUpCategory( $data ) , self::$viewFolder );
            else
               $this -> view ( 'read' , $this -> model -> readBringUpCategory( ) , self::$viewFolder );
     }

     public function update( $data ){

            if( isset( $_POST['categoryUpdate'] ) ):

                      // RANDOM -> Create
                      $this -> random = $this->random();

                      // Picture - Create
                      $this->pictureData = $this->pictureLoad(
                       [
                           'name' => $this->imageName(),
                           'file' => $_FILES['image'],
                           'picture' => self::pictureConfig
                       ] );
                      // Picture - Create

                     // Upmenü - Explode
                     $this -> upmenu = explode( '@' , $_POST['upmenu'] );

                     // Data Control
                     @$this->dataInput = $this->dataInputCheck( [
                           [
                             'title' => $this->strReplace( $_POST['title'] ),
                             'link' => $this->sefLink( $_POST['title'] ),
                             'upmenu' => $this->strReplace( $this -> upmenu[0] ),
                             'upmenu_random' => $this -> upmenu[1],
                             'upmenu_id' => $this -> upmenu[2],
                             'upmenu_link' => $this -> upmenu[3],
                             'keywords' => $this->createTag( $this->strReplace( $_POST['description'] ? $_POST['description'] : $_POST['title'] ) ),
                             'description' => $this->strReplace( $_POST['description'] ? $_POST['description'] : $_POST['title'] ),
                             'image' => $this->pictureData,
                           ] ,
                           [
                             $this->strReplace( $_POST['oldData']['title'] ),
                             $_POST['oldData']['link'],
                             $_POST['oldData']['upmenu'],
                             $_POST['oldData']['upmenu_random'],
                             $_POST['oldData']['upmenu_id'],
                             $_POST['oldData']['upmenu_link'],
                             $this->createTag( $this->strReplace( $_POST['oldData']['description'] ? $_POST['oldData']['description'] : $_POST['oldData']['title'] ) ),
                             $this->strReplace( $_POST['oldData']['description'] ? $_POST['oldData']['description'] : $_POST['oldData']['title'] ),
                             $this->pictureData ? $_POST['oldData']['image'] : '',
                           ]
                       ] );
                    // Data Control

                    if( $this->pictureData ):
                          $this->pictureData ? $this->pictureData = $this->pictureData : $this->pictureData = $_POST['oldData']['image']; // Picture Control
                          $this->pictureUnlink( $image = $_POST['oldData']['image'] , $this ); // Picture Unlink
                    endif;



                    if( is_null( $this->dataInput ) )
                       $this -> update = NULL;
                    else
                       $this -> update = $this -> model -> editBring( $data , $this );


                     $this -> view( 'update' , $this -> token() -> tokenCheck( $_POST['_token'] ) ? $this -> update : FALSE , self::$viewFolder );

            else:

                    $this -> view( 'update' ,
                       $this -> model -> readBring( $data ) ?
                       [
                         'data' => $this -> model -> readBring( $data ),
                         'category' => $this -> model -> readBring( )
                       ] :
                       FALSE , self::$viewFolder
                    );

            endif;
     }

     public function delete( $data ){


            if( isset( $_POST['categoryDelete'] ) ):

                  $this->pictureUnlink( $image = $_POST['oldData']['image'] , $this ); // Picture Unlink

                  $this -> view( 'delete' , $this -> token() -> tokenCheck( $_POST['_token'] ) ? $this -> model -> deleteBring( $data ) : FALSE , self::$viewFolder );

            else:

                  $this -> view( 'delete' ,
                     $this -> model -> readBring( $data ) ?
                     [
                       'data' => $this -> model -> readBring( $data ),
                       'category' => $this -> model -> readBring( )
                     ] :
                     FALSE ,
                     self::$viewFolder
                  );

            endif;
     }

}
