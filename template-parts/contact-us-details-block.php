<?php
if (get_row_layout() == 'contact_us_details_block') { ?>

<section class="contact__block grid grid-cols-1 lg:grid-cols-2 p-6 gap-6 lg:gap-x-20 xl:max-w-[80%] mx-auto">
	
	<div class="bg-black min-h-[500px] glacial-bold px-10 flex flex-col justify-center items-center lg:items-end text-white relative box">
		<h3 class="uppercase hidden md:block title absolute text-black text-[7.5rem] 2xl:text-[8.5rem]" style="z-index:-1;">
			Find Us
		</h3>
		<div class="border-b-4 border-red 2xl:mr-[10%]">
			<div class="address flex mb-10 items-start">
				<img src="<?php echo get_template_directory_uri(); ?>/src/svg/pin-red.svg" width="30px" height="30px">
				<div class="ml-4">
					<?php the_field('address','option'); ?>
				</div>
			</div>

			<div class="phone flex mb-10 items-center">
				<img src="<?php echo get_template_directory_uri(); ?>/src/svg/phone-red.svg" width="30px" height="30px">
				<div class="ml-4">
					<a href="tel:<?php the_field('phone_number','option'); ?>">
						<?php the_field('phone_number','option'); ?>
					</a>
				</div>
			</div>

			<div class="email flex mb-10 items-center">
				<img src="<?php echo get_template_directory_uri(); ?>/src/svg/email-red.svg" width="30px" height="30px">
				<div class="ml-4">
					<a href="mailto:<?php the_field('email','option'); ?>">
						<?php the_field('email','option'); ?>
					</a>
				</div>
			</div>
		</div>
	</div>

	<div class="text-center">
		<h3 class="glacial-bold text-3xl mb-4">
			Contact Us
		</h3>

		<div class="form">
			<?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true" tabindex="49"]') ?>
		</div>
	</div>

</section>

<?php } ?>