<?php

class Testcase_model extends Database
{
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function getTestCaseLatestId()
  {
    $query = "SELECT COUNT(*) AS totalTestCase FROM test_case;";
    $this->db->query($query);
    $this->db->execute();
    return $this->db->resultSingle();
  }

  public function getTestCaseByFilter($data)
  {
    $query = "SELECT test_section.name AS test_section_name,test_case.* FROM test_case INNER JOIN test_section ON test_case.test_section_id=test_section.id WHERE test_case.name LIKE CONCAT('%', :name, '%') AND test_case.project_id=:project_id;";
    $this->db->query($query);
    $this->db->bind('name', $data['name']);
    $this->db->bind('project_id', $data['project_id']);
    $this->db->execute();
    return $this->db->resultSet();
  }

  public function getTestCase($project_id)
  {
    $query = "SELECT test_suite.name AS test_suite_name,test_section.name AS test_section_name,test_case.* FROM test_case INNER JOIN test_suite ON test_case.test_suite_id=test_suite.id INNER JOIN test_section ON test_case.test_section_id=test_section.id WHERE test_case.project_id=:project_id;";
    $this->db->query($query);
    $this->db->bind('project_id', $project_id);
    $this->db->execute();
    return $this->db->resultSet();
  }

  public function getTestCaseByJustId($test_section_id)
  {
    $query = "SELECT * FROM test_case WHERE test_case.test_section_id=:test_section_id;";
    $this->db->query($query);
    $this->db->bind('test_section_id', $test_section_id);
    $this->db->execute();
    return $this->db->resultSet();
  }

  public function getTestCaseById($id)
  {
    $query = "SELECT test_suite.name AS test_suite_name,test_section.name AS test_section_name,test_case.* FROM test_case INNER JOIN test_suite ON test_case.test_suite_id=test_suite.id INNER JOIN test_section ON test_case.test_section_id=test_section.id WHERE test_case.id=:id;";
    $this->db->query($query);
    $this->db->bind('id', $id);
    $this->db->execute();
    return $this->db->resultSingle();
  }

  public function getTestCaseByTestSuiteId($test_suite_id, $project_id)
  {
    $query = "SELECT test_section.name AS test_section_name,test_case.* FROM test_case INNER JOIN test_suite ON test_case.test_suite_id=test_suite.id INNER JOIN test_section ON test_case.test_section_id=test_section.id WHERE test_case.test_suite_id=:test_suite_id && test_case.project_id=:project_id;";
    $this->db->query($query);
    $this->db->bind('test_suite_id', $test_suite_id);
    $this->db->bind('project_id', $project_id);
    $this->db->execute();
    return $this->db->resultSet();
  }

  public function getTestCaseByTestSectionId($id, $testsection, $data)
  {
    $query = "SELECT test_section.name AS test_section_name,test_case.* FROM test_case INNER JOIN test_suite ON test_case.test_suite_id=test_suite.id INNER JOIN test_section ON test_case.test_section_id=test_section.id WHERE test_case.test_suite_id=:test_suite_id AND test_case.test_section_id=:test_section_id AND test_case.project_id=:project_id";
    $this->db->query($query);
    $this->db->bind('test_suite_id', $id);
    $this->db->bind('test_section_id', $testsection);
    $this->db->bind('project_id', $data);
    $this->db->execute();
    return $this->db->resultSet();
  }

  public function insertTestCase($data)
  {
    $query = "INSERT INTO test_case(name,key_case,priority,behavior,precondition,instruction,expected_result,test_suite_id,test_section_id,project_id) VALUES(:name,:key_case,:priority,:behavior,:precondition,:instruction,:expected_result,:test_suite_id,:test_section_id,:project_id)";
    $this->db->query($query);
    $this->db->bind('name', $data['name']);
    $this->db->bind('key_case', $data['key_case']);
    $this->db->bind('priority', $data['priority']);
    $this->db->bind('behavior', $data['behavior']);
    $this->db->bind('precondition', $data['precondition']);
    $this->db->bind('instruction', $data['instruction']);
    $this->db->bind('expected_result', $data['expected_result']);
    $this->db->bind('test_suite_id', $data['test_suite_id']);
    $this->db->bind('test_section_id', $data['test_section_id']);
    $this->db->bind('project_id', $data['project_id']);
    $this->db->execute();
    return $this->db->rowCount();
  }

  public function editTestCase($data)
  {
    $query = "UPDATE test_case SET `name`=:name,`priority`=:priority,`behavior`=:behavior,`precondition`=:precondition,`instruction`=:instruction,`expected_result`=:expected_result WHERE id=:id";
    $this->db->query($query);
    $this->db->bind('id', $data['id']);
    $this->db->bind('name', $data['name']);
    $this->db->bind('priority', $data['priority']);
    $this->db->bind('behavior', $data['behavior']);
    $this->db->bind('precondition', $data['precondition']);
    $this->db->bind('instruction', $data['instruction']);
    $this->db->bind('expected_result', $data['expected_result']);
    $this->db->execute();
    return $this->db->rowCount();
  }

  public function deleteTestCase($id)
  {
    $query = "DELETE FROM test_case WHERE id=:id";
    $this->db->query($query);
    $this->db->bind('id', $id);
    $this->db->execute();
    return $this->db->rowCount();
  }
}
