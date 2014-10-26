<?php

  /*
  |--------------------------------------------------------------------------
  | Paths
  |--------------------------------------------------------------------------
  |
  | Define realpath constants. Let's just do it once and never need to figure
  | it out again.
  |
  */

    $_ENV[ 'path' ] = array(

      'application' => realpath( __DIR__ . '/application' ),

      'public' => realpath( __DIR__ . '/public' ),

      'storage' => realpath( __DIR__ . '/storage' ),

      'vendor' => realpath( __DIR__ . '/vendor' ),

    );


  /*
  |--------------------------------------------------------------------------
  | Enironments
  |--------------------------------------------------------------------------
  |
  | Define our environments as hostname => environment. This will allow
  | Wijbe to access the correct config variables.
  |
  */

    $environments = array(

      'vagrant' => 'local',

    );


    if( array_key_exists( gethostname(), $environments ) )
      $_ENV[ 'environment' ] = $environments[ gethostname() ];
    else
      $_ENV[ 'environment' ] = 'default';



  /*
  |--------------------------------------------------------------------------
  | Autoload
  |--------------------------------------------------------------------------
  |
  | Autoload all of our system libraries and helpers, as well as any
  | controllers defined in the application.
  |
  */

    require $_ENV[ 'path' ][ 'vendor' ] . '/autoload.php';


  /*
  |--------------------------------------------------------------------------
  | Class Aliases
  |--------------------------------------------------------------------------
  |
  | Import our facades such that the facade class is called whenever the class
  | is referenced without the complete namespace.
  |
  */

    $classes = array(
      'Init' => 'Wijbe\System\Libraries\Init',
      'Error' => 'Wijbe\System\Facades\Error',
      'Response' => 'Wijbe\System\Facades\Response',
      'Route' => 'Wijbe\System\Facades\Route',
      'View' => 'Wijbe\System\Facades\View',
    );

    foreach( $classes as $alias => $class )
      class_alias( $class, $alias );

  /*
  |--------------------------------------------------------------------------
  | Init
  |--------------------------------------------------------------------------
  |
  | Create and store library class instances in Init, allowing them to be
  | retrieved by the alias specified below.
  |
  */

    $accessors = array(
      //'cache'     => 'Wijbe\System\Libraries\Cache',
      //'config'    => 'Wijbe\System\Libraries\Config',
      'error'       => 'Wijbe\System\Libraries\Error',
      //'request'   => 'Wijbe\System\Libraries\Request',
      'response'    => 'Wijbe\System\Libraries\Response',
      'route'       => 'Wijbe\System\Libraries\Route',
      'view'        => 'Wijbe\System\Libraries\View',
    );

    foreach( $accessors as $accessor => $class )
      Init::bind( $accessor, $class );


  /*
  |--------------------------------------------------------------------------
  | Route
  |--------------------------------------------------------------------------
  |
  | Call our route loader, which will parse the URL segments, ignoring any
  | subdirectories, to call controller/method/arg1/arg2/etc.
  |
  */

    Route::load();
