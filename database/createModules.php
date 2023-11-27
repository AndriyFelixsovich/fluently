<?php

session_start();

//$myformData = $_POST['myformData'];


//$data = json_decode($myformData, true);
var_dump($_POST);die();
//foreach ($_POST['myformData'] as $name) {
//
//    echo "Поле: " . $name['modules_name'] . "<br>";
////    echo "Значення: " . $value . "<br>";
//}


$data = $_POST;
$modules_name = $data['modules_name'];
$englishWord = $data['english_word'];
$ukrWord = $data['ukr_word'];

$userId = $_SESSION['user']['id'];


try {
    $command = "INSERT INTO folder (UserId, name_module)
                       VALUES 
                            ('".$userId."','".$modules_name."')";
    include ('connection.php');
    $conn->exec($command);
    $idLastFolder = "SELECT LAST_INSERT_ID()";
    $lastInsertId = $conn->query($idLastFolder)->fetchColumn();
    $commandd = "INSERT INTO word (folder_id, englishWord, ukrWord)
                       VALUES 
                            ('".$lastInsertId."','".$englishWord."','".$ukrWord."')";
    include ('connection.php');
    $conn->exec($commandd);

    echo json_encode([
        'success' => true,
        'message' => 'SUCCESSFULLY'
    ]);
} catch (PDOException $e) {
    echo json_encode([
        'success' => false,
        'message' => 'ERROR'
    ]);
}

//$_SESSION['response'] = $response;
//header('location: ../modules-add.php');

?>