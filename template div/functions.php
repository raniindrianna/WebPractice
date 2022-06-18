<?php
function cari($keyword)
{
    $search_key = strtolower($keyword);
    $kueri = "SELECT * FROM mahasiswa WHERE nama like '%" . $search_key . "%' ";
    return $kueri;
}

function update($nim_mhs)
{

    $nama = $_POST["nama"];
    $umur = $_POST["umur"];
    $namaFile = $_FILES['image']['name']; //'foto' didapat dari name di form
    $tempName = $_FILES['image']['tmp_name'];

    //cek apakah foto memenuhi syarat


    if ($tempName != "") {
        move_uploaded_file($tempName, 'images/' . $namaFile);

        //cek apakah yang diupload adalah gambar
        $ekstensiGambarYangValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        //kalau tidak ada didalam ekstensi yang valid maka berikan pesan
        if (!in_array($ekstensiGambar, $ekstensiGambarYangValid)) {
            echo "<script>
                    alert('yang anda upload bukan gambar');
                </script>";
            return false;
        }

        $kueri = "UPDATE mahasiswa SET  nama='$nama', umur='$umur', foto='$namaFile' where nim='$nim_mhs' ";
    } else {
        $kueri = "UPDATE mahasiswa SET  nama='$nama', umur='$umur' where nim='$nim_mhs' ";
    }





    return $kueri;
}
