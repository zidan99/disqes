<?php

class Project extends Controller
{
  public function index()
  {
    if (isset($_SESSION['username'])) {
      $data['title'] = "Project";
      $data['projects'] = $this->model('Project_model')->getAllProject($_SESSION['user']);

      $this->view('templates/header', $data);
      $this->view('project/index', $data);
      $this->view('templates/footer', $data);
    } else {
      header("Location:" . BASEURL . "signin");
      exit;
    };
  }

  public function data($id)
  {
    $_SESSION['project'] = $id;
    Flasher::setFlash('success', 'Successfully change project!');
    header("Location:" . BASEURL . "dashboard");
    exit;
  }

  public function addAction()
  {
    if ($this->model('Project_model')->insertProject($_POST, $_SESSION['user']) > 0) {
      Flasher::setFlash('success', 'Successfully create project!');
      header("Location:" . BASEURL . "project");
      exit;
    } else {
      Flasher::setFlash('danger', 'Failed to create project!');
      header("Location:" . BASEURL . "project");
      exit;
    }
  }

  public function edit($id)
  {
    $data['project'] = $this->model('Project_model')->getProjectById($id);
    $data['projectJson'] = $this->model('Project_model')->getProjectByIdJson($data['project']);
  }

  public function editAction()
  {
    if ($this->model('Project_model')->editProject($_POST) > 0) {
      Flasher::setFlash('success', 'Successfully edit project!');
      header("Location:" . BASEURL . "project");
      exit;
    } else {
      Flasher::setFlash('danger', 'Failed to edit project!');
      header("Location:" . BASEURL . "project");
      exit;
    }
  }

  public function deleteAction($id)
  {
    if ($this->model('Project_model')->deleteProject($id) > 0) {
      Flasher::setFlash('success', 'Successfully delete project!');
      header("Location:" . BASEURL . "project");
      exit;
    } else {
      Flasher::setFlash('danger', 'Failed to delete project!');
      header("Location:" . BASEURL . "project");
      exit;
    }
  }
}
