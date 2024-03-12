<?php
if (get_row_layout() == 'accreditations') {

    $heading = get_sub_field('heading');
    $text = get_sub_field('text');
    $image_one = get_sub_field('image_one');
    $image_two = get_sub_field('image_two');
    $image_three = get_sub_field('image_three');
    $image_four = get_sub_field('image_four');

?>

<section class="bg-white pt-8 pb-20">

    <div class="w-full xs:w-[80%] m-auto flex justify-center items-center xl:flex-row flex-col">
        <div class="bg-black min-h-[240px] h-auto xs:py-8 py-4 xs:px-12 px-4 xl:w-[35%] w-[65%]">
            <h2 class="text-white glacial-bold pb-4 uppercase mdbig:text-4xl text-2xl"><?php echo $heading; ?></h2>
            <article class="text-white glacial">
                <?php echo $text; ?>
            </article>
        </div>
        <div style="border-left:none;" class="accred mdbig:h-[240px] pt-[25px] h-auto xl:w-[65%] w-auto gap-8 justify-center items-center flex mdbig:flex-row flex-col bg-white border-[3px] border-solid border-red">
            <img class="object-contain w-[70px]" src="<?php echo $image_one['url']; ?>" alt="">
            <img class="object-contain w-[70px]" src="<?php echo $image_two['url']; ?>" alt="">
            <img class="object-contain w-[200px]" src="<?php echo $image_three['url']; ?>" alt="">
            <img class="object-contain w-[200px]" src="<?php echo $image_four['url']; ?>" alt="">
        </div>
    </div>

</section>

<?php } ?>