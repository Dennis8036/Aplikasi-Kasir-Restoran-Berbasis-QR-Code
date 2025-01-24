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
    <!-- Sidebar start -->
    <!-- Your sidebar code here -->
    <!-- Sidebar end -->

    <!-- Content body start -->

        <!-- row -->
<div class="modal fade" id="passwordResetModal" tabindex="-1" aria-labelledby="passwordResetModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #28a745; color: white;">
                <h5 class="modal-title" id="passwordResetModalLabel">Notifikasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="notifMessage">Password Berhasil Direset!</p>
            </div>
        </div>
    </div>
</div>
       
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"></h4>

                            <div class="table-responsive">
<button class="btn btn-success" data-toggle="modal" data-target="#tambahUserModal">Tambah User</button>
<table class="table table-bordered">
    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Level</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no = 1;
                                        foreach($erwin as $wkwk){
                                        ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $wkwk->username ?></td>
                                            <td>
                                                <?php
                                                if ($wkwk->id_level == 1) {
                                                    echo "Admin";
                                               
                                                } elseif ($wkwk->id_level == 2) {
                                                    echo "Kasir";
                                                     } elseif ($wkwk->id_level == 3) {
                                                    echo "Pelanggan";
                                                } else {
                                                    echo "Unknown";
                                                }
                                                ?>
                                            </td>
                                            <td>

<button class="btn btn-primary ti-pencil" 
        data-toggle="modal" 
        data-target="#editUserModal" 
        data-id="<?= $wkwk->id_user ?>"
        data-username="<?= $wkwk->username ?>"
        data-email="<?= $wkwk->email ?>"
        data-id_level="<?= $wkwk->id_level ?>"
        data-toggle="tooltip"
        data-placement="top"
        title="Edit">
</button>

                                              <a href="{{ asset('Home/hapus_user/'.$wkwk->id_user)}}">
    <button class="btn btn-danger ti-trash" 
            data-toggle="tooltip" 
            data-placement="top" 
            title="Hapus"
            ></button>
</a>
<form action="{{ url('/Home/resetpassword/' . $wkwk->id_user) }}" method="POST" style="display: inline;">
    @csrf
    <button type="submit" class="btn btn-warning ti-reload" data-toggle="tooltip" data-placement="top" title="Reset Password"></button>
</form>

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
        </div>
        <!-- #/ container -->
    </div>

<div class="modal fade" id="tambahUserModal" tabindex="-1" aria-labelledby="tambahUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahUserModalLabel">Tambah User</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ asset('Home/aksi_t_user') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" class="form-control" name="username" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" class="form-control" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label for="level">Level</label>
                        <select id="level" class="form-control" name="level" required>
                            <option value="">Pilih</option>
                            <option value="1">Admin</option>
                            <option value="2">Kasir</option>
                            <option value="3">Pelanggan</option>
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <!-- Edit User Modal -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                    <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editUserForm" action="{{ asset('Home/aksi_e_user') }}" method="POST">
                        @csrf
                        <input type="hidden" value="" id="id_user" name="id_user"> <!-- ID ini akan diisi oleh JavaScript -->
                        <div class="mb-3">
                            <label for="edit_username" class="form-label">Username</label>
                            <input type="text" class="form-control" value="" id="edit_username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_email" class="form-label">Email</label>
                            <input type="email" class="form-control" value="" id="edit_email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_id_level" class="form-label">Level</label>
                            <select class="form-control" id="edit_id_level" name="id_level" required>
                                <option value="1">Admin</option>
                                 <option value="2">Kasir</option>
                                <option value="3">Pelanggan</option>
                           

                                <!-- Tambahkan opsi level lain jika ada -->
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
        // Inisialisasi tooltip
        $('[data-toggle="tooltip"]').tooltip();

        // Modal handling
        $('#editUserModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var id_user = button.data('id'); // Extract info from data-* attributes
            var username = button.data('username');
            var email = button.data('email');
            var id_level = button.data('id_level');

            // Update the modal's content
            var modal = $(this);
            modal.find('#id_user').val(id_user);
            modal.find('#edit_username').val(username);
            modal.find('#edit_email').val(email);
            modal.find('#edit_id_level').val(id_level);
        });
         $(document).ready(function() {
        // Check if session flashdata is set
        @if(session()->has('password_reset'))
            // Display the modal and animate from top
            $('#passwordResetModal').modal('show').css('top', '-50px').animate({ top: '10px' }, 500);
            
            // Hide the modal after 3 seconds
            setTimeout(function() {
                $('#passwordResetModal').animate({ top: '-50px' }, 500, function() {
                    $('#passwordResetModal').modal('hide');
                });
            }, 3000);
        @endif
    });
    });
</script>

</body>
</html>
