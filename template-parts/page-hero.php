<?php
if (get_row_layout() == 'intro_header') { 
	$awardsRow = get_sub_field('awards_row');
	$testimonials = get_sub_field('testimonials');
	$backgroundImage = get_sub_field('background_image');
	$text = get_sub_field('text_area');

	if( get_sub_field('show_angle_shape') == 'yes' ) {
	    $heroShape = 'hero-shape';
	} else {
		$heroShape = '';
	}

	if (is_front_page()) {
		$heroHight = 'min-h-[500px] md:min-h-[800px]';
	} else {
		$heroHight = 'min-h-[400px] md:min-h-[650px]';
	}
	?>

	<section class="page__hero bg-cover bg-center mt-[131px] <?php echo $heroHight; ?> <?php echo $heroShape; ?>" style="background-image: url('<?php echo $backgroundImage['url']; ?>')">
		<div class="shade relative">
			<div class="md:mr-[10%] lg:max-w-[700px] ml-auto pt-10 md:pt-20 pr-10 pl-10 lg:pl-20">
				<div class="inner">
					<h1 class="text-4xl title md:text-5xl lg:text-7xl glacial-bold text-black mb-10">
						<?php the_sub_field('title'); ?>
					</h1>

					<?php if ($text): ?>
						<div class="text">
							<?php the_sub_field('text_area'); ?>
						</div>
					<?php endif ?>

					<?php if ($awardsRow): ?>
						<div class="awards__row grid grid-cols-4 mb-10">
							<?php if( have_rows('awards_row') ): ?>
								<?php while( have_rows('awards_row') ): the_row(); 
									$image = get_sub_field('award');
									?>

									<img src="<?php echo $image['url']; ?>" width="100px" height="100px">

								<?php endwhile; ?>
							<?php endif; ?>
						</div>
					<?php endif ?>

					<?php if ($testimonials): ?>
						<div class="md:mr-[15%]">
							<div class="hero__testimonials min-h-[450px] md:min-h-full swiper">
								<div class="swiper-wrapper">
									<?php if( have_rows('testimonials') ): ?>
										<?php while( have_rows('testimonials') ): the_row(); 
											$image = get_sub_field('award');
											?>

											<div class="testimonial swiper-slide">
												<div class="quote bg-white mb-12 flex items-start pl-6 py-6 pr-4">
													<img src="<?php echo get_template_directory_uri(); ?>/src/svg/quote-light.svg" class="mr-4">
													<div class="text">
														<?php the_sub_field('testimonial'); ?>
													</div>
												</div>
												<h4 class="mb-6 glacial-bold text-xl">
													<?php the_sub_field('author'); ?>
												</h4>
											</div>

										<?php endwhile; ?>
									<?php endif; ?>
								</div>
								<div class="flex items-center">
									<div class="hero-prev">
										<img src="<?php echo get_template_directory_uri(); ?>/src/svg/chevron-left.svg">
									</div>
									<div class="hero-next">
										<img src="<?php echo get_template_directory_uri(); ?>/src/svg/chevron-right.svg">
									</div>
								</div>
							</div>
						</div>
					<?php endif ?>
				</div>
			</div>
		</div>

	</section>


	<?php } ?>