<?php
/**
 * Template Name: Job Listings
 * Template Post Type: page
 */

get_header();
?>

<main id="primary" class="site-main custom-page-template">

    <?php
    while (have_posts()):
        the_post();
        ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>
            </header>

            <div class="entry-content">
                <?php
                // Query Custom Post Type
                $args = array(
                    'post_type' => 'jobs',
                    'posts_per_page' => -1,
                    'orderby' => 'date',
                    'order' => 'DESC',
                );

                $cpt_query = new WP_Query($args);
                ?>

                <div class="cpt-card-container">

                    <?php if ($cpt_query->have_posts()): ?>
                        <?php while ($cpt_query->have_posts()):
                            $cpt_query->the_post(); ?>

                            <div class="cpt-card">
                                <?php if (has_post_thumbnail()): ?>
                                    <div class="cpt-card-image">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('medium'); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>

                                <div class="cpt-card-content">
                                    <h3 class="cpt-card-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h3>

                                    <p class="cpt-card-excerpt">
                                        <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
                                    </p>

                                    <a class="cpt-card-button" href="<?php the_permalink(); ?>">
                                        Read More
                                    </a>
                                </div>
                            </div>

                        <?php endwhile; ?>
                    <?php else: ?>

                        <p>No items found.</p>

                    <?php endif; ?>

                </div>

                <?php wp_reset_postdata(); ?>
            </div>
        </article>

    <?php endwhile; ?>

</main>

<?php get_footer(); ?>