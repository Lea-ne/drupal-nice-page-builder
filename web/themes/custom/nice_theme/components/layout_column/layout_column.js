(function (Drupal) {
  'use strict';

  Drupal.behaviors.sectionFourColumn = {
    attach: function (context, settings) {
      const sections = context.querySelectorAll('.section-four-column');
      
      sections.forEach(section => {
        // Add intersection observer for animation on scroll
        const observer = new IntersectionObserver((entries) => {
          entries.forEach(entry => {
            if (entry.isIntersecting) {
              entry.target.classList.add('section-four-column--visible');
            }
          });
        }, {
          threshold: 0.1
        });
        
        observer.observe(section);
      });
    }
  };
})(Drupal); 