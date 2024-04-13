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
    .sidebar {
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        width: 250px;
        background-color: #f8f9fa;
        padding-top: 20px;
        transition: margin-left 0.5s;
    }

    .content {
        margin-left: 250px;
        padding: 20px;
        transition: margin-left 0.5s;
    }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div id="sidebar" class="sidebar">
        <h2>Admin Panel</h2>
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link" href="<?= base_url('admin/course'); ?>">Courses</a></li>
            <li class="nav-item"><a class="nav-link" href="<?= base_url('admin/lesson'); ?>">Lesson</a></li>
            <li class="nav-item"><a class="nav-link" href="<?= base_url('admin/user'); ?>">Users</a></li>
            <li class="nav-item"><a class="nav-link" href="<?= base_url('admin/teacher'); ?>">Teacher</a></li>
            <li class="nav-item"><a class="nav-link" href="<?= base_url('logout'); ?>">Logout</a></li>
        </ul>
    </div>

    <!-- Main content -->
    <div id="content" class="content">
        <button class="btn btn-primary" onclick="toggleSidebar()">
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
        if (sidebar.style.marginLeft === "0px") {
            sidebar.style.marginLeft = "-250px";
            content.style.marginLeft = "0";
        } else {
            sidebar.style.marginLeft = "0";
            content.style.marginLeft = "250px";
        }
    }
    </script>
</body>

</html>