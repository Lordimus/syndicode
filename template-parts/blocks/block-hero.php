<?php
	$className = 'hero';
	if (!empty($block['className'])) {
		$className .= ' ' . $block['className'];
	}
?>

<?php if( have_rows('hero') ): while( have_rows('hero') ) : the_row(); ?>
    <section class="<?php echo esc_attr($className); ?>">
        <div class="hero__wrap">

            <?php if( have_rows('sticky') ): while( have_rows('sticky') ) : the_row(); ?>
                <div class="hero__sticky" data-anim="fadein">
                    <h1 class="hero__sticky-title"><?php echo get_sub_field('title'); ?></h1>
                    <?php 
                        $link = get_sub_field('link');
                        if( $link ): 
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                            <a class="hero__sticky-link primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                                <?php echo esc_html( $link_title ); ?>
                            </a>
                    <?php endif; ?>
                </div>
            <?php endwhile;	endif; ?>

            <?php if( have_rows('content') ): while( have_rows('content') ) : the_row(); ?>
                <div class="hero__content">
                    <div class="hero__cases" data-anim="fadein">
                        <?php if( have_rows('case') ): while( have_rows('case') ) : the_row(); ?>
                            <div class="hero__case">
                                <p class="hero__case-name text-s"><?php echo get_sub_field('name'); ?></p>
                                <span class="hero__case-number h0"><?php echo get_sub_field('number'); ?></span>
                            </div>
                        <?php endwhile;	endif; ?>
                    </div>

                    <div class="hero__accordion" data-anim="fadein">
                        <?php 
                            $counter = 1;
                            if( have_rows('accordion') ): while( have_rows('accordion') ) : the_row();
                         ?>
                            <div class="hero__item <?php if ($counter == 1) { echo 'active'; } ?>">
                                <span class="hero__item-count"><?php echo $counter . " /" ;?></span>
                                <p class="hero__item-title"><?php echo get_sub_field('title'); ?></p>
                                <div class="hero__item-content">
                                    <p class="hero__item-text text-l"><?php echo get_sub_field('text'); ?></p>
                                    <p class="hero__item-description text-s"><?php echo get_sub_field('description'); ?></p>
                                </div>
                            </div>
                        <?php $counter++; endwhile;	endif; ?>
                    </div>
                </div>
            <?php endwhile;	endif; ?>

        </div>
    </section>
<?php endwhile;	endif; ?>