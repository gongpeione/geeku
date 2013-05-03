<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh_CN">
<head>
	<meta charset="UTF8" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php if(is_home()) : { ?>
    	<title>Geeku - 爱电脑，爱动漫，爱画画，向着大触和技术宅努力着</title>
    <?php ;} ?>
    
    <?php else : ?>
    	<title><?php wp_title(' - ', true, 'right'); ?> Geeku</title>
    <?php endif; ?>
    <?php echo getMeta(); ?>


	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<div id="background">
	<div id="bgCover">
