<?php
require 'connection.php';

//jika terdapat 'action' dan 'id' maka melakukan sesuatu
    if(isset($_GET['action']) && isset($_GET['id'])){
        $action = $_GET['action'];
        $id = $_GET['id'];

        switch($action){
            case 'delete':
                delete_data($id);
                break;
            case 'edit':
                echo "";
                break;
            default :
            echo "Aksi Tidak Didefinisikan";
        }

    }else{
        echo "Aksi dan ID tidak terdefinisi";
    }

    function delete_data($id){
        global $connection;
        $res = mysqli_query($connection, "DELETE FROM tb_person WHERE id = " .$id);

        if($res){
            header("Location: index.php?messages=Data berhasil dihapus");
            exit();
        }else{
            header("Location: index.php?messages=Data gagal dihapus");
            exit();
        }
    }

    function update($data){
        global $connection;

        $id = $data['id_person'];
        $nama = $connection->real_escape_string($data['txt_nama']);
        $ktp = $data['txt_ktp'];
        $alamat = $data['selectAlamat'];
        $tanggal = $data['txt_date'];

        //memformat tanggal
        $tanggalbaru = new DateTime($tanggal);
        $formated_tanggal = $tanggalbaru->format('Y-m-d');

        $query = "UPDATE tb_person SET
        nama = '$nama',
        ktp = '$ktp',
        alamat = $alamat,
        tgl_daftar = '$formated_tanggal'
        WHERE id = $id
        ";

        mysqli_query($connection, $query);
        return mysqli_affected_rows($connection);
    };


?>