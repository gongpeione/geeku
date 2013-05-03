<?php get_header(); ?>

		<div class="breadcrumbs">
			<?php if (function_exists('get_breadcrumbs')){get_breadcrumbs(); } ?>
		</div>

		<?php if(have_posts()): ?><?php while(have_posts()):the_post(); ?>

		<div class="post">

			<div class="post-title">
				<h2><h2><a href="<?php  echo get_permalink($post->ID); ?>"><?php the_title(); ?></a></h2></h2>
			</div>

			<div class="post-meta">
				<?php _e('分类：'); ?><?php the_category(', ') ?> <?php _e('作者：'); ?><?php the_author(); ?> <?php _e('时间：'); ?><?php the_time('Y年n月j日') ?>
				<?php comments_popup_link('暂无评论 ', '1个评论 »', '% 个评论 »'); ?><?php edit_post_link('编辑', ' | ', ''); ?> 
			</div>
			
			<div class="post-content">
					<?php the_content(''); ?> 
			</div>


			<div class="comments">
					<?php comments_template(); ?>
			</div>

		</div>

		<?php endwhile; ?>  

			<div class="postnavi">	
				<?php wp_pagenavi(); ?> 

			</div>
			
		<?php else : ?>
					
				<h2><?php _e(’没有发现文章’); ?></h2>

		<?php endif; ?>

			
<?php get_footer(); ?>