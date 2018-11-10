<?php
/**
 * 参考四海样式根据默认主题魔改而来的渣作
 * 
 * @package Lose7
 * @author sunshine+ice
 * @version 1.0
 * @link https://lose7.org
 */


if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>

<div class="col-mb-12 col-8" id="main" role="main">
	<?php while($this->next()): ?>
        <article class="post wow fadeInDown" itemscope itemtype="http://schema.org/BlogPosting" href="<?php $this->permalink() ?>">
			<h2 class="post-title" itemprop="name headline"><a itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
			<ul class="post-meta">
				<li><?php _e('时间: '); ?><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time></li>
				<li class="category"><?php _e('分类: '); ?><?php $this->category(','); ?></li>
				<li class="comment-index" itemprop="interactionCount"><a class="comment-link" itemprop="discussionUrl" href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('评论', '1 条评论', '%d 条评论'); ?></a></li>
			</ul>
            <div class="post-content" itemprop="articleBody">
    			<?php
				if(isset($this->fields->cover)) {
					echo '<img src="'.$this->fields->cover.'"></img>';
				}
				if(isset($this->fields->summary)) {
					$this->excerpt($this->fields->summary, '...');
				}

			?>
            </div>
        </article>
	<?php endwhile; ?>

    <?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
</div><!-- end #main-->

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>


