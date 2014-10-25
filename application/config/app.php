<?php

/*
|--------------------------------------------------------------------------
| Application Config
|--------------------------------------------------------------------------
|
*/

return array(

  'url' => 'http://localhost:8888',

  'index' => '/welcome/index',


  'session' => array(

      'path' => '/',


      'domain' => '',


      'expire' => '120',

  ),

  'environments' => array(
    'vagrant' => 'local',
  ),

);
