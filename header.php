<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html class="no-js">
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>

    <!-- 使用url函数转换相关路径 -->
    <link rel="stylesheet" href="<?php $this->options->themeUrl('grid.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('animate.min.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('prettyprint.css'); ?>">
    <link rel="icon" href="<?php $this->options->themeUrl('img/favicon.png'); ?>">
    <script src="https://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
    <script src="<?php $this->options->themeUrl('wow.min.js'); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prettify/188.0.0/prettify.min.js"></script>
    <script src="<?php $this->options->themeUrl('highlight.pack.js'); ?>"></script>

    <!--[if lt IE 9]>
    <script src="//cdnjscn.b0.upaiyun.com/libs/html5shiv/r29/html5.min.js"></script>
    <script src="//cdnjscn.b0.upaiyun.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>
    <script>
        new WOW().init();
        hljs.initHighlightingOnLoad();
        $(document).ready(function () {
            $("pre").addClass("prettyprint linenums");
            prettyPrint();
            $("#logo").addClass('animated bounceInDown delay-5s');
            $(".description").addClass('animated slideInLeft delay-5s');
            // $("#logo").hover(
            //     function() {
            //         $("#logo").addClass('animated')
            //     }
            // )
            $("#logo").hover(function(){
                $("#logo").addClass('animated tada');
            })
            // $("#logo").hover(function () {
            //     var content = $("#logo").text();
            //     var target_width = $("#logo").width();
            //     $("#logo-underline").animate({
            //         width: content.length * 37
            //     })
            // }, 
            // function () {
            //     $("#logo-underline").animate({
            //         width: '0px'
            //     })
            // });
            $(".toggle-box").hide(); 
	        $(".toggle").click(function(){
		        $(this).next(".toggle-box").slideToggle();
	        });
        });
    </script>
</head>
<body>
<!--[if lt IE 8]>
    <div class="browsehappy" role="dialog"><?php _e('当前网页 <strong>不支持</strong> 你正在使用的浏览器. 为了正常的访问, 请 <a href="http://browsehappy.com/">升级你的浏览器</a>'); ?>.</div>
<![endif]-->

<header id="header" class="clearfix">
    
    <div class="container">
        <div class="row">
            <div class="site-name col-mb-12 col-12">
                <?php if ($this->options->logoUrl): ?>
                    <a id="logo" href="<?php $this->options->siteUrl(); ?>">
                    <div id="logo-underline"></div>
                        <img src="<?php $this->options->logoUrl() ?>" alt="<?php $this->options->title() ?>" />
                    </a>
                <?php else: ?>
                    <div>
                        <a id="logo" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a>
                        <div id="logo-underline"></div>
                    </div>
                    <p class="description"><?php $this->options->description() ?></p>
                <?php endif; ?>
            </div>

            <div class="col-mb-12 col-12 nav-tools">
                <nav id="nav-menu" class="clearfix" role="navigation">
                    <a<?php if($this->is('index')): ?> class="current"<?php endif; ?> href="<?php $this->options->siteUrl(); ?>" id="nav-item"><?php _e('HOME'); ?></a>
                    <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                    <?php while($pages->next()): ?>
                    <a<?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>" id="nav-item"><?php $pages->title(); ?></a>
                    <?php endwhile; ?>
                </nav>
            </div>
        </div><!-- end .row -->
        
    </div>
    
</header><!-- end #header -->
<div id="body">
    <div class="container">
        <div class="row">

    
