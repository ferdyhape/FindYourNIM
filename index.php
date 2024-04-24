<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FindYourNIM</title>
    <link rel="stylesheet" href="./assets/vendor/tailwind/tailwind.min.css">
    <script src="./assets/vendor/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="./assets/vendor/datatable/jquery.dataTables.min.css">
    <script src="./assets/vendor/datatable/jquery.dataTables.min.js"></script>
</head>

<body>
    <div class="mx-auto w-5/6 md:w-4/6 my-5 pb-12">

        <!-- header  -->
        <div class="flex justify-between my-4 items-center">
            <h1 class="text-center font-medium text-3xl">FindYourNIM</h1>
            <div class="card-header text-muted flex gap-2 justify-between">
                <a href="https://github.com/ferdyhape" class="my-auto text-dark" target="_blank">
                    <img src="./assets/icon/github.svg" alt="" srcset="">
                </a>
                <a href="https://www.linkedin.com/in/ferdyhape/" class="my-auto text-dark" target="_blank">
                    <img src="./assets/icon/linkedin.svg" alt="" srcset="">
                </a>
                <a href="https://www.instagram.com/ferdyhape/" class="my-auto text-dark" target="_blank">
                    <img src="./assets/icon/instagram.svg" alt="" srcset="">
                </a>
            </div>
        </div>

        <!-- form input nim nama -->
        <form id="search-form" method="post" class="w-full">
            <div class="flex justify-between">
                <input type="text" class="w-full border border-gray-300 rounded-md py-2 px-4 mr-3" placeholder="Masukkan Inisiasi Nim atau Nama" name="nim-nama">
                <input type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" value="Cari">
            </div>
        </form>


        <!-- result table -->
        <div class="result-table mt-5 table-responsive">
            <div id="loading" style="display: none" class="flex justify-center items-center gap-x-3">
                <img src="./assets/icon/loading.gif" alt="Loading...">
                <h3>Loading ...</h3>
            </div>
            <table id="result-table" class="table">
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


        <!-- footer -->
        <div class="fixed bottom-0 w-5/6 md:w-4/6 bg-gradient-to-r from-blue-300 to-blue-400 p-3 text-center rounded-t-lg">
            <p class="text-sm">
                Another of my "Gabut Project" - <a href="https://cekkompen.isdeilabs.com/" class="text-blue-900 underline font-bold" target="_blank">CekKompen</a>
            </p>
        </div>

    </div>

    <script>
        $(document).ready(function() {
            $('#result-table').css('display', 'none');
            $('#search-form').submit(function(e) {
                e.preventDefault();
                let nimNama = $(this).find('input[name="nim-nama"]').val();
                // if table exist then destroy and hide
                if ($.fn.DataTable.isDataTable('#result-table')) {
                    $('#result-table').DataTable().destroy();
                    $('#result-table').css('display', 'none');
                }
                $('#loading').show();
                $.ajax({
                    url: 'curl_action.php',
                    type: 'POST',
                    data: {
                        'nim-nama': nimNama
                    },
                    success: function(response) {
                        // Hide loading indicator
                        $('#loading').hide();
                        let data = JSON.parse(response);
                        $('#result-table tbody').empty();
                        $.each(data, function(index, item) {
                            let textParts = item.text.split(" - ");
                            let nim = textParts[0];
                            let nama = textParts[1];
                            $('#result-table tbody').append('<tr><td>' + nim + '</td><td>' + nama + '</td></tr>');
                        });

                        // Show the table
                        $('#result-table').css('display', 'table');

                        // Initialize DataTables
                        $('#result-table').DataTable();
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        // Hide loading indicator
                        $('#loading').hide();
                    }
                });
            });
        });
    </script>
</body>

</html>