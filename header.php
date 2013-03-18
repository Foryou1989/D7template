<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	global $inove_nosidebar;
	$options = get_option('inove_options');
	if (is_home()) {
		$home_menu = 'current_page_item';
	} else {
		$home_menu = 'page_item';
	}
	if($options['feed'] && $options['feed_url']) {
		if (substr(strtoupper($options['feed_url']), 0, 7) == 'HTTP://') {
			$feed = $options['feed_url'];
		} else {
			$feed = 'http://' . $options['feed_url'];
		}
	} else {
		$feed = get_bloginfo('rss2_url');
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="http://www.opcnz.com"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
<?php bloginfo('name'); ?>
<?php wp_title(); ?>
</title>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta name="baidu-site-verification" content="OTtVUT9SpaSJhvs9" />
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
<link id="favicon" href="/favicon.ico" rel="icon" type="image/x-icon" />
<?php wp_head(); ?>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<script type="text/javascript">
jQuery(document).ready(function()
    {
	jQuery(".nav li").hover(function(){
		jQuery(this).addClass('xianshi'); 	
			}, function(){ 		
				jQuery(this).removeClass('xianshi');		 
	});		
	jQuery.fn.smartFloat = function() {   
    var position = function(element) {   
        var top = element.position().top, pos = element.css("position");   
        jQuery(window).scroll(function() {   
            var scrolls = jQuery(this).scrollTop();   
            if (scrolls > top) {   
                if (window.XMLHttpRequest) {   
					element.css({
						width: 359,	   
						display: "block",	
                        position: "fixed",   
                        top: 56   
                    });       
                } else {   
					element.css({		   
							
						top: scrolls,   
   
                    });
				}   
            }else {   
					element.css({	
						display: "none",
						position: "absolute",   
						top: top    
					});	   
            }   

        });   

    };   

    return jQuery(this).each(function() {   
        position(jQuery(this));                            
    });   

};   

jQuery(".widget_zxnewst").smartFloat();   	
})
</script> 
<script type="text/javascript">
jQuery(document).ready(function(){
   jQuery("#wp-calendar td").mouseover(function(){
		var num = Number(jQuery(this).html());
		jQuery(this).addClass('btntwo');
		jQuery("#wp-calendar td").each(function(){
			if(Number(jQuery(this).html()) !== num){
				jQuery(this).removeClass('btntwo');
			}
		});
   
   });
var sticky_navigation_offset_top = jQuery('.header').offset().top;

var sticky_navigation = function(){
var scroll_top = jQuery(window).scrollTop();
if (scroll_top > sticky_navigation_offset_top) {
jQuery('.header').css({ 'position': 'fixed', 'top':0, 'left':0 });
jQuery('.header').css({ 'z-index': 99 });
jQuery('.header').css({ 'width': '100%' });
} else {
jQuery('.header').css({ 'position': 'relative' });
}
};
sticky_navigation();
jQuery(window).scroll(function() {
sticky_navigation();
});
jQuery('a[href="#"]').click(function(event){
event.preventDefault();
}); 
});
</script>
<style>
.blue{background:blue;}
.btntwo{border:1px solid #02598E;width:15px;background-color:#1E7BB3;color:#ffffff;border-radius: 8px 8px 8px 8px;}
</style>
</head>
<body<?php if(is_home()):?> class="home blog"<?php endif;?>  class="single single-post postid-4165 single-format-standard" >
<div class="header">
  <div class="header-inner">
    <h1 class="logo"><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>">Web开源笔记</a></h1>
    <?php 
		wp_nav_menu(array(
			'theme_location'	=> 'primary',
			'menu'            => '', 
			'container'       => 'div', 
			'container_class' => 'nav_cont', 
			'container_id'    => '',
			'menu_class'      => 'menu', 
			'menu_id'        => '',
			'echo'            => true,
			'fallback_cb'     => 'wp_page_menu',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '<ul id="topmenu" class="nav">%3$s</ul>',
			'depth'           => 0,
			'walker'          => ''
			
			));
		?>
    <form method="get" class="search-form" action="<?php bloginfo('url');?>" >
      <input class="search-input" name="s" type="text" placeholder="输入 回车搜索" autofocus x-webkit-speech="">
      <input class="search-submit" type="submit" value="搜索"/>
    </form>
    <?php 
		wp_nav_menu(array(
			'theme_location'	=> 'rightmenu',
			'menu'            => '', 
			'container'       => 'div', 
			'container_class' => 'nav_right', 
			'container_id'    => '',
			'menu_class'      => 'menu_right', 
			'menu_id'        => '',
			'echo'            => true,
			'fallback_cb'     => 'wmenu_right',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '<ul id="rightmenu" class="nav">%3$s</ul>',
			'depth'           => 0,
			'walker'          => ''
			
			));
		?>
  </div>
  <div class="clearn"></div>
</div>
<div class="wrapper">
<ul class="follow">
  <li class="follow_li1"><a target="_blank" href="http://t.qq.com/shenhuaxb520"><span class="ico ico-tqq"></span><span class="tit">关注腾讯微博</span><span class="note">t.qq.com/shenhuaxb520</span></a></li>
  <li class="follow_li2"><a target="_blank" href="http://weibo.com/forloveu"><span class="ico ico-weibo"></span><span class="tit">关注新浪微博</span><span class="note">weibo.com/forloveu</span></a></li>
  <li class="follow_li3"><a target="_blank" href="http://www.opcnz.com/"><span class="ico ico-feed"></span><span class="tit">订阅我们</span><span class="note">www.opcnz.com</span></a></li>
  <li class="follow_li4">
    <form class="mailfeed" action="http://list.qq.com/cgi-bin/qf_compose_send" target="_blank" method="post">
      <span class="ico ico-mailfeed"></span>
      <input type="hidden" name="t" value="qf_booked_feedback">
      <input type="hidden" name="id" value="81c788f1f1a7c08eea3e4971a7ef4bb044a27240e14766d4">
      <input id="to" onFocus="if (this.value == '输入邮箱 邮件订阅') {this.value = '';}" onBlur="if (this.value == '') {this.value = '输入邮箱 邮件订阅';}" value="输入邮箱 邮件订阅" name="to" type="text" class="ipt">
    </form>
  </li>
</ul>
<div class="clearn"></div>