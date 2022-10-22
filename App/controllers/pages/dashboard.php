<?php



class dashboard extends Controller {

      private static $viewFolder = 'dashboard';

      private static $modelName = 'dashboardModel';

      public function __construct(){
             $this -> model = $this -> model( self::$modelName , 'pages' );
      }


      public function start(){

            // echo strtotime('now').'<br>'.strtotime("1 hours");
            $data = [
                'userLoginData' => $this -> model -> userLoginData( $_SESSION['user']['random'] ),
            ];

            $this -> view( 'dashboard' , $data );

      }

      public function undefined(){

             $this -> components( 'alert' , [
               'value' => 'danger',
               'cover' => TRUE,
               'style' => 'color:black; font-size:20px; padding:30px;',
               'message' => 'Dashboard -> TANIMSIZ DEĞER'
             ] );

      }
}
