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
            min-width: 900px; /* Ensure table is wide enough */
        }
    </style>
</head>
<body>

       
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"></h4>

                            <div class="table-responsive">
                        <a href="{{ asset('Home/t_pesanan') }}">
                            <button class="btn btn-success">Tambah Pesanan</button>
                        </a>
<table class="table table-bordered">
    <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Pesan</th>
                                    <th>Nomor Meja</th>
                                    <th>Menu</th>
                                    <th>Jumlah</th>
                                    <th>Total Harga</th>
                                   
                                    
                                     <th>Status Pesanan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no = 1;
                                foreach($pesanan as $p){
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $p->tanggal_pesan ?></td>
                                    <td><?= $p->nomor_meja ?></td>
                                    <td><?= $p->nama_menu ?></td>
                                    <td><?= $p->jumlah ?></td>
                                    <td><?= $p->total_harga ?></td>
                                    
                                    
                                    <td><?= $p->status_pesanan ?></td>
                                    <td>
                                        <button class="btn btn-primary ti-pencil" 
                                                data-toggle="modal" 
                                                data-target="#editPesananModal" 
                                                data-id="<?= $p->id_pesanan ?>"
                                                data-id_meja="<?= $p->id_meja ?>"
                                                data-id_menu="<?= $p->id_menu ?>"
                                                data-jumlah="<?= $p->jumlah ?>"
                                                data-total_harga="<?= $p->total_harga ?>"
                                                data-status_pesanan="<?= $p->status_pesanan ?>"
                                               
                                                data-toggle="tooltip"
                                                data-placement="top"
                                                title="Edit">
                                        </button>
                                        <a href="{{ asset('Home/hapus_pesanan/'.$p->id_pesanan)}}">
                                            <button class="btn btn-danger ti-trash" 
                                                    data-toggle="tooltip" 
                                                    data-placement="top" 
                                                    title="Hapus"></button>
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

    <!-- Edit Pesanan Modal -->
    <div class="modal fade" id="editPesananModal" tabindex="-1" aria-labelledby="editPesananModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPesananModalLabel">Edit Pesanan</h5>
                    <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editPesananForm" action="{{ asset('Home/aksi_e_pesanan') }}" method="POST">
                        @csrf
                        <input type="hidden" value="" id="id_pesanan" name="id_pesanan">
                        <div class="mb-3">
                            <label for="edit_id_meja" class="form-label">Nomor Meja</label>
                            <input type="text" class="form-control" value="" id="edit_id_meja" name="id_meja" required>
                        </div>
                         <div class="mb-3">
                            <label for="edit_id_menu" class="form-label">Nama Menu</label>

                            <select type="text" class="form-control" id="edit_id_menu" name="id_menu">
                               
                                 @foreach($menu as $dennis)
                                    <option value="<?=$dennis->id_menu?>">
                                      <?=$dennis->nama_menu?>
                                    </option>
                                   @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="edit_jumlah" class="form-label">Jumlah</label>
                            <input type="text" class="form-control" value="" id="edit_jumlah" name="jumlah" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_total_harga" class="form-label">Total Harga</label>
                            <input type="text" class="form-control" value="" id="edit_total_harga" name="total_harga" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_status_pesanan" class="form-label">Status Pesanan</label>
                            <select class="form-control" id="edit_status_pesanan" name="status_pesanan" required>
                                <option value="Pending">Pending</option>
                                <option value="Selesai">Selesai</option>
                                <option value="Batal">Batal</option>
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

    <script src="path/to/your/scripts.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="path/to/your/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();

            $('#editPesananModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var id_pesanan = button.data('id');
                var id_meja = button.data('id_meja');
                var id_menu = button.data('id_menu');
                var jumlah = button.data('jumlah');
                var total_harga = button.data('total_harga');
                var status_pesanan = button.data('status_pesanan');
                

                var modal = $(this);
                modal.find('#id_pesanan').val(id_pesanan);
                modal.find('#edit_id_meja').val(id_meja);
                modal.find('#edit_id_menu').val(id_menu);
                modal.find('#edit_jumlah').val(jumlah);
                modal.find('#edit_total_harga').val(total_harga);
                modal.find('#edit_status_pesanan').val(status_pesanan);
            });
        });
    </script>
</body>
</html>