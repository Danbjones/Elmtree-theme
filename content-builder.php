<?php
/* 

Template Name: Content Builder 
Template Post Type: post, page

*/

?>

<?php get_header(); ?>


<?php if (have_rows('content_builder')) : ?>

<?php while (have_rows('content_builder')) : the_row(); ?>

<?php
    layout_loader('template-parts/', [
        'intro-slider',
        'sector-cards',
        'featured-project',
        'page-hero',
        'cta-banner',
        'panels',
        'grounds-services',
        'sector-intro',
        'contact-us-details-block',
        'contact-map',
        'values',
        'project-slider',
        'post-slider',
        'image-text',
        'accreditations',
        'reviews-slider',
        'our-team',
        'logo-slider',
        'full-width'
    ]);
?>

<?php endwhile; ?>

<?php endif; ?>


<?php get_footer(); ?>