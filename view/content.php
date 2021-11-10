<?php
include '../controller/SekolahController.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uts Data Sekolah</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Online -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

</head>

<body>

    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12">

                <!-- Notifikasi -->
                <?php if (isset($_GET['action'])) : ?>
                    <div class="alert alert-<?= $bg ?> alert-dismissible fade show" role="alert">
                        <strong>Berhasil</strong> <?= $action ?> Data.
                        <a href="index.php" class="btn-close"></a>
                    </div>
                <?php endif ?>


                <div class="card">
                    <div class="card-header bg-white">
                        <strong>Data Sekolah</strong>
                        <div class="float-end">
                            <a href="action/add.php" class="badge bg-info text-dark text-decoration-none p-2"><i class="bi bi-plus"></i> Add Data</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped w-100">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>NIS</th>
                                        <th>Nama Sekolah</th>
                                        <th>Alamat Sekolah</th>
                                        <th>Longitude</th>
                                        <th>Latitude</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($hasil as $val) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $val['nis'] ?></td>
                                            <td><?= $val['nama_sekolah'] ?></td>
                                            <td><?= $val['alamat_sekolah'] ?></td>
                                            <td><?= $val['longitude'] ?></td>
                                            <td><?= $val['latitude'] ?></td>
                                            <td>
                                                <a href="action/view.php?id=<?= $val['id'] ?>" class="badge bg-info text-dark text-decoration-none p-2"><i class="bi bi-eye"></i></a>
                                                <a href="action/edit.php?id=<?= $val['id'] ?>" class="badge bg-warning text-dark text-decoration-none p-2"><i class="bi bi-pen"></i></a>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $val['id'] ?>" class="badge bg-danger text-white text-decoration-none p-2"><i class="bi bi-trash"></i></a>

                                                <!-- Modal -->
                                                <div class="modal fade" id="deleteModal<?= $val['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Delete Data Surat</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h6>Apakah anda yakin ingin menghapus data ini<strong><span class="grt"></span></strong> ?</h6>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                <a href="action/action_proses.php?id=<?= $val['id'] ?>" class="btn btn-danger">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>