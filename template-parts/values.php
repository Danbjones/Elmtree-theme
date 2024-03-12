<?php
if (get_row_layout() == 'values') {

    $heading = get_sub_field('heading');
    $column_one_text = get_sub_field('column_one_text');
    $icons = get_sub_field('icons');
    $button_one = get_sub_field('button_one');
    $button_two = get_sub_field('button_two');
    $vertical_text_left = get_sub_field('vertical_text_left');
    $vertical_text_right = get_sub_field('vertical_text_right');

    $image = get_sub_field('image');
    $column_two_text = get_sub_field('column_two_text');

?>

<div class="overflow-hidden pt-20">

    <img class="w-full" src="<?= svg('triangle-divider') ?>" alt="triangle divider">

    <section class="relative bg-red pb-20">

        <p class="absolute left-0 bottom-0 vertical-text glacial-bold text-[8.5rem] uppercase opacity-30"><?= $vertical_text_left ?></p>
        <p class="absolute right-0 bottom-0 vertical-text glacial-bold text-[8.5rem] uppercase opacity-30"><?= $vertical_text_right ?></p>

        <div class="max-w-[80%] mx-auto flex flex-col lg:flex-row lg:space-x-20 space-y-10 lg:space-y0">

            <div class="w-full lg:w-1/2 pt-20">

                <h3 class="glacial-bold text-white text-[48px] leading-none mb-8 text-center lg:text-left fade-right-on-scroll"><?= $heading ?></h3>

                <div class="prose max-w-none text-white text-[20px] mb-8 text-center lg:text-left">
                    <?= $column_one_text ?>
                </div>

                <div class="grid grid-cols-2 gap-4 py-10">
                    <?php foreach($icons as $icon) : ?>
                    <div class="flex flex-col space-y-2 lg:space-y-0 lg:flex-row lg:space-x-8 items-center justify-center lg:justify-start">
                        <img class="w-[70px]" src="<?= $icon['icon']['url'] ?>" alt="<?= $icon['icon']['alt'] ?>">
                        <p class="glacial-bold text-white text-[18px] uppercase"><?= $icon['icon_title'] ?></p>
                    </div>
                    <?php endforeach ?>
                </div>

                <div class="flex space-x-4 justify-center lg:justify-start move-up-on-scroll">
                    <a class="min-w-max glacial-bold bg-white border-2 border-white py-4 px-8 text-red text-[18px] uppercase transition ease-in-out duration-500 hover:scale-105 tracking-wide" href="<?= $button_one['url'] ?>"><?= $button_one['title'] ?></a>

                    <a class="min-w-max glacial-bold bg-transparent border-2 border-white py-4 px-8 text-white text-[18px] uppercase transition ease-in-out duration-500 hover:scale-105 tracking-wide" href="<?= $button_two['url'] ?>"><?= $button_two['title'] ?></a>
                </div>

            </div>

            <div class="w-full lg:w-1/2 flex flex-col">
                <img class="img-drop-shadow lg:-mt-32 mb-20 z-10 move-up-on-scroll" src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>">
                <div class="glacial prose text-white text-[20px]">
                    <?= $column_two_text ?>
                </div>
            </div>

        </div>

    </section>

</div>

<?php } ?>