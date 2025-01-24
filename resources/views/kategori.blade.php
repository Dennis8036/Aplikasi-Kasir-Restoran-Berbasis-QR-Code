<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kategori Buku</title>
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
                    <button class="btn btn-success" data-toggle="modal" data-target="#tambahKategoriModal">
                        Tambah Kategori
                    </button>
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no = 1;
                                foreach($kategori as $kat) {
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $kat->nama_kategori ?></td>
                                    <td>
                                        <button class="btn btn-primary ti-pencil" 
                                                data-toggle="modal" 
                                                data-target="#editKategoriModal" 
                                                data-id="<?= $kat->id_kategori ?>"
                                                data-nama="<?= $kat->nama_kategori ?>"
                                                title="Edit">
                                        </button>

                                             <a href="{{ asset('Home/hapus_kategori/'.$kat->id_kategori) }}">
                                            <button class="btn btn-danger ti-trash" 
                                                    data-toggle="tooltip" 
                                                    data-placement="top" 
                                                    title="Hapus">
                                            </button>
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

<div class="modal fade" id="tambahKategoriModal" tabindex="-1" aria-labelledby="tambahKategoriModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahKategoriModalLabel">Tambah Kategori</h5>
                <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="tambahKategoriForm" action="{{ asset('Home/aksi_t_kategori') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="tambah_nama_kategori" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" id="tambah_nama_kategori" name="nk" placeholder="Nama Kategori" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <!-- Edit Kategori Modal -->
    <div class="modal fade" id="editKategoriModal" tabindex="-1" aria-labelledby="editKategoriModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editKategoriModalLabel">Edit Kategori</h5>
                    <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editKategoriForm" action="{{ asset('Home/aksi_e_kategori') }}" method="POST">
                        @csrf
                        <input type="hidden" id="id_kategori" name="id_kategori">
                        <div class="mb-3">
                            <label for="edit_nama_kategori" class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" id="edit_nama_kategori" name="nama_kategori" required>
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
            $('#editKategoriModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var id_kategori = button.data('id');
                var nama = button.data('nama');

                var modal = $(this);
                modal.find('#id_kategori').val(id_kategori);
                modal.find('#edit_nama_kategori').val(nama);
            });
        });
    </script>
</body>
</html>
