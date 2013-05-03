
	</div><!--end bgCover-->
</div><!--end background-->

<?php wp_footer(); ?>  

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/bootstrap.js"></script>
<script type="text/javascript">
    $(document).ready(function(){   
	$('ul.homepage li').hover(function(){   
	$(this).find('ul:first').slideDown(200);//显示二级菜单，括号中的数字表示下拉菜单完全显示出来需要200毫秒。   
	$(this).addClass("hover");   
	},function(){   
	$(this).find('ul').css('display','none');   
	$(this).removeClass("hover");   
	});   
	function hide_submenu(){   
	$('ul.homepage li').find('ul').css('display','none');   
	}   
	$('ul.homepage li li:has(ul)').find("a:first").append(" &raquo; ");   
	document.onclick = hide_submenu;   
	});
	$(document).ready(function() {
	$('#nav li').hover(function() {
	$('ul', this).slideDown(300)
	},
	function() {
	$('ul', this).slideUp(300)
	});
	});
</script>
</body>   
</html> 