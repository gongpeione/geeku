<?php get_header(); ?>


		<div id="main">

			<div id="content">
				<div id="logo">
					<a href="<?php bloginfo('url') ?>" >
						<img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt="<?php bloginfo('name') ?>"/>
					</a>
				</div>

				<div id="stuff">
					<blockquote class="pull-right">
						  <h1> > Hi , I am Geeku</h1>
					</blockquote>
					<br /><br /><br /><br /><br />
					<blockquote class="pull-left">
						  <p> > <?php echo mb_strimwidth(get_page( 958 /* 页面id */ )->post_content, 0,800,"..."); ?></p>
						  <a href="/?page_id=958" class="btn btn-primary self" type="button" >更多</a>
					</blockquote>
				</div>
			</div>

			<div id="menu">

				<div class="door"></div>

				<?php 
				  		wp_nav_menu(
									  array(	'theme_location' => 'homepage',
												'sort_column'    => 'menu_order',
												'menu_class'     => 'homepage',
												'link_before'    => '<button class="btn btn-large  btn-primary" type="button">',
												'link_after'      => '</button>',
											) 
							 		); 
				?>

			</div>

		</div>

		<footer>    
			<div class="f-top">Copyright &copy; 2013 Geeku</div>
			<div class="f-bottom">Powered By <a rel="external" title="WordPress主页" class="link" href="http://wordpress.org/">WordPress</a> | Design By <a href="http://www.geeku.net">Shu</a>
			</div>   
		</footer>


<?php get_footer(); ?>