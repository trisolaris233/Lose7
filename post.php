<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<style>
    #header {
        display: block;
        height: 150px;
    }
</style>
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
