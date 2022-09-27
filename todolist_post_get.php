<?php
// importing db connection.
include("./db_connnection.php");

//Posting to db query with insert method..
if (
  isset($_POST["item"]) &&
  isset($_POST["insert_item"])

) {
  insert_todo_item($_POST["item"]);
} elseif (isset($_POST["edited"])) {
} elseif (isset($_POST["deleted"])) {
};



// Post todo item method.
function insert_todo_item($to_do_item)
{
  $conn = OpenCon();
  // Date declaring.
  $date = date('Y-m-d');
  // Inserting into table todolist from input form.
  $sql = "INSERT INTO to_do_list_items(`title`,`date_added`) VALUES ('$to_do_item','$date')";
  // Return results.
  $result = $conn->query($sql);

  // error_log(print_r($conn) , 3, "./php_error.log");
  if ($result) {
    $row = get_last_todo_item($conn);
    $response["message"] =  'success';
    $response['data'] =  $row;
    echo json_encode($response);
  } else {

    //$response = [];
    $response["message"] =  ' Fail.';
    echo ("Not successful");
  }
}

// Get todo item by id from DB.
function get_last_todo_item($conn)
{
  $get_added_item = "SELECT * FROM to_do_list_items ";
  $get_item = [];
  $result = $conn->query($get_added_item);
  while ($row = $result->fetch_assoc()) {
    $get_item = $row;
  }
  return $get_item;
}


// Retrieve from DB method
function get_todo_list()
{
  $conn = OpenCon();
  $sql = "SELECT * FROM to_do_list_items";

  $result = $conn->query($sql);


  if ($result->num_rows > 0) {

    // output data of each row
    while ($row = $result->fetch_assoc()) {

?>

      <li>
        <input type="checkbox" name="checkbox" id="list-1" />
        <span><?php echo  $row["date_added"] ?></span>
        <i class="fa-solid fa-trash-can deleteIcon"></i>

        <i class="fa-solid fa-pencil editIcon "></i>

        <label class="label-2"> <?php echo  $row["title"] .  "<br>"; ?></label>



      </li>
<?php }
  } else {
    echo "0 results";
  }
}
// Update todo list item by title.
function update_todo_item($title){
  $conn = OpenCon();

  // Inserting into table todolist from input form.
  $sql = "UPDATE `to_do_list_items` (`title`) VALUES ('$title')";

  // Return results.
  $result = $conn->query($sql);

  // error_log(print_r($conn) , 3, "./php_error.log");
  if ($result) {
  
    echo ("successfully updated");
  } else {

  
    echo ("Not successful");
  }
  
}
// Delete todo item from list
function delete_todo_item($id){
  $conn = OpenCon();
  $sql = "DELETE FROM `to_do_list_items` WHERE id=$id ";
  $result = $conn->query($sql);

  if($result){
    echo "successfully deleted";
  }else{
    echo "Unable to delete";
  }
}



?>