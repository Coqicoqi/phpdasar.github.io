<?php
            $conn = mysqli_connect("localhost", "root", "", "phpdasar2");
            function query($query) {
                global $conn;
                $result = mysqli_query($conn, $query);
                $rows = [];
                while($row = mysqli_fetch_assoc($result)){
                    $rows [] = $row;
                }
                return $rows;
} 



function tambah($data){
    global $conn;
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data ["nama"]);
    $prodi = htmlspecialchars($data ["prodi"]);
    
    //upload gambar
    $gambar = upload();

    if ( !$gambar ){
        return false;
    }

    //query
    $query = "INSERT INTO mahasiswa
    VALUES
    ('', '$nama', '$nim', '$prodi', '$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function upload() {
    $namafile = $_FILES['gambar']['name'];
    $ukuranfile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];


//cek apakah tidak ada gambar yang di upload
    if ( $error === 4 ) {
    echo "<script>
        alert('untuk gambar pilih file jpg,jpeg,png,gif!');
        </script>";
        return false;
    }

    //cek apakah yang diupload adalah gambar
    $ekstensigambarValid = ['jpg', 'jpeg', 'png', 'gif'];
    $ekstensiGambar = explode('.', $namafile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));


        if( !in_array($ekstensiGambar, $ekstensigambarValid) ) {
            echo "<script>
            alert('untuk gambar pilih file jpg, jpeg, png, gif!');
            </script>";
            return false;
        }

        // cek ukuran file
        if( $ukuranfile > 2000000 ) {
            echo "<script>
            alert('ukuran file terlalu besar);
            </script>";
            return false;
        }

        //lolos , gambar siap diupload
        //generate nama gambar baru
        $namafilebaru = uniqid();
        $namafilebaru .= '.';
        $namafilebaru .= $ekstensiGambar;

        move_uploaded_file($tmpName,'img/' . $namafilebaru);

        return $namafilebaru;

}


/// resapi kode agar pa...
    function ubah($data) {
        global $conn;

        $id = $data["id"];
        $nim = htmlspecialchars($data["nim"]);
        $nama = htmlspecialchars($data ["nama"]);
        $prodi = htmlspecialchars($data ["prodi"]);
        $gambarlama = htmlspecialchars($data ["gambarlama"]);

        // cek apakah user mengubah gambar atau tidak
        if( $_FILES['gambar']['error'] === 4 ) {
            $gambar = $gambarlama;
        }else{
            $gambar = upload() ;
        }

        $query = "UPDATE mahasiswa SET
                        nim = '$nim',
                        nama = '$nama',
                        prodi = '$prodi',
                        gambar = '$gambar' 
                        WHERE id = $id
                        ";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }


function hapus($id) {
    global $conn;
    
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
    
    return mysqli_affected_rows($conn);
}

function cari($keyword) {
    $query = "SELECT * FROM mahasiswa
                WHERE
                nama LIKE '%$keyword%'
                OR nim LIKE '%$keyword%'
                OR prodi LIKE'%$keyword%'
                ";
                
                return query($query);
}

function registrasi($data) {
                            global $conn;

                            $username = strtolower(stripslashes($data["username"]));
                            $password = mysqli_real_escape_string($conn, $data["password"]);
                            $password2 = mysqli_real_escape_string($conn, $data["password2"]);

                            //cek username sudah ada atau belum
                            $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username' ");

                            if( mysqli_fetch_assoc($result) ){
                                echo "<script>
                                alert('username sudah ada');
                                </script>";
                                return false;
                            }


                            //cek password

                            if( $password !== $password2 ) {
                                echo "<script>
                                alert('konfirmasi password tidak sesuai');
                                </script>";
                                return false;
                            }
                            //cek ankripsi password
                            // MD5 not yet
                            $password = password_hash($password, PASSWORD_DEFAULT);

                            // tambahkan user baru
                            mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

                            return mysqli_affected_rows($conn);

                            }





?>