<?php get_header(); ?>
		
		<?php if(have_posts()): ?><?php while(have_posts()):the_post(); ?>
			
				<h2><a href="<?php the_permalink(); ?>" title="点击查看：<?php the_title(); ?>"><?php the_title(); ?></a></h2>

					<?php the_content(''); ?> 

					<?php comments_template(); ?>

		<?php endwhile; ?>

				<?php wp_pagenavi(); ?> 

		<?php else : ?>

				<h2><?php _e(’没有发现文章’); ?></h2>

		<?php endif; ?>

				<?php get_sidebar(); ?>  

<?php get_footer(); ?>