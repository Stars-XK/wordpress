<?php
if (!defined('ABSPATH')) {
    exit;
}

if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">
    <h2 class="comments-title">
        <?php
        $comments_number = get_comments_number();
        if ('1' === $comments_number) {
            printf(esc_html__('One thought on &ldquo;%s&rdquo;', 'godmaincode'), get_the_title());
        } else {
            printf(esc_html(_nx('%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $comments_number, 'comments title', 'godmaincode')), number_format_i18n($comments_number), get_the_title());
        }
        ?>
    </h2>

    <?php if (have_comments()) : ?>
        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 64,
                'callback'    => 'godmaincode_comment_callback',
            ));
            ?>
        </ol>

        <?php
        the_comments_navigation(array(
            'prev_text' => '<span class="screen-reader-text">' . esc_html__('Previous', 'godmaincode') . '</span>',
            'next_text' => '<span class="screen-reader-text">' . esc_html__('Next', 'godmaincode') . '</span>',
        ));

        if (!comments_open() && get_comments_number()) :
            ?>
            <p class="no-comments"><?php esc_html_e('Comments are closed.', 'godmaincode'); ?></p>
            <?php
        endif;
    endif;

    comment_form(array(
        'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title">',
        'title_reply_after'  => '</h3>',
        'submit_button'      => '<button type="submit" class="btn btn-primary comment-submit">%s</button>',
    ));
?>
</div>