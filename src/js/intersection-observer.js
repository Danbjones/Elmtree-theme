jQuery(document).ready(function($) {
    
    // Fade in on scroll 
    const fadeCallback = function (entries) {
        entries.forEach((entry) => {
      
          if (entry.isIntersecting) {
            entry.target.classList.add("animate-fadeIn");
          } else {
            entry.target.classList.remove("animate-fadeIn");
          }
        });
      };
      
      const fadeObserver = new IntersectionObserver(fadeCallback);
      
      const fadeTargets = document.querySelectorAll(".js-show-on-scroll");
      fadeTargets.forEach(function (target) {
        target.classList.add("opacity-0");
        fadeObserver.observe(target);
      });

      // Fade in right on scroll 
      const fadeRightCallback = function (entries) {
        entries.forEach((entry) => {
      
          if (entry.isIntersecting) {
            entry.target.classList.add("animate-fade-in-right");
          } else {
            entry.target.classList.remove("animate-fade-in-right");
          }
        });
      };
      
      const fadeRightObserver = new IntersectionObserver(fadeRightCallback);
      
      const fadeRightTargets = document.querySelectorAll(".fade-right-on-scroll");
      fadeRightTargets.forEach(function (target) {
        target.classList.add("opacity-0");
        fadeRightObserver.observe(target);
      });

      // Fade in left on scroll 
      const fadeLeftCallback = function (entries) {
        entries.forEach((entry) => {
      
          if (entry.isIntersecting) {
            entry.target.classList.add("animate-fade-in-left");
          } else {
            entry.target.classList.remove("animate-fade-in-left");
          }
        });
      };
      
      const fadeLeftObserver = new IntersectionObserver(fadeLeftCallback);
      
      const fadeLeftTargets = document.querySelectorAll(".fade-left-on-scroll");
      fadeLeftTargets.forEach(function (target) {
        target.classList.add("opacity-0");
        fadeLeftObserver.observe(target);
      });


      // Move in up on scroll 
      const moveUpCallback = function (entries) {
        entries.forEach((entry) => {
      
          if (entry.isIntersecting) {
            entry.target.classList.add("animate-move-up");
          } else {
            entry.target.classList.remove("animate-move-up");
          }
        });
      };
      
      const moveUpObserver = new IntersectionObserver(moveUpCallback);
      
      const moveUpTargets = document.querySelectorAll(".move-up-on-scroll");
      moveUpTargets.forEach(function (target) {
        target.classList.add("opacity-0");
        moveUpObserver.observe(target);
      });
  
  
  });