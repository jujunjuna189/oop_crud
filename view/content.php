<?php
include '../controller/SekolahController.php';

$controller = new SekolahController();
$hasil = $controller->index();
$notif = $controller->setting_notif();
$no = 1;

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
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</head>

<body>

    <!-- Modal -->
    <div class="modal fade" id="modalLogout" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">Logout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= $controller->logout() ?>" method="post">
                    <div class="modal-body">
                        <h6>Apakah anda yakin ingin keluar aplikasi<strong><span class="grt"></span></strong> ?</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="logout" class="btn btn-danger">Logout</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12 text-end mb-4">
                <a class="badge bg-info text-decoration-none p-2 text-dark" data-bs-toggle="modal" href="#" data-bs-target="#modalLogout" role="button">Logout</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">

                <!-- Notifikasi -->
                <?php if (isset($_GET['action'])) : ?>
                    <div class="alert alert-<?= $notif['bg'] ?> alert-dismissible fade show" role="alert">
                        <strong>Berhasil</strong> <?= $notif['action'] == 'Login' ? $notif['action'] : $notif['action'] . ' Data.' ?>
                        <a href="content.php" class="btn-close"></a>
                    </div>
                <?php endif ?>


                <div class="card">
                    <div class="card-header bg-white">
                        <strong>Data Sekolah</strong>
                        <div class="float-end">
                            <a href="add.php" class="badge bg-info text-dark text-decoration-none p-2"><i class="bi bi-plus"></i> Add Data</a>
                        </div>
                        <div class="float-end px-2">
                            <a href="report_view.php" class="badge bg-info text-dark text-decoration-none p-2"><i class="bi bi-plus"></i> Cetak Laporan</a>
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
                                        <th>Status</th>
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
                                            <td><?= $val['status'] ?></td>
                                            <td>
                                                <a href="view.php?id=<?= $val['id'] ?>" class="badge bg-info text-dark text-decoration-none p-2"><i class="bi bi-eye"></i></a>
                                                <a href="edit.php?id=<?= $val['id'] ?>" class="badge bg-warning text-dark text-decoration-none p-2"><i class="bi bi-pen"></i></a>
                                                <a href="#" class="badge bg-danger text-white text-decoration-none p-2 deleteDataBtn" data-id="<?= $val['id'] ?>"><i class="bi bi-trash"></i></a>
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

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a href="#" id="deleteData" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <script>
        let idData = '';
        $('.deleteDataBtn').on('click', function() {
            let id = $(this).data('id');
            idData = id;
            $('#deleteModal').modal('show');
        });

        $('#deleteData').on('click', function() {
            $.ajax({
                url: 'apiDeleteData.php',
                type: 'POST',
                data: {
                    delete: 'Delete',
                    id: idData,
                },
                dataType: 'json',
                success: function(data) {
                    alert('Success delete data');
                    location.href = "content.php?action=Delete&&status=success";
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
    </script>

</body>

</html>