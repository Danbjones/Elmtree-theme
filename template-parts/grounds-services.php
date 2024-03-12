<?php
if (get_row_layout() == 'grounds_services') {

    $heading = get_sub_field('heading');
    $row_one_content = get_sub_field('row_one_content');
    $row_one_image = get_sub_field('row_one_image');
    $row_two_image = get_sub_field('row_two_image');
    $row_two_content = get_sub_field('row_two_content');
    $vertical_text = get_sub_field('vertical_text');

?>

<section id="grounds-services" class="relative bg-red py-40 my-10 js-show-on-scroll" style="clip-path: polygon(0 5%, 75% 0, 100% 5%, 100% 95%, 25% 100%, 0 95%);">

    <p class="absolute left-0 bottom-0 vertical-text glacial-bold text-[8.5rem] uppercase opacity-30"><?= $vertical_text ?></p>
    

    <div class="max-w-full lg:max-w-[90%] 2xl:max-w-[70%] mx-auto flex flex-col lg:flex-row items-center gap-12 mb-10 px-8 lg:px-0">

        <div class="w-full lg:w-1/2 z-10">
            <div class="flex flex-col xl:flex-row xl:space-x-8 items-center xl:items-end mb-8">
                <img class="mb-4 lg:mb-0 max-w-[150px] xl:max-w-[198px]" src="<?= svg('grounds-services-icon') ?>" alt="">
                <h4 class="glacial-bold text-white text-[35px] xl:text-[65px] leading-none uppercase"><?= $heading ?></h4>
            </div>
            <div class="glacial-bold prose max-w-none leading-snug text-white text-[20px]">
                <?= $row_one_content ?>
            </div>
        </div>

        <div class="w-full lg:w-1/2 z-10">
            <img class="w-full img-drop-shadow fade-left-on-scroll" src="<?= $row_one_image['url'] ?>" alt="<?= $row_one_image['alt'] ?>">
        </div>

    </div>


    <div class="max-w-full lg:max-w-[90%] 2xl:max-w-[70%] mx-auto flex flex-col flex-col-reverse lg:flex-row  items-center gap-12 px-8 lg:px-0">

        <div class="w-full lg:w-1/2 z-10">
            <img class="w-full img-drop-shadow fade-right-on-scroll" src="<?= $row_two_image['url'] ?>" alt="<?= $row_two_image['alt'] ?>">
        </div>

        <div class="w-full lg:w-1/2 z-10">
            <div class="glacial-bold leading-snug prose max-w-none text-white text-[20px]">
                <?= $row_two_content ?>
            </div>
        </div>

    </div>

</section>

<?php } ?>