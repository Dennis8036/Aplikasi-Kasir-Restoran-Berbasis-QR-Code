<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pesanan</title>
    <link rel="stylesheet" href="path/to/your/styles.css"> <!-- Ganti dengan path CSS Anda -->
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
            min-width: 900px;
        }
    </style>
</head>
<body>
<div class="row">
    <!-- Form Input Pesanan -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form Pesanan</h4>
                <form id="formPesanan">
                    @csrf
                    <div class="form-group">
                        <label for="tanggal">Tanggal Pesan</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ date('Y-m-d') }}" readonly style="background-color: #ffffff; border: 1px solid #ced4da; cursor: default;">
                    </div>
                    <div class="form-group">
    <label for="id_meja">No Meja</label>
    <input type="text" class="form-control" placeholder="Silahkan Scan QR Code Meja"id="id_meja" name="id_meja" value="<?= isset($id_meja) ? $id_meja : '' ?>" readonly style="background-color: #ffffff; border: 1px solid #ced4da; cursor: default;">
</div>
                    <div class="form-group">
                        <label for="id_menu">Nama Menu</label>
                        <select class="form-control" id="id_menu" name="id_menu" required>
                            <option value="">~ Pilih Nama Menu ~</option>
                            @foreach($menu as $item)
                                <option value="{{ $item->id_menu }}" data-harga="{{ $item->harga }}">
                                    {{ $item->nama_menu }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" value="0" readonly style="background-color: #ffffff; border: 1px solid #ced4da; cursor: default;">
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Qty</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Input Qty" value="1" required>
                    </div>



                    <button type="button" id="addOrder" class="btn btn-primary btn-block">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Tabel Daftar Pesanan -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">No. Invoice - {{ date('Ymd') . str_pad(rand(1, 999999), 6, '0', STR_PAD_LEFT) }}</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Menu</th>
                            <th>Harga</th>
                            <th>Qty</th>
                            <th>Subtotal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="orderList"></tbody>
                </table>
                <div class="form-group">
                    <label for="total_harga">Total Keseluruhan</label>
                    <input type="text" class="form-control" id="total_harga" name="total_harga" value="0" readonly style="background-color: #ffffff; border: 1px solid #ced4da; cursor: default;">
                </div>
               <form action="{{ asset('Home/aksi_t_pesanan') }}" method="POST">
    @csrf
    <input type="hidden" name="orders" id="orders"> <!-- Untuk daftar pesanan -->
    <input type="hidden" name="id_meja" id="hidden_id_meja"> <!-- Untuk nomor meja -->
    <input type="hidden" name="total_harga" id="hidden_total_harga"> <!-- Untuk total harga -->
    <button type="submit" class="btn btn-success btn-block">Simpan Pesanan</button>
</form>

            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    let orders = [];
    let totalHarga = 0;

    // Update harga saat menu dipilih
    $('#id_menu').change(function () {
        const harga = $('#id_menu option:selected').data('harga');
        $('#harga').val(harga || 0);
    });

    // Tambahkan pesanan ke tabel
    $('#addOrder').click(function () {
        const id_menu = $('#id_menu').val();
        const nama_menu = $('#id_menu option:selected').text();
        const harga = parseFloat($('#harga').val());
        const jumlah = parseInt($('#jumlah').val());
        const subtotal = harga * jumlah;

        if (!id_menu || jumlah <= 0) {
            alert('Harap lengkapi data pesanan!');
            return;
        }

        // Tambahkan ke daftar pesanan
        orders.push({ id_menu, nama_menu, harga, jumlah, subtotal });
        updateOrderList();
    });

    // Update tabel daftar pesanan
    function updateOrderList() {
        let html = '';
        totalHarga = 0;

        orders.forEach((order, index) => {
            totalHarga += order.subtotal;
            html += `
                <tr>
                    <td>${index + 1}</td>
                    <td>${order.nama_menu}</td>
                    <td>${order.harga.toLocaleString('id-ID')}</td>
                    <td>${order.jumlah}</td>
                    <td>${order.subtotal.toLocaleString('id-ID')}</td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm" onclick="removeOrder(${index})">Hapus</button>
                    </td>
                </tr>
            `;
        });

        $('#orderList').html(html);
        $('#total_harga').val(totalHarga.toLocaleString('id-ID'));
        $('#orders').val(JSON.stringify(orders)); // Simpan pesanan ke input hidden
        $('#hidden_id_meja').val($('#id_meja').val()); // Simpan nomor meja ke input hidden
        $('#orders').val(JSON.stringify(orders)); // Simpan daftar pesanan
$('#hidden_id_meja').val($('#id_meja').val()); // Simpan nomor meja
$('#hidden_total_harga').val(totalHarga); // Simpan total harga

    }

    // Hapus pesanan
    window.removeOrder = function (index) {
        orders.splice(index, 1);
        updateOrderList();
    };
});
</script>
</body>
</html>
