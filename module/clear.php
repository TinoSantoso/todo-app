<?php
    require_once('main.php');

    $id = $_GET['id'];
    $sql = "DELETE FROM m_activities where id = $id";
    $execute = query($sql);

    if ($execute) {
        header('Location: ../index.php?pesan=berhasil');
    }else {
        header('Location: ../index.php?pesan=gagal');
    }

?>