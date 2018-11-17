<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<style>
    #header {
        display: block;
        height: 150px;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tocbot/4.4.2/tocbot.min.js"></script>
<script>
    function appendHeadingId(selectors) {
        $(selectors).each(function(){
            $(this).attr("id", $(this).text());
        });
    }
    $(document).ready(function () {
        // 为h2, h3, h4添加id
        appendHeadingId('h2,h3,h4');
        
        // 删除原先的sidebar， 重新添加sidebar与widget
        $(".sidebar").remove();
        $("#main").after('<div class="col-mb-12 col-4 kit-hidden-tb sidebar wow fadeInUp" id="secondary" role="complementary"></div>');
        $(".sidebar").prepend('<section class="widget update-recent wow fadeInUp"><div class="title"><h3 class="widget-title"><?php _e('最近更新'); ?></h3></div>');
        $(".update-recent").append('<ul class="widget-list"><?php getRecentUpdate(10, '<li class="wow fadeInUp"><time style="margin-right: 10px; color: grey; font-size: 12px;">%date%</time><a href="%link%" title="%title%" target="_blank">%title%</a></li>');?></ul>');
        $(".sidebar").append('<section class="widget toc wow bounceIn"><div class="title"><h3 class="widget-title">文章目录</h3></div></section>');
        $(".toc").append('<div class="toc-div"></div>')
        
        
        // 实现sticky效果
        var toc_top = $(".toc").offset().top;
        var update_height = $(".update-recent").height();
        var sidebar_width = $(".sidebar").width();
        var rate_y = $(".sidebar").offset().left / $(document).width() * 100;
        var insert_toc = false;
        $(window).on('resize', function () { 
            rate_y = $(".sidebar").offset().left / $(document).width() * 100;
            var sidebar_width = $(".sidebar").width();
        });
        $(document).scroll(function () {
            var st = document.body.scrollTop || document.documentElement.scrollTop;
            if(st >= toc_top - 35) {
                // 将sidebar位置固定
                $(".sidebar").css({
                    "position": "fixed",
                    "top": (-(update_height + 50)).toString() + "px",
                    "left": rate_y.toString() + "%",
                    "max-width": sidebar_width,
                });
                // 如果还没有插入文章目录
                if(!insert_toc) {
                    // 插入文章目录
                    tocbot.init({
                        tocSelector: '.toc-div',
                        contentSelector: '.post-single',
                        headingSelector: 'h2, h3, h4',
                        extraListClasses: 'wow fadeInUp animated'
                    });
                    insert_toc = true;
                }
            } else {
                // 将sidebar位置还原
                $(".sidebar").css({
                    "position": "",
                    "top": "",
                    "left":"",
                    "max-width":""
                });
            }
        });
    });
</script>
<div class="col-mb-12 col-8" id="main" role="main">
    <article class="post-single" itemscope itemtype="http://schema.org/BlogPosting">
        <h1 class="post-title" itemprop="name headline"><a itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
        <ul class="post-meta">
            
            <li><?php _e('时间: '); ?><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time></li>
            <li><?php _e('分类: '); ?><?php $this->category(','); ?></li>
        </ul>
        
        <hr>
        <div class="post-content wow fadeInUp" itemprop="articleBody">
            <?php
                if(isset($this->fields->modified_alert)) {
                    date_default_timezone_set('Asia/Shanghai');
            ?>
                <div class="modified-alert">
                    <p>本文最后更新于<strong><?php echo date("Y年n月j日 G:i", $this->modified); ?></strong>，若有勘误，请即时留言指正，<strong>頼む！</strong></p>
                </div>
                    
            <?php
               }
                
            ?>
            <?php $this->content(); ?>
        </div>
        <p itemprop="keywords" class="tags"><?php _e('标签: '); ?><?php $this->tags(', ', true, 'none'); ?></p>
    </article>

    <?php $this->need('comments.php'); ?>

    <ul class="post-near">
        <li>上一篇: <?php $this->thePrev('%s','没有了'); ?></li>
        <li>下一篇: <?php $this->theNext('%s','没有了'); ?></li>
    </ul>
</div><!-- end #main-->

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
