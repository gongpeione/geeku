<?php 
    
    /*--------------- [ wp_head() 的处理 ] -----------------*/

    remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 ); //删除短链接shortlink
    remove_action( 'wp_head', 'wp_generator' ); //删除版权
    remove_action( 'wp_head', 'feed_links_extra', 3 ); //删除包含文章和评论的feed
    remove_action( 'wp_head', 'rsd_link' ); //删除外部编辑器
    remove_action( 'wp_head', 'wlwmanifest_link' ); //删除外部编辑器
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 ); //删除上一篇下一篇


    /*--------------- [ 菜单 ] -----------------*/

    add_theme_support('nav-menus');

    if( function_exists('register_nav_menus') )
    {   
        register_nav_menus( array( 'homepage' => __( '主页菜单' ),'blogpage' => __( '博客菜单' ) ) );
    }



    /*--------------- [ 输出描述和关键字 ] ---------------------*/  

    function getMeta()
    {  
        if (is_home() || is_page()) 
        {  
            // 将以下引号中的内容改成你的主页description   
            $description = "爱电脑，爱动漫，爱画画，向着大触和技术宅努力着";   
  
            // 将以下引号中的内容改成你的主页keywords   
            $keywords    = "电脑,动漫,绘画,sai,ps,技术宅,wordpress,编程";   
        }   
        elseif (is_single()) 
        {   
            $description1 = get_post_meta($post->ID, "description", true);   
            $description2 = mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 200, "…");   
  
            // 填写自定义字段description时显示自定义字段的内容，否则使用文章内容前200字作为描述   
            $description  = $description1 ? $description1 : $description2;   
      
            // 填写自定义字段keywords时显示自定义字段的内容，否则使用文章tags作为关键词   
            $keywords = get_post_meta($post->ID, "keywords", true);   
            if($keywords == '') 
            {   
                $tags = wp_get_post_tags($post->ID);       
                foreach ($tags as $tag ) 
                {           
                    $keywords = $keywords . $tag->name . ", ";       
                }   
                $keywords = rtrim($keywords, ', ');   
            }   
        }   
        elseif (is_category()) 
        {   
            $description = category_description();   
            $keywords    = single_cat_title('', false);   
        }   
        elseif (is_tag())
        {   
            $description = tag_description();   
            $keywords    = single_tag_title('', false);   
        }   
        $description = trim(strip_tags($description));   
        $keywords    = trim(strip_tags($keywords));

        return '<meta name="description" content="'.$description.'"/>
        <meta name="keywords" content="'.$keywords.'" />'; 
    }

    /*---------------- [ 获取缩略图 ]------------------*/
    
    add_theme_support( 'post-thumbnails' );

    function post_thumbnail( $width = 100,$height = 80 ,$moreInfo = "" )
    {
        global $post;
        if( has_post_thumbnail() )
        {    //如果有缩略图，则显示缩略图
            $timthumb_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full');
            $post_timthumb = '<img src="'.get_bloginfo("template_url").'/timthumb.php?src='.$timthumb_src[0].'&amp;h='.$height.'&amp;w='.$width.'&amp;zc=1" alt="'.$post->post_title.'" class="thumb" '.$moreInfo.' />';
            echo $post_timthumb;
        } 
        else 
        {
            $post_timthumb = '';
            ob_start();
            ob_end_clean();
            $output = preg_match('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $index_matches);    //获取日志中第一张图片
            $first_img_src = $index_matches [1];    //获取该图片 src
            if( !empty($first_img_src) )
            {    //如果日志中有图片
                $path_parts = pathinfo($first_img_src);    //获取图片 src 信息
                $first_img_name = $path_parts["basename"];    //获取图片名
                $first_img_pic = get_bloginfo('wpurl'). '/cache/'.$first_img_name;    //文件所在地址
                $first_img_file = ABSPATH. 'cache/'.$first_img_name;    //保存地址
                $expired = 604800;    //过期时间
                if ( !is_file($first_img_file) || (time() - filemtime($first_img_file)) > $expired )
                {
                    copy($first_img_src, $first_img_file);    //远程获取图片保存于本地
                    $post_timthumb = '<img src="'.$first_img_src.'" alt="'.$post->post_title.'" class="thumb" />';    //保存时用原图显示
                }
                $post_timthumb = '<img src="'.get_bloginfo("template_url").'/timthumb.php?src='.$first_img_pic.'&amp;h='.$height.'&amp;w='.$width.'&amp;zc=1" alt="'.$post->post_title.'" class="thumb" />';
            } 
            else
            {    //如果日志中没有图片，则显示默认
                $post_timthumb = '<img src="'.get_bloginfo("template_url").'/timthumb.php?src='.get_bloginfo("template_url").'/images/default.png&amp;h='.$height.'&amp;w='.$width.'&amp;zc=1" alt="'.$post->post_title.'" class="thumb" '.$moreInfo.' />';
            }
            echo $post_timthumb;
        }
    }   

?>