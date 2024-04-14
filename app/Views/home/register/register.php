<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
        background-color: #28a745;
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

    .login-link {
        text-align: center;
        margin-top: 20px;
    }

    .login-link a {
        color: #007bff;
    }

    .login-link a:hover {
        text-decoration: underline;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">Register</div>
                    <div class="card-body">
                        <?php if (session()->has('errors')) : ?>
                        <div class="alert alert-danger">
                            <?php foreach (session('errors') as $error) : ?>
                            <p><?= $error ?></p>
                            <?php endforeach ?>
                        </div>
                        <?php endif ?>
                        <?php if (session()->has('message')) : ?>
                        <div class="alert alert-success"><?= session('message') ?></div>
                        <?php endif ?>
                        <form action="<?= site_url('register') ?>" method="post">
                            <div class="form-group">
                                <input type="text" name="username" id="username" class="form-control"
                                    placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email"
                                    required>
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
                            <button type="submit" class="btn btn-primary">Register</button>
                        </form>
                        <div class="login-link">
                            Sudah punya akun? <a href="<?= site_url('login') ?>">Login di sini</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>