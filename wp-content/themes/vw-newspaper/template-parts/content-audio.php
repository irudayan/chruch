<?php
/**
 * The template part for displaying Audio Post
 *
 * @package VW Newspaper 
 * @subpackage vw_newspaper
 * @since VW Newspaper 1.0
 */
?>
<?php 
  $vw_newspaper_archive_year  = get_the_time('Y'); 
  $vw_newspaper_archive_month = get_the_time('m'); 
  $vw_newspaper_archive_day   = get_the_time('d'); 
?>
<?php
  $content = apply_filters( 'the_content', get_the_content() );
  $audio = false;

  // Only get audio from the content if a playlist isn't present.
  if ( false === strpos( $content, 'wp-playlist-script' ) ) {
    $audio = get_media_embedded_in_content( $content, array( 'audio' ) );
  }
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="service-box">
    <?php $vw_newspaper_theme_lay = get_theme_mod( 'vw_newspaper_blog_layout_option','Default');
    if($vw_newspaper_theme_lay == 'Default'){ ?>
      <div class="row m-0">
        <?php if(get_theme_mod('vw_newspaper_toggle_postdate',true)==1){ ?>
          <div class="date-monthwrap">
            <span class="date-month"><a href="<?php echo esc_url( get_day_link( $vw_newspaper_archive_year, $vw_newspaper_archive_month, $vw_newspaper_archive_day)); ?>"><?php echo esc_html( get_the_date( 'M' ) ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
            <span class="date-day"><a href="<?php echo esc_url( get_day_link( $vw_newspaper_archive_year, $vw_newspaper_archive_month, $vw_newspaper_archive_day)); ?>"><?php echo esc_html( get_the_date( 'd') ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
            <span class="date-year"><a href="<?php echo esc_url( get_day_link( $vw_newspaper_archive_year, $vw_newspaper_archive_month, $vw_newspaper_archive_day)); ?>"><?php echo esc_html( get_the_date( 'Y' ) ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
          </div>
        <?php } ?>
        <div class="post-main-box">
          <div class="box-image">
            <?php
              if ( ! is_single() ) {
                // If not a single post, highlight the audio file.
                if ( ! empty( $audio ) ) {
                  foreach ( $audio as $audio_html ) {
                    echo '<div class="entry-audio">';
                      echo $audio_html;
                    echo '</div><!-- .entry-audio -->';
                  }
                };

              };
            ?>
          </div>
          <h2 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2> 
          <div class="new-text">
            <div class="entry-content">
              <p>
                <?php $vw_newspaper_theme_lay = get_theme_mod( 'vw_newspaper_excerpt_settings','Excerpt');
                if($vw_newspaper_theme_lay == 'Content'){ ?>
                  <?php the_content(); ?>
                <?php }
                if($vw_newspaper_theme_lay == 'Excerpt'){ ?>
                  <?php if(get_the_excerpt()) { ?>
                    <?php $excerpt = get_the_excerpt(); echo esc_html( vw_newspaper_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_newspaper_excerpt_number','30')))); ?> <?php echo esc_html(get_theme_mod('vw_newspaper_excerpt_suffix',''));?>
                  <?php }?>
                <?php }?>
              </p>
            </div>
          </div>
          <?php if( get_theme_mod('vw_newspaper_button_text','Read More') != ''){ ?>
            <div class="content-bttn">
              <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small hvr-sweep-to-right"><?php echo esc_html(get_theme_mod('vw_newspaper_button_text',__('Read More','vw-newspaper')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_newspaper_button_text',__('Read More','vw-newspaper')));?></span></a>
            </div>
          <?php } ?>
        </div>
      </div> 
    <?php }else if($vw_newspaper_theme_lay == 'Center'){ ?>
      <div class="new-text">
        <h2 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2> 
        <?php if( get_theme_mod( 'vw_newspaper_toggle_postdate',true) != '' || get_theme_mod( 'vw_newspaper_toggle_author',true) != '' || get_theme_mod( 'vw_newspaper_toggle_comments',true) != '' || get_theme_mod( 'vw_newspaper_toggle_time',true) != '') { ?>
          <div class="metabox">
            <?php if(get_theme_mod('vw_newspaper_toggle_postdate',true)==1){ ?>
                <span class="entry-date"><i class="fas fa-calendar-alt"></i><a href="<?php echo esc_url( get_day_link( $vw_newspaper_archive_year, $vw_newspaper_archive_month, $vw_newspaper_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
            <?php } ?>

            <?php if(get_theme_mod('vw_newspaper_toggle_author',true)==1){ ?>
                <span class="entry-author"><span><?php echo esc_html(get_theme_mod('vw_newspaper_meta_field_separator'));?></span><i class="far fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span>
            <?php } ?>

            <?php if(get_theme_mod('vw_newspaper_toggle_comments',true)==1){ ?>
                <span class="entry-comments"> <span><?php echo esc_html(get_theme_mod('vw_newspaper_meta_field_separator'));?></span><i class="fas fa-comments"></i><?php comments_number( '0 Comments', '0 Comments', '% Comments' ); ?> </span>
            <?php } ?>

            <?php if(get_theme_mod('vw_newspaper_toggle_time',true)==1){ ?>
              <span class="entry-time"><span><?php echo esc_html(get_theme_mod('vw_newspaper_meta_field_separator'));?></span><i class="fas fa-clock"></i><?php echo esc_html( get_the_time() ); ?></span>
            <?php } ?>
          </div>
        <?php } ?>
        <div class="box-image">
          <?php
            if ( ! is_single() ) {
              // If not a single post, highlight the audio file.
              if ( ! empty( $audio ) ) {
                foreach ( $audio as $audio_html ) {
                  echo '<div class="entry-audio">';
                    echo $audio_html;
                  echo '</div><!-- .entry-audio -->';
                }
              };

            };
          ?>
        </div>
        <div class="entry-content">
          <p>
            <?php $vw_newspaper_theme_lay = get_theme_mod( 'vw_newspaper_excerpt_settings','Excerpt');
            if($vw_newspaper_theme_lay == 'Content'){ ?>
              <?php the_content(); ?>
            <?php }
            if($vw_newspaper_theme_lay == 'Excerpt'){ ?>
              <?php if(get_the_excerpt()) { ?>
                <?php $excerpt = get_the_excerpt(); echo esc_html( vw_newspaper_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_newspaper_excerpt_number','30')))); ?> <?php echo esc_html(get_theme_mod('vw_newspaper_excerpt_suffix',''));?>
              <?php }?>
            <?php }?>
          </p>
        </div>
        <?php if( get_theme_mod('vw_newspaper_button_text','Read More') != ''){ ?>
          <div class="content-bttn">
            <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small hvr-sweep-to-right"><?php echo esc_html(get_theme_mod('vw_newspaper_button_text',__('Read More','vw-newspaper')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_newspaper_button_text',__('Read More','vw-newspaper')));?></span></a>
          </div>
        <?php } ?>
      </div>
    <?php }else if($vw_newspaper_theme_lay == 'Left'){ ?>
      <div class="new-text">
        <div class="box-image">
          <?php
            if ( ! is_single() ) {
              // If not a single post, highlight the audio file.
              if ( ! empty( $audio ) ) {
                foreach ( $audio as $audio_html ) {
                  echo '<div class="entry-audio">';
                    echo $audio_html;
                  echo '</div><!-- .entry-audio -->';
                }
              };

            };
          ?>
        </div>
        <h2 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2> 
        <?php if( get_theme_mod( 'vw_newspaper_toggle_postdate',true) != '' || get_theme_mod( 'vw_newspaper_toggle_author',true) != '' || get_theme_mod( 'vw_newspaper_toggle_comments',true) != '' || get_theme_mod( 'vw_newspaper_toggle_time',true) != '') { ?>
          <div class="metabox">
            <?php if(get_theme_mod('vw_newspaper_toggle_postdate',true)==1){ ?>
                <span class="entry-date"><i class="fas fa-calendar-alt"></i><a href="<?php echo esc_url( get_day_link( $vw_newspaper_archive_year, $vw_newspaper_archive_month, $vw_newspaper_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
            <?php } ?>

            <?php if(get_theme_mod('vw_newspaper_toggle_author',true)==1){ ?>
                <span class="entry-author"><span><?php echo esc_html(get_theme_mod('vw_newspaper_meta_field_separator'));?></span><i class="far fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span>
            <?php } ?>

            <?php if(get_theme_mod('vw_newspaper_toggle_comments',true)==1){ ?>
                <span class="entry-comments"> <span><?php echo esc_html(get_theme_mod('vw_newspaper_meta_field_separator'));?></span><i class="fas fa-comments"></i><?php comments_number( '0 Comments', '0 Comments', '% Comments' ); ?> </span>
            <?php } ?>

            <?php if(get_theme_mod('vw_newspaper_toggle_time',true)==1){ ?>
              <span class="entry-time"><span><?php echo esc_html(get_theme_mod('vw_newspaper_meta_field_separator'));?></span><i class="fas fa-clock"></i><?php echo esc_html( get_the_time() ); ?></span>
            <?php } ?>
          </div>
        <?php } ?>
        <div class="entry-content">
          <p>
            <?php $vw_newspaper_theme_lay = get_theme_mod( 'vw_newspaper_excerpt_settings','Excerpt');
            if($vw_newspaper_theme_lay == 'Content'){ ?>
              <?php the_content(); ?>
            <?php }
            if($vw_newspaper_theme_lay == 'Excerpt'){ ?>
              <?php if(get_the_excerpt()) { ?>
                <?php $excerpt = get_the_excerpt(); echo esc_html( vw_newspaper_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_newspaper_excerpt_number','30')))); ?> <?php echo esc_html(get_theme_mod('vw_newspaper_excerpt_suffix',''));?>
              <?php }?>
            <?php }?>
          </p>
        </div>
        <?php if( get_theme_mod('vw_newspaper_button_text','Read More') != ''){ ?>
          <div class="content-bttn">
            <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small hvr-sweep-to-right"><?php echo esc_html(get_theme_mod('vw_newspaper_button_text',__('Read More','vw-newspaper')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_newspaper_button_text',__('Read More','vw-newspaper')));?></span></a>
          </div>
        <?php } ?>
      </div>
    <?php } ?>
  </div>
</article>