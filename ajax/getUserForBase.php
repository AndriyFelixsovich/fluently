<?php
include("../database/connection.php");

        $stmt = $conn->prepare("SELECT * FROM users");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $users = $stmt->fetchAll();
        echo json_encode($users);

?>