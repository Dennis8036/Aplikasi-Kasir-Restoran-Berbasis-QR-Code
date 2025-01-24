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
                            <?php if(session()->get('id_level') == 1) { ?>
                               <a href="{{ asset('Home/clear_all_activities') }}">
                                   <button class="btn btn-primary">Clear</button>
                                </a>
                                  <?php } ?>
                            <div class="table-responsive">
                            <table class="table table-bordered">
                            <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Activity</th>
                                            <th>Waktu</th>
                                             <?php if(session()->get('id_level') == 1) { ?>
                                            <th>Aksi</th>
                                              <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no = 1;
                                        foreach($erwin as $dennis){
                                        ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                             <td>
            <!-- Menampilkan foto profil berbentuk bulat -->
           <img src="{{ $dennis->foto_profile ? asset('images/img/' . $dennis->foto_profile) : asset('images/img/fotouser.jfif') }}" 
     alt="Foto Profil" class="img-thumbnail rounded-circle" style="width: 40px; height: 40px;">

            <?= $dennis->username ?>
        </td>
                                            <td><?= $dennis->activity ?></td>
                                            <td><?= $dennis->timestamp ?></td>
                                             <?php if(session()->get('id_level') == 1) { ?>
                                            <td>
                                               <a href="{{ asset('Home/hapus_activity/' . $dennis->id_activity) }}">
                                                    <button class="btn btn-danger ti-trash"
                                                        data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="Hapus"
                                                    ></button>
                                                </a>
                                            </td>
                                              <?php } ?>
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


    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    

    <script>
        $(document).ready(function() {
            // buat tooltip
            $('[data-toggle="tooltip"]').tooltip();

        });
    </script>