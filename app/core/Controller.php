<?php

class Controller
{
  public function view($view, $data = [], $test_section = [])
  {
    require_once '../app/views/' . $view . '.php';
  }
  public function model($model)
  {
    require_once '../app/models/' . $model . '.php';
    return new $model;
  }
}
