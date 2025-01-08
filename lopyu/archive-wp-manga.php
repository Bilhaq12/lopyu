<?php
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php if (have_posts()) : ?>
            <header class="page-header">
                <h1 class="page-title"><?php post_type_archive_title(); ?></h1>
            </header>

            <?php
            while (have_posts()) :
                the_post();

                // Gunakan fungsi Madara Core jika tersedia, atau gunakan template default
                if (function_exists('madara_manga_archive_item')) {
                    madara_manga_archive_item();
                } else {
                    get_template_part('template-parts/content', 'archive');
                }

            endwhile;

            the_posts_navigation();

        else :
            get_template_part('template-parts/content', 'none');
        endif;
        ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();