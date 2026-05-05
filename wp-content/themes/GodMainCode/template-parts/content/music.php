<section class="music-section section">
    <div class="container">
        <h2 class="section-title"><?php esc_html_e('Music Player', 'godmaincode'); ?></h2>
        
        <div class="music-container">
            <div class="card music-card">
                <div class="music-header">
                    <h3 class="music-title"><?php esc_html_e('Now Playing', 'godmaincode'); ?></h3>
                </div>
                
                <div class="music-player">
                    <div class="album-art">
                        <div class="art-placeholder">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon>
                                <path d="M15.54 8.46a5 5 0 0 1 0 7.07"></path>
                                <path d="M19.07 4.93a10 10 0 0 1 0 14.14"></path>
                            </svg>
                        </div>
                    </div>
                    
                    <div class="track-info">
                        <h4 class="track-title" id="track-title"><?php esc_html_e('Select a track', 'godmaincode'); ?></h4>
                        <p class="track-artist" id="track-artist"><?php esc_html_e('Artist Name', 'godmaincode'); ?></p>
                    </div>
                    
                    <div class="player-controls">
                        <button class="control-btn" id="prev-btn" title="Previous">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polygon points="19 20 9 12 19 4 19 20"></polygon>
                                <polygon points="5 20 15 12 5 4 5 20"></polygon>
                            </svg>
                        </button>
                        <button class="control-btn play-btn" id="play-btn" title="Play/Pause">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polygon points="5 3 19 12 5 21 5 3"></polygon>
                            </svg>
                        </button>
                        <button class="control-btn" id="next-btn" title="Next">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polygon points="5 4 15 12 5 20 5 4"></polygon>
                                <polygon points="19 4 9 12 19 20 19 4"></polygon>
                            </svg>
                        </button>
                    </div>
                    
                    <div class="progress-container">
                        <span class="time" id="current-time">0:00</span>
                        <div class="progress-bar">
                            <div class="progress" id="progress"></div>
                            <div class="progress-thumb" id="progress-thumb"></div>
                        </div>
                        <span class="time" id="total-time">0:00</span>
                    </div>
                    
                    <div class="volume-control">
                        <button class="volume-btn" id="volume-btn" title="Toggle Mute">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon>
                                <path d="M15.54 8.46a5 5 0 0 1 0 7.07"></path>
                                <path d="M19.07 4.93a10 10 0 0 1 0 14.14"></path>
                            </svg>
                        </button>
                        <div class="volume-bar">
                            <div class="volume-progress" id="volume-progress"></div>
                        </div>
                    </div>
                </div>
                
                <div class="playlist">
                    <h4><?php esc_html_e('Playlist', 'godmaincode'); ?></h4>
                    <ul class="track-list" id="track-list">
                        <li class="track-item active">
                            <span class="track-number">1</span>
                            <span class="track-name">Sample Track 1</span>
                            <span class="track-duration">3:45</span>
                        </li>
                        <li class="track-item">
                            <span class="track-number">2</span>
                            <span class="track-name">Sample Track 2</span>
                            <span class="track-duration">4:20</span>
                        </li>
                        <li class="track-item">
                            <span class="track-number">3</span>
                            <span class="track-name">Sample Track 3</span>
                            <span class="track-duration">3:58</span>
                        </li>
                        <li class="track-item">
                            <span class="track-number">4</span>
                            <span class="track-name">Sample Track 4</span>
                            <span class="track-duration">5:12</span>
                        </li>
                        <li class="track-item">
                            <span class="track-number">5</span>
                            <span class="track-name">Sample Track 5</span>
                            <span class="track-duration">4:05</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>