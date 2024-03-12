<?php
if (get_row_layout() == 'logo_slider') {
?>

<section class="carousel py-[50px]">
    <div class="slider2">
        <div class="slide-track2">

        <?php if( have_rows('carousel_repeater') ):

        // Loop through rows.
        while( have_rows('carousel_repeater') ) : the_row();

            // Load sub field value.
            $logo = get_sub_field('logo')['url']; ?>

                    <div class="slide2">
                    <img
                    src="<?php echo $logo; ?>"
                    height="100"
                    width="250"
                    alt=""
                    class="mt-[-20px]"
                    />
                    </div>

            <?php endwhile;
                // Do something...
            endif; 

            if( have_rows('carousel_repeater') ):

            // Loop through rows.
            while( have_rows('carousel_repeater') ) : the_row(); ?>


            <div class="slide2">
                <img
                src="<?php echo $logo; ?>"
                height="100"
                width="250"
                alt=""
                class="mt-[-20px]"
                />
            </div>

            <?php endwhile;
                // Do something...
            endif; ?>
        </div>
    </div>
</section>
<?php } ?>


<style>

.slider2 {
  background: white;
  /* box-shadow: 0 10px 20px -5px rgba(0, 0, 0, 0.125);  */
  height: 100px;
  margin: auto;
  overflow: hidden;
  position: relative;
  width: auto;
}

.slider2::before,
.slider2::after {
  background: linear-gradient(to right, white 0%, rgba(255, 255, 255, 0) 100%);
  content: "";
  height: 100px;
  position: absolute;
  width: 200px;
  z-index: 2;
}

.slider2::after {
  right: 0;
  top: 0;
  transform: rotateZ(180deg);
}

.slider2::before {
  left: 0;
  top: 0;
}

.slider2 .slide-track2 {
  -webkit-animation: scroll 20s linear infinite;
  animation: scroll 20s linear infinite;
  display: flex;
  width: fit-content;
}
.slide2 {
		img {
			object-fit: contain;
		  
	}
}
.slider2 .slide2 {
  height: 100px;
  width: 250px;
  display: flex;
}

@-webkit-keyframes scroll {
  0% {
    transform: translateX(0);
  }
  100% {
    transform: translateX(-50%);
  }
}

@keyframes scroll {
  0% {
    transform: translateX(0);
  }
  100% {
    /* scroll only 50% */
    transform: translateX(-50%);
  }
}

</style>