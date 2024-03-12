<?php
if (get_row_layout() == 'featured_project') {

    $heading = get_sub_field('heading');
    $project_name = get_sub_field('project_name');
    $project_duration = get_sub_field('project_duration');
    $contract_value = get_sub_field('contract_value');
    $location = get_sub_field('location');
    $summary = get_sub_field('summary');
    $button = get_sub_field('button');
    $gallery_slider = get_sub_field('gallery_slider');
    $vertical_text = get_sub_field('vertical_text');

    $twitter = get_field('twitter', 'option');
    $facebook = get_field('facebook', 'option');
    $instagram = get_field('instagram', 'option');

    $formatter = new NumberFormatter('en_GB',  NumberFormatter::CURRENCY);

?>

<section id="featured-project" class="relative bg-red w-full bg-contain bg-no-repeat bg-bottom py-20 overflow-hidden mt-20 pt-32" style="clip-path: polygon(0 5%, 75% 0, 100% 5%, 100% 100%, 0 100%);">

    <p class="absolute left-0 bottom-0 vertical-text glacial-bold text-[8.5rem] uppercase opacity-30"><?= $vertical_text ?></p>

    <div class="w-full xl:max-w-[90%] px-8 mx-auto grid grid-cols-1 lg:grid-cols-12 lg:gap-4 xl:gap-20 z-10">

        <div class="lg:col-span-5 flex flex-col z-10">
            <h3 class="glacial-bold text-center lg:text-left text-white text-[48px] lg:text-[65px] leading-none mb-8 uppercase max-w-1/2 fade-right-on-scroll"><?= $heading ?></h3>
            <h4 class="glacial-bold text-[36px] text-white mb-8 fade-right-on-scroll"><?= $project_name ?></h4>

            <div class="flex flex-col border-t-2 border-b-2 border-white text-white text-[18px] glacial-bold py-4 uppercase fade-right-on-scroll mb-6">

                <div class="flex flex-col lg:flex-row flex-wrap justify-between gap-4">
                    <p>Project Duration: <span><?= $project_duration ?></span></p>
                    <p>Contract Value: <span><?= $formatter->formatCurrency($contract_value, 'gbp') ?></span></p>
                    <p>Location: <span><?= $location ?></span></p>
                </div>

            </div>

            <p class="glacial text-white text-[18px] mb-8 fade-right-on-scroll"><?= $summary ?></p>

            <div class="w-full flex flex-col lg:flex-row flex-col-reverse lg:space-x-10 items-center fade-right-on-scroll">
                <a class="min-w-max inline-block glacial-bold bg-transparent border-2 border-white py-4 px-8 text-white text-[18px] uppercase transition ease-in-out duration-500 hover:scale-105" href="<?= $button['url'] ?>"><?= $button['title'] ?></a>
                <div class="flex space-x-10 items-center mb-4 lg:mb-0">
                    <a href="<?= $twitter ?>"><img class="min-w-max" src="<?= svg('twitter-white') ?>" alt="twitter icon"></a>
                    <a href="<?= $facebook ?>"><img class="min-w-max" src="<?= svg('facebook-white') ?>" alt="facebook icon"></a>
                    <a href="<?= $instagram ?>"><img class="min-w-max" src="<?= svg('instagram-white') ?>" alt="instagram icon"></a>
                </div>
            </div>
            
        </div>

        <div class="mt-10 lg:col-start-7 lg:col-end-13">

            <div class="relative featured-project-slider swiper w-full h-[400px] md:h-[600px] xl:h-[400px] fade-left-on-scroll">
                <div class="swiper-wrapper h-full">

                    <?php foreach($gallery_slider as $gallery_slide) : 
                        
                        $slide_image = $gallery_slide['image'];
                    ?>
                    <div class="swiper-slide"><img class="w-full h-full object-cover" src="<?= $slide_image['url'] ?>" alt=""></div>
                    <?php endforeach ?>

                </div>

                <div class="absolute bottom-10 w-full flex space-x-8 justify-center z-10">
                    <img class="featured-project-slider-prev cursor-pointer" src="<?= svg('arrow-prev') ?>" alt="">
                    <img class="featured-project-slider-next cursor-pointer" src="<?= svg('arrow-next') ?>" alt="">
                </div>

            </div>

        </div>

    </div>

</section>

<?php } ?>