<?php
      //koneksi ke database, username,password  dan namadatabase menyesuaikan 
      mysql_connect('localhost', 'root');
      mysql_select_db('dbsekolah');
 
      //memanggil file excel_reader
      require "excel_reader.php";
      if(isset($_POST['submit'])){
      $target = basename($_FILES['inputdata']['name']) ;
      move_uploaded_file($_FILES['inputdata']['tmp_name'], $target);
      // tambahkan baris berikut untuk mencegah error is not readable
      chmod($_FILES['inputdata']['name'],0777);
      $data = new Spreadsheet_Excel_Reader($_FILES['inputdata']['name'],false);
    
      //start sheet
      //    menghitung jumlah baris file xls
      $baris = $data->rowcount($sheet_index=0); //Sheet1
      //    jika kosongkan data dicentang jalankan kode berikut
      $drop = isset( $_POST["drop"] ) ? $_POST["drop"] : 1 ;
      if($drop == 1){
      //             kosongkan tabel data_sd
             $truncate ="TRUNCATE TABLE guru";
             $truncate ="TRUNCATE TABLE siswa";
             $truncate ="TRUNCATE TABLE prestasi";
             mysql_query($truncate);
      };
      //    import data excel mulai baris ke-2 (karena tabel xls ada header pada baris 1)
      for ($i=2; $i<=$baris; $i++) //data dibaca baris ke-1
      {
      //       membaca data (kolom ke-1 sd terakhir)
      $nbm              = $data->val($i, 1,0);
      $nama             = $data->val($i, 2,0);
      $bidang           = $data->val($i, 3,0);
      $tempat_lahir     = $data->val($i, 4,0);
      $tanggal_lahir    = $data->val($i, 5,0);
      $email            = $data->val($i, 6,0);
      $alamat           = $data->val($i, 7,0);
      $query = "INSERT into guru (nbm,nama,bidang,tempat_lahir,tanggal_lahir,email,alamat)values('$nbm','$nama','$bidang','$tempat_lahir','$tanggal_lahir','$email','$alamat')";
      $hasil = mysql_query($query);
      }//start end

      //start sheet
      $baris = $data->rowcount($sheet_index=1);//sheet 2
      for ($i=2; $i<=$baris; $i++) //data dibaca baris ke-1
      {
      //membaca data (kolom ke-1 sd terakhir)
      $tahun            = $data->val($i, 1,1);
      $kelas            = $data->val($i, 2,1);
      $jurusan          = $data->val($i, 3,1);
      $putra            = $data->val($i, 4,1);
      $putri            = $data->val($i, 5,1);
      $query = "INSERT into siswa (tahun,kelas,jurusan,putra,putri)values('$tahun','$kelas','$jurusan','$putra','$putri')";
      $hasil = mysql_query($query);
      }//end sheet

      //start sheet
      $baris = $data->rowcount($sheet_index=2);//sheet 3
      for ($i=2; $i<=$baris; $i++) //data dibaca baris ke-2
      {
      //membaca data (kolom ke-1 sd terakhir)
      $tahun            = $data->val($i, 1,2);
      $jenis            = $data->val($i, 2,2);
      $tingkat          = $data->val($i, 3,2);
      $juara            = $data->val($i, 4,2);
      $query = "INSERT into prestasi (tahun,jenis,tingkat,juara)values('$tahun','$jenis','$tingkat','$juara')";
      $hasil = mysql_query($query);
      }//end sheet

      if(!$hasil){
      //          jika import gagal
          die(mysql_error());
      }else{ 
      //          jika impor berhasil
          echo 
          "<script> 
            alert('Data Berhasil Diimpor');
            window.location.assign('index.php');
           </script>";
      }
    
      //    hapus file xls yang udah dibaca
      unlink($_FILES['inputdata']['name']);
      }
      ?>