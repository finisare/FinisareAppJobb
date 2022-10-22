<?

class mailbox extends Controller {

      private static $viewName = 'mailbox';
      private static $modelName = 'mailboxModel';

      public function __construct(){
             $this -> model = self::model( self::$modelName , 'pages' );
      }

      public function start() {

             $this -> view( 'read' , [] , self::$viewName );
      }

}
