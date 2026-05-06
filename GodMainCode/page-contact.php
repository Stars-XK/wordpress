<?php
/*
Template Name: Contact / Guestbook Page
*/

get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title"><?php the_title(); ?></h1>
            <p class="page-description"><?php echo get_post_meta(get_the_ID(), 'contact_description', true); ?></p>
        </header>
        
        <div class="contact-container">
            <div class="contact-form-section">
                <h2 class="section-title"><?php esc_html_e('Leave a Message', 'godmaincode'); ?></h2>
                
                <form class="contact-form" method="post" action="">
                    <?php wp_nonce_field('godmaincode_contact_nonce', 'contact_nonce'); ?>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="contact-name"><?php esc_html_e('Name', 'godmaincode'); ?> *</label>
                            <input type="text" id="contact-name" name="contact_name" required>
                        </div>
                        <div class="form-group">
                            <label for="contact-email"><?php esc_html_e('Email', 'godmaincode'); ?> *</label>
                            <input type="email" id="contact-email" name="contact_email" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="contact-subject"><?php esc_html_e('Subject', 'godmaincode'); ?></label>
                        <input type="text" id="contact-subject" name="contact_subject">
                    </div>
                    
                    <div class="form-group">
                        <label for="contact-message"><?php esc_html_e('Message', 'godmaincode'); ?> *</label>
                        <textarea id="contact-message" name="contact_message" rows="6" required></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">
                        <?php esc_html_e('Send Message', 'godmaincode'); ?>
                    </button>
                </form>
            </div>
            
            <div class="messages-section">
                <h2 class="section-title"><?php esc_html_e('Guestbook Messages', 'godmaincode'); ?></h2>
                
                <div class="messages-list">
                    <?php
                    $messages_args = array(
                        'post_type' => 'guestbook',
                        'posts_per_page' => 20,
                        'order' => 'DESC',
                        'orderby' => 'date',
                    );
                    $messages_query = new WP_Query($messages_args);
                    
                    if ($messages_query->have_posts()) :
                        while ($messages_query->have_posts()) : $messages_query->the_post();
                            $author_name = get_post_meta(get_the_ID(), 'guestbook_author_name', true);
                            $author_email = get_post_meta(get_the_ID(), 'guestbook_author_email', true);
                            ?>
                            <article class="message-item card">
                                <div class="message-header">
                                    <div class="message-author">
                                        <img src="<?php echo get_avatar_url($author_email, array('size' => 48)); ?>" alt="<?php esc_attr_e('Author Avatar', 'godmaincode'); ?>">
                                        <div class="author-info">
                                            <span class="author-name"><?php echo esc_html($author_name); ?></span>
                                            <span class="message-date"><?php echo get_the_date(); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="message-content">
                                    <?php the_content(); ?>
                                </div>
                            </article>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                        ?>
                        <div class="empty-state">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                            </svg>
                            <p><?php esc_html_e('No messages yet. Be the first to leave a message!', 'godmaincode'); ?></p>
                        </div>
                        <?php
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>