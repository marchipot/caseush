<?php

  // Subjects

function find_all_subjects()
{
  global $db;

  $sql = "SELECT * FROM subjects ";
  $sql .= "ORDER BY position ASC";
    //echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function find_subject_by_id($id)
{
  global $db;

  $sql = "SELECT * FROM subjects ";
  $sql .= "WHERE id='" . db_escape($db, $id) . "'";
    // echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $subject = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $subject; // returns an assoc. array
}

function validate_subject($subject)
{
  $errors = [];

    // menu_name
  if (is_blank($subject['menu_name'])) {
    $errors[] = "Name cannot be blank.";
  } elseif (!has_length($subject['menu_name'], ['min' => 2, 'max' => 255])) {
    $errors[] = "Name must be between 2 and 255 characters.";
  }

    // position
    // Make sure we are working with an integer
  $postion_int = (int)$subject['position'];
  if ($postion_int <= 0) {
    $errors[] = "Position must be greater than zero.";
  }
  if ($postion_int > 999) {
    $errors[] = "Position must be less than 999.";
  }

    // visible
    // Make sure we are working with a string
  $visible_str = (string)$subject['visible'];
  if (!has_inclusion_of($visible_str, ["0", "1"])) {
    $errors[] = "Visible must be true or false.";
  }

  return $errors;
}

function insert_subject($subject)
{
  global $db;

  $errors = validate_subject($subject);
  if (!empty($errors)) {
    return $errors;
  }

  $sql = "INSERT INTO subjects ";
  $sql .= "(menu_name, position, visible) ";
  $sql .= "VALUES (";
  $sql .= "'" . db_escape($db, $subject['menu_name']) . "',";
  $sql .= "'" . db_escape($db, $subject['position']) . "',";
  $sql .= "'" . db_escape($db, $subject['visible']) . "'";
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

function update_subject($subject)
{
  global $db;

  $errors = validate_subject($subject);
  if (!empty($errors)) {
    return $errors;
  }

  $sql = "UPDATE subjects SET ";
  $sql .= "menu_name='" . db_escape($db, $subject['menu_name']) . "', ";
  $sql .= "position='" . db_escape($db, $subject['position']) . "', ";
  $sql .= "visible='" . db_escape($db, $subject['visible']) . "' ";
  $sql .= "WHERE id='" . db_escape($db, $subject['id']) . "' ";
  $sql .= "LIMIT 1";

  $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
  if ($result) {
    return true;
  } else {
      // UPDATE failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }

}

function delete_subject($id)
{
  global $db;

  $sql = "DELETE FROM subjects ";
  $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);

    // For DELETE statements, $result is true/false
  if ($result) {
    return true;
  } else {
      // DELETE failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

  // Pages

function find_all_pages()
{
  global $db;

  $sql = "SELECT * FROM pages ";
  $sql .= "ORDER BY subject_id ASC, position ASC";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function find_page_by_id($id)
{
  global $db;

  $sql = "SELECT * FROM pages ";
  $sql .= "WHERE id='" . db_escape($db, $id) . "'";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $page = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $page; // returns an assoc. array
}

function validate_page($page)
{
  $errors = [];

    // subject_id
  if (is_blank($page['subject_id'])) {
    $errors[] = "Subject cannot be blank.";
  }

    // menu_name
  if (is_blank($page['menu_name'])) {
    $errors[] = "Name cannot be blank.";
  } elseif (!has_length($page['menu_name'], ['min' => 2, 'max' => 255])) {
    $errors[] = "Name must be between 2 and 255 characters.";
  }
  $current_id = $page['id'] ?? '0';
  if (!has_unique_page_menu_name($page['menu_name'], $current_id)) {
    $errors[] = "Menu name must be unique.";
  }


    // position
    // Make sure we are working with an integer
  $postion_int = (int)$page['position'];
  if ($postion_int <= 0) {
    $errors[] = "Position must be greater than zero.";
  }
  if ($postion_int > 999) {
    $errors[] = "Position must be less than 999.";
  }

    // visible
    // Make sure we are working with a string
  $visible_str = (string)$page['visible'];
  if (!has_inclusion_of($visible_str, ["0", "1"])) {
    $errors[] = "Visible must be true or false.";
  }

    // content
  if (is_blank($page['content'])) {
    $errors[] = "Content cannot be blank.";
  }

  return $errors;
}

function insert_page($page)
{
  global $db;

  $errors = validate_page($page);
  if (!empty($errors)) {
    return $errors;
  }

  $sql = "INSERT INTO pages ";
  $sql .= "(subject_id, menu_name, position, visible, content) ";
  $sql .= "VALUES (";
  $sql .= "'" . db_escape($db, $page['subject_id']) . "',";
  $sql .= "'" . db_escape($db, $page['menu_name']) . "',";
  $sql .= "'" . db_escape($db, $page['position']) . "',";
  $sql .= "'" . db_escape($db, $page['visible']) . "',";
  $sql .= "'" . db_escape($db, $page['content']) . "'";
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

function update_page($page)
{
  global $db;

  $errors = validate_page($page);
  if (!empty($errors)) {
    return $errors;
  }

  $sql = "UPDATE pages SET ";
  $sql .= "subject_id='" . db_escape($db, $page['subject_id']) . "', ";
  $sql .= "menu_name='" . db_escape($db, $page['menu_name']) . "', ";
  $sql .= "position='" . db_escape($db, $page['position']) . "', ";
  $sql .= "visible='" . db_escape($db, $page['visible']) . "', ";
  $sql .= "content='" . db_escape($db, $page['content']) . "' ";
  $sql .= "WHERE id='" . db_escape($db, $page['id']) . "' ";
  $sql .= "LIMIT 1";

  $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
  if ($result) {
    return true;
  } else {
      // UPDATE failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }

}

function delete_page($id)
{
  global $db;

  $sql = "DELETE FROM pages ";
  $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);

    // For DELETE statements, $result is true/false
  if ($result) {
    return true;
  } else {
      // DELETE failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

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
  return $result;
}

function insert_case($case)
{   
  global $db;
  $user_id = $case['user_id'];
  $sql = "INSERT INTO cases " ;
  $sql .= "(user_id, customer_name, case_number,start_date,end_date,title,is_open) ";
  $sql .= "VALUES (";
  $sql .= "'" . db_escape($db, $case['user_id']) . "',";
  $sql .= "'" . db_escape($db, $case['customer_name']) . "',";
  $sql .= "'" . db_escape($db, $case['case_number']) . "',";
  $sql .= "'" . db_escape($db, $case['start_date']) . "',";
  $sql .= "'" . db_escape($db, $case['end_date']) . "',";
  $sql .= "'" . db_escape($db, $case['title']) . "',";
  $sql .= "'" . db_escape($db, $case['is_open']) . "'";
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
