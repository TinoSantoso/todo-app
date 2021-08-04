<?php
    require_once('main.php');

    $id = $_POST['id'];
    $aktifitas = $_POST['aktifitas'];
    $sql = "UPDATE m_activities SET activity_name = '$aktifitas' WHERE id = $id";
    $execute = query($sql);

    if ($execute) {
        header('Location: ../index.php?pesan=berhasil');
    }else {
        header('Location: ../index.php?pesan=gagal');
    }

?>