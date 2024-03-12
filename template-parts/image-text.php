<?php
if (get_row_layout() == 'image_text') {

    $heading = get_sub_field('heading');
    $text = get_sub_field('column_two_text');
    $image = get_sub_field('image');

?>

<section class="bg-white pt-8 pb-20">

    <div class="mdbig:w-[60%] w-[80%] m-auto">
        <h2 class="text-black mb-[30px] glacial-bold text-2xl text-center m-auto"><?php echo $heading; ?></h2>
        <div class="flex mdbig:flex-row flex-col justify-center items-center gap-8">
            <img class="w-[200px]" src="<?php echo $image['url']; ?>" alt="">
            <article class="mdbig:w-[500px] w-auto">
                <?php echo $text; ?>
            </article>
        </div>
    </div>

</section>

<?php } ?>