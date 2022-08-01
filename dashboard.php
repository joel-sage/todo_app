<?php
include("config/db.php");
session_start();
if (!$_SESSION['log_in']) {
    header('location: index.php');
}

if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
    $_SESSION['log_in'] = false;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" user="JOEL-SAGE">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <title>TO DO APPLICATION FROM SAGE</title>
</head>

<body>
    <section class="add-section">
        <div class="add-new">
            <h6>Add New List</h6>
            <i class="fas fa-plus create"></i>
        </div>
    </section>

    <section class="all-todos">
        <div class="todo-holder">
            <?php
            $message = '';
            $name = $_SESSION['username'];
            $sql = "SELECT * FROM `todo_db_table` WHERE `owner` = '$name'";
            $query = mysqli_query($db_con, $sql);
            $count = mysqli_num_rows($query);
            if ($count == 0) { 
                $message = 'NO LIST ADDED <br> <br> YOUR TODO\'S WILL SHOW HERE WHEN ADDED';
            ?>
                <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: grey; width: 100%;
                 display: flex; justify-content: center; text-align: center;">
                    <?php echo $message ?>
                </div>
            <?php
            } else {
                while ($todo = mysqli_fetch_assoc($query)) {
            ?>
                    <div class="todo">
                        <div class="todo-title">
                            <h6><?php echo ucfirst($todo['name']) ?></h6>
                            <p><?php echo $todo['time'] ?></p>
                        </div>
                        <div class="todo-name">
                            <p><b>BY : </b> <span class="author"><?php echo ucfirst($todo['author']) ?> </span></p>
                        </div>
                        <div class="todo-body">
                            <small class="msg"><?php echo ucfirst($todo['text']) ?></small>
                        </div>
                        <div class="delete">
                            <button class="del" id="<?php echo $todo['id'] ?>">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        <div class="editer">
                            <button class="edt" id="<?php echo $todo['id'] ?>">
                                <i class="fas fa-pen"></i>
                            </button>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </section>

    <section class="modal-todo">
        <section class="add-section">
            <div class="add-new">
                <h6>Close Section</h6>
                <i class="fas fa-close close"></i>
            </div>
        </section>

        <div class="modal">
            <input type="text" class="name" placeholder="Name" required>
            <input type="text" class="title" placeholder="Title" required>
            <textarea class="text" placeholder="Your Todo Here.....!" required></textarea>
            <div class="btn-holder">
                <button class="save" id="<?php echo (isset($_SESSION['username'])) ? $_SESSION['username'] : "" ?>">SAVE</button>
            </div>
        </div>

    </section>


    <!-- EDIT MODAL -->
    <section class="edit-todo">
        
        <section class="add-section">
            <div class="add-new">
                <h6>Close Editing</h6>
                <i class="fas fa-close close-edit"></i>
            </div>
        </section>

        <div class="edit">
            <input type="text" class="edit-name" placeholder="Name" required>
            <input type="text" class="edit-title" placeholder="Title" required>
            <textarea class="edit-text" placeholder="Your Todo Here.....!" required></textarea>
            <div class="btn-holder">
                <button class="save-edit">
                    SAVE
                </button>
            </div>
        </div>
    </section>
    <!-- EDIT MODAL -->

    <a href="dashboard.php?logout=true" onclick="return confirm('ARE YOU SURE YOU WANT TO LOGOUT..?')">
        <div class="log-out">
            <i class="fas fa-sign-out"></i>
        </div>
    </a>
    
    <script src="jquery/jquery.min.js"></script>
    <script src="app.js"></script>

</body>
</html>
