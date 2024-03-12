<?php
if (get_row_layout() == 'panels') {

    $heading = get_sub_field('heading');
    $text = get_sub_field('text');
    $image = get_sub_field('image');
    $colour_theme = get_sub_field('colour_theme');
    $reverse_columns = get_sub_field('reverse_columns');


    switch($colour_theme) {
        case 'red':
            $colour = 'white';
            break;
        case 'black':
            $colour = 'red';
            break;
        case 'white':
            $colour = 'black';
            break;
    }



    // if($colour_theme === 'red') {
    //     $colour = 'black';
    // } elseif($colour_theme === 'black') {
    //     $colour = 'red';
    // }

?>


<section class="flex flex-col lg:flex-row flex-col-reverse <?= $reverse_columns ? 'lg:flex-row-reverse' : '' ?>">

    <div class="w-full lg:w-1/2">
        <img class="fade-right-on-scroll w-full h-full object-cover" src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>">
    </div>

    <div class="w-full flex flex-col justify-center lg:w-1/2 p-10 bg-<?php 
    echo $colour_theme;
    echo ' ';
    echo $reverse_columns ? 'lg:pl-32' : 'lg:pr-32';
    ?>">
        <?php if(!empty($heading)) : ?>
        <h4 class="fade-left-on-scroll glacial-bold text-[36px] text-center lg:text-left text-<?= $colour ?>"><?= $heading ?></h4>
        <?php endif; ?>
        <div class="glacial prose max-w-none text-<?= $colour_theme == 'white' ? 'black' : 'white' ?> text-[18px] text-center lg:text-left">
            <?= $text ?>
        </div>
    </div>

</section>

<?php } ?>