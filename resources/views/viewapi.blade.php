<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Web Icon -->
    <link rel="icon" href="(BELUM DIISI)" type="image/icon type">

    <!-- Title Web -->
    <title>YuuBaca : API</title>

    <!-- Style -->

</head>

<body>

    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl leading-tight">
                {{ __('YuuBaca API') }}
            </h2>
        </x-slot>

        <!-- YuuBaca API-->
        <section id='api' class="s-api"></section>

        <div class="b-example-divider"></div>

        <div class="px-4 my-5 text-center">
            {{-- <h1 class="display-5 fw-bold">YuuBaca API</h1> --}}
            <div class="col-lg-6 mx-auto">
                <p class="lead my-4">
                    Kamu dapat mengimplementasikan Data YuuBaca seperti Data Buku dll kedalam proyek maupun aplikasi kamu.
                </p>
            </div>

            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-md-6">

                        <!-- api buku -->

                        <p class="text-start">API Buku</p>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" value="http://localhost/yuubaca/app/Api/data-api-buku.php" id="myInputBuku" readonly="readonly">
                            <button class="btn btn-outline-primary" type="button" onclick="myApiBuku()">Salin</button>
                        </div>

                        <script>
                            function myApiBuku() {
                                /* Get the text field */
                                var copyText = document.getElementById("myInputBuku");

                                /* Select the text field */
                                copyText.select();
                                copyText.setSelectionRange(0, 99999); /* For mobile devices */

                                /* Copy the text inside the text field */
                                document.execCommand("copy");

                                /* Alert the copied text */
                                alert("API YuuBaca Buku Berhasil disalin");
                            }
                        </script>

                        <!-- api kategori IPA -->

                        <p class="text-start">API Data Kategori IPA</p>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" value="http://localhost/yuubaca/app/Api/data-api-ipa.php" id="myInputKategoriIPA" readonly="readonly">
                            <button class="btn btn-outline-primary" type="button" onclick="myApiIPA()">Salin</button>
                        </div>

                        <script>
                            function myApiIPA() {
                                /* Get the text field */
                                var copyText = document.getElementById("myInputKategoriIPA");

                                /* Select the text field */
                                copyText.select();
                                copyText.setSelectionRange(0, 99999); /* For mobile devices */

                                /* Copy the text inside the text field */
                                document.execCommand("copy");

                                /* Alert the copied text */
                                alert("API YuuBaca Data Kategori IPA Berhasil disalin");
                            }
                        </script>

                        <!-- api kategori IPS -->

                        <p class="text-start">API Data Kategori IPS</p>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" value="http://localhost/yuubaca/app/Api/data-api-ips.php" id="myInputKategoriIPS" readonly="readonly">
                            <button class="btn btn-outline-primary" type="button" onclick="myApiIPS()">Salin</button>
                        </div>

                        <script>
                            function myApiIPS() {
                                /* Get the text field */
                                var copyText = document.getElementById("myInputKategoriIPS");

                                /* Select the text field */
                                copyText.select();
                                copyText.setSelectionRange(0, 99999); /* For mobile devices */

                                /* Copy the text inside the text field */
                                document.execCommand("copy");

                                /* Alert the copied text */
                                alert("API YuuBaca Data Kategori IPS Berhasil disalin");
                            }
                        </script>

                        <!-- api tingkatan SD -->

                        <p class="text-start">API Data Tingkatan SD</p>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" value="http://localhost/yuubaca/app/Api/data-api-sd.php" id="myInputTingkatanSD" readonly="readonly">
                            <button class="btn btn-outline-primary" type="button" onclick="myApiSD()">Salin</button>
                        </div>

                        <script>
                            function myApiSD() {
                                /* Get the text field */
                                var copyText = document.getElementById("myInputTingkatanSD");

                                /* Select the text field */
                                copyText.select();
                                copyText.setSelectionRange(0, 99999); /* For mobile devices */

                                /* Copy the text inside the text field */
                                document.execCommand("copy");

                                /* Alert the copied text */
                                alert("API YuuBaca Data Tingkatan SD Berhasil disalin");
                            }
                        </script>

                        <!-- api tingkatan SD -->

                        <p class="text-start">API Data Tingkatan SMP</p>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" value="http://localhost/yuubaca/app/Api/data-api-smp.php" id="myInputTingkatanSMP" readonly="readonly">
                            <button class="btn btn-outline-primary" type="button" onclick="myApiSMP()">Salin</button>
                        </div>

                        <script>
                            function myApiSMP() {
                                /* Get the text field */
                                var copyText = document.getElementById("myInputTingkatanSMP");

                                /* Select the text field */
                                copyText.select();
                                copyText.setSelectionRange(0, 99999); /* For mobile devices */

                                /* Copy the text inside the text field */
                                document.execCommand("copy");

                                /* Alert the copied text */
                                alert("API YuuBaca Data Tingkatan SMP Berhasil disalin");
                            }
                        </script>

                        <!-- api tingkatan SMA -->

                        <p class="text-start">API Data Tingkatan SMA</p>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" value="http://localhost/yuubaca/app/Api/data-api-sma.php" id="myInputTingkatanSMA" readonly="readonly">
                            <button class="btn btn-outline-primary" type="button" onclick="myApiSMA()">Salin</button>
                        </div>

                        <script>
                            function myApiSMA() {
                                /* Get the text field */
                                var copyText = document.getElementById("myInputTingkatanSMA");

                                /* Select the text field */
                                copyText.select();
                                copyText.setSelectionRange(0, 99999); /* For mobile devices */

                                /* Copy the text inside the text field */
                                document.execCommand("copy");

                                /* Alert the copied text */
                                alert("API YuuBaca Data Tingkatan SMA Berhasil disalin");
                            }
                        </script>

                        <!-- END API -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End YuuBaca API -->
    </x-app-layout>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>
