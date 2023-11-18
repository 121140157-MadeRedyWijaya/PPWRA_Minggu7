<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TugasMinggu7</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            margin-top: 20px;
            display: flex;
            align-self: flex-start;
            
        }

        label {
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"] {
            padding: 0px;
            margin-bottom: 0px;
            width: 200px;
            box-sizing: border-box;
        }

        input[type="submit"], input[type="reset"] {
            margin-left: 10px;
            height: 30px;
            width: 80px;
            background-color: #4caf50;
            color: white;
            padding: 8px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        table {
            align-items: center;
            width: 80%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4caf50;
            color: white;
        }

        select {
            padding: 8px;
            margin-bottom: 10px;
            width: 200px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <h2> DATA  MAHASISWA INSTITUT TEKNOLOGI SUMATERA</h2>

    <form action="tambahdata.php" method="post">
        <label for="nim">NIM : </label>
        <input type="text" name="nim" required>
        <label for="nama">Nama : </label>
        <input type="text" name="nama" required>
        <label for="prodi">Prodi : </label>
        <input type="text" name="prodi" required>
        <input type="submit" value="Tambah">
    </form>

    <form action="editdata.php" method="post">
        <label for="nim">NIM : </label>
        <input type="text" name="nim" required>
        <input type="submit" value="Edit">
    </form>

    <form action="hapusdata.php" method="get">
        <label for="del">NIM : </label>
        <input type="text" name="del" required>
        <input type="submit" value="Hapus">
    </form>
    

    <br><br><br>

    <form action="index.php" method="post">
        <label for="prodi_filter">Filter:</label>
        <select name="prodi_filter">
            <option value="semua" selected>Semua Prodi</option>
            <option value="AR">Arsitektur</option>
            <option value="BI">Biologi</option>
            <option value="EL">Teknik Elektro</option>
            <option value="FA">Farmasi</option>
            <option value="IF">Teknik Informatika</option>
            <option value="PWK">Perencanaan Wilayah dan Kota</option>
            <option value="SI">Teknik Sipil</option>
            <option value="TG">Teknik Geofisika</option>
            <option value="TL">Teknik Lingkungan</option>
            <option value="TSE">Teknik Sistem Energi</option>
        </select>
        <input type="submit" value="Filter">
    </form>

    

    <?php
    include('koneksi.php');

   
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['prodi_filter'])) {
        $selected_prodi = $_POST['prodi_filter'];
        $where_clause = ($selected_prodi != "semua") ? " WHERE prodi = '$selected_prodi'" : "";
    } else {
        $where_clause = "";
    }

 
    $select_query = "SELECT * FROM mahasiswa" . $where_clause;
    $result = mysqli_query($conn, $select_query);

  
    if (mysqli_num_rows($result) > 0) {
        echo "<table>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Prodi</th>
                </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['nim']}</td>
                    <td>{$row['nama']}</td>
                    <td>{$row['prodi']}</td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "Data tidak ditemukan.";
    }


    mysqli_close($conn);
    ?>
</body>
</html>
