    <?php
    include('./db_connnection.php');
    include("./introphp.php");
    if($_SERVER["REQUEST_METHOD"] == "POST"){
       error_log($_POST["item"] ,3 , "./php_error.log");
        if(isset($_POST["addtask"])){
          if( $_POST["item"] != NULL){
            todo($_POST["item"]);
          }
        }elseif(isset($_POST["edited"])){

        }elseif(isset($_POST["deleted"])){

        }
       // header("Location:index.php");
    }
    
    ?>
    