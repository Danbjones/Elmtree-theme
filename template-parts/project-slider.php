<?php
if (get_row_layout() == 'projects') { ?>

	<section class="project-slider-outer px-6 overflow-hidden py-16">
		<div class="project-slider swiper mdbig:right-[-80px] lg:right-[-90px] 2xl:right-[-180px] lg:min-w-[140%]">
			<?php
			$category = get_sub_field('project_slider_type');

			$args = array(
				'post_type' => 'projects',
				'posts_per_page' => -1,
				'orderby' => 'DESC',
				'tax_query' => array(
					array(
						'taxonomy' => 'category',
						'field' => 'slug',
						'terms' => $category
					)
				)
			);

			$query = new WP_Query($args); ?>

			<div class="lg:flex mb-4 md:mb-10 items-center xl:justify-between xl:max-w-[50%]">
				<a href="<?php echo get_post_type_archive_link('projects'); ?>" class="button mb-4 lg:mb-0 button--border-black">View All Projects</a>
				<h2 class="uppercase text-5xl glacial-bold lg:ml-6 mr-20 md:mr-10">
					PROJECTS 
					<?php if ($category != 'uncategorized'): ?>
						:
						<span class="text-red">
							<?php echo $category; ?>
						</span>
					<?php endif ?>
				</h2>
			</div>

			<div class="swiper-wrapper">
				<?php if ($query->have_posts()) {
					$count= -1;
					while ($query->have_posts()) { $query->the_post(); 
						$count++;
						?>

						<div class="swiper-slide">

							<div class="parent-swiper-wrapper relative">
								<div class="inner-swiper swiper">
									<div class="swiper-wrapper">
										<?php 
										$images = get_field('image_gallery');
										if( $images ): ?>
										<?php foreach( $images as $image ): ?>
												<div class="swiper-slide min-h-[600px] bg-cover bg-center" style="background-image: url('<?php echo $image['url']; ?>');">
													<div class="background__overlay bg-black"></div>
												</div>
											<?php endforeach; ?>
										<?php endif; ?>
									</div>
								</div>

								<div class="text-white w-[80%] mx-auto inner__slide__text__wrapper bottom-[50px] absolute z-[9999]">
									<div class="upper">
										<h3 class="text-4xl mb-6 glacial-bold">
											<?php the_title(); ?>
										</h3>

										<div class="metainfo lg:flex items-center uppercase glacial-bold">
											<div class="border-white w-full border-t-4 py-4 border-b-4">
												Project Duration: <?php the_field('time_completed_in'); ?> Contract Value: <?php the_field('cost'); ?> Location: <?php the_field('location'); ?>
											</div>
											
											<a href="<?php the_permalink();?>" class="button mt-6 lg:mt-0 lg:ml-10 text-center min-w-[220px] button--border-white">
												View Project
											</a>
										</div>
									</div>

									<div class="flex items-center mt-6 justify-center">
										<div class="project-inner-slider-next-<?php echo $count; ?> mx-2">
											<img src="<?php echo get_template_directory_uri(); ?>/src/svg/arrow-prev.svg">
										</div>
										<div class="project-inner-slider-prev-<?php echo $count; ?> mx-2">
											<img src="<?php echo get_template_directory_uri(); ?>/src/svg/arrow-next.svg">
										</div>
									</div>
								</div>
							</div>

						</div>
					<?php }
				}
				wp_reset_postdata();
				?>
			</div>

			<div class="flex items-center mt-6">
				<div class="project-slider-prev">
					<img src="<?php echo get_template_directory_uri(); ?>/src/svg/chevron-left.svg" width="30px" height="30px">
				</div>
				<div class="project-slider-next">
					<img src="<?php echo get_template_directory_uri(); ?>/src/svg/chevron-right.svg" width="30px" height="30px">
				</div>
			</div>
		</div>
	</section>

	<?php } ?>