<?php

include_once "./db_connect.php";

if(isset($_POST["hidden2"]) && isset($_POST["editListTitle"])){
  
    $id = $_POST["hidden2"];
    $list_title = $_POST["editListTitle"];
    $list_color = $_POST["editListColor"];

    $sql_list = "UPDATE lists SET list_ID='$id', list_title='$list_title' WHERE list_ID='$id'";
    $update_list = $result_list;
    $update_list = mysqli_query($con, $sql_list) or die(mysqli_error($con));
   

    if (!$update_list) {
      echo "<br><br>"."Impossible d'exécuter la requête ($sql_list) dans la base : ".$database."<br><br>";
      exit;

    } else{
      // echo "<br>"."List request : $sql_list"."<br>";
      // echo "id :".$id."<br>";
      mysqli_refresh($con, MYSQLI_REFRESH_TABLES);
      
      
    }

  }

echo '
<!-- Modal -->
<div class="modal fade" id="listModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit list</h1><br>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <!-- Form updated from create-read.php -->
        <form class="form" method="POST">

            <input type="hidden" name="hidden2" id="hidden2">
            <div class="mb-4">
                <label for="exampleInputEmail2" class="form-label">Title</label>
                <input type="text" class="form-control" id="editListTitle" class="editListTitle" placeholder="Next list title ..." name="editListTitle">
            </div>
            <div class="mb-3">
                <label for="desc" class="form-label">Color Option</label>
                <textarea class="form-control" id="editListColor" class="editListColor" rows="3" placeholder="Color list option..." name="editListColor"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="submit3" value="submit" onmouseup="refreshPage()">Update</button>
            
        </form>

      </div>
    </div>
  </div>
</div>
';

?>