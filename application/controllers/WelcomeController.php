<?php

/*
|--------------------------------------------------------------------------
| Welcome Controller
|--------------------------------------------------------------------------
|
*/

class WelcomeController {



  /**
	* Index
	*
	* @return void
	*/

  public function getIndex()
  {

    $data = array(
     'title' => 'Welcome!',
    );

    return View::template( 'template.default' )->load( 'page.welcome', $data );
  }


}
