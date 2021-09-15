<?php
    $db = mysqli_connect("localhost", "root", "", "praktik industri");

    function query($query) {
        global $db;
        $result = mysqli_query($db, $query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    function tambah($data) {
        global $db;
        $tanggal = htmlspecialchars($data["tanggal"]);
        $pukul = htmlspecialchars($data["pukul"]);
        $judul = htmlspecialchars($data["judul"]);
        $sub = htmlspecialchars($data["sub"]);
        $gambar = upload();
        if(!$gambar){
            return false;
        }
        $query = "INSERT INTO mahasiswa
                    VALUES
                ('', '$tanggal', '$pukul', '$judul', '$sub', '$gambar')
            ";
        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }

    function upload(){
        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];
        if($error === 4){
            echo "<script>
                    alert('pilih gambar terlebuh dahulu!');
                    </script>";
            return false;
        }
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if(!in_array($ekstensiGambar, $ekstensiGambarValid)) {
                echo "<script>
                        alert('yang anda upload bukan gambar!');
                        </script>";
                return false;
        }

        if($ukuranFile > 1000000) {
            echo "<script>
                    alert('ukuran gambar terlalu besar!');
                    </script>";
            return false;
        }
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru.= $ekstensiGambar;
        move_uploaded_file($tmpName, 'assets/img/data-upload-gambar/'. $namaFileBaru);
        return $namaFileBaru;
    }

    function hapus($id){
        global $db;
        mysqli_query($db, "DELETE FROM mahasiswa WHERE id = $id");
        return mysqli_affected_rows($db);
    }


    function ubah($data){
        global $db;
        $id = $data["id"];
        $tanggal = htmlspecialchars($data["tanggal"]);
        $pukul = htmlspecialchars($data["pukul"]);
        $judul = htmlspecialchars($data["judul"]);
        $sub = htmlspecialchars($data["sub"]);
        $gambarLama = htmlspecialchars($data["gambarLama"]);
        if($_FILES['gambar']['error'] === 4) {
            $gambar = $gambarLama;
        } else {
            $gambar = upload();
        }
        $query = "UPDATE mahasiswa SET 
                   tanggal='$tanggal',
                   pukul='$pukul',
                   judul='$judul',
                    sub='$sub',
                    gambar='$gambar'
                    WHERE id = $id
                    ";
        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }

    function cari($keyword){
        $query = "SELECT * FROM mahasiswa
                    WHERE 
                    judul LIKE '%$keyword%' OR
                    tanggal LIKE '%$keyword%' OR
                    pukul LIKE '%$keyword%' OR
                    sub LIKE '%$keyword%' OR
                    gambar LIKE '%$keyword%' 
                    ";
        return query($query);
    }

    function registrasi($data){
        global $db;
        $nim = stripslashes($data["nim"]);
        $nama = htmlspecialchars($data["nama"]);
        $email = htmlspecialchars($data["email"]);
        $program = htmlspecialchars($data["program"]);
        $prodi = htmlspecialchars($data["prodi"]);
        $angkatan = htmlspecialchars($data["angkatan"]);
        $perusahaan = htmlspecialchars($data["perusahaan"]);
        $password = mysqli_real_escape_string($db, $data["password"]);
        $password2 = mysqli_real_escape_string($db, $data["password2"]);      
        $result = mysqli_query($db, "SELECT nim FROM user WHERE nim = '$nim'");
        if (mysqli_fetch_assoc($result)){
            echo "<script>
                    alert('nim sudah terdaftar!')
                </script>";
            return false;
        }
        if($password !== $password2) {
            echo "<script>
                    alert('konfirmasi password tidak sesuai!');
                    </script>";
            return false;
        }
        $password = password_hash($password, PASSWORD_DEFAULT);
        mysqli_query($db, "INSERT INTO user VALUES('','$nim','$nama','$email','$program', '$prodi','$angkatan', '$perusahaan','$password') ");
        return mysqli_affected_rows($db);    
    }
?>