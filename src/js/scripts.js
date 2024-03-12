import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import "swiper/css/thumbs";
import 'swiper/css/scrollbar';

import "@lottiefiles/lottie-player";
// import LottieInteractivity from '@lottiefiles/lottie-interactivity';
import { create } from "@lottiefiles/lottie-interactivity";

import Swiper, { Navigation, Thumbs, Pagination, Scrollbar } from 'swiper';

// Intro Slider
var introSlider = new Swiper(".intro-swiper", {
	modules: [Navigation, Pagination, Scrollbar],
	loop: false,
	effect: 'fade',
	slidesPerView: 1,
	navigation: {
		nextEl: ".arrow-next",
		prevEl: ".arrow-prev",
	},
	scrollbar: {
		el: '.swiper-scrollbar',
		hide: false,
	},
});
// Reviews Slider
var reviewsSlider = new Swiper(".reviews-slider", {
	modules: [Navigation, Pagination],
	loop: true,
	effect: 'fade',
	slidesPerView: 1,
	centeredSlides: true,
	navigation: {
		nextEl: ".review-slider-next",
		prevEl: ".review-slider-prev",
	},
	breakpoints: {
		640: {
			slidesPerView: 2,
		},
		1024: {
			slidesPerView: 3,
		},
	},
});

// Project Single Slider 
var swiper = new Swiper(".mySwiper", {
	loop: true,
	spaceBetween: 10,
	slidesPerView: 4,
	freeMode: true,
	watchSlidesProgress: true,
});

var swiper2 = new Swiper(".mySwiper2", {
	modules: [Navigation, Pagination, Thumbs],
	loop: true,
	spaceBetween: 10,
	navigation: {
		nextEl: ".swiper-button-next",
		prevEl: ".swiper-button-prev",
	},
	thumbs: {
		swiper: swiper,
	},
});

// Nav Slider
var navSlider = new Swiper(".navSlider", {
	modules: [Navigation, Pagination],
	loop: true,
	effect: 'fade',
	slidesPerView: 1,
	navigation: {
		nextEl: ".nav-button-next",
		prevEl: ".nav-button-prev",
	},
});

// Featured Project Slider
var featuredProjectSlider = new Swiper(".featured-project-slider", {
	modules: [Navigation, Pagination, Scrollbar],
	loop: false,
	effect: 'fade',
	slidesPerView: 1,
	navigation: {
		nextEl: ".featured-project-slider-next",
		prevEl: ".featured-project-slider-prev",
	}
});

// News Post Slider
var newsPostSlider = new Swiper(".news-post-slider", {
	modules: [Navigation, Pagination],
	loop: true,
	effect: 'fade',
	slidesPerView: 1,
	navigation: {
		nextEl: ".news-post-slider-next",
		prevEl: ".news-post-slider-prev",
	}
});

// Project Slider
var projectSlider = new Swiper(".project-slider", {
	modules: [Navigation, Pagination],
	loop: true,
	slidesPerView: 1,
	spaceBetween: 20,
	navigation: {
		nextEl: ".project-slider-next",
		prevEl: ".project-slider-prev",
	},

	breakpoints: {
		764: {
			slidesPerView: 1,
		},

		886: {
			slidesPerView: 2,
			spaceBetween: 20,
		},

		1024: {
			slidesPerView: 2,
			spaceBetween: 60,
		},
	},
});

// Project Slider inner
const innerProjectSlider = () => {

	const innerProject = document.querySelectorAll('.inner-swiper');

	for( let i=0; i< innerProject.length; i++ ) {

		innerProject[i].classList.add('swiper-' + i);

		let sliderIdentifier = + i;

		var slider = new Swiper('.swiper-' + i, {
			modules: [Navigation, Pagination],
			loop: true,
			simulateTouch: false,
			slidesPerView: 1,
			navigation: {
				nextEl: `.project-inner-slider-prev-${sliderIdentifier}`,
				prevEl: `.project-inner-slider-next-${sliderIdentifier}`,
			}
		});
	}
}

innerProjectSlider();


// Testimonials Slider

var heroTestimonials = new Swiper(".hero__testimonials", {
	modules: [Navigation, Pagination],
	loop: true,
	effect: 'fade',
	slidesPerView: 1,
	navigation: {
		nextEl: ".hero-next",
		prevEl: ".hero-prev",
	}
});


document.addEventListener("DOMContentLoaded", () => {
	create({
		player:'#housing-lottie',
		mode:"scroll",
		actions: [
		{
			visibility:[0, 0.2],
			type: "stop",
			frames: [0],
		},
		{
			visibility:[0.2, 1],
			type: "seek",
			frames: [0, 62],
		},
		]
	});

	create({
		player:'#commercial-lottie',
		mode:"scroll",
		actions: [
		{
			visibility:[0, 0.2],
			type: "stop",
			frames: [0],
		},
		{
			visibility:[0.2, 1],
			type: "seek",
			frames: [0, 62],
		},
		]
	});

	create({
		player:'#maintenance-lottie',
		mode:"scroll",
		actions: [
		{
			visibility:[0, 0.2],
			type: "stop",
			frames: [0],
		},
		{
			visibility:[0.2, 1],
			type: "seek",
			frames: [0, 62],
		},
		]
	});
});

var navSlider = new Swiper(".navSlider", {
	modules: [Navigation, Pagination],
	loop: true,
	effect: 'fade',
	slidesPerView: 1,
	navigation: {
		nextEl: ".swiper-button-next",
		prevEl: ".swiper-button-prev",
	},
});


jQuery(document).ready(function($) {

	$(".menu__toggle").click(function () {
		$(".menu__toggle").toggleClass("menu-open");
		$(".menu").slideToggle('fast');
	});

	$(".mobile__menu").find(".top-level").click(function () {
		$(".first-level", this).slideToggle('fast');
		$(this).toggleClass('open');
	});

	$(function () {
		$(".menu-item-has-children").on('mouseenter mouseleave', function (e) {
			if ($('.sub-menu-wrapper', this).length) {
				var elm = $('.sub-menu-wrapper', this);
				var off = elm.offset();
				var l = off.left;
				var w = elm.width();
				var docW = $(window).width();

				var isEntirelyVisible = (l + w <= docW);

				if (!isEntirelyVisible) {
					$(elm).addClass('dropdown-reverse');
				} else {
					$(elm).removeClass('dropdown-reverse');
				}
			}
		});
	});
	
	$(function($) {
		$(".read-more").click(function(event) {
			event.preventDefault();
			$(this).parent(".excerpt").hide();
			$(this).parent().next(".full-content").show();
		});
	});
});