<?php get_header(); 

$images = get_field('image_gallery');

?>


<div class="w-[80%] m-auto mt-[200px]">
    <a class="uppercase glacial-bold border-2 border-black tracking-[2px] border-solid py-4 px-6" href="<?php echo get_post_type_archive_link('post'); ?>">< View All Blogs</a>
</div>

<div class="flex w-[80%] m-auto mt-[100px] lg:flex-row flex-col gap-12~">
<div class="flex flex-col gap-4 w-[50%]">

<?php if($images) :?>
<div class="swiper-container">
  <div style="--swiper-navigation-color:red; --swiper-pagination-color:#fff" class="swiper mySwiper2">
    <div class="swiper-wrapper">
      <?php foreach ($images as $image): ?>  
        <div class="swiper-slide">
          <img style="min-height:500px;width:100%;object-fit:cover;" src="<?php echo $image['url']; ?>" alt="<?php echo esc_attr($image['alt']); ?>">
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
                  $description = get_the_content();
                  $word_count = str_word_count(strip_tags($description));
              ?>
              <div x-show="!showFullDescription">
                <?php echo wp_trim_words($description, 70, '...'); ?>
              </div>
              <div x-show="showFullDescription">
                <?php echo $description; ?>
              </div>
              <?php if($word_count > 70): ?>
                  <button class="text-blue-500 underline" x-show="!showFullDescription" x-on:click="showFullDescription = true">Read More</button>
              <?php endif; ?>
          </div>
        </article>

      </div>
  </div>
</div>
  
<?php get_footer (); ?>
