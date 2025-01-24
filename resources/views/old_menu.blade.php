<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Menu</title>
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
                       <a href="{{ asset('Home/t_menu') }}">
                            <button class="btn btn-success">Tambah Menu</button>
                        </a>
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Menu</th>
                                    <th>Kategori</th>
                                    <th>Harga</th>
                                    <th>Gambar Menu</th>
                                    <th>Stok</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no = 1;
                                foreach($menu as $item) {
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $item->nama_menu ?></td>
                                    <td><?= $item->nama_kategori ?></td>
                                   <td>Rp <?= number_format($item->harga, 0, ',', '.') ?></td>
<td style="text-align: center;">
    <img src="{{ asset('images/img/' . $item->gambar) }}" alt="Menu Image" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%; display: block; margin-left: auto; margin-right: auto;">
</td>


                                  

<td>
    @if ($item->stok == 'Tersedia')
        <span class="badge badge-success">{{ $item->stok }}</span>
    @else
        <span class="badge badge-danger">{{ $item->stok }}</span>
    @endif
</td>

                                    <td>
                                        <button class="btn btn-primary ti-pencil" 
                                                data-toggle="modal" 
                                                data-target="#editMenuModal" 
                                                data-id="<?= $item->id_menu ?>"
                                                data-nama="<?= $item->nama_menu ?>"
                                                data-id_kategori="<?= $item->id_kategori ?>"
                                                data-harga="<?= $item->harga ?>"
                                                data-gambar="<?= $item->gambar ?>"
                                                data-stok="<?= $item->stok ?>"
                                                title="Edit">
                                        </button>

                                        <a href="{{ asset('Home/hapus_menu/'.$item->id_menu) }}">
                                            <button class="btn btn-danger ti-trash" 
                                                    data-toggle="tooltip" 
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