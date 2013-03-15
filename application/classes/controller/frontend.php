<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_Frontend extends Controller_Template {

  public $template = 'frontend/view.index';

  public function __construct(Request $request, Response $response) {
    parent::__construct($request, $response);

    $this->user = Auth::instance()->get_user();
    /*if (!empty($this->user->id))
      Session::instance()->set('user_id', $this->user->id);*/
  }

  public function before() {
    parent::before();

    if ($this->auto_render) {
// Initialize empty values
      $this->template->title = '';
      $this->template->description = '';
      $this->template->content = '';
      $this->template->keywords = '';
      $this->template->menu = '';

      $this->template->styles = array();
      $this->template->scripts = array();
      $this->template->site = '';
      $this->template->error = '';
      $this->template->username = ORM::factory('user', $this->user)->username;
      $this->template->IP = $_SERVER['REMOTE_ADDR'];
      $this->template->auth = Auth::instance();
      $this->template->session = Session::instance();
    }
  }

  public function after() {
    if ($this->auto_render) {
      $styles = array(
          'media/css/style.css' => 'screen',
          'media/css/jquery-ui.css' => 'screen',
          'media/css/moje.css' => 'screen'
      );


      $scripts = array(
          'media/js/jquery.js',
          'media/js/jquery-ui.js',
          'media/js/jquery.dataTables.js',
          'media/js/helpers.js',
          'media/js/jquery-ui-timepicker-addon.js'
      );
      $this->template->styles = array_merge($this->template->styles, $styles);
      $this->template->scripts = array_merge($this->template->scripts, $scripts);
    }
    parent::after();
  }

  function action_index() {
  	$this->template->content = View::factory('frontend/view.index');
  }
}