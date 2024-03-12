<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
	<?php wp_head(); ?>
</head>
<body <?php body_class() ?>>


	<?php wp_body_open(); ?>
	<main>
		<?php
		$facebook = get_field('facebook','option');
		$instagram = get_field('instagram','option');
		$twitter = get_field('twitter','option');
		$linkedin = get_field('linkedin','option');
		$phone = get_field('phone_number','option');
		$email = get_field('email','option');
		?>


		<?php 
		$link = get_field('featured_project_tab','option');
		if( $link ): 
		    $link_url = $link['url'];
		    $link_title = $link['title'];
		    $link_target = $link['target'] ? $link['target'] : '_self';
		    ?>
		    <a class="fixed left-0 top-1/2 bg-red -rotate-90 translate-y-40 px-10 py-4 border-2 border-white z-50 glacial-bold text-white uppercase origin-top-left tracking-wider" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
		<?php endif; ?>

		<header class="fixed header top-0 w-full bg-white mb-6">
			<div class="2xl:max-w-[90%] w-full p-6 hidden lg:flex justify-between items-center mx-auto">
				<div class="socials flex space-x-4 items-center">
					<a href="<?php echo $facebook; ?>" class="w-[20px] xl:w-[30px]">
						<img src="<?php echo get_template_directory_uri(); ?>/src/svg/facebook.svg" width="30px" height="30px">
					</a>
					<a href="<?php echo $instagram; ?>" class="w-[20px] xl:w-[30px]">
						<img src="<?php echo get_template_directory_uri(); ?>/src/svg/instagram.svg" width="30px" height="30px">
					</a>
					<a href="<?php echo $twitter; ?>" class="w-[20px] xl:w-[30px]">
						<img src="<?php echo get_template_directory_uri(); ?>/src/svg/twitter.svg" width="30px" height="30px">
					</a>
					<a href="<?php echo $linkedin; ?>" class="w-[20px] xl:w-[30px]">
						<img src="<?php echo get_template_directory_uri(); ?>/src/svg/linkedin.svg" width="30px" height="30px">
					</a>

				</div>

				<nav class="left nav">
					<?php echo left_nav(); ?>
				</nav>

				<a href="<?php echo home_url(); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/src/img/logo.png" class="header__logo" width="340px" height="200px">
				</a>
				<nav class="right nav">
					<?php echo right_nav(); ?>
				</nav>

				<div class="contact flex items-center space-x-4">
					<a href="tel:<?php echo $phone; ?>" class="w-[20px] xl:w-[30px]">
						<img src="<?php echo get_template_directory_uri(); ?>/src/svg/phone.svg" width="30px" height="30px">
					</a>
					<a href="mailto:<?php echo $email; ?>" class="w-[20px] xl:w-[30px]">
						<img src="<?php echo get_template_directory_uri(); ?>/src/svg/email.svg" width="30px" height="30px">
					</a>

				</div>
			</div>

			<div class="lg:hidden">
				<div class="flex items-center justify-between p-6">
					<a href="tel:<?php echo $phone; ?>" class="w-[30px]">
						<img src="<?php echo get_template_directory_uri(); ?>/src/svg/phone.svg" width="30px" height="30px">
					</a>

					<a href="<?php echo home_url(); ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/src/img/logo.png" class="header__logo" width="340px" height="200px">
					</a>
					<div class="menu__toggle menu-closed">
						<span></span>
						<span></span>
						<span></span>
					</div>
				</div>

				<div class="menu hidden">
					<div class="mobile__menu flex flex-col justify-between">
						<nav class="mt-10 text-center">
							<?php echo mobile_nav(); ?>
						</nav>


						<div class="grid mt-10 bg-red p-6 grid-cols-4 w-full">
							<a href="<?php echo $facebook; ?>" class="flex justify-center">
								<img src="<?php echo get_template_directory_uri(); ?>/src/svg/facebook-white.svg" width="30px" height="30px">
							</a>
							<a href="<?php echo $instagram; ?>" class="flex justify-center">
								<img src="<?php echo get_template_directory_uri(); ?>/src/svg/instagram-white.svg" width="30px" height="30px">
							</a>
							<a href="<?php echo $twitter; ?>" class="flex justify-center">
								<img src="<?php echo get_template_directory_uri(); ?>/src/svg/twitter-white.svg" width="30px" height="30px">
							</a>
							<a href="<?php echo $linkedin; ?>" class="flex justify-center">
								<img src="<?php echo get_template_directory_uri(); ?>/src/svg/linkedin-white.svg" width="30px" height="30px">
							</a>
						</div>
					</div>
				</div>
			</div>
		</header>
