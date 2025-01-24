<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Menu</title>
    <link rel="stylesheet" href="path/to/your/styles.css">
    <style>
        /* Gaya untuk container menu */
        .menu-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            gap: 20px;
            padding: 20px;
        }

        /* Gaya untuk setiap card */
        .menu-card {
            background-color: #f8f9fa;
            border-radius: 8px;
            width: 252px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: all 0.3s ease;
            text-align: center;
        }

        /* Efek hover */
        .menu-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }

        /* Gambar menu */
        .menu-card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        /* Isi card */
        .menu-card-body {
            padding: 15px;
        }

        /* Judul menu */
        .menu-card-body h5 {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        /* Deskripsi kategori dan harga */
        .menu-card-body p {
            color: #555;
            margin-bottom: 10px;
        }

        /* Gaya badge stok */
        .badge {
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 14px;
            margin-top: 10px;
        }
        .badge-success {
            background-color: #28a745;
            color: white;
        }
        .badge-danger {
            background-color: #dc3545;
            color: white;
        }

        /* Tombol untuk edit dan hapus */
        .menu-card-body button {
            margin-top: 10px;
            padding: 8px 15px;
            border-radius: 5px;
            border: none;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .menu-card-body button:hover {
            background-color: #0056b3;
        }

        .menu-card-body .btn-danger {
            background-color: #dc3545;
        }

        .menu-card-body .btn-danger:hover {
            background-color: #c82333;
        }

    </style>
</head>
<body>
    <div class="container">
        <a href="{{ asset('Home/t_menu') }}">
            <button class="btn btn-success">Tambah Menu</button>
        </a>

        <div class="menu-container">
            @foreach($menu as $item)
                <div class="menu-card">
                    <img src="{{ asset('images/img/' . $item->gambar) }}" alt="Menu Image">
                    <div class="menu-card-body">
                        <h5>{{ $item->nama_menu }}</h5>
                        <p><strong>Kategori:</strong> {{ $item->nama_kategori }}</p>
                        <p><strong>Harga:</strong> Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
                        
                        <!-- Badge stok -->
                        @if ($item->stok == 'Tersedia')
                            <span class="badge badge-success">{{ $item->stok }}</span>
                        @else
                            <span class="badge badge-danger">{{ $item->stok }}</span>
                        @endif

                        <!-- Tombol untuk Edit dan Hapus --><div>
                           @if(session()->get('id_level') == 1 || session()->get('id_level') == 2)
                        <button class="btn btn-primary ti-pencil"
                                data-toggle="modal" 
                                data-target="#editMenuModal" 
                                data-id="{{ $item->id_menu }}"
                                data-nama="{{ $item->nama_menu }}"
                                data-id_kategori="{{ $item->id_kategori }}"
                                data-harga="{{ $item->harga }}"
                                data-gambar="{{ $item->gambar }}"
                                data-stok="{{ $item->stok }}"
                                title="Edit">
                            Edit
                        </button>
                        <a href="{{ asset('Home/hapus_menu/'.$item->id_menu) }}">
                            <button class="btn btn-danger ti-trash" title="Hapus">Hapus</button>
                        </a>
                        @endif
                    </div>
                </div>
</div>
                
            @endforeach
        </div>
    </div>

    <!-- Tambah Menu Modal -->


    <!-- Edit Menu Modal -->
   <div class="modal fade" id="editMenuModal" tabindex="-1" aria-labelledby="editMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editMenuModalLabel">Edit Menu</h5>
                <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="editMenuForm" action="{{ url('Home/aksi_e_menu') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="id_menu" name="id_menu">
                    <!-- Hidden input untuk menyimpan gambar lama -->
                    <input type="hidden" id="existing_gambar" name="existing_gambar">
                    <div class="mb-3">
                        <label for="edit_nama_menu" class="form-label">Nama Menu</label>
                        <input type="text" class="form-control" id="edit_nama_menu" name="nama_menu" required>
                    </div>

                    <div class="mb-3">
                        <label for="edit_harga" class="form-label">Harga</label>
                        <input type="text" class="form-control" id="edit_harga" name="harga" required>
                    </div>

                        <div class="mb-3">
                            <label for="edit_kategori" class="form-label">Nama Kategori</label>

                            <select type="text" class="form-control" id="edit_kategori" name="kategori">
                               
                                 @foreach($kategori as $dennis)
                                    <option value="<?=$dennis->id_kategori?>">
                                      <?=$dennis->nama_kategori?>
                                    </option>
                                   @endforeach
                            </select>
                        </div>

                    <div class="mb-3">
                        <label for="edit_gambar" class="form-label">Gambar Menu</label>
                        <input type="file" class="form-control" id="edit_gambar" name="gambar">
                    </div>
                    <div class="mb-3">
                        <label for="edit_stok" class="form-label">Stok</label>
                        <select class="form-control" id="edit_stok" name="stok" required>
                            <option value="Tersedia">Tersedia</option>
                            <option value="Habis">Habis</option>
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
            $('#editMenuModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var id_menu = button.data('id');
    var nama = button.data('nama');
    var id_kategori = button.data('id_kategori');
    var harga = button.data('harga');
    var stok = button.data('stok');
    var gambar = button.data('gambar');  // Ambil gambar lama

    var modal = $(this);
    modal.find('#id_menu').val(id_menu);
    modal.find('#edit_nama_menu').val(nama);
    modal.find('#edit_kategori').val(id_kategori);
    modal.find('#edit_harga').val(harga);
    modal.find('#edit_stok').val(stok);
    modal.find('#existing_gambar').val(gambar); // Set gambar lama di input hidden
});

        });
    </script>
</body>
</html>
