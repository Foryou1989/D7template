<div class="sidebar">
  <div class="widget widget_recent_entries">
    <h3 class="widget_tit">近期文章</h3>
    <?php
$limit = get_option('posts_per_page');
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts('showposts=' . $limit=10 . '&paged=' . $paged);
$wp_query->is_archive = true; $wp_query->is_home = false;
?>
    <ul>
      <?php while(have_posts()) : the_post(); if(!($first_post == $post->ID)) : ?>
      <li><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
        <?php the_title(); ?>
        </a></li>
      <?php endif; endwhile; ?>
    </ul>
  </div>
  <div class="widget widget_d_comment">
    <h3 class="widget_tit">最新评论文章</h3>
    <ul>
      <?php while (have_posts()) : the_post(); ?>
      <?php endwhile;?>
      <?php   
						global $wpdb;   
						$my_email = get_bloginfo ('admin_email');   
						$sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID, comment_post_ID, comment_author, comment_date_gmt, comment_approved, comment_type,comment_author_url,comment_author_email, SUBSTRING(comment_content,1,14) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID = $wpdb->posts.ID) WHERE comment_approved = '1' AND comment_type = '' AND post_password = '' AND comment_author_email != '$my_email' ORDER BY comment_date_gmt DESC LIMIT 8";   
						$comments = $wpdb->get_results($sql);   
						$output = $pre_HTML;   
						foreach ($comments as $comment) {
							   $output .= '<li><a style="padding-left:0;" href="'.get_permalink($comment->ID).'" title="'.$comment->post_title.'"><em>&gt;</em><strong>'.$comment->post_title.'</strong></a></li>';
					    }   
						$output .= $post_HTML;   
						echo $output;   
                      ?>
    </ul>
  </div>
  <div class="widget widget_d_comment">
    <h3 class="widget_tit">最新评论</h3>
    <ul>
      <?php   
						global $wpdb;   
						$my_email = get_bloginfo ('admin_email');   
						$sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID, comment_post_ID, comment_author, comment_date_gmt, comment_approved, comment_type,comment_author_url,comment_author_email, SUBSTRING(comment_content,1,14) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID = $wpdb->posts.ID) WHERE comment_approved = '1' AND comment_type = '' AND post_password = '' AND comment_author_email != '$my_email' ORDER BY comment_date_gmt DESC LIMIT 8";   
						$comments = $wpdb->get_results($sql);   
						$output = $pre_HTML;   
						foreach ($comments as $comment) {
							   $output .= '<li><a href="'. get_permalink($comment->ID) ."#comment-" . $comment->comment_ID .'" title="'.$comment->post_title .'"><em>&gt;</em>'.get_avatar( $comment, 32 ).'<strong>'.strip_tags($comment->comment_author).'：</strong>'.strip_tags($comment->com_excerpt).'</a></li>';
					    }   
						$output .= $post_HTML;   
						echo $output;   
                ?>
    </ul>
  </div>
  <div class="widget widget_tags">
    <h3 class="widget_tit">热门标签</h3>
    <div class="sub-tags">
      <?php wp_tag_cloud('number='.stripslashes(get_option('d_tags_num')).'&orderby=count&order=DESC&smallest=14&largest=14&unit=px'); ?>
    </div>
    <div class="clearn"></div>
  </div>
  <div class="widget widget_links">
    <h3 class="widget_tit">友情链接</h3>
    <ul class='xoxo blogroll'>
      <?php get_links('-1', '<li>', '</li>', '<br />', FALSE, 'id', FALSE, FALSE, -1, FALSE); ?>
    </ul>
  </div>
  <div class="widget widget_zxnewst">
    <h3 class="widget_tit">最新文章</h3>
    <ul class='zxnewst'>
      <?php
        $rand_posts = get_posts('numberposts=8&orderby=desc');
        foreach($rand_posts as $post) : 
        ?>
      <li>
        <?php if (has_post_thumbnail()){?>
        <a title="<?php the_title();?>" href="<?php the_permalink(); ?>"><img alt="<?php the_title();?>" src="<?php echo PostThumbURL(); ?>">
        <?php the_title();?>
        </a>
        <?php }else if (catch_that_image()) {?>
        <a title="<?php the_title();?>" href="<?php the_permalink(); ?>"><img alt="<?php the_title();?>" src="<?php echo catch_that_image(); ?>">
        <?php the_title();?>
        </a>
        <?php }?>
      </li>
      <?php 
        endforeach;
        ?>
    </ul>
  </div>
  <div class="clearn"></div>
</div>
