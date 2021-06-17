<?php
        $server ="localhost";
        $username ="root";
        $password ="";
        $database ="wsmakanan";

        $conn = mysqli_connect($server, $username, $password, $database);
        if (!$conn) {
            die("Koneksi Gagal");
        }
?>
