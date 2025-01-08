<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
            <!-- Flower start -->
            <div id="sakura-container" class="hidden">
            <canvas id="sakura"></canvas>
        </div>
        <!-- Flower end -->

        <div id="preloader">
            <div class="preloader-content">
                <div class="loading-circle">
                    <video src="assets/video/logo/preloader.mp4" autoplay loop muted class="preloader-video"></video>
                </div>
                <div class="loading-spinner"></div>
            </div>
        </div>
        <!-- Preloader end -->

            <!-- Header Start -->
            <header>
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand" href="#">Lopyu Nolep</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="#manga">Manga</a></li>
                            <li class="nav-item"><a class="nav-link" href="#novels">Novels</a></li>
                            <li class="nav-item"><a class="nav-link" href="#genres">Genres</a></li>
                        </ul>
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search Title">
                            <button class="btn btn-outline-light" type="submit">Search</button>
                        </form>
                        <div class="ms-3" id="authSection">
                            <a href="#" class="btn btn-outline-light me-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
                            <a href="#" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#signupModal">Sign Up</a>
                        </div>
                        <div class="ms-3 dropdown d-none" id="userDropdown">
                            <button class="btn btn-outline-light dropdown-toggle" type="button" id="userDropdownMenu" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user"></i> <span id="username"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="userDropdownMenu">
                                <li><a class="dropdown-item" href="/pages/user/profile.html">Profile</a></li>
                                <li><a class="dropdown-item" href="/pages/user/history.html">History</a></li>
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#settingsModal">Settings</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#" id="logoutBtn">Logout</a></li>
                            </ul>
                        </div>
                        <!-- tombol night mode -->
                        <button id="nightModeToggle" class="btn btn-outline-light ms-2">
                            <i class="fas fa-moon"></i>
                        </button>
                    </div>
                </div>
            </nav>
        </header>
        <!-- Header End -->