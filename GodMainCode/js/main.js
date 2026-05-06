(function($) {
    $(document).ready(function() {
        initMobileMenu();
        initSearchOverlay();
        initScrollEffects();
        initCardHoverEffects();
        initSmoothScroll();
        initWeatherWidget();
        initMusicPlayer();
        initCart();
        initThemeMode();
        initParticleEffect();
    });

    function initMobileMenu() {
        $('.menu-toggle').on('click', function() {
            $('#primary-menu').toggleClass('menu-open');
            $(this).toggleClass('toggle-active');
        });
    }

    function initSearchOverlay() {
        $('.search-toggle').on('click', function() {
            $('#search-overlay').addClass('overlay-active');
            $('body').addClass('overlay-open');
            $('#search-overlay .search-field').focus();
        });

        $('.search-close').on('click', function() {
            $('#search-overlay').removeClass('overlay-active');
            $('body').removeClass('overlay-open');
        });

        $(document).on('keydown', function(e) {
            if (e.key === 'Escape' && $('#search-overlay').hasClass('overlay-active')) {
                $('#search-overlay').removeClass('overlay-active');
                $('body').removeClass('overlay-open');
            }
        });
    }

    function initScrollEffects() {
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();
            
            if (scroll > 50) {
                $('.site-header').addClass('header-scrolled');
            } else {
                $('.site-header').removeClass('header-scrolled');
            }

            $('.animate-fade-in-up').each(function() {
                var position = $(this).offset().top;
                var windowHeight = $(window).height();
                
                if (scroll + windowHeight > position) {
                    $(this).addClass('animated');
                }
            });
        });

        $(window).trigger('scroll');
    }

    function initCardHoverEffects() {
        $('.card').on('mouseenter', function() {
            $(this).addClass('card-hover');
        }).on('mouseleave', function() {
            $(this).removeClass('card-hover');
        });
    }

    function initSmoothScroll() {
        $('a[href^="#"]').on('click', function(e) {
            e.preventDefault();
            
            var target = this.hash;
            var $target = $(target);
            
            if ($target.length) {
                $('html, body').animate({
                    scrollTop: $target.offset().top - 80
                }, 800, 'swing');
            }
        });
    }

    function initWeatherWidget() {
        if ($('.weather-widget').length) {
            $.ajax({
                url: godmaincodeData.ajax_url,
                type: 'POST',
                data: {
                    action: 'godmaincode_get_weather'
                },
                success: function(response) {
                    if (response.success) {
                        var data = response.data;
                        $('.weather-temp').text(data.temp + '°C');
                        $('.weather-desc').text(data.description);
                        $('.weather-icon img').attr('src', 'http://openweathermap.org/img/wn/' + data.icon + '@2x.png');
                    }
                }
            });
        }
    }

    function initMusicPlayer() {
        var audio = null;
        var currentIndex = 0;
        var playlist = [
            { title: 'Sample Song 1', artist: 'Artist 1', duration: '3:45' },
            { title: 'Sample Song 2', artist: 'Artist 2', duration: '4:20' },
            { title: 'Sample Song 3', artist: 'Artist 3', duration: '3:58' },
        ];

        $('.music-play').on('click', function() {
            if (audio && !audio.paused) {
                audio.pause();
                $(this).html('<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>');
            } else {
                if (!audio) {
                    audio = new Audio();
                }
                audio.play();
                $(this).html('<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="6" y="4" width="4" height="16"/><rect x="14" y="4" width="4" height="16"/></svg>');
            }
        });

        $('.music-next').on('click', function() {
            currentIndex = (currentIndex + 1) % playlist.length;
            updateCurrentTrack();
        });

        $('.music-prev').on('click', function() {
            currentIndex = (currentIndex - 1 + playlist.length) % playlist.length;
            updateCurrentTrack();
        });

        function updateCurrentTrack() {
            var track = playlist[currentIndex];
            $('.music-title').text(track.title);
            $('.music-artist').text(track.artist);
        }

        updateCurrentTrack();
    }

    function initCart() {
        $('.cart-toggle').on('click', function() {
            $('.cart-dropdown').toggleClass('cart-open');
        });

        $(document).on('click', function(e) {
            if (!$(e.target).closest('.cart-toggle, .cart-dropdown').length) {
                $('.cart-dropdown').removeClass('cart-open');
            }
        });
    }

    function initThemeMode() {
        $('.theme-toggle').on('click', function() {
            var currentMode = $('body').hasClass('theme-mode-dark') ? 'dark' : $('body').hasClass('theme-mode-gray') ? 'gray' : 'light';
            var modes = ['light', 'dark', 'gray'];
            var currentIndex = modes.indexOf(currentMode);
            var nextMode = modes[(currentIndex + 1) % modes.length];
            
            $('body').removeClass('theme-mode-light theme-mode-dark theme-mode-gray').addClass('theme-mode-' + nextMode);
            
            localStorage.setItem('godmaincode_theme_mode', nextMode);
        });

        var savedMode = localStorage.getItem('godmaincode_theme_mode');
        if (savedMode && ['light', 'dark', 'gray'].includes(savedMode)) {
            $('body').addClass('theme-mode-' + savedMode);
        }
    }

    function initParticleEffect() {
        if (typeof ParticleSystem !== 'undefined') {
            var effect = 'none';
            if ($('body').hasClass('particle-effect-sakura')) {
                effect = 'sakura';
            } else if ($('body').hasClass('particle-effect-snow')) {
                effect = 'snow';
            }
            
            if (effect !== 'none') {
                var particleSystem = new ParticleSystem('particles', {
                    type: effect,
                    count: 50,
                    speed: 1,
                    size: effect === 'sakura' ? 6 : 4,
                    opacity: 0.6,
                });
                particleSystem.init();
            }
        }
    }
})(jQuery);