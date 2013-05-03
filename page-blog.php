<?php
/*
Template Name: Blog page
*/
?>

<?php get_header(); ?>

	<div id="blogMenu">
		<?php 
		  		wp_nav_menu(
							  array(	'theme_location' => 'blogpage',
										'sort_column'    => 'menu_order',
										'menu_class'     => 'blogpage nav nav-pills',
										'link_before'    => '',
										'link_after'      => '',
									) 
					 		); 
		?>
	</div>

	<div id="blogPage">

		<?php query_posts(""); ?>

		<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>

		<div class="posts" id="post-<?php the_ID(); ?>" >	
			<div class="postTitle">
				<h2><a href="<?php the_permalink(); ?>" title="点击查看：<?php the_title(); ?>"><?php the_title(); ?></a></h2>
			</div>

			<div class="postContent">
				<?php echo mb_strimwidth(get_the_content(), 0, 60,"..."); ?> 

				<p class="postmetadata">
					<?php _e('分类：'); ?><?php the_category(', ') ?> <?php _e('作者：'); ?><?php the_author(); ?> <?php _e('时间：'); ?><?php the_time('Y年n月j日') ?> <?php comments_popup_link('暂无评论 »', '1个评论 »', '% 个评论 »'); ?><?php edit_post_link('编辑', ' | ', ''); ?> 
				</p>
			</div>			
		</div>

		<?php endwhile; ?>

		<?php endif; ?>

	</div>

			
<?php get_footer(); ?>