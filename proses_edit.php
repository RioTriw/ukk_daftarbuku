<?php

include 'koneksi.php';


  $id = $_POST['id'];
  $gambar = $_FILES['gambar']['name'];
  $judul     = $_POST['judul'];
  $pengarang   = $_POST['pengarang'];
  $penerbit    = $_POST['penerbit'];

  if($gambar != "") {
    $ekstensi_diperbolehkan = array('png','jpg'); 
    $x = explode('.', $gambar);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar']['tmp_name'];   
    $angka_acak     = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$gambar;
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
                  move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru);
                      
                    
                   $query  = "UPDATE buku SET gambar = '$nama_gambar_baru', judul = '$judul', pengarang = '$pengarang', penerbit = '$penerbit'";
                    $query .= "WHERE id = '$id'";
                    $result = mysqli_query($koneksi, $query);
                   
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
                    } else {

                      echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
                    }
              } else {     
               
                  echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_buku.php';</script>";
              }
    } else {

      $query  = "UPDATE buku SET judul = '$judul', pengarang = '$pengarang', penerbit = '$penerbit'";
      $query .= "WHERE id = '$id'";
      $result = mysqli_query($koneksi, $query);
      // periska query apakah ada error
      if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
      } else {
      
          echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
      }
    }

 

