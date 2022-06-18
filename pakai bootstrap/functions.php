<?php
	function cari($keyword){
        $search_key = strtolower($keyword);
		$kueri = "SELECT * FROM mahasiswa WHERE nama like '%".$search_key."%' ";
		return $kueri;
	}

    function update($nim_mhs){
 
        $nama = $_POST["nama"];
        $umur = $_POST["umur"];

        $kueri = "UPDATE mahasiswa SET  nama='$nama', umur='$umur' where nim='$nim_mhs' ";

        return $kueri;
    }
