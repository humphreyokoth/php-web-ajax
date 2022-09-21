<?php
include("./db_connnection.php");

// Server request.

if (isset($_POST["item"])) {
  //$conn = OpenCon();
  insert_todo_item($_POST["item"]);
  // }
} elseif (isset($_POST["edited"])) {
} elseif (isset($_POST["deleted"])) {
}


function insert_todo_item($to_do_item)
{
  $conn = OpenCon();


  // Date declaring.
  $date = date('Y-m-d H:i:s');
  // Inserting into table todolist from input form.
  $sql = "INSERT INTO to_do_list_items(`title`,`date_added`) VALUES ('$to_do_item','$date')";
  // Return results.
  $result = $conn->query($sql);
  if ($result) {
    $response = [];
    $response["message"] =  'success';
    $response["data"] = [1, 2, 3];
    echo json_encode($response);
    //  query to return added item

  } else {

    $response = [];
    $response["message"] =  ' Fail.';
    echo json_encode($response);
  }
}

function get_todo_list()
{
  $conn = OpenCon();
  $sql = "SELECT * FROM to_do_list_items";

  $result = $conn->query($sql);


  if ($result->num_rows > 0) {
    $array1 = array();
    // output data of each row
    while ($row = $result->fetch_assoc()) { 
      array_push($array1,$row["title"], $row["date_added"] );?>
    
      <li>
        <input type="checkbox" name="checkbox" id="list-1" />

        <label class="label-2"> <?php echo  $row["title"] .  "<br>"; ?></label> <span><?php echo  $row["date_added"] ?></span>
        <i class="fa-solid fa-trash-can deleteIcon"></i>

        <i class="fa-solid fa-pencil editIcon "></i>



      </li>
<?php }
  } else {
    echo "0 results";
  }
}




?>