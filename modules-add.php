<?php

session_start();

if(!isset($_SESSION['user'])) header('location: login.php');
//$_SESSION['table'] = 'users';
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
<!--    <script src="js/ajax.js"></script>-->


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
                        <h1 class="section_header"><i class="fa fa-plus"></i>Create Modules </h1>
                        <div id="userAddFormContainer">
                            <script src="js/formCreateModule.js"></script>
                        </div>
                    </div>
<!--                    <div class="column column-7">-->
<!--                        <h1 class="section_header"><i class="fa fa-list"></i>List of User </h1>-->
<!--                        <div class="section_content">-->
<!--                            <div class="users">-->
<!--                                <!-Add table with js/ajax.js-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function formAddFields() {
        this.initialize = function (){
            this.registerEvents();
        },
            this.registerEvents = function (){
                document.addEventListener('click',function (e){
                    let targetElement = e.target;
                    let classList = e.target.classList;

                    if(classList.contains('appBtn')){
                        e.preventDefault();
                        // let modulesName = document.getElementById('modules_name').value;
                        // let englishWord = document.getElementById('english_word1').value;
                        // let ukrWord = document.getElementById('ukr_word1').value;

                        // var serializeFormData = $('#formElementAdd').serialize();
                        var form = document.getElementById('formElementAdd');
                        var myformData = new FormData(form);
                        for($data of myformData ) {
                            console.log($data)
                        }

                        if(window.confirm('Are you sure to add module')){
                            $.ajax({
                                url: 'database/createModules.php',
                                contentType:false,
                                processData: false,
                                method: 'POST',
                                // data: {
                                //     modules_name: modulesName,
                                //     english_word: englishWord,
                                //     ukr_word: ukrWord,
                                // },
                                data:myformData,
                                dataType: 'json',
                                success: function (data) {
                                    // $('#form_result').html(result);
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
    var formAddFields = new formAddFields;
    formAddFields.initialize();
</script>

<script src="js/dashboard.js"></script>

</body>
</html>
