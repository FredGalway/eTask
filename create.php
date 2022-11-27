<?php

// Display errors
error_reporting(E_ALL);
ini_set('display_errors', '1');
include_once "./db_connect.php";
include_once "./index.php";
?>
<div class="tab-content container d-flex flex-column" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">

            <!------------------------------------------------------------------- CREATE DB list values ----------------------------------------------------------------------------->
            <div class="container my-3">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <h2>New List</h2>

                        <form class="form" method="POST">
                            <!-- with Bootsrap : mb4 = margin top -->
                            <div class="mb-4">
                                <label for="exampleInputEmail1" class="form-label">Title</label>
                                <input type="text" class="form-control" id="list_title" placeholder="Next List title ..." name="list_title">
                            </div>
                            <div class="mb-3">
                                <!-- <label for="desc" class="form-label">Color</label> -->
                                <!-- <textarea class="form-control" id="list_color" rows="3" placeholder="List color ..." name="list_color"></textarea> -->
                                <p>color</p>
                                <select class="form-select list_color" id="color" aria-label="list_color" name="list_color">
                                    <option selected value="0">Choose your color</option>
                                    <option value="1">Blue</option>
                                    <option value="2">Red</option>
                                    <option value="3">Yellow</option>
                                    <option value="4">Green</option>
                                    <option value="5">Cyan</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit_list">Create List</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">

            <!-------------------------------------------------------------------- CREATE DB Task values ----------------------------------------------------------------------------->
            <div class="container my-3">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <h2>New Task</h2>

                        <form class="form" method="POST">
                            <!-- with Bootsrap : mb4 = margin top -->
                            <div class="mb-4">
                                <p>Select your list :</p>
                                <?php
                              
                                // Retrieving the contents of the table
                                $sql_list_titles = "SELECT list_title FROM lists";
                                $result_list_titles = mysqli_query($con, $sql_list_titles);
                                // $i = 1;
                                // echo mysqli_num_rows($result_list_titles);
                                
                                ?>
                                <select class="form-select list_group" id="list_group" aria-label="list_group" name="list_group">
                               
                                    <option selected value="0">Choose your List</option>
                                    <?php
                                        foreach ($result_list_titles as $row) {
                                            $content = $row["list_title"].'<br>';
                                            echo '
                                            <option value="'.$content.'">'.$content.'</option>
                                            ';
                                        }
                                    ?>   
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="exampleInputEmail1" class="form-label">Title</label>
                                <input type="text" class="form-control" id="task_title" placeholder="Next Task title ..." name="task_title">
                            </div>
                            <div class="mb-3">
                                <label for="desc" class="form-label">Description</label>
                                <textarea class="form-control" id="task_description" rows="3" placeholder="Task Description ..." name="task_description"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary" name="submit_task">Add Task</button>
                        </form>
                       
                    </div>
                </div>
            </div>
           <!-- end of Task Tab Content -->
        </div>
    </div>
    <br><br>