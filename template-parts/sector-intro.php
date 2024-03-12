<?php
if (get_row_layout() == 'sector_intro') {

    $heading = get_sub_field('heading');
    $text = get_sub_field('text');
    $image = get_sub_field('image');
    $titleImage = get_sub_field('title_imagegif');
    $button = get_sub_field('button');
    $background_icon = get_sub_field('background_icon');
    $vertical_text = get_sub_field('vertical_text');

    $background_colour = get_sub_field('background_colour');
    $reverse_columns = get_sub_field('reverse_columns');

    $top_margin = get_sub_field('top_margin');
    $style = '';

?>

<section class="sector-intro relative w-full overflow-hidden md:py-20 js-show-on-scroll bg-<?= $background_colour ?>">

    <p class="absolute right-0 bottom-0 hidden lg:block vertical-text glacial-bold text-[8.5rem] uppercase opacity-20"><?= $vertical_text ?></p>

    <img class="absolute left-10 bottom-10 z-1 w-[300px] z-0" src="<?= $background_icon['url'] ?>" alt="<?= $background_icon['alt'] ?>">

    <div class="max-w-full max-w-[90%] 2xl:max-w-[70%] mx-auto flex flex-col lg:flex-row gap-16 px-8 pt-20 <?= $reverse_columns ? 'lg:flex-row-reverse' : '' ?>">

        <div class="w-full lg:w-1/2 z-10">
            <div class="flex items-center mb-10 lg:mb-0">
                <?php if ($titleImage) { ?>
                    <img src="<?php echo $titleImage['url']; ?>" width="140px" height="140px" class="hidden mr-6 md:block">
                <?php } ?>
                <h3 class="glacial-bold text-[35px] md:text-[65px] text-white uppercase mb-6 leading-none text-center lg:text-right fade-right-on-scroll"><?= $heading ?></h3>
            </div>
           
            <img class="sector-intro_image w-full" src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>">
        </div>

        <div class="w-full lg:w-1/2">
            <div class="glacial prose text-white text-[18px] text-center lg:text-left mb-6">
                <?= $text ?>
            </div>
            <div class="flex justify-center lg:justify-start z-10">
                <a class="glacial-bold bg-transparent border-2 border-white py-4 px-8 text-white text-[18px] uppercase transition ease-in-out duration-500 hover:scale-105 z-10" href="<?= $button['url'] ?>"><?= $button['title'] ?></a>
            </div>
        </div>

    </div>

</section>

<style>
    @media (min-width: 640px) {
        .sector-intro {
            <?php if(!empty($top_margin)) {
            echo 'margin-top: ' . $top_margin . ';';
            }
            ?>
        }
    }
</style>

<?php } ?>