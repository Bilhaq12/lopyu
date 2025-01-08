<?php
/**
 * Template part for displaying manga cards
 */

global $wp_manga_functions;
?>

<div class="col">
    <div class="card h-100">
        <a href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>">
            <?php
            if (has_post_thumbnail()) {
                the_post_thumbnail('manga-thumb', array('class' => 'card-img-top', 'alt' => get_the_title()));
            } else {
                echo '<img src="' . get_template_directory_uri() . '/assets/images/no-image.png" class="card-img-top" alt="No Image Available">';
            }
            ?>
        </a>
        <div class="card-body">
            <h5 class="card-title">
                <a href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>">
                    <?php echo wp_trim_words(get_the_title(), 5); ?>
                </a>
            </h5>
            <?php
            $authors = $wp_manga_functions->get_manga_authors(get_the_ID());
            if (!empty($authors)) {
                echo '<p class="card-text manga-authors">' . implode(', ', $authors) . '</p>';
            }
            ?>
            <div class="manga-stats">
                <?php
                $rating = $wp_manga_functions->get_manga_rating(get_the_ID());
                if ($rating) {
                    echo '<span class="manga-rating"><i class="fas fa-star"></i> ' . number_format($rating, 1) . '</span>';
                }

                $views = $wp_manga_functions->get_manga_views(get_the_ID());
                if ($views) {
                    echo '<span class="manga-views"><i class="fas fa-eye"></i> ' . number_format($views) . '</span>';
                }
                ?>
            </div>
        </div>
        <div class="card-footer">
            <?php
            $latest_chapter = $wp_manga_functions->get_latest_chapter(get_the_ID());
            if ($latest_chapter) {
                echo '<small class="text-muted">Latest: <a href="' . get_the_permalink($latest_chapter['chapter_id']) . '">' . $latest_chapter['chapter_name'] . '</a></small>';
            }
            ?>
        </div>
    </div>
</div>