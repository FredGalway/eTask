<?php

include_once "./db_connect.php";

if(isset($_POST["hidden1"]) && isset($_POST["editTaskTitle"])){
  // if(isset($_POST["hidden"])){
    $id = $_POST["hidden1"];
    $task_title = $_POST["editTaskTitle"];
    $task_desc = $_POST["editTaskDesc"];
    $sql_task = "UPDATE tasks SET task_ID='$id', task_title='$task_title', task_description='$task_desc' WHERE task_ID='$id'";
    $result_task = mysqli_query($con, $sql_task);

    if (!$result_task) {
      echo "<br><br>"."Impossible d'exécuter la requête ($sql_task) dans la base : ".$database."<br><br>";
      exit;

    } else {
      // echo "id :".$id;
      // echo "<br>"."List request : $sql_task"."<br>";
    }

} 

echo '
<!-- Modal -->
<div class="modal fade" id="taskModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Task</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <!-- Form updated from create-read.php -->
        <form class="form" method="POST">
            <input type="hidden" name="hidden1" id="hidden1">
            <!-- with Bootsrap : mb4 = margin top -->
            <div class="mb-4">
                <label for="exampleInputEmail1" class="form-label">Title</label>
                <input type="text" class="form-control" id="editTaskTitle" placeholder="Next Task title ..." name="editTaskTitle">
            </div>
            <div class="mb-3">
                <label for="desc" class="form-label">Description</label>
                <textarea class="form-control" id="editTaskDesc" rows="3" placeholder="Task Description ..." name="editTaskDesc"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="submit2">Update</button>
        </form>

      </div>
    </div>
  </div>
</div>
';
?>