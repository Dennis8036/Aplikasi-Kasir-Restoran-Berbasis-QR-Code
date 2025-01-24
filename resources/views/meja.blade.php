<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Meja</title>
    <link rel="stylesheet" href="path/to/your/styles.css">
    <style>
        .card {
            margin: 20px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .table-responsive {
            overflow-x: auto;
        }
        .table {
            min-width: 1000px;
        }
    </style>
</head>
<body>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <button class="btn btn-success" data-toggle="modal" data-target="#tambahMejaModal">
                            Tambah Meja
                        </button>
                                                                <button class="btn btn-info" data-toggle="modal" data-target="#scanQrCodeModal">
    Scan QR Code
</button>
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nomor Meja</th>
                                    <th>QR Code</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no = 1;
                                foreach($meja as $m) {
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $m->nomor_meja ?></td>
<td style="text-align: center;">
    <a href="#" data-toggle="modal" data-target="#qrCodeModal" onclick="showFullSizeQrCode('{{ asset($m->qr_code) }}')">
        <img src="{{ asset($m->qr_code) }}" alt="QR Code" style="width: 100px; height: 100px; border-radius: 0;">
    </a>
</td>



                                    <td>
                                        <button class="btn btn-primary ti-pencil" 
                                                data-toggle="modal" 
                                                data-target="#editMejaModal" 
                                                data-id="<?= $m->id_meja ?>"
                                                data-nomor="<?= $m->nomor_meja ?>"
                                                data-qrcode="<?= $m->qr_code ?>"
                                                title="Edit">
                                        </button>
                                        <a href="{{ asset('Home/hapus_meja/'.$m->id_meja) }}">
                                            <button class="btn btn-danger ti-trash" 
                                                    data-toggle="tooltip" 
                                                    data-placement="top" 
                                                    title="Hapus">
                                            </button>
                                        </a>

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

    <!-- Tambah Meja Modal -->
    <div class="modal fade" id="tambahMejaModal" tabindex="-1" aria-labelledby="tambahMejaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahMejaModalLabel">Tambah Meja</h5>
                    <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="tambahMejaForm" action="{{ asset('Home/aksi_t_meja') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="tambah_nomor_meja" class="form-label">Nomor Meja</label>
                            <input type="text" class="form-control" id="tambah_nomor_meja" name="nomor_meja" placeholder="Nomor Meja" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Meja Modal -->
    <div class="modal fade" id="editMejaModal" tabindex="-1" aria-labelledby="editMejaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editMejaModalLabel">Edit Meja</h5>
                    <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editMejaForm" action="{{ asset('Home/aksi_e_meja') }}" method="POST">
                        @csrf
                        <input type="hidden" id="id_meja" name="id_meja">
                        <div class="mb-3">
                            <label for="edit_nomor_meja" class="form-label">Nomor Meja</label>
                            <input type="text" class="form-control" id="edit_nomor_meja" name="nomor_meja" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- Modal untuk Menampilkan QR Code Besar -->
<div class="modal fade" id="qrCodeModal" tabindex="-1" aria-labelledby="qrCodeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="qrCodeModalLabel">QR Code</h5>
                <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body text-center">
                <img id="fullSizeQrCode" src="" alt="Full-size QR Code" style="width: 100%; height: auto;">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="scanQrCodeModal" tabindex="-1" aria-labelledby="scanQrCodeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scanQrCodeModalLabel">Scan QR Code</h5>
                <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body text-center">
                <!-- Video Stream untuk Menampilkan Kamera -->
                <video id="preview" style="width: 100%; height: auto;"></video>
                <p id="scanResult" class="mt-3">Hasil: <span id="result"></span></p>
            </div>
        </div>
    </div>
</div>
    <script src="path/to/your/scripts.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="path/to/your/bootstrap.bundle.min.js"></script>
    
<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<script>
    $(document).ready(function() {
        // Tooltip
        $('[data-toggle="tooltip"]').tooltip();

        // Menangani modal edit meja
        $('#editMejaModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id_meja = button.data('id');
            var nomor = button.data('nomor');

            var modal = $(this);
            modal.find('#id_meja').val(id_meja);
            modal.find('#edit_nomor_meja').val(nomor);
        });

        // Fungsi untuk menampilkan QR Code besar di modal
        window.showFullSizeQrCode = function(qrCodePath) {
            document.getElementById('fullSizeQrCode').src = qrCodePath;
        };

        // Inisialisasi Instascan
        let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });

        // Ketika QR Code berhasil dipindai
        scanner.addListener('scan', function (content) {
            // Tampilkan hasil scan di modal
            document.getElementById('result').textContent = content;

            // Redirect ke halaman t_pesanan dengan membawa id_meja
            window.location.href = `/Home/t_pesanan?id_meja=${content}`;  // Mengirimkan id_meja sebagai parameter URL
        });

        // Buka modal dan akses kamera
        $('#scanQrCodeModal').on('shown.bs.modal', function () {
            Instascan.Camera.getCameras().then(function (cameras) {
                if (cameras.length > 0) {
                    scanner.start(cameras[0]); // Gunakan kamera depan
                } else {
                    alert('No cameras found.');
                }
            }).catch(function (e) {
                console.error(e);
            });
        });

        // Berhenti scan ketika modal ditutup
        $('#scanQrCodeModal').on('hidden.bs.modal', function () {
            scanner.stop();
        });
    });
</script>




</body>
</html>
