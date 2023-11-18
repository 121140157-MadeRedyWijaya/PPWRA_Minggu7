<?php
include('koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = isset($_POST['nim']) ? $_POST['nim'] : '';
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $prodi = isset($_POST['prodi']) ? $_POST['prodi'] : '';

    if (!empty($nim)) {
        $check_query = "SELECT * FROM mahasiswa WHERE nim='$nim'";
        $result = mysqli_query($conn, $check_query);

        if (mysqli_num_rows($result) > 0) {
            $update_query = "UPDATE mahasiswa SET nama='$nama', prodi='$prodi' WHERE nim='$nim'";

            if (mysqli_query($conn, $update_query)) {
                echo "Data berhasil diperbarui.";
            } else {
                echo "Error: " . $update_query . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "NIM tidak ditemukan.";
        }
    } else {
        echo "NIM tidak valid.";
    }
} else {
    echo "Metode pengiriman data tidak valid.";
}


$data_mahasiswa = [];
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nim'])) {
    $nim_to_edit = $_POST['nim'];
    $select_query = "SELECT * FROM mahasiswa WHERE nim='$nim_to_edit'";
    $result = mysqli_query($conn, $select_query);
    
    if (mysqli_num_rows($result) > 0) {
        $data_mahasiswa = mysqli_fetch_assoc($result);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
</head>
<body>
    <h2>Edit Data Mahasiswa</h2>


    <form action="editdata.php" method="post">
        <label for="nim">NIM:</label>
        <input type="text" name="nim" value="<?php echo isset($data_mahasiswa['nim']) ? $data_mahasiswa['nim'] : ''; ?>" required readonly>
        <label for="nama">Nama:</label>
        <input type="text" name="nama" value="<?php echo isset($data_mahasiswa['nama']) ? $data_mahasiswa['nama'] : ''; ?>" required>
        <label for="prodi">Prodi:</label>
        <input type="text" name="prodi" value="<?php echo isset($data_mahasiswa['prodi']) ? $data_mahasiswa['prodi'] : ''; ?>" required>
        <input type="submit" value="Perbarui">
    </form>

    <a href="index.php">Kembali ke Halaman Utama</a>

</body>
</html>