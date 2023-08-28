<?php

class Dashboard extends Controller
{
  public function index()
  {
    if (isset($_SESSION['username'])) {
      $data['title'] = "Dashboard";
      $data['countTestSuite'] = $this->model('Project_model')->getCountTestSuite($_SESSION['project'], $_SESSION['user']);
      $data['countTestCase'] = $this->model('Project_model')->getCountTestCase($_SESSION['project'], $_SESSION['user']);
      $data['countProject'] = $this->model('Project_model')->getCountProject($_SESSION['user']);
      $data['countNotSet'] = $this->model('Project_model')->getCountTestCaseNotSet($_SESSION['project'], $_SESSION['user']);
      $data['countHigh'] = $this->model('Project_model')->getCountTestCaseHigh($_SESSION['project'], $_SESSION['user']);
      $data['countMedium'] = $this->model('Project_model')->getCountTestCaseMedium($_SESSION['project'], $_SESSION['user']);
      $data['countLow'] = $this->model('Project_model')->getCountTestCaseLow($_SESSION['project'], $_SESSION['user']);

      $this->view('templates/header', $data);
      $this->view('dashboard/index', $data);
      $this->view('templates/footer', $data);
    } else {
      header("Location:" . BASEURL . "signin");
      exit;
    };
  }
}
