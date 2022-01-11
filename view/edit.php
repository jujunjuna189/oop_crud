<?php
include '../controller/SekolahController.php';

$controller = new SekolahController();
$data = $controller->edit();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uts Data Sekolah Ujun Junaedi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Online -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</head>

<body>

    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Edit Data Sekolah
                    </div>
                    <form action="<?= $controller->updateData() ?>" method="post">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <small>Nomor Induk Sekolah</small>
                                        <input type="number" name="nis" id="nis" class="form-control" placeholder="..." required value="<?= $data['nis'] ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <small>Nama Sekolah</small>
                                        <input type="text" name="nama_sekolah" id="nama_sekolah" class="form-control" placeholder="..." required value="<?= $data['nama_sekolah'] ?>">
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <div class="form-group">
                                        <small>Alamat Sekolah</small>
                                        <textarea name="alamat_sekolah" id="alamat_sekolah" cols="30" rows="3" class="form-control" placeholder="..." required><?= $data['alamat_sekolah'] ?></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <div class="form-group">
                                        <small>Longitude</small>
                                        <input type="text" name="longitude" id="longitude" class="form-control" placeholder="..." required value="<?= $data['longitude'] ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <div class="form-group">
                                        <small>Latitude</small>
                                        <input type="text" name="latitude" id="latitude" class="form-control" placeholder="..." required value="<?= $data['latitude'] ?>">
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <div class="form-group">
                                        <small>Status</small>
                                        <div class="d-flex">
                                            <select name="status" id="status" class="form-control">
                                                <option>Choose Item</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <a href="content.php" class="btn bg-secondary text-white"><i class="bi bi-arrow-left"></i> Cancel</a>
                                    <div class="form-group float-end">
                                        <button type="submit" name="edit_data" class="btn bg-info"><i class="bi bi-folder-check"></i> Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(function() {
            show_status();
        });

        function show_status() {
            $.ajax({
                url: 'api.php',
                type: 'GET',
                async: false,
                dataType: 'json',
                success: function(data) {
                    let html = '';
                    $('#status').empty();
                    html += '<option value="<?= $data['status'] ?>"><?= $data['status'] ?></option>';
                    $.each(data, function(i, row) {
                        html += '<option value="' + row.status + '">' + row.status + '</option>';
                    });

                    $('#status').html(html);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }
    </script>

</body>

</html>