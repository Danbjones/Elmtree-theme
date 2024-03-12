<?php
if (get_row_layout() == 'intro_slider') {

    $heading = get_sub_field('heading');
    $content = get_sub_field('content');
    $image_slider = get_sub_field('image_slider');

    $top_margin = get_sub_field('top_margin');
    $style = '';

    if(!empty($top_margin)) {
        $style .= 'margin-top: ' . $top_margin . ';';
    }

?>

<section id="intro-slider" class="bg-red w-full bg-contain bg-no-repeat bg-bottom py-20 pt-32"
    style="background-image: url(<?php echo svg('plants-bg') ?>);">

    <div class="w-full xl:max-w-[90%] px-8 mx-auto grid grid-cols-1 lg:grid-cols-6 lg:gap-4 xl:gap-20">

        <div class="relative mt-10 lg:col-span-3">
            <div class="absolute -left-4 -top-4 border-black border-t-[20px] border-l-[20px] bg-transparent h-[400px] md:h-[600px] xl:h-[400px] w-full"></div>

            <div class="relative intro-swiper swiper w-full h-[400px] md:h-[600px] xl:h-[400px] fade-right-on-scroll">
                <div class="swiper-wrapper h-full">

                    <?php foreach($image_slider as $slide) : 
                        
                        $slide_image = $slide['image'];
                    ?>
                    <div class="swiper-slide"><img class="w-full h-full object-cover" src="<?= $slide_image['url'] ?>" alt=""></div>
                    <?php endforeach ?>

                </div>
                <div class="swiper-scrollbar"></div>
            </div>

            <div class="flex justify-between mt-2">
                <img class="arrow-prev cursor-pointer" src="<?= svg('arrow-prev') ?>" alt="">
                <img class="arrow-next cursor-pointer" src="<?= svg('arrow-next') ?>" alt="">
            </div>

        </div>

        <div class="lg:col-span-3 flex flex-col order-first lg:order-last">
            <div class="glacial-bold prose text-center lg:text-left text-white text-[48px] leading-none mb-8 max-w-none fade-left-on-scroll"><?= ucwords($heading) ?></div>
            <div class="glacial text-white text-center lg:text-left text-[18px] prose max-w-none fade-left-on-scroll"><?= $content ?></div>
        </div>

    </div>

</section>

<style>
    @media (min-width: 640px) {
        #intro-slider {
            clip-path: polygon(0 5%, 75% 0, 100% 5%, 100% 100%, 0 100%);
            <?php if(!empty($top_margin)) {
            echo 'margin-top: ' . $top_margin . ';';
            }
            ?>
        }
    }

</style>

<?php } ?>