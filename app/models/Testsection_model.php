<?php

class Testsection_model extends Database
{
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function getTestSectionByProjectId($project_id, $test_suite_id)
  {
    $query = "SELECT * FROM test_section WHERE project_id=:project_id AND test_suite_id=:test_suite_id";
    $this->db->query($query);
    $this->db->bind('project_id', $project_id);
    $this->db->bind('test_suite_id', $test_suite_id);
    $this->db->execute();
    return $this->db->resultSet();
  }

  public function getTestSectionJustByProjectId($data)
  {
    $query = "SELECT * FROM test_section WHERE project_id=:project_id";
    $this->db->query($query);
    $this->db->bind('project_id', $data);
    $this->db->execute();
    return $this->db->resultSet();
  }

  public function getTestSectionByTestSuiteId($data)
  {
    $query = "SELECT * FROM test_section WHERE test_suite_id=:test_suite_id";
    $this->db->query($query);
    $this->db->bind('test_suite_id', $data);
    $this->db->execute();
    return $this->db->resultSet();
  }

  public function getTestSectionByTestSuiteIdJson($data)
  {
    return $this->db->jsonResponse($data);
  }

  public function getTestSectionById($id)
  {
    $query = "SELECT * FROM test_section WHERE id=:id";
    $this->db->query($query);
    $this->db->bind('id', $id);
    $this->db->execute();
    return $this->db->resultSingle();
  }

  public function getTestSectionByIdJson($data)
  {
    return $this->db->jsonResponse($data);
  }

  public function insertTestSection($data)
  {
    $query = "INSERT INTO test_section(name,test_suite_id,project_id) VALUES(:name,:test_suite_id,:project_id)";
    $this->db->query($query);
    $this->db->bind('name', $data['name']);
    $this->db->bind('test_suite_id', $data['test_suite_id']);
    $this->db->bind('project_id', $data['project_id']);
    $this->db->execute();
    return $this->db->rowCount();
  }

  public function editTestSection($data)
  {
    $query = "UPDATE test_section SET `name`=:name WHERE id=:id";
    $this->db->query($query);
    $this->db->bind('id', $data['id']);
    $this->db->bind('name', $data['name']);
    $this->db->execute();
    return $this->db->rowCount();
  }

  public function deleteTestSection($id)
  {
    $query = "DELETE FROM test_section WHERE id=:id";
    $this->db->query($query);
    $this->db->bind('id', $id);
    $this->db->execute();
    return $this->db->rowCount();
  }
}
