<?php


ini_set( 'display_errors' , 'on' );

require_once __DIR__ . '/config.php';


// Rooting System
require_once documentRoot . systemDirectory . 'App.php';

require_once documentRoot . systemDirectory . 'Controller.php';

require_once documentRoot . systemDirectory . 'Model.php';

require_once documentRoot . systemDirectory . 'Library.php';



new App();

exit();
