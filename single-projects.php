<?php get_header(); 

$images = get_field('image_gallery');
?>


<div class="w-[80%] m-auto mt-[200px]">
  <a class="uppercase glacial-bold border-2 border-black tracking-[2px] border-solid py-4 px-6" href="<?php echo get_post_type_archive_link('projects'); ?>">< View All Projects</a>
</div>

<div class="flex w-[80%] m-auto mt-[100px] lg:flex-row flex-col gap-12">
  <div class="flex flex-col gap-4 w-[50%]">

    <?php if($images) :?>
      <div class="swiper-container">
        <div style="--swiper-navigation-color:red; --swiper-pagination-color:#fff" class="swiper mySwiper2">
          <div class="swiper-wrapper">
            <?php foreach ($images as $image): ?>  
              <div class="swiper-slide">
                <img src="<?php echo $image['url']; ?>" alt="<?php echo esc_attr($image['alt']); ?>">
              </div>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        
        <div thumbsSlider="" class="swiper mySwiper">
          <div class="swiper-wrapper">
            <?php foreach ($images as $image): ?>
              <div class="swiper-slide">
                <img src="<?php echo $image['url']; ?>" alt="<?php echo esc_attr($image['alt']); ?>">
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>
  <div>
    <div class="content">
      <h1 class="text-3xl mb-[25px] glacial-bold"><?php echo the_title(); ?></h1>
      
      <article class="glacial">
    <div x-data="{ showFullDescription: false }">
        <?php 
            $description = get_field('text_area');
            $word_count = str_word_count(wp_strip_all_tags($description));
        ?>
        <div x-show="!showFullDescription">
            <?php echo wp_trim_words(wp_strip_all_tags($description), 70, '...'); ?>
        </div>
        <div x-show="showFullDescription">
            <?php echo wpautop($description); ?>
        </div>
        <?php if($word_count > 70): ?>
            <button class="text-blue-500 underline" x-show="!showFullDescription" x-on:click="showFullDescription = true">Read More</button>
        <?php endif; ?>
    </div>
</article>

    </div>
  </div>
</div>

<div class="w-[80%] m-auto bg-black flex lg:flex-row flex-col gap-4 p-8 mt-8 justify-center items-center">

  <div class="flex sm:flex-row flex-col gap-4">
    <svg id="Group_1651" data-name="Group 1651" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="22" height="22" viewBox="0 0 22 22">
      <defs>
        <clipPath id="clip-path">
          <rect id="Rectangle_871" data-name="Rectangle 871" width="22" height="22" fill="none" stroke="#fa141b" stroke-width="1"/>
        </clipPath>
      </defs>
      <g id="Group_1643" data-name="Group 1643" clip-path="url(#clip-path)">
        <circle id="Ellipse_11" data-name="Ellipse 11" cx="10" cy="10" r="10" transform="translate(1 1)" fill="none" stroke="#fa141b" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
        <path id="Path_2316" data-name="Path 2316" d="M11,5v6l4,2" fill="none" stroke="#fa141b" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
      </g>
    </svg>
    <p class="text-white glacial-bold uppercase"><?php echo get_field('time_completed_in'); ?></p>
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18" height="22" viewBox="0 0 18 22">
      <defs>
        <clipPath id="clip-path">
          <rect id="Rectangle_873" data-name="Rectangle 873" width="18" height="22" fill="none" stroke="#fa141b" stroke-width="1"/>
        </clipPath>
      </defs>
      <g id="Group_1645" data-name="Group 1645" clip-path="url(#clip-path)">
        <path id="Path_2317" data-name="Path 2317" d="M13,3h2a2,2,0,0,1,2,2V19a2,2,0,0,1-2,2H3a2,2,0,0,1-2-2V5A2,2,0,0,1,3,3H5" fill="none" stroke="#fa141b" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
        <rect id="Rectangle_872" data-name="Rectangle 872" width="8" height="4" rx="1" transform="translate(5 1)" fill="none" stroke="#fa141b" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
      </g>
    </svg>

    <p class="text-white glacial-bold uppercase"><?php echo get_field('cost'); ?></p>
    <svg id="Group_1653" data-name="Group 1653" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="24" viewBox="0 0 20 24">
      <defs>
        <clipPath id="clip-path">
          <rect id="Rectangle_874" data-name="Rectangle 874" width="20" height="24" fill="none" stroke="#fa141b" stroke-width="1"/>
        </clipPath>
      </defs>
      <g id="Group_1647" data-name="Group 1647" clip-path="url(#clip-path)">
        <path id="Path_2318" data-name="Path 2318" d="M19,10c0,7-9,13-9,13S1,17,1,10a9,9,0,0,1,18,0Z" fill="none" stroke="#fa141b" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
        <circle id="Ellipse_12" data-name="Ellipse 12" cx="3" cy="3" r="3" transform="translate(7 7)" fill="none" stroke="#fa141b" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
      </g>
    </svg>

    <p class="text-white glacial-bold uppercase"><?php echo get_field('location'); ?></p>

  </div>

  <hr class="bg-red text-red">

  <div>
    <a class="uppercase mt-[25px] border-2 border-solid border-white text-white glacial-bold px-6 py-4" href="">Make an enquiry</a>
  </div>

</div>


<?php get_footer(); ?>