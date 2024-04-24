<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Find My NIM</title>
    <link rel="stylesheet" href="./assets/vendor/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <script src="./assets/vendor/jquery/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body>
    <div class="container my-5">
        <form id="search-form" action="curl_action.php" method="post">
            <div class="mb-3">
                <input type="nim-nama" class="form-control" placeholder="Masukkan Nim atau Nama" name="nim-nama">
            </div>
            <input type="submit" class="btn btn-primary">
        </form>

        <div class="result-table">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#search-form').submit(function(e) {
                let nimNama = $(this).find('input').val();
                // buka https://siakad.polinema.ac.id/ajax/ms_mhs/cari_mhs?q=${nimNama} kemudian ambil data dalam bentuk html
            });
        });
    </script>
    <script src="./assets/vendor/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>