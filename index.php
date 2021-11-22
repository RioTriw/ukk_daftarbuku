<?php
include('koneksi.php');//agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
include('auth_session');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Data Buku UKK</title>
    <style type="text/css">
      * {
        font-family: "Trebuchet MS";
      }
      h1 {
        text-transform: uppercase;
        color: #0B5345;
      }
    table {
      border: solid 1px #89B5AF;
      border-collapse: collapse;
      border-spacing: 0;
      width: 70%;
      margin: 10px auto 10px auto;
    }
    table thead th {
        background-color: #0B5345;
        border: solid 1px #DDEEEE;
        color: white;
        padding: 10px;
        text-align: left;
        text-decoration: none;
    }
    table tbody td {
        border: solid 1px #76D7C4;
        color: #333;
        padding: 10px;
        text-shadow: 1px 1px 1px white;
    }
    a {
      float: center;
      background: #555;
      color: #fff;
      border-radius: 10px;
      margin-right: 10px;
      border: none;
      text-decoration: none;
      background-color: #1ABC9C;
      color: #fff;
      padding: 10px;
      text-decoration: none;
      font-size: 12px;
    }
    a:hover{
      opacity: .7;
    }
    body{
      background-color: white;
    }
    </style>
  </head>
  <body>
    <center><h1>Data Buku</h1><center>
    <a href="tambah_buku.php">+ &nbsp; Tambah Buku</a>
    <a href="logout.php">- &nbsp; Logout</a>
    <br/>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Gambar</th>
          <th>Judul</th>
          <th>Pengarang</th>
          <th>Penerbit</th>
          <th>Option</th>
        </tr>
    </thead>
    <tbody>
      <?php
      $query = "SELECT * FROM buku ORDER BY id ASC";
      $result = mysqli_query($koneksi, $query);
      if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
      }


      $no = 1;
      while($row = mysqli_fetch_assoc($result))
      {
      ?>
       <tr>
          <td><?php echo $no; ?></td>
          <td style="text-align: center;"><img src="gambar/<?php echo $row['gambar']; ?>" style="width: 120px;"></td>
          <td><?php echo $row['judul']; ?></td>
          <td><?php echo $row['pengarang']; ?></td>
          <td><?php echo $row['penerbit']; ?></td>
          
          <td>
              <a href="edit_buku.php?id=<?php echo $row['id']; ?>">Edit</a>
              <a href="proses_hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
          </td>
      </tr>
         
      <?php
        $no++;
      }
      ?>
    </tbody>
    </table>
  </body>
</html>