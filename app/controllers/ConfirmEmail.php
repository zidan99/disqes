<?php

class ConfirmEmail extends Controller
{
  public function index()
  {
    if (!isset($_SESSION['username'])) {
      $data['title'] = "Confirm Email";
      $this->view('confirmEmail/index', $data);
    } else {
      header("Location:" . BASEURL . "dashboard");
      exit;
    };
  }

  public function confirmEmailAction()
  {
    $data['user'] = $this->model('User_model')->getUserByEmail($_POST);

    $_SESSION['user'] = $data['user']['id'];

    if ($_SESSION['user']) {
      header("Location:" . BASEURL . "changePassword");
      exit;
    } else {
      Flasher::setFlash('success', 'Failed to confirm email!');
      header("Location:" . BASEURL . "confirmEmail");
      exit;
    }
  }
}
