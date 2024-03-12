<?php
if (get_row_layout() == 'post_slider') {

    $shortcode = get_sub_field('shortcode');
    $args = array(
        'posts_per_page'   => -1,
        'post_type'        => 'post',
    );
    $the_query = new WP_Query( $args );

?>

<section class="bg-black" style="clip-path: polygon(0% 0%, 100% 0%, 100% 90%, 25% 100%, 0 90%);">


    <div class="max-w-full xl:max-w-[80%] mx-auto flex flex-col lg:flex-row py-20 overflow-hidden">

        <div class="w-full lg:w-1/2 xl:w-2/3 px-10">
            <?php echo do_shortcode($shortcode); ?>
        </div>

        <div class="w-full lg:w-1/2 xl:w-1/3 lg:border-l-4 border-red xl:pl-20 px-8">
            <h3 class="glacial-bold text-white text-[65px] leading-none mb-8">Latest News/Blog</h3>

            <div class="news-post-slider swiper">
                <div class="swiper-wrapper">


                    <?php if ($the_query->have_posts()): ?>

                    <?php while ($the_query->have_posts()): $the_query->the_post(); ?>

                    <div class="swiper-slide cursor-[grab]">
                        <p class="text-white glacial-bold text-[35px] leading-none mb-8"><?= get_the_title() ?></p>
                        <div class="flex items-center space-x-10 mb-4">
                            <time class="glacial-bold text-[17px] text-red leading-none"><?= get_the_date() ?></time>
                            <div class="flex space-x-6">
                                <img class="news-post-slider-prev cursor-pointer" src="<?= svg('arrow-prev') ?>" alt="">
                                <img class="news-post-slider-next cursor-pointer" src="<?= svg('arrow-next') ?>" alt="">
                            </div>
                        </div>

                        <p class="glacial text-white text-[18px] mb-8"><?= wp_trim_words(get_the_excerpt(), 25) ?></p>
                        <a class="inline-block glacial-bold bg-transparent border-2 border-white py-4 px-8 text-white text-[18px] uppercase"
                            href="<?= get_the_permalink() ?>">Read more</a>
                    </div>


                    <?php endwhile; ?>

                    <?php endif ?>


                </div>

            </div>

        </div>

    </div>


</section>

<?php } ?>