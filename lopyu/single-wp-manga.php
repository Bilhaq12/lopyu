<?php
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php
        while (have_posts()) :
            the_post();

            // Gunakan fungsi-fungsi Madara Core untuk menampilkan konten manga
            if (function_exists('madara_manga_single_content')) {
                madara_manga_single_content();
            } else {
                // Fallback jika fungsi Madara Core tidak tersedia
                get_template_part('template-parts/content', 'single');
            }

            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;

        endwhile; // End of the loop.
        ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();