<?php
    include('db.php');

    // INSERTING TODO INTO THE DATABASE
    if (isset($_POST['from'])) {
        if ($_POST['from'] ==  'sage') {
            $title = $_POST['title'];
            $author = $_POST['author'];
            $body = $_POST['body'];
            $owner = $_POST['owner'];
            $time = date('d-m-y');

            // INSERTING THE DATA TO DATABSE
            $sql = "INSERT INTO `todo_db_table`(`id`, `owner`, `name`, `author`, `text`,`time`) VALUES('', '$owner', '$title', '$author', '$body', '$time')";
            $query = mysqli_query($db_con, $sql);
            if ($query) {
                echo "INSERTED";
            }
        }
    }




    // UPDATING THE TODO IN THE DATABASE
    if (isset($_POST['from'])) {
        if ($_POST['from'] ==  'sage-edit') {
            $title = $_POST['title'];
            $author = $_POST['author'];
            $body = $_POST['body'];

            // INSERTING THE DATA TO DATABSE
            $sql = "UPDATE `todo_db_table` set `name`= '$title', `author`='$author', `text`='$body'";
            $query = mysqli_query($db_con, $sql);
            if ($query) {
                echo "UPDATED";
            } else {
                echo "NOT UPDATED";
            }
        }
    }



    // DELETING TODO FROM THE DATA BASE
    if (isset($_POST['delete'])) {
        if ($_POST['delete']) {
            $id = $_POST['delete'];
            $sql = "DELETE FROM `todo_db_table` WHERE `id` = '$id'";
            $query = mysqli_query($db_con, $sql);
            if ($query) {
                echo "DELETED";
            } else {
                echo "NOT DELETED";
            }
        }
    }




?>