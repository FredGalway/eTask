<!doctype html>
<html lang="en">

<!-- Required Meta tags -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css'>
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <title>eTasks</title>
</head>

<body class="vh-200 bg-image" style="background-image: url('img/hp_background_1.jpg');  background-repeat: no-repeat;">
    <?php
    // Display errors
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    $updateList = 0;
    $updateTask = 1;

    // Include once : the menu, the database connection and the update part
    require_once "./navBar.php";
    require_once "./db_connect.php";
   

    if($updateList = 0){
        require_once "./update-list.php";
    } elseif($updateTask = 1){
        require_once "./update-task.php";
    }
  
    ?>

    <?php
    if (isset($_POST['submit_task'])) {

        $select_list_title = $_POST['list_group'];
        if(!empty($select_list_title)){
            $selected = $_POST['list_group'];  
            echo 'You have chosen: ' . $selected;  
        } else {  
            echo 'Please select your list';  
        }  

        $task_title = $_POST['task_title'];
        $task_desc = $_POST['task_description'];
        $sql_task = "INSERT INTO tasks (task_title, task_description) VALUES ('$task_title', '$task_desc')";
        
        // DB call Variable
        $result_task = mysqli_query($con, $sql_task);
    
    } elseif (isset($_POST['submit_list'])) {
        $list_title = $_POST['list_title'];
        $list_color = $_POST['list_color'];
        $sql_list = "INSERT INTO lists (list_title, list_color) VALUES ('$list_title', '$list_color')";
        
        // DB call Variable
        $result_list = mysqli_query($con, $sql_list);
    }  
    ?>


    <!----------------------------------------------------------------------- Tabs Nav ---------------------------------------------------------------------------------------------------->
    <ul class="nav nav-pills container d-flex justify-content-xl-end mt-4 mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">List</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Task</button>
        </li>
    </ul>

   
    <?php
        // Include here the CREATE DB list values and the CREATE DB Task values-------------------------------------------------
        include_once "./create.php";

        // Include here the Display part of List Cards and Task Cards -------------------------------------------------
        include_once "./read.php";
    ?>


    <!--------------------------------------------------------------------------- Scripts ---------------------------------------------------------------------------------------->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="js/eTask.js"></script>

</body>

</html>