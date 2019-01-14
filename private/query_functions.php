<?php

function get_user($username)
{
  global $db;

  $sql = "SELECT * FROM users WHERE username ='" . db_escape($db, $username) . "'";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $user = mysqli_fetch_assoc($result);
  return $user;
}

  //user  login

function insert_user($user)
{
  global $db;
  $sql = "INSERT INTO users ";
  $sql .= "(username, email, password) ";
  $sql .= "VALUES (";
  $sql .= "'" . db_escape($db, $user['username']) . "',";
  $sql .= "'" . db_escape($db, $user['email']) . "',";
  $sql .= "'" . db_escape($db, $user['password']) . "'";
  $sql .= ")";
  $result = mysqli_query($db, $sql);
    // For INSERT statements, $result is true/false
  if ($result) {
    return true;
  } else {
      // INSERT failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

function is_unique_name($username)
{
  global $db;
  $sql = "SELECT * FROM users WHERE username = '" . db_escape($db, $username) . "'";
  $result = mysqli_query($db, $sql);
  $count = mysqli_num_rows($result);
  return $count == 0;
}


function find_all_cases($user_id)
{
  global $db;

  $sql = "SELECT * FROM cases ";
  $sql .= "WHERE user_id = '" . $user_id . "'";
    //echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $json= json_encode($result);
  return $result;
}

function insert_case($case)
{   
  global $db;
  $user_id = $case['user_id'];
  $sql = "INSERT INTO cases " ;
  $sql .= "(user_id, customer_name, case_number,start_date,end_date,title,is_open,is_archived) ";
  $sql .= "VALUES (";
  $sql .= "'" . db_escape($db, $case['user_id']) . "',";
  $sql .= "'" . db_escape($db, $case['customer_name']) . "',";
  $sql .= "'" . db_escape($db, $case['case_number']) . "',";
  $sql .= "'" . db_escape($db, $case['start_date']) . "',";
  $sql .= "'" . db_escape($db, $case['end_date']) . "',";
  $sql .= "'" . db_escape($db, $case['title']) . "',";
  $sql .= "'" . db_escape($db, $case['is_open']) . "',";
  $sql .= "'0'";
  $sql .= ")";
  echo $sql;
  $result = mysqli_query($db, $sql);
    // For INSERT statements, $result is true/false
  if ($result) {
    return true;
  } else {
      // INSERT failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}


function archived_case($case){ 
  global $db;

  $sql = "UPDATE cases SET ";
  $sql .= "is_archived='1' ";
  $sql .= "WHERE id='" . db_escape($db, $case['id']) . "' ";
  $sql .= "LIMIT 1";

  $result = mysqli_query($db, $sql);
  // For UPDATE statements, $result is true/false
  if($result) {
    return true;
  } else {
    // UPDATE failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }


  
}

function update_case($case) {
  global $db;

  

  $sql = "UPDATE cases SET ";
  $sql .= "customer_name='" . db_escape($db, $case['customer_name']) . "', ";
  $sql .= "case_number='" . db_escape($db, $case['case_number']) . "', ";
  $sql .= "start_date='" . db_escape($db, $case['start_date']) . "', ";
  $sql .= "end_date='" . db_escape($db, $case['end_date']) . "', ";
  $sql .= "title='" . db_escape($db, $case['title']) . "', ";
  $sql .= "is_open='" . db_escape($db, $case['is_open']) . "' ";  
  $sql .= "WHERE id='" . db_escape($db, $case['id']) . "' ";
  $sql .= "LIMIT 1";

  $result = mysqli_query($db, $sql);
  // For UPDATE statements, $result is true/false
  if($result) {
    return true;
  } else {
    // UPDATE failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }

}

function find_case_by_id($id) {
  global $db;

  $sql = "SELECT * FROM cases ";
  $sql .= "WHERE id='" . db_escape($db, $id) . "'";
  // echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $case = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $case; // returns an assoc. array
}
?>
