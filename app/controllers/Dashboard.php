<?php

class Dashboard extends Controller
{
  public function index()
  {
    if (isset($_SESSION['username'])) {
      $data['title'] = "Dashboard";
      $data['countProject'] = $this->model('Project_model')->getCountProject($_SESSION['user']);

      $data['totalTestSuites'] = $this->model('Project_model')->getTotalTestSuitesUser($_SESSION['user']);
      $data['totalTestCases'] = $this->model('Project_model')->getTotalTestCasesUser($_SESSION['user']);

      $data['countNotSet'] = $this->model('Project_model')->getCountTestCaseNotSetUser($_SESSION['user']);
      $data['countHigh'] = $this->model('Project_model')->getCountTestCaseHighUser($_SESSION['user']);
      $data['countMedium'] = $this->model('Project_model')->getCountTestCaseMediumUser($_SESSION['user']);
      $data['countLow'] = $this->model('Project_model')->getCountTestCaseLowUser($_SESSION['user']);

      // code total priority not set (belum bekerja, perlu dibenerin)
      // $data['totalTestCasesNotSets'] = $this->model('Project_model')->getTotalTestCasesNotSets($_SESSION['user']);

      // code dashboard page project (tampilan sementara supaya ga nampilin error)
      // $data['countTestSuite'] = $this->model('Project_model')->getCountTestSuite($_SESSION['project'], $_SESSION['user']);


      $this->view('templates/header', $data);
      $this->view('dashboard/index', $data);
      $this->view('templates/footer', $data);
    } else {
      header("Location:" . BASEURL . "signin");
      exit;
    };
  }
}
