<?php include('koneksi.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Buku perpus</title>
    <style type="text/css">
      * {
        font-family: "Trebuchet MS";
      }
    h1 {
        text-transform: uppercase;
        color: salmon;
      }
    table {
      border: solid 1px #DDEEEE;
      border-collapse: collapse;
      border-spacing: 0;
      width: 70%;
      margin: 10px auto 10px auto;
    }
    table thead th {
        background-color: #DDEFEF;
        border: solid 1px #DDEEEE;
        color: #336B6B;
        padding: 10px;
        text-align: left;
        text-shadow: 1px 1px 1px #fff;
        text-decoration: none;
    }
    table tbody td {
        border: solid 1px #DDEEEE;
        color: #333;
        padding: 10px;
        text-shadow: 1px 1px 1px #fff;
    }
    a {
          background-color: salmon;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
    }
    </style>
</head>
<body>
    <center><h1>Daftar Buku</h1></center>
    <center><a href="tambah_buku.php">+ &nbsp; Tambah Buku</a></center>
    <br>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Gambar</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query = "SELECT * FROM perpustakaan ORDER BY id ASC";
                $result = mysqli_query($koneksi, $query);

                if(!$result){
                    die ("Query Error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
                }
                $no = 1;
                while($row = mysqli_fetch_assoc($result))
                {
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $row['judul']; ?></td>
                <td><?php echo $row['pengarang']; ?></td>
                <td><?php echo $row['penerbit']; ?></td>
                <td style="text-align: center;"><img src="gambar/<?php echo $row['gambar']; ?>" style="width: 100px;"></td>
                <td>
                    <a href="edit_buku.php?id=<?php echo $row['id']; ?>">Edit</a> |
                    <a href="proses_hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php
                $no++; //untuk nomor urut terus bertambah 1
                }
            ?>
        </tbody>
    </table>
</body>
</html>