
<header class="header">
    <div class="header-inner">
        <div class="container">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-12">

                        <div class="logo">
                            <a href="index.html"><img src="../resources/images/logo.png" alt="#"></a>
                        </div>
                        <div class="mobile-nav"></div>
                        <!-- End Mobile Nav -->
                    </div>
                    <div class="col-lg-7 col-md-9 col-12">

                        <div class="main-menu">
                            <nav class="navigation">
                                <ul class="nav menu">
                                    <li class=""><a href="/index">Home <i class="icofont-rounded-down"></i></a>
                                        <ul class="dropdown">
                                            <li><a href="http://sspu.edu.cn/">About SSPU</a></li>
                                            <li><a href="https://www.univ-bobo.gov.bf/accueil">About UNB</a></li>
                                            <li><a href="https://www.huawei.com/cn/">About HUAWEI</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="/gallery">Gallery</a></li>
                                    <li><a href="/articles">Articles </a></li>
                                    <li><a href="/events">Events </a>
                                

                                    <li><a href="/course">Course</a></li>
                                </ul>
                            </nav>
                        </div>

                    </div>
                    <div class="col-lg-2 col-12">
                        <div class="get-quote">
                            <a href="#" class="btn">Language: English</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var currentPath = window.location.pathname;
        var menuItems = document.querySelectorAll('.nav.menu li');
        var lastActiveItem = null;

        menuItems.forEach(function(item) {
            item.classList.remove('active');
            var link = item.querySelector('a');
            var linkPath = link.getAttribute('href');

            if (currentPath === linkPath || currentPath.startsWith(linkPath)) {
                item.classList.add('active');
                lastActiveItem = item;
                return;
            }
        });

        if (!document.querySelector('.nav.menu li.active') && lastActiveItem) {
            lastActiveItem.classList.add('active');
        }
    });
</script>

</header>