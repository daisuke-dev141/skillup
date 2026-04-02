<li class="accordion-area">
    <details class="common-accordion">
        <summary>Q<?php echo $args['q_num']; ?>.<?php the_title(); ?></summary>
        <div class="accordion-answer">
            <div class="qa-answer">
                <span class="qa-label">A.</span>
                <div class="qa-text">
                    <?php the_content(); ?>
                    <?php if (get_field('in_link') && get_field('in_name')): ?>
                        <p class="qa-name"><a href="<?php the_field('in_link') ?>" class="qa-link" target="_blank"><?php the_field('in_name') ?></a></p>
                    <?php endif; ?>

                    <?php if (get_field('out_link') && get_field('out_name')): ?>
                        <p class="qa-name"><a href="<?php the_field('out_link') ?>" class="qa-link" target="_blank"><?php the_field('out_name') ?></a></p>
                    <?php endif; ?>
                </div>
                <br>
            </div>
        </div>
    </details>
</li>
