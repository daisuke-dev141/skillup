<li class="column-card">
    <a href="<?php the_permalink(); ?>">

        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('medium', ['class' => 'column-card-img']); ?>
        <?php else : ?>
            <img class="column-card-img" src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/o-summary-woman-1.png'); ?>" alt="">
        <?php endif; ?>

        <?php
        $terms = get_the_terms(get_the_ID(), 'column_type');
        $term_name = '';

        if (!empty($terms) && !is_wp_error($terms)) {
            $term_name = $terms[0]->name;
        }
        ?>

        <div class="column-item-text">

            <div class="column-inline">
                <time class="column-date" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                    <?php echo esc_html(get_the_date('Y.m.d')); ?>
                </time>

                <?php if ($term_name) : ?>
                    <span class="column-category">
                        <?php echo esc_html($term_name); ?>
                    </span>
                <?php endif; ?>
            </div>

            <h4 class="card-title"><?php the_title(); ?></h4>

            <p class="card-desc">
                <?php echo wp_trim_words(get_the_excerpt(), 30, '…'); ?>
            </p>

        </div>
    </a>
</li>
