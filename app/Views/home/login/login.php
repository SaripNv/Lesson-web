<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background-color: #f8f9fa;
    }

    .card {
        margin-top: 50px;
        border: none;
        border-radius: 15px;
        box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #007bff;
        color: #fff;
        border-radius: 15px 15px 0px 0px;
        font-weight: bold;
    }

    .form-control {
        border-radius: 10px;
    }

    .btn-primary {
        border-radius: 10px;
        background-color: #007bff;
        border: none;
        width: 100%;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .register-link {
        text-align: center;
    }

    .register-link a {
        color: #007bff;
    }

    .register-link a:hover {
        text-decoration: underline;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">Login</div>
                    <div class="card-body">
                        <?php if (session()->has('error')) : ?>
                        <div class="alert alert-danger"><?= session('error') ?></div>
                        <?php endif ?>
                        <form action="<?= site_url('login') ?>" method="post">
                            <div class="form-group">
                                <input type="text" name="username" id="username" class="form-control"
                                    placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <select name="role" id="role" class="form-control" required>
                                    <option value="">Select Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="guru">Guru</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                        <div class="mt-3 register-link">
                            Belum punya akun? <a href="<?= site_url('register') ?>">Register di sini</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>