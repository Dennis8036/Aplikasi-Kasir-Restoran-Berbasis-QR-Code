<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kamar</title>
    <!-- Include your CSS files here -->
    <link rel="stylesheet" href="path/to/your/styles.css">
    <style>
        .btn-success {
            margin-bottom: 20px;
        }
        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            justify-content: center;
        }
        .card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: translateY(-10px);
        }
        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .card-body {
            padding: 20px;
        }
        .card-footer {
            padding: 15px;
            background-color: #f9f9f9;
            text-align: center;
            border-top: 1px solid #ddd;
        }
        .btn {
            margin: 5px;
        }
    </style>
</head>
<body>
    <!-- Sidebar start -->
    <!-- Your sidebar code here -->
    <!-- Sidebar end -->

    <!-- Content body start -->
    <div class="container">
        <h4 class="card-title"></h4>
<!--         <?php if(session()->get('id_level') == 1) { ?>
        <a href="{{ asset('Home/t_kamar') }}">
            <button class="btn btn-warning ti-plus"
        data-toggle="tooltip"
        data-placement="top"
        title="Tambah Kamar"
            ></button>
        </a>
        <?php } ?> -->
        <input type="text" class="form-control" id="navbar-search-input" placeholder="Cari Nomor Kamar" aria-label="search" aria-describedby="search">
        <br>
        <div class="card-container" id="kamar-container">
            <?php foreach ($kamar as $item) { ?>
            <div class="card kamar-card" data-no_kamar="<?= $item->no_kamar ?>">
                <img src="{{ asset('images/img/'.$item->foto_kamar) }}" alt="Foto Kamar">
                <div class="card-body">
                    <h5 class="card-title">Kamar No. <?= $item->no_kamar ?></h5>
                    <p class="card-text"><strong>Lantai:</strong> <?= $item->lantai ?></p>
<p class="card-text">
    <strong>Harga per Bulan:</strong> RP <?= number_format(is_numeric($item->harga_per_bulan) ? $item->harga_per_bulan : 0, 0, ',', '.') ?>
</p>

<p class="card-text">
    <strong>Harga per Tahun:</strong> RP <?= number_format(is_numeric($item->harga_per_tahun) ? $item->harga_per_tahun : 0, 0, ',', '.') ?>
</p>




                    <p class="card-text"><strong>Deskripsi:</strong> <?= $item->deskripsi_kamar ?></p>
                    <p class="card-text">
                        <?php if ($item->status_kamar == 'Sudah Berpenghuni') { ?>
                            <span class="badge badge-success">Berpenghuni</span>
                        <?php } else { ?>
                            <span class="badge badge-danger">Belum Berpenghuni</span>
                        <?php } ?>
                    </p>
                </div>
                <div class="card-footer">
<?php if(session()->get('id_level') == 1 || (session()->get('id_level') == 2 && $item->status_kamar == 'Belum Berpenghuni')) { ?>
    <a href="{{ asset('Home/t_penghuni/'. $item->id_kamar) }}">
        <button class="btn btn-success ti-plus"
        data-toggle="tooltip"
        data-placement="top"
        title="Sewa"
        ></button>
    </a>
<?php } ?>

                    <?php if(session()->get('id_level') == 1) { ?>
                    <button class="btn btn-primary ti-pencil" 
                        data-toggle="modal" 
                        data-target="#editModal" 
                        data-id="<?= $item->id_kamar ?>"
                        data-lantai="<?= $item->lantai ?>"
                        data-no_kamar="<?= $item->no_kamar ?>"
                        data-harga_per_bulan="<?= $item->harga_per_bulan ?>"
                        data-harga_per_tahun="<?= $item->harga_per_tahun ?>"
                        data-deskripsi_kamar="<?= $item->deskripsi_kamar ?>"
                        data-foto_kamar="<?= $item->foto_kamar ?>"
                        data-status_kamar="<?= $item->status_kamar ?>"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Edit"></button>
                    <a href="{{ asset('Home/hapus_kamar/'.$item->id_kamar)}}">
                        <button class="btn btn-danger ti-trash"
                            data-toggle="tooltip"
                            data-placement="top"
                            title="Hapus"></button>
                    </a>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Kamar</h5>
                    <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm" action="{{ asset('Home/aksi_e_kamar') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="" id="id" name="id_kamar">
                        <div class="mb-3">
                    
                            <label for="edit_lantai" class="form-label">Lantai</label>
                            <input type="text" class="form-control" value="" id="edit_lantai" name="lantai" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="edit_no_kamar" class="form-label">No Kamar</label>
                            <input type="text" class="form-control" value="" id="edit_no_kamar" name="no_kamar" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="edit_harga_per_bulan" class="form-label">Harga per Bulan</label>
                            <input type="text" class="form-control" value="" id="edit_harga_per_bulan" name="harga_per_bulan" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_harga_per_tahun" class="form-label">Harga per Tahun</label>
                            <input type="text" class="form-control" value="" id="edit_harga_per_tahun" name="harga_per_tahun" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_deskripsi_kamar" class="form-label">Deskripsi Kamar</label>
                            <textarea class="form-control" id="edit_deskripsi_kamar" name="deskripsi_kamar" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="edit_foto_kamar" class="form-label">Foto Kamar</label>
                            <input type="file" class="form-control" id="edit_foto_kamar" name="foto_kamar">
                        </div>
                        <div class="mb-3">
                            <label for="edit_status_kamar" class="form-label">Status Kamar</label>
                            <select class="form-control" id="edit_status_kamar" name="status_kamar" required>
                                <option value="Sudah Berpenghuni">Sudah Berpenghuni</option>
                                <option value="Belum Berpenghuni">Belum Berpenghuni</option>
                            </select>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Include your JavaScript files here -->
    <script src="path/to/your/scripts.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="path/to/your/bootstrap.bundle.min.js"></script>
    
<script>
    $(document).ready(function() {
        // Simpan urutan asli dari setiap kartu
        var originalOrder = $('.kamar-card').clone();

        // Tooltip initialization
        $('[data-toggle="tooltip"]').tooltip();

        // Search functionality
        $('#navbar-search-input').on('input', function() {
            var searchValue = $(this).val().toLowerCase();
            var $cards = $('.kamar-card');
            var matches = 0;  // Untuk menghitung berapa banyak kamar yang cocok

            if (searchValue === '') {
                // Jika kotak pencarian kosong, kembalikan urutan asli
                $('#kamar-container').html(originalOrder);
                $('#no-results').remove();  // Hapus pesan jika ada
            } else {
                // Sembunyikan semua kartu dulu
                $cards.each(function() {
                    var noKamar = $(this).data('no_kamar').toString();
                    if (noKamar.includes(searchValue)) {
                        $(this).show();
                        matches++;  // Tambah jumlah kamar yang cocok
                    } else {
                        $(this).hide();
                    }
                });

                // Jika tidak ada kamar yang cocok, tampilkan pesan "Nomor Kamar Tidak Ada"
                if (matches === 0) {
                    if ($('#no-results').length === 0) {
                        $('#kamar-container').append('<div id="no-results" class="text-center mt-3">Hasil pencarian tidak ditemukan</div>');
                    }
                } else {
                    // Jika ada kamar yang cocok, pastikan pesan dihapus
                    $('#no-results').remove();
                }

                // Reorder cards by moving matching ones to the top
                $cards.sort(function(a, b) {
                    var aMatches = $(a).data('no_kamar').toString().startsWith(searchValue) ? 1 : 0;
                    var bMatches = $(b).data('no_kamar').toString().startsWith(searchValue) ? 1 : 0;
                    return bMatches - aMatches;
                }).appendTo('#kamar-container');
            }
        });

        // Fill modal with data for editing
        $('#editModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); 
            var id = button.data('id');
            var lantai = button.data('lantai');
            var no_kamar = button.data('no_kamar');
            var harga_per_bulan = button.data('harga_per_bulan');
            var harga_per_tahun = button.data('harga_per_tahun');
            var deskripsi_kamar = button.data('deskripsi_kamar');
            var status_kamar = button.data('status_kamar');

            var modal = $(this);
            modal.find('#id').val(id);
            modal.find('#edit_lantai').val(lantai);
            modal.find('#edit_no_kamar').val(no_kamar);
            modal.find('#edit_harga_per_bulan').val(harga_per_bulan);
            modal.find('#edit_harga_per_tahun').val(harga_per_tahun);
            modal.find('#edit_deskripsi_kamar').val(deskripsi_kamar);
            modal.find('#edit_status_kamar').val(status_kamar);
        });
    });
</script>


</body>
</html>
