<?php
/**
 * Single template for a custom post type with custom fields (ACF or meta).
 */

get_header();
?>

<main id="primary" class="site-main single-custom-wrapper">

    <?php while (have_posts()):
        the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <!-- Featured Image -->
            <?php if (has_post_thumbnail()): ?>
                <div class="custom-featured-image">
                    <?php the_post_thumbnail('large'); ?>
                </div>
            <?php endif; ?>

            <!-- Title -->
            <h1 class="custom-title"><?php the_title(); ?></h1>

            <!-- Custom Fields Section -->
            <div class="custom-fields-box">

                <?php
                // EXAMPLE CUSTOM FIELDS — replace with your real field names
                $custom_text = get_post_meta(get_the_ID(), 'job_title', true);
                $custom_number = get_post_meta(get_the_ID(), 'salary', true);
                $custom_select = get_post_meta(get_the_ID(), 'location', true);

                // For ACF users (you may replace the above with get_field())
                // $custom_text = get_field('custom_text');
                ?>



                <?php if ($custom_number): ?>
                    <p><strong>Salary:</strong> <?php echo esc_html($custom_number); ?></p>
                <?php endif; ?>

                <?php if ($custom_select): ?>
                    <p><strong>Location:</strong> <?php echo esc_html($custom_select); ?></p>
                <?php endif; ?>



            </div>

            <!-- Main Content -->
            <div class="custom-content">
                <?php the_content(); ?>
            </div>

            <!-- Back Link -->
            <footer class="custom-footer">
                <a href="<?php echo get_post_type_archive_link(get_post_type()); ?>">
                    ← Back to all items
                </a>
            </footer>

        </article>

    <?php endwhile; ?>

</main>

<?php get_footer(); ?>