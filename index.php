<?php get_header(); ?>
<div class="content-wrap">
  <div class="content">
    <ul class="sticky">
      <?php
$rand_posts = get_posts('numberposts=5&orderby=rand');
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
    <div class="quicker">
      <h3>分类目录</h3>
      <ul>
        <li>
          <?php wp_list_categories('title_li='); ?>
        </li>
      </ul>
    </div>
    <ul class="excerpt">
      <?php while (have_posts()) : the_post(); ?>
      <li>
        <?php if (has_post_thumbnail()){?>
        <a class="pic" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"> <img src="<?php echo PostThumbURL(); ?>" alt="<?php the_title(); ?>" /> </a>
        <?php }else if (catch_that_image()) {?>
        <a class="pic" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"> <img src="<?php echo catch_that_image(); ?>" alt="<?php the_title(); ?>" /> </a>
        <?php } ?>
        <h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
          <?php the_title(); ?>
          </a></h2>
        <div class="info"> <span class="time">
          <?php the_time(Y年n月d日) ?>
          </span> <a class="comm" href="<?php the_permalink() ?>#comments" title="<?php the_title(); ?>">
          <?php comments_number('0', '1', '%'); ?>
          人评论</a> <span class="view">
          <?php if(function_exists('the_views')) {the_views();} ?>
          次浏览</span> </div>
        <div class="note"><?php echo mb_strimwidth(strip_tags(apply_filters('the_excerpt', $post->post_content)), 0, 220,"...");?></div>
      </li>
      <?php endwhile; ?>
    </ul>
    <div class="paging">
      <?php kriesi_pagination($query_string); ?>
    </div>
  </div>
</div>
<?php get_sidebar();?>
<div class="clearn"></div>
</div>
<?php get_footer(); ?>