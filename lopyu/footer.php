<footer class="bg-dark text-light mt-5">
        <div class="container py-4">
            <div class="row">
                <div class="col-md-4">
                    <h5>About Us</h5>
                    <p><?php bloginfo('description'); ?></p>
                </div>
                <div class="col-md-4">
                    <h5>Quick Links</h5>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer-menu',
                        'container' => false,
                        'menu_class' => 'list-unstyled',
                        'fallback_cb' => '__return_false',
                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth' => 1,
                    ));
                    ?>
                </div>
                <div class="col-md-4">
                    <h5>Connect With Us</h5>
                    <div class="social-icons">
                        <a href="#" class="text-light me-2"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-light me-2"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-light me-2"><i class="fab fa-instagram"></i></a>
                    </div>
                    <!-- Tambahkan tombol sakura di sini -->
                    <div class="mt-3">
                        <button id="sakuraToggle" class="btn btn-outline-light">
                            <i class="fas fa-cherry-blossom"></i> Toggle Sakura
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center py-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>