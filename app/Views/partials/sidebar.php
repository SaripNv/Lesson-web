<button class="btn btn-primary" id="show-sidebar" style="position: fixed; top: 20px; right: 20px; z-index: 2;">
    <i class="fas fa-bars"></i> Show Sidebar
</button>
<aside class="sidebar" id="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text">
                Admin Dashboard
            </a>
        </div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="<?= base_url('admin/dashboard') ?>">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/manage/users') ?>">
                    <i class="fas fa-users"></i>
                    <span>Manage Users</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/manage/courses') ?>">
                    <i class="fas fa-book"></i>
                    <span>Manage Courses</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/manage/lessons') ?>">
                    <i class="fas fa-graduation-cap"></i>
                    <span>Manage Lessons</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/manage/quizzes') ?>">
                    <i class="fas fa-question-circle"></i>
                    <span>Manage Quizzes</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/manage/quiz_results') ?>">
                    <i class="fas fa-poll"></i>
                    <span>Manage Quiz Results</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('logout') ?>">
                    <i class="fas fa-poll"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>
    <button class="btn btn-primary" id="close-sidebar"><i class="fas fa-times"></i> Close Sidebar</button>
</aside>



<style>
.sidebar {
    position: fixed;
    top: 0;
    bottom: 0;
    left: -250px;
    /* Hide sidebar by default */
    z-index: 100;
    padding: 48px 0;
    width: 250px;
    background-color: #333;
    color: #fff;
    transition: left 0.3s ease-in-out;
}

.sidebar.active {
    left: 0;
    /* Show sidebar when active */
}

.sidebar-wrapper {
    padding: 20px;
}

.logo {
    text-align: center;
    margin-bottom: 20px;
}

.logo a {
    font-size: 24px;
    font-weight: bold;
    color: #fff;
    text-decoration: none;
}

.nav-item {
    margin-bottom: 10px;
}

.nav-link {
    display: flex;
    align-items: center;
    color: #fff;
    text-decoration: none;
}

.nav-link i {
    margin-right: 10px;
}

.nav-link span {
    font-size: 16px;
}

.nav-link.active {
    background-color: #555;
    border-radius: 5px;
}

.nav-link.active span {
    font-weight: bold;
}

#show-sidebar {
    position: fixed;
    top: 20px;
    left: 20px;
    z-index: 2;
}
</style>

<script>
document.getElementById('show-sidebar').addEventListener('click', function() {
    document.getElementById('sidebar').classList.add('active');
});

document.getElementById('close-sidebar').addEventListener('click', function() {
    document.getElementById('sidebar').classList.remove('active');
});
</script>