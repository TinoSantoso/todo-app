<?php
    require_once('main.php');

    $aktifitas = $_POST['aktifitas'];
    $sql = "INSERT INTO m_activities (activity_name) VALUES('$aktifitas')";
    $execute = query($sql);

    if ($execute) {
        header('Location: ../index.php?pesan=berhasil');
    }else {
        header('Location: ../index.php?pesan=gagal');
    }

?>