<?php
	function cari($keyword){
        $search_key = strtolower($keyword);
		$kueri = "SELECT * FROM mahasiswa WHERE nama like '%".$search_key."%' ";
		return $kueri;
	}

    function update($nim_mhs){
 
        $nama = $_POST["nama"];
        $umur = $_POST["umur"];
        $nama_file= $_FILES['image']['name'];
        $temp_name=$_FILES['image']['tmp_name'];

        if($temp_name != "") {
            move_uploaded_file($temp_name, 'images/' . $nama_file);

            $kueri="UPDATE mahasiswa SET nama='$nama', umur='$umur', image='$nama_file' where nim='$nim_mhs' ";
        }else {
            $kueri="UPDATE mahasiswa SET nama='$nama', umur='$umur' WHERE nim='$nim_mhs'";
        }


        return $kueri;
    }


?>