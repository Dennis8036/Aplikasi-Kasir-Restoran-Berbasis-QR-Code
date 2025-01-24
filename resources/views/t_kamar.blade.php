<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <!-- Include your CSS files here -->
    <link rel="stylesheet" href="path/to/your/styles.css">
    <style>
        .card {
            margin: 20px; /* Adjust margin as needed */
            padding: 20px; /* Add padding to the card */
            border-radius: 8px; /* Optional: for rounded corners */
            box-shadow: 0 2px 4px rgba(0,0,0,0.1); /* Optional: for shadow effect */
        }
        .table-responsive {
            overflow-x: auto; /* Allow horizontal scroll if needed */
        }
        .table {
            min-width: 1300px; /* Ensure table is wide enough */
        }
    </style>
</head>
<body>
    <!-- Sidebar start -->
    <!-- Your sidebar code here -->
    <!-- Sidebar end -->

    <!-- Content body start -->

        <!-- row -->

       
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"></h4>

                           
                                <table class="table">
                                <!-- General Form Elements -->
                                <form action="{{ asset('Home/aksi_t_kamar') }}" method="POST" enctype="multipart/form-data">
@csrf

                                    <div class="form-group row">
                                        <label for="inputText" class="col-sm-2 col-form-label">Lantai</label>
                                        <div class="col-sm-10">
                                             <select  type="select" class="form-control" name="lantai" required>
               <option>Pilih</option>
               <option value="1">1</option>
               <option value="2">2</option>
                <option value="3">3</option>
             </select>
                                        </div>
                                    </div>

                                      <div class="form-group row">
                                        <label for="inputText" class="col-sm-2 col-form-label">No Kamar</label>
                                        <div class="col-sm-10">
                                            <input type="text" placeholder="No Kamar" class="form-control" name='kamar'required>
                                        </div>
                                    </div>
                                    
<div class="form-group row">
    <label for="inputText" class="col-sm-2 col-form-label">Harga / Bulan</label>
    <div class="col-sm-10">
        <input type="text" id="harga_bulan" placeholder="Tuliskan Nominal Uang" class="form-control" name="hb" required>
    </div>
</div>

<div class="form-group row">
    <label for="inputText" class="col-sm-2 col-form-label">Harga / Tahun</label>
    <div class="col-sm-10">
        <input type="text" id="harga_tahun" placeholder="Tuliskan Nominal Uang" class="form-control" name="ht" required>
    </div>
</div>


                                    
                                    <div class="form-group row">
                                        <label for="inputText" class="col-sm-2 col-form-label">Deskripsi Kamar</label>
                                        <div class="col-sm-10">
                                            <input type="text" placeholder="Deskripsi Kamar" class="form-control" name='deskripsi_kamar' required>
                                        </div>
                                    </div>


                                                                       <div class="form-group row">
                                       <label for="inputFile" class="col-sm-2 col-form-label">Foto Kamar</label>
                                       <div class="col-sm-10">
                                           <input type="file" class="form-control" name="foto_kamar" id="inputFile" required>
                                       </div>
                                   </div>


                                    <div class="form-group row">
                                        <label for="inputText" class="col-sm-2 col-form-label">Status Kamar</label>
                                        <div class="col-sm-10">
                                             <select  type="select" class="form-control" name="status_kamar" required>
               <option>Pilih</option>
               <option value="Sudah Berpenghuni">Berpenghuni</option>
               <option value="Belum Berpenghuni">Belum Berpenghuni</option>
             </select>
                                        </div>
                                    </div>

                                    
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </table>
                        </div>
                    </div>
                                <!-- End General Form Elements -->

                                <script>
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split   = number_string.split(','),
            sisa    = split[0].length % 3,
            rupiah  = split[0].substr(0, sisa),
            ribuan  = split[0].substr(sisa).match(/\d{3}/g);
        
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix === undefined ? rupiah : (rupiah ? 'RP ' + rupiah : '');
    }

    // Event listener untuk harga per bulan
    document.getElementById('harga_bulan').addEventListener('keyup', function(e) {
        this.value = formatRupiah(this.value, 'RP');
    });

    // Event listener untuk harga per tahun
    document.getElementById('harga_tahun').addEventListener('keyup', function(e) {
        this.value = formatRupiah(this.value, 'RP');
    });
</script>
