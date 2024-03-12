<?php
if (get_row_layout() == 'sector_cards') {

    $heading = get_sub_field('heading');
    $text = get_sub_field('text');
    $button = get_sub_field('button');
    $vertical_text = get_sub_field('vertical_text');
    $section_divider = get_sub_field('section_divider');
    $top_margin = get_sub_field('top_margin');
    $style = '';

    if($section_divider) {
        $style .= 'clip-path: polygon(0 0, 75% 5%, 100% 0, 100% 100%, 0 100%); ';
    }

    if(!empty($top_margin)) {
        $style .= 'margin-top: ' . $top_margin . ';';
    }

?>

<section class="sector-cards pt-20 lg:pt-0 relative bg-black w-full overflow-hidden flex items-center justify-center" style="<?= $style ?>">

<p class="absolute right-0 bottom-0 vertical-text glacial-bold text-[8.5rem] uppercase opacity-30"><?= $vertical_text ?></p>

    <div class="max-w-full 2xl:max-w-[70%] mx-auto grid grid-cols-1 lg:grid-cols-5 py-10 lg:py-28 px-8 2xl:px-0">

        <div class="lg:col-span-2">

            <div class="w-full">

                <div class="w-full flex items-center lg:items-end justify-center mb-4 lg:mb-0">
                    <h3 class="fade-right-on-scroll glacial-bold text-center lg:text-left text-white text-[45px] lg:text-[65px] leading-none uppercase">Project Sectors</h3>
                    <div class="hidden lg:block bg-white h-[6px] w-[100%] mb-6"></div>
                </div>

                <div class="flex flex-col items-center lg:items-start mb-20 lg:mb-0">
                    <div class="glacial prose text-base text-white text-center lg:text-left pr-4 mb-4 prose-li:text-left"><?= $text ?></div>

                    <?php 
                    $link = get_sub_field('button');
                    if( $link ): 
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                        <a class="inline-block glacial-bold bg-transparent border-2 border-white py-4 px-8 text-white text-[18px] uppercase transition ease-in-out duration-500 hover:scale-105" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    <?php endif; ?>
                </div>

            </div>

        </div>


        <div class="lg:col-span-1 flex flex-col space-y-2 lg:mr-2 mb-8 lg:mb-0 fade-left-on-scroll">

            <div class="relative w-full h-[260px] border-[6px] border-white box-border flex items-center justify-center">
                <div class="lg:hidden absolute -translate-x-1/2 left-1/2 origin-top -top-8 bg-white h-[6px] w-[60px] rotate-90"></div>
                <lottie-player id="housing-lottie" src="<?php echo get_template_directory_uri() . '/src/lottie/housing.json' ?>" style="width:200px; height: 200px;">"></lottie-player>
            </div>

            <a class="glacial-bold text-[22px] text-black bg-white border-[6px] border-white w-full py-4 text-center box-border uppercase" href="#">Housing</a>

        </div>

        <div class="lg:col-span-1 flex flex-col space-y-2 lg:mr-2 mb-8 lg:mb-0 fade-left-on-scroll">


            <div class="w-full h-[260px] border-[6px] border-white box-border flex items-center justify-center">
                <lottie-player id="commercial-lottie" src="<?php echo get_template_directory_uri() . '/src/lottie/commercial.json' ?>" style="width:200px; height: 200px;">"></lottie-player>
            </div>

            <a class="glacial-bold text-[22px] text-black bg-white border-[6px] border-white w-full py-4 text-center box-border uppercase" href="#">Commercial</a>

        </div>

        <div class="lg:col-span-1 flex flex-col space-y-2 fade-left-on-scroll">

            <div class="w-full h-[260px] border-[6px] border-white box-border flex items-center justify-center">
                <lottie-player id="maintenance-lottie" src="<?php echo get_template_directory_uri() . '/src/lottie/maintenance.json' ?>" style="width:200px; height: 200px;">"></lottie-player>
            </div>

            <a class="glacial-bold text-[22px] text-black bg-white border-[6px] border-white w-full py-4 text-center box-border uppercase" href="#">Maintenance</a>

        </div>

    </div>

</section>

<?php } ?>