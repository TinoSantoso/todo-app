<?php
    require_once('main.php');

    $id = $_GET['id'];
    $sql = "UPDATE m_activities SET status = 1 WHERE id = $id";
    $execute = query($sql);

    if ($execute) {
        header('Location: ../index.php?pesan=berhasil');
    }else {
        header('Location: ../index.php?pesan=gagal');
    }

?>