<section class="weather-section section">
    <div class="container">
        <h2 class="section-title"><?php esc_html_e('Current Weather', 'godmaincode'); ?></h2>
        
        <div class="weather-container">
            <div class="card weather-card">
                <?php if (!empty(get_theme_mod('godmaincode_weather_api_key', ''))): ?>
                    <div class="weather-header">
                        <div class="weather-location">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            <span id="weather-city"><?php echo get_theme_mod('godmaincode_weather_city', 'Beijing'); ?></span>
                        </div>
                        <span id="weather-date" class="weather-date"></span>
                    </div>
                    
                    <div class="weather-main">
                        <div class="weather-icon" id="weather-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="96" height="96" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="4"></circle>
                                <path d="M12 2v2"></path>
                                <path d="M12 20v2"></path>
                                <path d="m4.93 4.93 1.41 1.41"></path>
                                <path d="m17.66 17.66 1.41 1.41"></path>
                                <path d="M2 12h2"></path>
                                <path d="M20 12h2"></path>
                                <path d="m6.34 17.66-1.41 1.41"></path>
                                <path d="m19.07 4.93-1.41 1.41"></path>
                            </svg>
                        </div>
                        <div class="weather-temp">
                            <span id="weather-temp">--</span>
                            <span class="temp-unit">°C</span>
                        </div>
                        <div class="weather-desc" id="weather-desc">--</div>
                    </div>
                    
                    <div class="weather-details">
                        <div class="weather-detail">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path>
                            </svg>
                            <span id="weather-humidity">--%</span>
                        </div>
                        <div class="weather-detail">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M17.7 7.7a2.5 2.5 0 1 1 1.8 4.3H2"></path>
                                <path d="M9.6 4.6A2 2 0 1 1 11 8H2"></path>
                                <path d="M12.6 19.4A2 2 0 1 0 14 16H2"></path>
                            </svg>
                            <span id="weather-wind">-- m/s</span>
                        </div>
                        <div class="weather-detail">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                <path d="M2.05 12h.01"></path>
                                <path d="M12 2.05v.01"></path>
                                <path d="M21.95 12h-.01"></path>
                                <path d="M12 21.95v-.01"></path>
                                <path d="M4.93 4.93l.707.707"></path>
                                <path d="M18.36 18.36l.707.707"></path>
                                <path d="M4.93 19.07l.707-.707"></path>
                                <path d="M18.36 5.64l.707-.707"></path>
                            </svg>
                            <span id="weather-pressure">-- hPa</span>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="weather-setup">
                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                            <path d="m9 12 2 2 4-4"></path>
                        </svg>
                        <h3><?php esc_html_e('Weather Setup Required', 'godmaincode'); ?></h3>
                        <p><?php esc_html_e('Please go to Appearance → Customize → Weather Settings to add your API key.', 'godmaincode'); ?></p>
                        <a href="<?php echo admin_url('customize.php'); ?>" class="btn btn-primary"><?php esc_html_e('Configure Now', 'godmaincode'); ?></a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>