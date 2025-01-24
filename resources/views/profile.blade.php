<main role="main" class="main-content">
    <div class="container my-5">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">Profile</h5>
                <div class="row mt-4">
                    <!-- Foto Profil -->
                    <div class="col-md-4 text-center mb-4">
                        <?php
                            $foto_profil = ($dennis->foto_profile) ? asset('images/img/' . $dennis->foto_profile) : asset('images/img/fotouser.jfif');
                        ?>
                        <!-- Foto Profil dengan Zoom saat ditekan -->
                        <img src="<?= $foto_profil ?>" id="fotoProfile" class="rounded-circle mb-3" style="width: 150px; height: 150px; cursor: pointer;" alt="Foto Profile">
                        
                        <!-- Modal untuk zoom gambar -->
                        <div id="myModal" class="modal">
                            <img class="modal-content rounded-circle" id="imgZoom">
                        </div>

                        <!-- Form untuk mengganti foto profil -->
                        <form action="{{ asset('Home/editfoto') }}" method="post" enctype="multipart/form-data">
                             @csrf
                            <label for="foto" class="btn btn-primary">New Profile</label>
                            <input class="file-input" type="file" id="foto" name="foto" accept="image/*" style="display: none;">
                            <span id="file-name"></span>
                            <br>
                            <button id="saveButton" class="btn btn-primary mt-2" style="display: none;">Save</button>
                        </form>

                        <!-- Tombol hapus foto profil -->
                        <?php if (!empty($dennis->foto_profile)): ?>
                        <form action="{{ asset('Home/deletefoto') }}" method="post" onsubmit="return confirm('Are you sure you want to delete your profile picture?');">
                             @csrf
                            <input type="hidden" name="id" value="<?= $dennis->id_user ?>">
                            <button type="submit" class="btn btn-danger mt-2">Delete Profile</button>
                        </form>
                        <?php endif; ?>
                    </div>
                    <!-- Informasi Profile -->
                    <div class="col-md-8">
                        <form action="{{ asset('Home/aksi_e_profile') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="<?= $dennis->id_user ?>">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="username">Username</label>
                                    <input type="text" id="username" class="form-control" name="username" value="{{($dennis->username) }}">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" class="form-control" name="email" value="{{($dennis->email) }}">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="status">Status</label>
                                    <?php
                                        $status = 'Unknown';
                                        if ($dennis->id_level == 1) {
                                            $status = 'Admin';
                                        } elseif ($dennis->id_level == 2) {
                                            $status = 'Kasir';
                                        } elseif ($dennis->id_level == 3) {
                                            $status = 'Pelanggan';
                                        } elseif ($dennis->id_level == 4) {
                                            $status = 'Pelanggan';
                                        }
                                    ?>
                                    <input type="text" id="status" class="form-control" value="{{ ($status) }}" readonly>
                                </div>

                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Modal Zoom Script -->
<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the image and insert it inside the modal
    var img = document.getElementById("fotoProfile");
    var modalImg = document.getElementById("imgZoom");

    img.onclick = function(){
        modal.style.display = "block";
        modalImg.src = this.src;
    }

    // When the user clicks outside of the image, close the modal
    modal.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    // Script untuk menampilkan nama file yang diunggah
    document.getElementById('foto').onchange = function() {
        var fileName = this.value.split('\\').pop();
        document.getElementById('file-name').innerText = 'File: ' + fileName;
        document.getElementById('saveButton').style.display = 'inline-block';
    };
</script>

<!-- CSS for Modal -->
<style>
    /* Modal Background */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.8); /* Latar belakang gelap untuk modal */
    }

    /* Modal Content (image) */
    .modal-content {
        display: block;
        margin: auto;
        border-radius: 50%;
        width: 300px;
        height: 300px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%); /* Memposisikan di tengah */
    }

    /* Responsiveness */
    @media only screen and (max-width: 700px){
        .modal-content {
            width: 80%;
        }
    }
</style>
