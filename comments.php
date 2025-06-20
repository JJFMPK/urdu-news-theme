<?php
if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title">
            <?php
            printf( _nx( '%1$s تبصرہ', '%1$s تبصرے', get_comments_number(), 'comments title', 'urdu-news' ),
                number_format_i18n( get_comments_number() ) );
            ?>
        </h2>

        <ul class="comment-list">
            <?php wp_list_comments( array(
                'style'      => 'ul',
                'short_ping' => true,
            ) ); ?>
        </ul>

        <?php the_comments_navigation(); ?>

    <?php endif; ?>

    <?php
    // If comments are closed and there are comments, let's leave a little note.
    if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
    ?>
        <p class="no-comments"><?php _e( 'تبصرے بند ہیں۔', 'urdu-news' ); ?></p>
    <?php endif; ?>

    <?php comment_form(); ?>

</div>
