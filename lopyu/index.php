<?php get_header(); ?>

<main class="container mt-4">
    <section id="featured-carousel" class="mb-4">
        <!-- Implement carousel here -->
    </section>

    <section id="new-releases" class="mb-4">
        <h2 class="section-title">New Releases</h2>
        <div class="row row-cols-2 row-cols-md-4 row-cols-lg-6 g-4">
            <?php
            $args = array(
                'post_type' => 'wp-manga',
                'posts_per_page' => 6,
                'orderby' => 'date',
                'order' => 'DESC'
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    get_template_part('template-parts/content', 'manga-card');
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </section>

    <section id="popular-this-week" class="mb-4">
        <h2 class="section-title">Popular This Week</h2>
        <div class="row row-cols-2 row-cols-md-4 row-cols-lg-6 g-4">
            <?php
            $args = array(
                'post_type' => 'wp-manga',
                'posts_per_page' => 6,
                'meta_key' => '_wp_manga_week_views',
                'orderby' => 'meta_value_num',
                'order' => 'DESC'
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    get_template_part('template-parts/content', 'manga-card');
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </section>

    <section id="genres-section" class="mb-4">
        <h2 class="section-title">Browse by Genre</h2>
        <div class="genre-list">
            <?php
            $genres = get_terms(array(
                'taxonomy' => 'wp-manga-genre',
                'hide_empty' => false,
            ));
            if (!empty($genres) && !is_wp_error($genres)) :
                foreach ($genres as $genre) {
                    echo '<a href="' . get_term_link($genre) . '" class="btn btn-outline-primary me-2 mb-2">' . $genre->name . '</a>';
                }
            else:
                echo '<p>No genres found.</p>';
            endif;
            ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>