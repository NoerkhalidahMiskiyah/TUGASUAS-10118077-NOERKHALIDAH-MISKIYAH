<?php
function get_CURL($url)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    curl_close($curl);

    return json_decode($result, true);
}
$result = get_CURL('https://dev.farizdotid.com/api/daerahindonesia/provinsi');
$provindex = $result['provinsi'];

?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA COVID-19</title>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <script src="asset/js/jquery-3.5.1.min.js"></script>
    <script src="asset/js/popper.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<title>PANTAUAN PENYEBARAN VIRUS CORONA -19 DI DUNIA</title>
</head>

<body>
    <div class="jumbotron jumbotron-fluid bg-primary text-white">
        <div class="container text-center">
            <h1 class="display-5">CORONA VIRUS</h1>
            <p class="lead">
                <h2>
                    PANTAUAN PENYEBARAN VIRUS COVID-19 DI DUNIA
                    <br> SECARA REAL - TIME
                </h2>
            </p>
        </div>
    </div>

    <style type="text/css">
        .box {
            padding: 5px 10px;
            border-radius: 10px;
        }
    </style>
    <!-- <div class="input-group mb-3">
                    <
                </div> -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">PENCARIAN BERDASARKAN PROVINSI</div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="result.php" method="POST">
                    <div class="input-group">

                        <select class="custom-select border-primary" id="inputGroupSelect04" name="provinsi">
                            <?php foreach ($provindex as $provinsi) : ?>
                                <option value="<?= $provinsi['nama']; ?>"><?= $provinsi['nama']; ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="submit">Search</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <div class="container">
        <div class="container mt-2">
            <div class="row">
                <div class="col-12">
                    <br>
                    <h6>TOTAL KESELURUHAN</h6><br>
                </div>
                <div class="col-3">
                    <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <p class="card-text">TOTAL POSITIF: <span id="totalPositif"></span></span></p>
                            <div class="icons">
                                <img src="img/plus.svg" alt="" srcset="" width="64">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <p class="card-text">TOTAL DIRAWAT: <span id="totalDirawat"></span></p>
                            <div class="icons">
                                <img src="img/download.jpeg" alt="" srcset="" width="64">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <p class="card-text">TOTAL SEMBUH: <span id="totalsembuh"></span></p>
                            <div class="icons">
                                <img src="img/images.jpeg" alt="" srcset="" width="64">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <p class="card-text">TOTAL MENINGGAL: <span id="totalmeninggal"></span></p>
                            <div class="icons">
                                <img src="img/i.jpeg" alt="" srcset="" width="64">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: "https://limitless-dawn-99899.herokuapp.com/https://data.covid19.go.id/public/api/update.json",
                success: function(result) {
                    $('#totalPositif').text(result.update.total.jumlah_positif);
                    $('#totalDirawat').text(result.update.total.jumlah_dirawat);
                    $('#totalsembuh').text(result.update.total.jumlah_sembuh);
                    $('#totalmeninggal').text(result.update.total.jumlah_meninggal);
                }
            });
        });
    </script>

    <footer class="bg-primary text-center text-black mt-5 bt-1 pb-2">
        Create by. Noerkhalidah Miskiyah - 10118077
    </footer>

</body>

</html>