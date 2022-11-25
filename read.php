 

<!---------------------------------------------------------------- Display DB Lists Values ----------------------------------------------------------------------->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h2>Your current Lists</h2>

                <?php
                    $i = 0;
                    // echo $i++;                    
                    // echo '<br><br>';
                    $num = $i++;
                ?>


                <?php
                $sql_list = "SELECT * FROM lists";
                $sql_list_title = "SELECT list_title FROM lists";

                //Retrieving the contents of the table
                $result_list = mysqli_query($con, $sql_list);
                $result_list_title = mysqli_query($con, $sql_list_title);

                while ($listTable = mysqli_fetch_assoc($result_list_title)) {
                    foreach ($result_list_title as $row) {
                        $content = $row["list_title"].'<br>';
                        echo $content;
                    }
                }

                $noLists = true;

                while ($row = mysqli_fetch_assoc($result_list)) {
                    $noLists = false;
                    $listID = $row["list_ID"];

                    $list_color = $row['list_color'];
                    $classColor = "black";

                    // Check CSS color Value ---------------------------------
                    switch($list_color){
                        case 0:
                            $classColor = "white";
                            break;
                        case 1:
                            $classColor = "blue";
                            break;
                        case 2:
                            $classColor = "red";
                            break;
                        case 3:
                            $classColor = "yellow";
                            break;
                        case 4:
                            $classColor = "green";
                            break;
                        case 5:
                            $classColor = "cyan";
                            break;
                        default:
                            $classColor = "black";
                            break;
                    }
                    
                   // Create a dynamic accordion-item  ----------------------------- 
                    echo '
                    
                    ';
                    ?>
                    <!-- // Create a dynamic list card  -----------------------------  -->
                    <div class="accordion" id="accordionExample">
                    <style>.accordion-button {background-color:none;}</style>

                    <?php
                    echo '

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading_'.($num++)-(0).'"> 
                            <button type="button" class="bt-edit editList" data-bs-toggle="modal" data-bs-target="#listModal" id="'.$row["list_ID"].'"></button>
                            <a href="./delete-list.php?id='.$row["list_ID"].'" class="bt-close"></a>
                            <button class="accordion-button '.$classColor.'" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_'.($num++)-(1).'" aria-expanded="true" aria-controls="collapse_'.($num++)-(2).'">
                                '.$row["list_title"].'
                            </button>
                        </h2>
                        <div id="collapse_'.($num++)-(3).'" class="accordion-collapse collapse" aria-labelledby="heading_'.($num++)-(4).'" data-bs-parent="#accordionExample">
                            <div class="accordion-body">

                            <!----------------------------------------------------------------  Display the Task Part  ----------------------------------------------------------------------->

                            <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-10">
                                            <h4>Tasks for "'.$row["list_title"].'"</h4>
                                            ';

                                            $sql_task = "SELECT * FROM tasks ";

                                            //Retrieving the contents of the table
                                            $result_task = mysqli_query($con, $sql_task);
                                            $noTasks = true;

                                            while ($row2 = mysqli_fetch_assoc($result_task)) {
                                                $noTasks = false;

                                                // Create a dynamic Task card  ----------------------------- 
                                                echo '
                                                    <div class="card my-3">
                                                        <div class="card-header">'.$row2["task_title"].'</div>
                                                        <div class="card-body">
                                                        <p class="card-text">'.$row2["task_description"].'</p>
                                                        <button type="button" class="btn btn-primary editTask" 
                                                        data-bs-toggle="modal" data-bs-target="#taskModal" id="'.$row2["task_ID"].'">Edit</button>               
                                                        <a href="./delete-task.php?id='.$row2["task_ID"].'" class="btn btn-danger">Delete</a>
                                                        </div>
                                                    </div>
                                                ';
                                                include_once "./update-task.php";
                                            } 
                                            // $noTasks : allows to alert the user when eNotes is empty
                                            // Here, the first $noTasks case is 'True'. No need to specify it again.
                                            if ($noTasks) {
                                                echo '
                                                    <div class="card my-3">
                                                        <div class="card-header">What do you plan to do ?</div>
                                                        <div class="card-body">
                                                        <p class="card-text">Write a new Task</p>
                                                        </div>
                                                    </div>
                                                ';
                                            }
                                            
                                            echo '

                                        </div>
                                    </div>
                                </div>

                                <br>

                                <!-- END Display Task Part  ----------------------------------------------------------------------->
                        
                            </div>
                        </div>
                    </div>
                    ';
                    include_once "./update-list.php";
                    echo '
                    </div>
                    ';
                   
                }

                // $noLists : allows to alert the user when eNotes is empty
                // Here, the first $noTasks case is 'True'. No need to specify it again.
                if ($noLists) {
                    echo '
                        <div class="card my-3">
                            <div class="card-header">What do you plan to do ?</div>
                            <div class="card-body">
                            <p class="card-text">Create a new List</p>
                            </div>
                        </div>
                    ';
                }
                ?>

            </div>
        </div>
    </div>

    <br><br><br><br>

    