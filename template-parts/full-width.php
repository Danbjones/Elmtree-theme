<?php
if (get_row_layout() == 'fullwidth') {
    $text = get_sub_field('text');
?>

<section class="bg-white pt-[8rem] pb-20">
    <div class="w-full xs:w-[80%] m-auto flex justify-center items-center xl:flex-row flex-col">
        <article class="full-width">
            <?php echo $text; ?>
        </article>
    </div>
</section>

<?php } ?>