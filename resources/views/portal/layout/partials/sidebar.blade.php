<div class="navbar-vertical navbar nav-dashboard">
    <div class="h-100" data-simplebar>
        <!-- Brand logo -->
        <a class="navbar-brand" href="../index-2.html">
            <img src="../assets/images/brand/logo/logo-2.svg" alt="dash ui - bootstrap 5 admin dashboard template" />
        </a>
        <!-- Navbar nav -->
        <ul class="navbar-nav flex-column" id="sideNavbar">
            <!-- Nav item -->
            <li class="nav-item">
                <a
                    class="nav-link has-arrow "
                    href="#!"
                    data-bs-toggle="collapse"
                    data-bs-target="#navDashboard"
                    aria-expanded="false"
                    aria-controls="navDashboard">
                    <i data-feather="home" class="nav-icon me-2 icon-xxs"></i>
                    Dashboard
                </a>

                <div id="navDashboard" class="collapse  show " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link  active " href="dashboard-analytics.html">Analytics</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../index-2.html">Project</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link has-arrow " href="dashboard-ecommerce.html">Ecommerce</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link has-arrow " href="dashboard-crm.html">CRM</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link has-arrow " href="dashboard-finance.html">Finance</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link has-arrow " href="dashboard-blog.html">Blog</a>
                        </li>
                    </ul>
                </div>
            </li>
           
            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link has-arrow " href="{{route('skills.index')}}">
                    <i data-feather="message-square" class="nav-icon me-2 icon-xxs"></i>
                    <i class="fa fa-car"></i>
                    Skills
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link has-arrow " href="chat-app.html">
                    <i data-feather="message-square" class="nav-icon me-2 icon-xxs"></i>
                    Chat
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link has-arrow  collapsed " href="#!" data-bs-toggle="collapse" data-bs-target="#navDocs" aria-expanded="false" aria-controls="navDocs">
                    <i data-feather="package" class="nav-icon me-2 icon-xxs"></i>
                    Docs
                </a>
                <div id="navDocs" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item"><a href="../docs/index.html" class="nav-link ">Introduction</a></li>
                        <li class="nav-item"><a href="../docs/environment-setup.html" class="nav-link ">Environment setup</a></li>
                        <li class="nav-item"><a href="../docs/working-with-gulp.html" class="nav-link ">Working with Gulp</a></li>
                        <li class="nav-item"><a href="../docs/compiled-files.html" class="nav-link ">Compiled Files</a></li>
                        <li class="nav-item"><a href="../docs/file-structure.html" class="nav-link ">File Structure</a></li>
                        <li class="nav-item"><a href="../docs/resources-assets.html" class="nav-link ">Resources & assets</a></li>
                        <li class="nav-item"><a href="../docs/changelog.html" class="nav-link ">Changelog</a></li>
                    </ul>
                </div>

            </li>
             <li class="nav-item">
                <a class="nav-link has-arrow " href="show">
                    <i data-feather="message-square" class="nav-icon me-2 icon-xxs"></i>
                    Educations
                </a>
            </li>
        </ul>
    </div>
</div>