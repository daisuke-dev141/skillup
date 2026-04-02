<li class="useful-information-card">
    <a href="<?php the_permalink(); ?>" rel="noopener">
        <div class="common-accordion-content">
            <div class="course-card-inner">
                <div class="course-item">
                    <h4 class="sub-course-title"><?php the_title(); ?></h4>

                    <div class="course-detail-flex">
                        <div class="detail-info">
                            <p class="course-text">
                                <?php echo esc_html(get_the_excerpt()); ?>
                            </p>

                            <div class="badge-group">
                                <?php
                                $levels = get_the_terms(get_the_ID(), 'course_level');
                                // 配列の0番目（最初の1つ）が存在するかチェック
                                if (!empty($levels) && !is_wp_error($levels)) :
                                ?>
                                    <span class="badge"><?php echo esc_html($levels[0]->name); ?></span>
                                <?php endif; ?>




                                <?php
                                $types = wp_get_post_terms(get_the_ID(), 'course_type');

                                foreach ($types as $type) {
                                    if ($type->parent == 0) {
                                        echo '<span class="badge">' . esc_html($type->name) . '</span>';
                                        break;
                                    }
                                }
                                ?>


                            </div>

                            <div class="recommend-box">
                                <p class="recommend-tag">おすすめポイント</p>
                                <p><?php the_field('course_target'); ?></p>
                            </div>

                        </div>

                        <div class="detail-visual">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium'); ?>
                            <?php else : ?>
                                <img src="<?php echo esc_url(get_theme_file_uri('assets/images/common/no-image.jpg')); ?>" alt="No Image">
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </a>
</li>
