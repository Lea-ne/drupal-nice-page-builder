(function (Drupal) {
  'use strict';

  Drupal.behaviors.cardSlider = {
    attach: function (context, settings) {
      // Initialize Swiper for each card slider
      const cardSliders = context.querySelectorAll('.paragraph-type-card-slider');
      
      cardSliders.forEach((slider) => {
        const container = slider.querySelector('.card__container.swiper');
        if (container && container.querySelector('.swiper-wrapper')) {
          new Swiper(container, {
            // Basic settings
            direction: 'horizontal',
            loop: true,
            slidesPerView: 1,
            spaceBetween: 0,
            
            // Effect
            effect: 'Cards',
            fadeEffect: {
              crossFade: true
            },
            
            // Speed
            speed: 800,
            
            // Pagination
            pagination: {
              el: '.swiper-pagination',
              clickable: true,
            },
            
            // Auto play
            autoplay: {
              delay: 5000,
              disableOnInteraction: false,
            },
            
            // Disable navigation
            navigation: false,
            
            // Disable scrollbar
            scrollbar: false,
            
            // Disable mousewheel
            mousewheel: false,
            
            // Disable keyboard
            keyboard: false,
          });
        }
      });

      // Simple function to equalize heights
      function equalizeHeights() {
        const slides = document.querySelectorAll('.swiper-slide .paragraph-type-card-slide .card__container');
        if (!slides.length) return;

        let maxHeight = 0;

        // Reset heights first
        slides.forEach(slide => {
          slide.style.height = 'auto';
        });

        // Get max height
        slides.forEach(slide => {
          const height = slide.offsetHeight;
          maxHeight = Math.max(maxHeight, height);
        });

        // Apply max height to all slides
        slides.forEach(slide => {
          slide.style.height = `${maxHeight}px`;
        });
      }



      // Fonction de debounce
      function debounce(func, wait) {
        let timeout;
        return function() {
            const context = this;
            const args = arguments;
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(context, args), wait);
        };
      }

      // Applique le debounce à equalizeHeights
      const optimizedEqualizeHeights = debounce(equalizeHeights, 200); // 200ms de délai

      optimizedEqualizeHeights(); // Exécution au chargement

      const resizeObserver = new ResizeObserver(optimizedEqualizeHeights);
      resizeObserver.observe(document.documentElement);

      window.addEventListener('orientationchange', optimizedEqualizeHeights);
      window.addEventListener('fullscreenchange', optimizedEqualizeHeights);


    }
  };

})(Drupal);
