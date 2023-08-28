<?php

class ChangePassword extends Controller
{
  public function index()
  {
    if (!isset($_SESSION['username']) && isset($_SESSION['user'])) {
      $data['title'] = "Change Password";
      $this->view('changePassword/index', $data);
    } else {
      header("Location:" . BASEURL . "confirmEmail");
      exit;
    };
  }

  public function changePasswordAction()
  {
    $data['user'] = $this->model('User_model')->changePasswordUser($_POST, $_SESSION['user']);

    if ($data['user']) {
      Flasher::setFlash('success', 'Successfully update account!');
      unset($_SESSION['user']);
      header("Location:" . BASEURL . "signin");
      exit;
    } else {
      Flasher::setFlash('success', 'Failed to update account!');
      header("Location:" . BASEURL . "changePassword");
      exit;
    }
  }
}
