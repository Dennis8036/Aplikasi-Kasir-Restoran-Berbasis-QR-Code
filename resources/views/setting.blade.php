<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <!-- Include your CSS files here -->
    <link rel="stylesheet" href="path/to/your/styles.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 900px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card {
            margin: 20px;
            padding: 30px;
            background-color: #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card-title {
            font-size: 18px;
            font-weight: ;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-size: 16px;
            color: #555;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: inset 0 2px 3px rgba(0, 0, 0, 0.1);
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }
        .btn {
            display: block;
            width: 100%;
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        input[type="file"] {
            padding: 5px;
            background-color: #fff;
            border: 1px solid #ddd;
        }
        .custom-file-label {
            font-size: 14px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h4 class="card-title">Pengaturan Website</h4>

            <form action="{{ url('Home/aksi_e_setting') }}" method="POST" enctype="multipart/form-data">
@csrf
                
                <div class="form-group">
                    <label for="nama_web">Nama Web</label>
                    <input type="text" class="form-control" name="nama_web" value ="<?= $setting->nama_web ?>">
                </div>

                <div class="form-group">
                    <label for="logo_dashboard">Logo Dashboard</label>
                    <input type="file" class="form-control" name="logo_dashboard" id="logo_dashboard">
                </div>

                <div class="form-group">
                    <label for="logo_tab">Logo Tab</label>
                    <input type="file" class="form-control" name="logo_tab" id="logo_tab">
                </div>

                <div class="form-group">
                    <label for="logo_login">Logo Login</label>
                    <input type="file" class="form-control" name="logo_login" id="logo_login">
                </div>

                <button type="submit" class="btn">Simpan Pengaturan</button>
            </form>
        </div>
    </div>
</body>
</html>
