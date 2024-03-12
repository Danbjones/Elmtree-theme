<?php
    $featured_image = get_field('featured_image')['url'];
    $featured_image_alt = get_field('featured_image')['alt'];
    $excerpt = get_field('text_area');
?>

<div class="flex w-[100%] m-auto flex-col gap-4 justify-center items-center mb-[50px] text-center">
    <div class="project-featured" style="background-image: url('<?php echo $featured_image; ?>');display:block;height:350px;width:100%;background-repeat:no-repeat;background-size:cover;background-position: center;"></div>
    <h3 class="glacial-bold text-left w-[100%] text-[20px]"><?php echo get_the_title(); ?></h3>
    <div class="flex justify-between px-[30px] w-[100%] items-center border-t-solid border-t-2 border-t-black border-b-solid border-b-2 border-b-black">
        <div class="h-[140px] w-[50%] justify-center flex border-r-solid border-r-2 border-r-black flex-col min-w-[200px]">
            <p class="glacial uppercase text-[12px] text-left">PROJECT DURATION: <?php echo get_field('time_completed_in'); ?></p>
            <p class="glacial uppercase text-[12px] text-left">LOCATION: <?php echo get_field('location'); ?></p>
            <p class="glacial uppercase text-[12px] text-left">CONTRACT VALUE: <?php echo get_field('cost'); ?></p>
        </div>
        <p class="text-left pt-4 pl-4 text-[12px] w-[200px] mb-[30px]"><?php echo wp_trim_words($excerpt, 22) . '...' ?></p>
    </div>
</div>