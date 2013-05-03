<?php get_header(); ?>

		<div class="breadcrumbs">
			<?php if (function_exists('get_breadcrumbs')){get_breadcrumbs(); } ?>
		</div>

		<?php if(have_posts()): ?><?php while(have_posts()):the_post(); ?>

		<div class="post">
			
			<div class="main-post">

			<div class="s-top">

				<div class="t-code">
						<img src="http://api.qrserver.com/v1/create-qr-code/?size=80x80&data='<?php the_permalink() ?>'" alt="二维码访问 <?php  the_title_attribute(); ?>"/>
				</div>

				<div class="post-title">
					<h2><a href="<?php the_permalink(); ?>" title="点击查看：<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<?php updatePostViews(get_the_ID()); ?>
					
				</div>

				<div class="post-meta">
					<span class="cat">分类：<?php the_category(', ') ?></span> / <span class="auther"><span class="a">作者：<?php the_author(); ?></span></span> / <span class="time"><span class="a">时间：<?php the_time('Y-n-j') ?></span></span> / <span class="comm">评论：<?php comments_popup_link('暂无', ' 1 ', ' % '); ?></span> / <span class="postviews">浏览：<?php echo getPostViews(get_the_ID()); ?>°C</span><?php edit_post_link('编辑', ' | ', ''); ?>
				</div>

				<div class="divide"></div>

			</div>
			
			<div class="s-thumb">
					 <?php post_thumbnail( 555,340 ) ; ?>
			</div>

			<div class="post-content">
					<?php the_content(); ?> 

			</div>

			<div class="spostinfo">
				<ul>
					<li>该日志由 树 于 <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . '前'; ?> 发表在 <?php the_category(', ') ?> 分类下 </li>
					<li>转载请注明: <a href="<?php the_permalink() ?>" rel="bookmark" title="本文固定链接 <?php the_permalink() ?>"><?php the_title(); ?> | Geeku 极酷</a></li>
				</ul>
			</div>

			<div class="divide"></div>		
			
			<div class="relatebar">		
				<span class="relatetitle">相关文章:</span>
				<ul class="cf">	
					<?php $post_num = 4; $exclude_id = $post->ID;$posttags = get_the_tags(); $i = 0;if ( $posttags ) { $tags = ''; foreach ( $posttags as $tag ) $tags .= $tag->name . ',';$args = array('post_status' => 'publish','tag_slug__in' => explode(',', $tags), 'post__not_in' => explode(',', $exclude_id), 'caller_get_posts' => 1, 'orderby' => 'comment_date', 'posts_per_page' => $post_num);query_posts($args); while( have_posts() ) { the_post(); ?><li class="left"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a><span class="relatetime">Posted on <?php the_time('Y.m.j'); ?></span></li>
					<?php $exclude_id .= ',' . $post->ID; $i ++;} wp_reset_query();}if ( $i < $post_num ) { $cats = ''; foreach ( get_the_category() as $cat ) $cats .= $cat->cat_ID . ',';$args = array('category__in' => explode(',', $cats), 'post__not_in' => explode(',', $exclude_id),'caller_get_posts' => 1,'orderby' => 'comment_date','posts_per_page' => $post_num - $i);query_posts($args);while( have_posts() ) { the_post(); ?> <li class="left"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a><span class="relatetime">Posted on <?php the_time('Y.m.j'); ?></span></li>
					<?php $i ++;} wp_reset_query();}if ( $i  == 0 )  echo '<li>还没有相关文章</li>';?>
				</ul>	
			</div>

			<!-- Baidu Button BEGIN -->
			<div class="baidu">
			<div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare">
			<a class="bds_tsina" ></a>
			<a class="bds_qzone" ></a>
			<a class="bds_renren" ></a>
			<a class="bds_tqq" ></a>
			<a class="bds_t163" ></a>
			<a class="bds_tieba" ></a>
			<a class="bds_twi" ></a>
			<a class="bds_fbook" ></a>
			<a class="bds_print" ></a>
			<span class="bds_more"></span>
			<a class="shareCount"></a>
			</div>
			<script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=680522" ></script>
			<script type="text/javascript" id="bdshell_js"></script>
			<script type="text/javascript">
				document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
			</script>
			<!-- Baidu Button END -->
			</div>
			
			<div class="divide"></div>

			<div class="comments">

					<?php comments_template(); ?>
			</div>
			</div>

		</div>

		<?php endwhile; ?>  
			
		<?php else : ?>
					
				<h2><?php _e(’没有发现文章’); ?></h2>

		<?php endif; ?>

			
<?php get_footer(); ?>