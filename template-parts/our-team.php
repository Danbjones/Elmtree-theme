<?php
if (get_row_layout() == 'our_team') {
	$teamMembers = get_sub_field('team_member');
	?>

	<section class="our__team p-6 bg-black " x-data="{ 
		openTab: '<?php if( $teamMembers ) {
			echo $teamMembers[0]['department'];
		}
	?>',
	activeClass: 'border-2 glacial-bold border-red px-6 py-4',
	inactiveClass: 'border-2 border-white glacial-bold px-6 py-4'
}">

<div class="mx-10 lg:mx-auto lg:max-w-[80%] mt-16 lg:mt-28">
	<div class="filters flex flex-col-reverse lg:flex-row  lg:items-center mb-14 justify-between text-white">
		<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
			<?php 
                // Check rows exists.
			if( have_rows('team_member') ):
				$department_arr = get_sub_field_object('department');
				$departments = array_values($department_arr['choices']);     

				foreach($departments as $department) { ?>
					<div @click="openTab = '<?php echo strtolower($department); ?>'":class="openTab === '<?php echo strtolower($department); ?>' ? activeClass : inactiveClass"
						class="cursor-pointer">
						<span class="uppercase font-bold text-base flex items-center justify-center"><?php echo $department; ?></span>
					</div>
				<?php }
			endif;
			?>
		</div>

		<h3 class="text-5xl uppercase mb-6 lg:mb-0 glacial-bold">
			Our Team
		</h3>
	</div>

	<div class="team__repeater mb-[150px] gap-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3">
		<?php
            // Check rows exists.
		if( have_rows('team_member') ):
                // Loop through rows.
			while( have_rows('team_member') ) : the_row();
                // Load sub field value.
				$image = get_sub_field('image')['url'];
				$department = get_sub_field('department');
				?>

				<!-- Card  -->
				<div x-show="openTab === '<?php echo strtolower($department) ?>'" x-transition:enter.duration.500ms class="relative h-[500px] team__member ">
					<img class="object-cover object-center z-10 top-0 absolute right-0 h-[500px] w-full" src="<?php echo $image ?>" alt="<?php the_sub_field('name'); ?>">
					<div class="bg-red bio__wrapper flex items-center absolute justify-center p-10 text-white">
						<div class="inner text-center">
							<h3 class="text-3xl uppercase glacial-bold mb-4">
								<?php the_sub_field('name'); ?>
							</h3>

							<div class="bio">
								<?php the_sub_field('bio'); ?>
							</div>
						</div>
					</div>
				</div>

				<?php
			endwhile;
		endif;
		?>
	</div>
</div>

</section>


<?php } ?>