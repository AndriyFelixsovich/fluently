<?php

session_start();

if(!isset($_SESSION['user'])) header('location: login.php');
$_SESSION['table'] = 'users';
$user = $_SESSION['user'];

?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="css/users-add.css">
    <script src="https://kit.fontawesome.com/77cd4ede27.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/ajax.js"></script>


</head>
<body>


<div id="dashboardMainContainer">
   <?php include ('partials/app-sidebar.php')?>
    <div class="dashboard_content_content" id="dashboard_content_content">
        <?php include ('partials/app-topnav.php')?>
        <div class="dashboard_content">
            <div class="dashboard_content_main">
                <div class="row">
                    <div class="column column-5">
                        <h1 class="section_header"><i class="fa fa-plus"></i>Create User </h1>
                        <div id="userAddFormContainer">
                        <form action="database/add.php" method="POST" class="appForm">
                            <div class="appFormInputContainer">
                                <label for="first_name">First name</label>
                                <input type="text" class="appFormInput" id="first_name" name="first_name"/>
                            </div>
                            <div class="appFormInputContainer">
                                <label for="last_name">Last name</label>
                                <input type="text" class="appFormInput" id="last_name" name="last_name"/>
                            </div>
                            <div class="appFormInputContainer">
                                <label for="email">Email</label>
                                <input type="text" class="appFormInput" id="email" name="email"/>
                            </div>
                            <div class="appFormInputContainer">
                                <label for="password">Password</label>
                                <input type="password" class="appFormInput" id="password" name="password"/>
                            </div>
    <!--                        <input type="hidden" name="table" value="users">-->
                            <button type="submit" class="appBtn"><i class="fa fa-plus"></i>Add User</button>
                        </form>
                        <?php
                        if(isset($_SESSION['response'])){
                            $response_message = $_SESSION['response']['message'];
                            $is_success = $_SESSION['response']['success'];
                        ?>
                            <div class="responseMessage">
                                <p class="responseMessage <?php $is_success ? 'responseMessage_success' : 'responseMessage_error' ?>">
                                    <?php echo $response_message ?>
                                </p>
                            </div>
                        <?php unset($_SESSION['response']); } ?>
                        </div>
<!--                        </div>-->
                    </div>
                    <div class="column column-7">
                        <h1 class="section_header"><i class="fa fa-list"></i>List of User </h1>
                        <div class="section_content">
                            <div class="users">
                        <!--Add table with js/ajax.js-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/dashboard.js"></script>
<script>
    function script() {
        this.initialize = function (){
            this.registerEvents();
        },
        this.registerEvents = function (){
            document.addEventListener('click',function (e){
                let targetElement = e.target;
                let classList = e.target.classList;

                if(classList.contains('deleteUser')){
                    e.preventDefault();
                    let userId = targetElement.dataset.userid;
                    if(window.confirm('Are you sure to delete')){
                        $.ajax({
                            method: 'POST',
                            data: {
                                user_id: userId
                            },
                            url: 'ajax/delete-user.php',
                            dataType: 'json',
                            success: function (data) {
                                if(data.message) {
                                    if (window.confirm(data.message)) {
                                        location.reload();
                                    } else {
                                        console.log('Error delete');
                                    }
                                }
                            }
                        })
                    }
                }

            })
        }
    }
    var script = new script;
    script.initialize();
</script>
</body>
</html>
