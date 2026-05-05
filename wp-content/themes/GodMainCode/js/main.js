/**
 * GodMainCode Main JavaScript
 * Handles all interactive functionality
 */

document.addEventListener('DOMContentLoaded', function() {
    initScrollEffects();
    initSearch();
    initMusicDrawer();
    initWeather();
    initHeaderScroll();
    initSmoothScroll();
});

/**
 * Scroll-based animations
 */
function initScrollEffects() {
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    document.querySelectorAll('.section-title, .link-category, .news-card, .article-card').forEach(el => {
        el.classList.add('animate-ready');
        observer.observe(el);
    });
}

/**
 * Header scroll effects
 */
function initHeaderScroll() {
    const header = document.querySelector('.site-header');
    if (!header) return;

    let lastScroll = 0;

    window.addEventListener('scroll', () => {
        const currentScroll = window.pageYOffset;

        if (currentScroll > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }

        lastScroll = currentScroll;
    }, { passive: true });
}

/**
 * Search functionality
 */
function initSearch() {
    const searchIcon = document.querySelector('.search-icon');
    const searchOverlay = document.querySelector('.search-overlay');
    const closeSearch = document.querySelector('.close-search');
    const searchField = document.querySelector('.search-field');

    if (!searchIcon || !searchOverlay) return;

    let isSearchOpen = false;

    function openSearch() {
        searchOverlay.classList.add('active');
        isSearchOpen = true;
        setTimeout(() => {
            searchField?.focus();
        }, 300);
    }

    function closeSearchHandler() {
        searchOverlay.classList.remove('active');
        isSearchOpen = false;
    }

    searchIcon.addEventListener('click', openSearch);

    if (closeSearch) {
        closeSearch.addEventListener('click', closeSearchHandler);
    }

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && isSearchOpen) {
            closeSearchHandler();
        }

        if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
            e.preventDefault();
            if (!isSearchOpen) {
                openSearch();
            }
        }
    });

    searchOverlay.addEventListener('click', (e) => {
        if (e.target === searchOverlay) {
            closeSearchHandler();
        }
    });
}

/**
 * Music drawer functionality
 */
function initMusicDrawer() {
    const drawerToggle = document.getElementById('drawer-toggle');
    const drawerContent = document.getElementById('drawer-content');
    const drawerClose = document.getElementById('drawer-close');
    const miniPlayBtn = document.getElementById('mini-play-btn');
    const miniPrevBtn = document.getElementById('mini-prev-btn');
    const miniNextBtn = document.getElementById('mini-next-btn');
    const progressBar = document.querySelector('.mini-progress-bar');
    const progressFill = document.querySelector('.mini-progress-fill');
    const trackItems = document.querySelectorAll('.drawer-track-item');

    if (!drawerToggle || !drawerContent) return;

    let isPlaying = false;
    let currentTrack = 0;
    let progressInterval = null;
    let progress = 0;

    function toggleDrawer() {
        drawerContent.classList.toggle('active');
        drawerToggle.classList.toggle('active');
    }

    drawerToggle.addEventListener('click', toggleDrawer);

    if (drawerClose) {
        drawerClose.addEventListener('click', toggleDrawer);
    }

    document.addEventListener('click', (e) => {
        if (!drawerContent.contains(e.target) && !drawerToggle.contains(e.target) && drawerContent.classList.contains('active')) {
            drawerContent.classList.remove('active');
            drawerToggle.classList.remove('active');
        }
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && drawerContent.classList.contains('active')) {
            drawerContent.classList.remove('active');
            drawerToggle.classList.remove('active');
        }
    });

    function updatePlayButton() {
        if (!miniPlayBtn) return;

        const svg = miniPlayBtn.querySelector('svg');
        if (!svg) return;

        if (isPlaying) {
            svg.innerHTML = '<rect x="6" y="4" width="4" height="16"></rect><rect x="14" y="4" width="4" height="16"></rect>';
        } else {
            svg.innerHTML = '<polygon points="5 3 19 12 5 21 5 3"></polygon>';
        }
    }

    function startProgress() {
        if (progressInterval) clearInterval(progressInterval);

        progressInterval = setInterval(() => {
            if (!isPlaying) return;

            progress += 0.5;
            if (progress >= 100) {
                progress = 0;
                currentTrack = (currentTrack + 1) % trackItems.length;
                updateCurrentTrack();
            }

            if (progressFill) {
                progressFill.style.width = `${progress}%`;
            }
        }, 100);
    }

    function updateCurrentTrack() {
        trackItems.forEach((item, index) => {
            item.classList.remove('active');
            if (index === currentTrack) {
                item.classList.add('active');
            }
        });

        const currentItem = trackItems[currentTrack];
        if (currentItem) {
            const trackName = currentItem.querySelector('.drawer-track-name')?.textContent || '未知歌曲';
            const titleEl = document.querySelector('.mini-track-title');
            const artistEl = document.querySelector('.mini-track-artist');

            if (titleEl) titleEl.textContent = trackName;
            if (artistEl) artistEl.textContent = 'GodMainCode';
        }
    }

    if (miniPlayBtn) {
        miniPlayBtn.addEventListener('click', () => {
            isPlaying = !isPlaying;
            updatePlayButton();

            if (isPlaying) {
                startProgress();
            } else {
                if (progressInterval) {
                    clearInterval(progressInterval);
                }
            }
        });
    }

    if (miniPrevBtn) {
        miniPrevBtn.addEventListener('click', () => {
            currentTrack = (currentTrack - 1 + trackItems.length) % trackItems.length;
            updateCurrentTrack();
            progress = 0;
            if (progressFill) progressFill.style.width = '0%';
        });
    }

    if (miniNextBtn) {
        miniNextBtn.addEventListener('click', () => {
            currentTrack = (currentTrack + 1) % trackItems.length;
            updateCurrentTrack();
            progress = 0;
            if (progressFill) progressFill.style.width = '0%';
        });
    }

    trackItems.forEach((item, index) => {
        item.addEventListener('click', () => {
            currentTrack = index;
            updateCurrentTrack();
            isPlaying = true;
            updatePlayButton();
            startProgress();
        });
    });

    if (progressBar) {
        progressBar.addEventListener('click', (e) => {
            const rect = progressBar.getBoundingClientRect();
            const percent = (e.clientX - rect.left) / rect.width;
            progress = Math.max(0, Math.min(100, percent * 100));

            if (progressFill) {
                progressFill.style.width = `${progress}%`;
            }
        });
    }
}

/**
 * Weather widget
 */
function initWeather() {
    const weatherText = document.querySelector('.weather-text');
    if (!weatherText) return;

    function updateWeather() {
        fetch('https://wttr.in/Shanghai?format=%t')
            .then(response => {
                if (!response.ok) throw new Error('Network response was not ok');
                return response.text();
            })
            .then(data => {
                weatherText.textContent = data.trim();
            })
            .catch(() => {
                weatherText.textContent = '--°C';
            });
    }

    updateWeather();

    setInterval(updateWeather, 600000);
}

/**
 * Smooth scroll for anchor links
 */
function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;

            const target = document.querySelector(targetId);
            if (target) {
                e.preventDefault();
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
}

/**
 * Utility: Debounce function
 */
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

/**
 * Utility: Throttle function
 */
function throttle(func, limit) {
    let inThrottle;
    return function executedFunction(...args) {
        if (!inThrottle) {
            func(...args);
            inThrottle = true;
            setTimeout(() => inThrottle = false, limit);
        }
    };
}

/**
 * Add loading state to buttons
 */
document.querySelectorAll('.btn').forEach(btn => {
    btn.addEventListener('click', function() {
        if (this.classList.contains('loading')) return;

        this.classList.add('loading');
        this.setAttribute('data-original-text', this.textContent);

        setTimeout(() => {
            this.classList.remove('loading');
            this.textContent = this.getAttribute('data-original-text');
        }, 2000);
    });
});

/**
 * Lazy load images
 */
if ('IntersectionObserver' in window) {
    const lazyImages = document.querySelectorAll('img[data-src]');

    const imageObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.removeAttribute('data-src');
                imageObserver.unobserve(img);
            }
        });
    });

    lazyImages.forEach(img => imageObserver.observe(img));
}

/**
 * Back to top button
 */
function createBackToTop() {
    const existingBtn = document.querySelector('.back-to-top');
    if (existingBtn) return;

    const btn = document.createElement('button');
    btn.className = 'back-to-top';
    btn.innerHTML = '↑';
    btn.title = '返回顶部';

    btn.style.cssText = `
        position: fixed;
        bottom: 100px;
        right: 28px;
        width: 48px;
        height: 48px;
        background: linear-gradient(135deg, #8b5cf6, #7c3aed);
        border: none;
        border-radius: 50%;
        color: white;
        font-size: 20px;
        cursor: pointer;
        opacity: 0;
        visibility: hidden;
        transform: translateY(20px);
        transition: all 0.3s ease;
        z-index: 999;
        box-shadow: 0 4px 16px rgba(139, 92, 246, 0.4);
    `;

    document.body.appendChild(btn);

    btn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    window.addEventListener('scroll', throttle(() => {
        if (window.pageYOffset > 300) {
            btn.style.opacity = '1';
            btn.style.visibility = 'visible';
            btn.style.transform = 'translateY(0)';
        } else {
            btn.style.opacity = '0';
            btn.style.visibility = 'hidden';
            btn.style.transform = 'translateY(20px)';
        }
    }, 100));
}

createBackToTop();

/**
 * Hero Carousel
 */
function initHeroCarousel() {
    const slides = document.querySelectorAll('.carousel-slide');
    const indicators = document.querySelectorAll('.indicator');
    const prevBtn = document.getElementById('carousel-prev');
    const nextBtn = document.getElementById('carousel-next');

    if (!slides.length) return;

    let currentIndex = 0;
    let autoPlayInterval;

    function goToSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.remove('active');
            indicators[i].classList.remove('active');
        });

        slides[index].classList.add('active');
        indicators[index].classList.add('active');
        currentIndex = index;
    }

    function nextSlide() {
        const newIndex = (currentIndex + 1) % slides.length;
        goToSlide(newIndex);
    }

    function prevSlide() {
        const newIndex = (currentIndex - 1 + slides.length) % slides.length;
        goToSlide(newIndex);
    }

    indicators.forEach((indicator, index) => {
        indicator.addEventListener('click', () => goToSlide(index));
    });

    if (prevBtn) {
        prevBtn.addEventListener('click', prevSlide);
    }

    if (nextBtn) {
        nextBtn.addEventListener('click', nextSlide);
    }

    function startAutoPlay() {
        autoPlayInterval = setInterval(nextSlide, 5000);
    }

    function stopAutoPlay() {
        if (autoPlayInterval) {
            clearInterval(autoPlayInterval);
        }
    }

    const container = document.querySelector('.carousel-container');
    if (container) {
        container.addEventListener('mouseenter', stopAutoPlay);
        container.addEventListener('mouseleave', startAutoPlay);
    }

    startAutoPlay();
}

/**
 * Stats Counter Animation
 */
function initStatsCounter() {
    const counters = document.querySelectorAll('.stat-number');

    counters.forEach(counter => {
        const target = parseInt(counter.getAttribute('data-target'));
        const duration = 2000;
        const steps = 60;
        const increment = target / steps;
        let current = 0;

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const timer = setInterval(() => {
                        current += increment;
                        if (current >= target) {
                            counter.textContent = target.toLocaleString();
                            clearInterval(timer);
                        } else {
                            counter.textContent = Math.floor(current).toLocaleString();
                        }
                    }, duration / steps);

                    observer.unobserve(counter);
                }
            });
        }, { threshold: 0.5 });

        observer.observe(counter);
    });
}

/**
 * Reading Progress Bar
 */
function initReadingProgress() {
    const progressBar = document.createElement('div');
    progressBar.className = 'reading-progress';
    document.body.appendChild(progressBar);

    window.addEventListener('scroll', () => {
        const scrollTop = window.pageYOffset;
        const docHeight = document.documentElement.scrollHeight - window.innerHeight;
        const scrollPercent = (scrollTop / docHeight) * 100;
        progressBar.style.width = `${scrollPercent}%`;
    });
}

document.addEventListener('DOMContentLoaded', function() {
    initHeroCarousel();
    initStatsCounter();
    initReadingProgress();
});
