<?php
if (get_row_layout() == 'reviews_slider') {

?>

<section class="bg-white w-full">

    <div class="mx-auto flex flex-col lg:flex-row py-20">

        <div class="w-[80%] m-auto">


            <div class="reviews-slider overflow-hidden m-auto">
                <div class="swiper-wrapper m-auto">
                <?php   if( have_rows('reviews_repeater') ): 
                            while( have_rows('reviews_repeater') ) : the_row();

                        $testimonial = get_sub_field('testimonial_text');
                        $name = get_sub_field('name');
                        $date = get_sub_field('date');
                    ?>

                    <div style="border: 10px solid white;" class="swiper-slide text-white">
                        <article class="flex bg-[#f2f2f2] bg-white p-8 text-[11px] text-black pb-[90px]" style="clip-path: polygon(0% 0%, 100% 0%, 100% 75%, 39% 76%, 13% 96%, 13% 75%, 0 75%);">
                            <svg style="transform:scale(3);" id="Group_1694" data-name="Group 1694" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="28.946" height="25.597" viewBox="0 0 28.946 25.597">
                                <defs>
                                    <clipPath id="clip-path">
                                    <rect id="Rectangle_889" data-name="Rectangle 889" width="28.946" height="25.597" fill="rgba(136,136,136,0.5)"/>
                                    </clipPath>
                                </defs>
                                <g id="Group_1693" data-name="Group 1693" clip-path="url(#clip-path)">
                                    <path id="Path_2336" data-name="Path 2336" d="M12.431,0V2.545q-9.5,1.861-9.495,10.621,0,3.083,1.86,3.083a4.2,4.2,0,0,0,.979-.147,6.877,6.877,0,0,1,1.958-.343,4.98,4.98,0,0,1,3.817,1.518A4.886,4.886,0,0,1,12.97,20.7a4.763,4.763,0,0,1-1.444,3.4A4.974,4.974,0,0,1,7.782,25.6,6.821,6.821,0,0,1,2.325,22.66,12.259,12.259,0,0,1,0,14.829,14.8,14.8,0,0,1,3.255,5.164,15.183,15.183,0,0,1,12.431,0" transform="translate(0 0)" fill="rgba(136,136,136,0.5)"/>
                                    <path id="Path_2337" data-name="Path 2337" d="M44.359,0V2.545q-9.5,1.861-9.495,10.621,0,3.083,1.811,3.083a4.2,4.2,0,0,0,.979-.147,7.271,7.271,0,0,1,1.958-.343,4.981,4.981,0,0,1,3.818,1.518A4.89,4.89,0,0,1,44.849,20.7,4.763,4.763,0,0,1,43.4,24.1,4.976,4.976,0,0,1,39.661,25.6a6.778,6.778,0,0,1-5.481-2.961,12.37,12.37,0,0,1-2.3-7.806,14.723,14.723,0,0,1,3.279-9.666A15.289,15.289,0,0,1,44.359,0" transform="translate(-15.902 0)" fill="rgba(136,136,136,0.5)"/>
                                </g>
                            </svg>
                            <div class="pl-[30px]"><?php echo $testimonial; ?></div>
                        </article>
                        <div class="flex gap-4 bg-white text-black">
                            <div style="border-radius: 50%;" class="bg-black flex items-center glacial-bold justify-center h-[50px] text-white w-[50px] block uppercase">
                            <?php 
                            $first_letter = substr($name, 0, 1);
                            echo $first_letter; 
                            ?>
                            </div>
                            <div class="flex flex-col">
                                <p class="glacial-bold"><?php echo $name; ?></p>
                                <p><?php echo $date; ?></p>
                            </div>
                        </div>
                    </div>
                    
                <?php
                            endwhile;
                        endif;
                    ?>

                </div>

                <div class="absolute w-[100px] flex space-x-8 justify-center z-10">
                    <img class="review-slider-prev cursor-pointer absolute top-[-190px] left-[-50px]" src="<?= svg('chevron-left') ?>" style="fill:#111;" alt="">
                    <img class="review-slider-next cursor-pointer absolute top-[-190px] left-[79vw]" src="<?= svg('chevron-right') ?>" style="fill:#111;" alt="">
                </div>

            </div>

        </div>

    </div>


</section>

<?php } ?>