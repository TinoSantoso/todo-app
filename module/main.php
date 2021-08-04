<?php
    function koneksi() {
        $conn= mysqli_connect("localhost", "root","","todo_dev");     
        if(!$conn) {
            die('connection is failed!');
        }else {
            return $conn;
        }
    }

    function query($query)
    {
        $koneksi = koneksi();
        $result = mysqli_query($koneksi, $query);
        return $result;
    }

    function get_result($result)
    {
        $data = [];
        // die;
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        return $data;
    }

    function notifikasi($pesan){
        if ($pesan == 'berhasil') {
            echo "<strong>Success!</strong> Data $pesan.";
        }
        
        if ($pesan == 'gagal') {
            echo "<strong>Failed!</strong> Data $pesan.";
        }
    }

?>