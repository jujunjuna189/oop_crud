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
    <title>View</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>

    <div class="card float-end m-3">
        <div class="card-body">
            <table class="border-0">
                <tr>
                    <th>Nama Sekolah</th>
                    <td>:</td>
                    <td> <?= $data['nama_sekolah'] ?></td>
                </tr>
                <tr>
                    <th>Longitude</th>
                    <td>:</td>
                    <td> <?= $data['longitude'] ?></td>
                </tr>
                <tr>
                    <th>Latitude</th>
                    <td>:</td>
                    <td> <?= $data['latitude'] ?></td>
                </tr>
                <tr>
                    <th>Alamat Sekolah</th>
                    <td colspan="2">:</td>
                </tr>
                <tr>
                    <td colspan="3"> <?= $data['alamat_sekolah'] ?></td>
                </tr>
            </table>
        </div>
    </div>


    <iframe class="" src="https://maps.google.com/maps?q=<?= $data['latitude'] ?>,<?= $data['longitude'] ?>&hl=id&z=14&amp;output=embed" frameborder="0" style="position:fixed; top:0; bottom:0; left:0; right:0; width:100%; height:100%; z-index:-1" allowfullscreen=""></iframe>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>