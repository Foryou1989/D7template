<?php get_header(); ?>
<div class="content-wrap">
  <div class="content">
    <?php while (have_posts()) : the_post(); ?>
    <div class="meta">
      <h1 class="meta-tit"> <a href="<?php the_permalink() ?>" title="<?php printf(__('猛击查看 %s 的详细内容', 'kubrick'), the_title_attribute('echo=0')); ?>">
        <?php the_title(); ?>
        </a> </h1>
      <div class="share">
        <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
          <div id="ckepop"> <a class="jiathis_button_qzone"></a> <a class="jiathis_button_tsina"></a> <a class="jiathis_button_tqq"></a> <a class="jiathis_button_renren"></a> <a class="jiathis_button_kaixin001"></a> <a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a> <a class="jiathis_counter_style"></a> </div>
          <script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=1340387394593234" charset="utf-8"></script>
        </div>
      </div>
      <p class="meta-info">
        <?php the_time(__('Y/m/d')) ?>
        &nbsp;&nbsp; 
        分类：
        <?php the_category(',') ?>
        &nbsp;&nbsp; <a class="comm" href="<?php the_permalink() ?>#comments" title="<?php the_title(); ?>">
        <?php comments_number('0', '1', '%'); ?>
        人评论</a> <span class="view">
        <?php if(function_exists('the_views')) {the_views();} ?>
        次浏览</span> </p>
    </div>
    <div class="entry">
      <?php the_content(); ?>
      <?php if( get_post_custom_values("code") != "") {?>
      <div class="article_foot"> <a target="_blank" class="code_demo" href="<?php bloginfo('template_directory');?>/code.php?id=<?php the_ID()?>">点击查看演示DEMO</a> </div>
      <?php } ?>
    </div>
    <div class="zhuanz">
      <p>转载请注明：<a href="<?php bloginfo('url'); ?>">
        <?php bloginfo('name'); ?>
        </a> &raquo; <a href="<?php the_permalink() ?>">
        <?php the_title(); ?>
        </a></p>
    </div>
    <?php endwhile; ?>
    <div class="share">
      <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
        <div id="ckepop"> <a class="jiathis_button_qzone"></a> <a class="jiathis_button_tsina"></a> <a class="jiathis_button_tqq"></a> <a class="jiathis_button_renren"></a> <a class="jiathis_button_kaixin001"></a> <a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a> <a class="jiathis_counter_style"></a> </div>
        <script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=1340387394593234" charset="utf-8"></script>
      </div>
    </div>
    <div class="single-tag"> 继续查看有关
      <?php the_category(',') ?>
      的文章 </div>
    <ul class="post-related">
      <?php
					global $post;
					$cats = wp_get_post_categories($post->ID);
					if ($cats) {
					$args = array(
							'category__in' => array( $cats[0] ),
							'post__not_in' => array( $post->ID ),
							'showposts' => 4,
							'caller_get_posts' => 1
						);
					query_posts($args);

					if (have_posts()) :
						while (have_posts()) : the_post(); update_post_caches($posts); ?>
      <li>
        <?php if (has_post_thumbnail()){?>
        <a href="<?php the_permalink(); ?>"><img src="<?php echo PostThumbURL(); ?>" alt="<?php the_title_attribute();?>" />
        <?php the_title(); ?>
        </a>
        <?php }else if (catch_that_image()) {?>
        <a href="<?php the_permalink(); ?>"><img src="<?php  echo catch_that_image(); ?>" alt="<?php the_title_attribute();?>" />
        <?php the_title(); ?>
        </a>
        <?php }?>
      </li>
      <?php endwhile; else : ?>
      <li>* 暂无相关文章</li>
      <?php endif; wp_reset_query(); } ?>
    </ul>
    <?php comments_template(); ?>
  </div>
</div>
<?php get_sidebar();?>
</div>
<script src="<?php bloginfo('template_directory'); ?>/js/post.js"></script>
<?php get_footer(); ?>