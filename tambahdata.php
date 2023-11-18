<?php
include('koneksi.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];

    $query = "INSERT INTO mahasiswa (nim,nama,prodi) VALUES ('$nim','$nama','$prodi')";

    if(mysqli_query($conn, $query)) {
        echo "data berhasil ditambah";
    } else {
        echo "ERROR: " . $query . "<br>" . mysqli_error($conn);
}
}
?>