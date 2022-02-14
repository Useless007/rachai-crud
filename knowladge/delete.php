<?php
    require_once __DIR__ . '/../connect.php';
    $m_id = $_GET['m_id'];
    $sql = $conn->prepare("DELETE FROM `member` WHERE m_id = m_id");
    $sql->bindParam(':m_id', $m_id);
    $ai = $conn->query("ALTER TABLE `member` AUTO_INCREMENT = 1;");
    $sql->execute();
    $ai->execute();
    header("location:/crud/index");
?>