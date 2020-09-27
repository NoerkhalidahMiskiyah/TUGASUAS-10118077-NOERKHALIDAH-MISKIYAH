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
// $_POST[""]
$keyword = $_POST["provinsi"];
$link = "https://data.covid19.go.id/public/api/prov.json";
$result = get_CURL($link);

$provinsi = strtoupper($keyword);
switch ($provinsi) {
    case "DKI JAKARTA":
        $index = 0;
        break;
    case "JAWA TIMUR":
        $index = 1;
        break;
    case "JAWA TENGAH":
        $index = 2;
        break;
    case "JAWA BARAT":
        $index = 3;
        break;
    case "SULAWESI SELATAN":
        $index = 4;
        break;
    case "KALIMANTAN SELATAN":
        $index = 5;
        break;
    case "SUMATERA UTARA":
        $index = 6;
        break;
    case "BALI":
        $index = 7;
        break;
    case "KALIMANTAN TIMUR":
        $index = 8;
        break;
    case "RIAU":
        $index = 9;
        break;
    case "PAPUA":
        $index = 10;
        break;
    case "SUMATERA SELATAN":
        $index = 11;
        break;
    case "SUMATERA BARAT":
        $index = 12;
        break;
    case "BANTEN":
        $index = 13;
        break;
    case "SULAWESI UTARA":
        $index = 14;
        break;
    case "ACEH":
        $index = 15;
        break;
    case "KALIMANTAN TENGAH":
        $index = 16;
        break;
    case "NUSA TENGGARA BARAT":
        $index = 17;
        break;
    case "MALUKU":
        $index = 18;
        break;
    case "SULAWESI TENGGARA":
        $index = 19;
        break;
    case "GORONTALO":
        $index = 20;
        break;
    case "DAERAH ISTIMEWA YOGYAKARTA":
        $index = 21;
        break;
    case "KEPULAUAN RIAU":
        $index = 22;
        break;
    case "MALUKU UTARA":
        $index = 23;
        break;
    case "PAPUA BARAT":
        $index = 24;
        break;
    case "KALIMANTAN BARAT":
        $index = 25;
        break;
    case "LAMPUNG":
        $index = 26;
        break;
    case "BENGKULU":
        $index = 27;
        break;
    case "SULAWESI BARAT":
        $index = 28;
        break;
    case "KALIMANTAN UTARA":
        $index = 29;
        break;
    case "JAMBI":
        $index = 30;
        break;
    case "NUSA TENGGARA TIMUR":
        $index = 31;
        break;
    case "SULAWESI TENGAH":
        $index = 32;
        break;
    case "KEPULAUAN BANGKA BELITUNG":
        $index = 33;
        break;
    default:
        break;
}

$kasus = $result['list_data'][$index]['jumlah_kasus'];
$sembuh = $result['list_data'][$index]['jumlah_sembuh'];
$meninggal = $result['list_data'][$index]['jumlah_meninggal'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous" />
    <!-- MyCSS -->
    <link rel="stylesheet" href="css/style.css" />
    <title>Hasil Pencarian</title>
</head>

<body>
    <div class="container">
        <div class="row mt-4 justify-content-center">
            <h1><strong><?= $provinsi; ?></strong></h1>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md">
                        <div class="displaydata biru">
                            <div class="content">
                                <h3><strong><?= $kasus; ?></strong></h3>
                                <p>kasus</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="displaydata hijau">
                            <h3><strong><?= $sembuh; ?></strong></h3>
                            <p>Sembuh</p>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="displaydata merah">
                            <h3><strong><?= $meninggal; ?></strong></h3>
                            <p>meninggal</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>