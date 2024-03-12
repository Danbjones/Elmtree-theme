<?php
if (get_row_layout() == 'cta_banner') {

    $heading = get_sub_field('heading');
    $text = get_sub_field('text');
    $button = get_sub_field('button');
    $image = get_sub_field('image');
    $colour_theme = get_sub_field('colour_theme');

    if($colour_theme === 'red') {
        $border_colour = 'black';
    } elseif($colour_theme === 'black') {
        $border_colour = 'red';
    }

?>

<section class="bg-white pt-8 pb-20">

    <div class="max-w-[90%] 2xl:max-w-[70%] mx-auto">

        <div class="bg-<?= $colour_theme ?> box-content max-w-full xl:max-w-[95%] xl:border-r-[104px] xl:border-<?= $border_colour ?> flex flex-col flex-col-reverse lg:flex-row p-8 lg:space-x-4">
            <div class="flex justify-center lg:block 2xl:relative w-full lg:w-1/3">
                <img class="fade-right-on-scroll -mb-20 lg:-mb-0 2xl:absolute 2xl:-bottom-20 2xl:-left-20 lg:w-[350px] lg:h-[350px] object-cover" src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>">
            </div>
            <div class="w-full lg:w-2/3">
                <h3 class="fade-left-on-scroll glacial-bold text-[35px] lg:text-[48px] text-white leading-none mb-4 text-center lg:text-left">
                    <?= $heading ?>
                </h3>
                <div class="glacial prose max-w-none text-white text-[18px] lg:text-[20px] mb-8 text-center lg:text-left">
                    <?= $text ?>
                </div>
                <div class="w-full flex items-center justify-center lg:items-start lg:justify-start mb-8 lg:mb-0">
                    <a class="glacial-bold bg-transparent border-2 border-white py-4 px-8 text-white text-[18px] uppercase transition ease-in-out duration-500 hover:scale-105" href="<?= $button['url'] ?>"><?= $button['title'] ?></a>
                </div>
            </div>
        </div>

    </div>

</section>

<?php } ?>