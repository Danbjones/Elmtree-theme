<?php get_header();

$backgroundImage = get_field('background_image_projects', 'option');
$text = get_field('text_area_projects', 'option');
$title = get_field('title_projects', 'option');
?>


  <section class="page__hero min-h-[500px] md:min-h-[800px] mt-[131px] bg-cover" style="background-image: url('<?php echo $backgroundImage['url']; ?>')">
		<div class="shade relative">
			<div class="md:mr-[10%] lg:max-w-[700px] ml-auto pt-10 md:pt-20 pr-10 pl-10 lg:pl-20">
				<div class="inner">
					<h1 class="text-4xl mt-[50px] title md:text-5xl lg:text-7xl glacial-bold text-black mb-10">
						<?php echo $title; ?>
					</h1>
						<div class="text text-md">
							<?php echo $text; ?>
						</div>
				</div>
			</div>
		</div>
	</section>

  <div class="w-[80%] max-w-[1360px] m-auto mt-[50px]">
  <div class="filter flex items-center justify-start gap-4">
    <p class="glacial-bold text-left uppercase" href="">Filter by:</p>  
    <form action="" class="flex flex-col xs:flex-row gap-4" method="get">
    <select class="border-2 border-black border-solid py-4 px-6" name="month">
      <option value="">Select Month</option>
      <option value="all" <?php if (isset($_GET['month']) && $_GET['month'] == 'all') echo 'selected'; ?>>All</option>
      <?php 
      $months = $wpdb->get_results("SELECT DISTINCT MONTH(post_date) AS month , YEAR(post_date) as year, COUNT(ID) as post_count FROM $wpdb->posts WHERE post_type = 'projects' AND post_status = 'publish' GROUP BY month, year ORDER BY post_date DESC");
      foreach ($months as $month) : ?>
      <option value="<?php echo $month->year . '-' . $month->month; ?>" <?php if (isset($_GET['month']) && $_GET['month'] == $month->year . '-' . $month->month) echo 'selected'; ?>><?php echo date('F Y', strtotime($month->year . '-' . $month->month . '-01')); ?></option>
      <?php endforeach; ?>
    </select>
    <input class="uppercase glacial-bold min-w-[130px] bg-white border-black border-2 border-solid px-6 py-4 text-[12px] text-black leading-2" type="submit" value="Filter">
</form>
  </div>
</div>

<div id="archive-posts" class="w-[80%] max-w-[1360px] gap-16 m-auto mt-[50px] post-container grid grid-cols-1 lg:grid-cols-2">

<?php
  if (isset($_GET['month'])) {
    $month = $_GET['month'];
    if ($month != 'all') {
      $year = substr($month, 0, 4);
      $month = substr($month, 5, 2);
      $args = array(
        'post_type' => 'projects',
        'post_status' => 'publish',
        'posts_per_page' => 6,
        'year' => $year,
        'monthnum' => $month
      );
    } else {
      $args = array(
        'post_type' => 'projects',
        'post_status' => 'publish',
        'posts_per_page' => 6,
        'paged' => 1
      );
    }
  } else {
    $args = array(
      'post_type' => 'projects',
      'post_status' => 'publish',
      'posts_per_page' => 6,
      
    );
  }

// Custom query.
$query = new WP_Query($args);

// Check that we have query results.
if ($query->have_posts()) {
    // Start looping over the query results.
    while ($query->have_posts()) {
        $query->the_post();

        $featured_image = get_field('featured_image')['url'];
        $featured_image_alt = get_field('featured_image')['alt'];
        $excerpt = get_field('text_area');
        ?>

        <div class="flex w-[100%] m-auto flex-col gap-4 justify-center items-center mb-[50px] text-center">
            <div class="project-featured" style="background-image: url('<?php echo $featured_image; ?>');display:block;height:350px;width:100%;background-repeat:no-repeat;background-size:cover;background-position: center;"></div>
            <h3 class="glacial-bold text-left text-[20px]"><?php echo get_the_title(); ?></h3>
            <div class="flex justify-between px-[30px] w-[100%] items-center border-t-solid border-t-2 border-t-black border-b-solid border-b-2 border-b-black">
                <div class="h-[140px] w-[50%] justify-center flex border-r-solid border-r-2 border-r-black flex-col min-w-[200px]">
                    <p class="glacial uppercase text-[12px] text-left">PROJECT DURATION: <?php echo get_field('time_completed_in'); ?></p>
                    <p class="glacial uppercase text-[12px] text-left">LOCATION: <?php echo get_field('location'); ?></p>
                    <p class="glacial uppercase text-[12px] text-left">CONTRACT VALUE: <?php echo get_field('cost'); ?></p>
                </div>
                <p class="text-left pt-4 pl-4 text-[12px] w-[200px] mb-[30px]"><?php echo wp_trim_words($excerpt, 22) . '...' ?></p>
            </div>
            <div class="content-wrapper gap-4 flex w-[100%] justify-between items-center">
                <a class="uppercase bg-white border-black border-2 border-solid px-6 py-4 text-[12px] text-black leading-2" href="<?php echo get_the_permalink() ?>">View Project</a>
            </div>
        </div>

    <?php
    }
}
// Reset postdata.
wp_reset_postdata();
?>

</div>


<div class="w-full flex items-center justify-center m-auto">
    <a href="#!" class="bg-red py-2 px-6 mb-6 text-white text-[18px] tracking-wide font-bold " id="archive-load-more">Load more...</a>
</div>

<script>
jQuery(function($) {
  var currentPage = 1;
  var maxPages = <?php echo $query->max_num_pages; ?>;
  var queryVars = <?php echo wp_json_encode( $query->query_vars ); ?>;
  $('#archive-load-more').on('click', function(e) {
    e.preventDefault();
    currentPage++;
    if (currentPage <= maxPages) {
      var ajaxData = {
        action: 'load_more_posts_callback',
        query_vars: queryVars,
        paged: currentPage
      };
      $.ajax({
        url: '<?php echo admin_url( 'admin-ajax.php' ); ?>',
        data: ajaxData,
        type: 'POST',
        beforeSend: function() {
          $('#archive-load-more').text('Loading...');
        },
        success: function(data) {
          console.log(data);
          $('#archive-posts').append(data);
          $('#archive-load-more').text('Load more...');
          if (currentPage == maxPages) {
            $('#archive-load-more').hide();
          }
        },
        error: function() {
          $('#archive-load-more').text('Error! Please try again.');
        }
      });
    } else {
      $('#archive-load-more').hide();
    }
  });
});

</script>




  <?php get_footer(); ?>


