<?php
    $_GET['action'] = 'edit';
    require 'function.php';

    $id_person = $_GET['id'];

    $data_person = myquery("SELECT * FROM tb_person WHERE id= $id_person");

    $data_alamat = myquery("SELECT * FROM tb_alamat");

    if(isset($_POST['submit_update'])){
        //Kondisi return true / false
        if(update($_POST) > 0){
            echo "<script>alert('Data Berhasil Diubah');
            document.location.href = 'index.php';
            </script>";
        }else{
            echo "<script>alert('Data Gagal Diubah');
            </script>";
        }
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous"
    />
    <title>Form Update</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <h3 class="mt-4 mb-2">Formulir Update</h3>
                <a href="./index.php" class="d-block mb-4" >Kembali</a>

                <?php if(isset($err)): ?>
                <p><?= $err; ?></p>
                <?php endif ?>

                <div class="card">
                    <div class="card-body">
                        <form method="POST">
                        <input type="hidden" value = "<?= $id_person?>" value = <?= $id_person?> name="id_person">
                            <div class="mb-3">
                                <label for="">Nama</label>
                                <input type="text" name="txt_nama" class="form-control" placeholder="Input Nama Warga" autocomplete="off" value="<?=$data_person[0]['nama'];?>"/>
                            </div>
                            
                            <div class="mb-3">
                                <label for="">KTP</label>
                                <input type="text" name="txt_ktp" class="form-control" placeholder="Input nomor KTP" autocomplete="off" value="<?=$data_person[0]['ktp'];?>"/>
                            </div>
                            
                            <div class="mb-3">
                                <label >Pilih Alamat</label>
                                <select class="form-select" name="selectAlamat">
                                    <?php foreach($data_alamat as $option): ?>
                                        <option 
                                        value="<?= $option['id'] ?>" 
                                        <?= ($data_person[0]['alamat'] == $option['id'] ? 'selected' : '') ?>>
                                        <?= $option['nomor_rumah']?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                            </div>
                                
                                <div class="mb-3">
                                    <label for="">Tanggal</label>
                                    <input type="date" name="txt_date" class="form-control" placeholder="---- -- --" autocomplete="off" value="<?=$data_person[0]['tgl_daftar'];?>"/>
                                </div>
                                
                                <div class="mb-3">
                                    <button class="btn btn-primary" name="submit_update">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"
    ></script>
</body>
</html>