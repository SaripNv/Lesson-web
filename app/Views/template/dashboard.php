<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
    body {
        display: flex;
        min-height: 100vh;
        overflow-x: hidden;
    }

    .sidebar {
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        width: 250px;
        background-color: #343a40;
        color: #fff;
        padding-top: 20px;
        transition: all 0.5s;
        overflow-y: auto;
    }

    .sidebar .nav-link {
        color: #adb5bd;
    }

    .sidebar .nav-link:hover {
        color: #fff;
    }

    .sidebar .admin-profile {
        display: flex;
        align-items: center;
        padding: 15px;
        background-color: #495057;
        margin: 0 10px 20px;
        border-radius: 10px;
    }

    .sidebar .admin-profile img {
        height: 50px;
        width: 50px;
        border-radius: 50%;
        margin-right: 15px;
    }

    .sidebar .admin-profile .admin-info {
        flex-grow: 1;
    }

    .sidebar h2 {
        color: #adb5bd;
        text-align: center;
        margin-bottom: 20px;
    }

    .sidebar.collapsed {
        width: 80px;
    }

    .sidebar.collapsed .nav-link .fa,
    .sidebar.collapsed .admin-profile .admin-info,
    .sidebar.collapsed h2 {
        display: none;
    }

    .sidebar.collapsed .nav-link {
        text-align: center;
    }

    .sidebar.collapsed .nav-link:hover {
        text-align: left;
    }

    .content {
        margin-left: 250px;
        padding: 20px;
        width: 100%;
        transition: margin-left 0.5s;
    }

    .content.collapsed {
        margin-left: 80px;
    }

    .toggle-btn {
        position: fixed;
        top: 10px;
        left: 260px;
        transition: left 0.5s;
    }

    .toggle-btn.collapsed {
        left: 90px;
    }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div id="sidebar" class="sidebar">
        <div class="admin-profile">
            <img src="<?= base_url('/assets/gallery/admin-profile.jpg') ?>" alt="Admin Profile">
            <div class="admin-info">
                <strong>Admin Name</strong>
                <small>Admin Role</small>
            </div>
        </div>
        <h2>Admin Panel</h2>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/course'); ?>">
                    <i class="fa fa-book"></i> <span>Courses</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/lesson'); ?>">
                    <i class="fa fa-chalkboard-teacher"></i> <span>Lesson</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/user'); ?>">
                    <i class="fa fa-users"></i> <span>Users</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/teacher'); ?>">
                    <i class="fa fa-user-tie"></i> <span>Teacher</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/gallery'); ?>">
                    <i class="fa fa-images"></i> <span>Gallery</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/'); ?>">
                    <i class="fa fa-home"></i> <span>Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('logout'); ?>">
                    <i class="fa fa-sign-out-alt"></i> <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Main content -->
    <div id="content" class="content">
        <button class="btn btn-primary toggle-btn" onclick="toggleSidebar()">
            <i class="fas fa-bars"></i>
        </button>
        <?= $this->renderSection('content') ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>

    <script>
    function toggleSidebar() {
        var sidebar = document.getElementById("sidebar");
        var content = document.getElementById("content");
        var toggleBtn = document.querySelector(".toggle-btn");
        sidebar.classList.toggle("collapsed");
        content.classList.toggle("collapsed");
        toggleBtn.classList.toggle("collapsed");
    }
    </script>
</body>

</html>