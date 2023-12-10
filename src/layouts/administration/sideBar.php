<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>ADMIN</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">

            <div class="ms-3">
                <h6 class="mb-0">LUBAN</h6>
                <span>Workshop</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="/admin" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <a href="/admin/users" class="nav-item nav-link"><i class="fas fa-user-friends me-2 "></i>Users</a>


            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-comment-alt me-2"></i>Communications</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="newsclass.php" class="dropdown-item">News class</a>
                    <a href="news.php" class="dropdown-item">News</a>
                </div>
            </div>
            <a href="courses.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Courses</a>
            <a href="documents.php" class="nav-item nav-link"><i class="far fa-file-alt me-2"></i>Documents</a>
            <a href="signOut.php" class="nav-item nav-link"><i class="fas fa-sign-out-alt me-2"></i>Sign-out</a>
        </div>
    </nav>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
    $(document).ready(function() {
        var currentPath = window.location.pathname;
       
        $('.navbar-nav a.nav-link').removeClass('active');

        $('.navbar-nav a.nav-link').each(function() {
            var linkPath = $(this).attr('href');
            if (currentPath.endsWith(linkPath)) {
                $(this).addClass('active');
                return false; 
            }
        });
    });
</script>
<!-- Sidebar End -->