<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="col-mb-12 col-4 kit-hidden-tb sidebar wow fadeInUp" id="secondary" role="complementary">
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
    <section class="widget">
        <div class="title">
            <h3 class="widget-title"><?php _e('最近更新'); ?></h3>
        </div>
		
        <ul class="widget-list">
            <?php /*$this->widget('Widget_Contents_Modified_Recent')
            ->parse('<li><a href="{permalink}">{title}</a></li>');*/ ?>
            <?php 
                getRecentUpdate(10);
            ?>
        </ul>
    </section>
    <?php endif; ?>



    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)): ?>
    <section class="widget">
        <div class="title">
        <h3 class="widget-title"><?php _e('分类'); ?></h3>
        </div>
		
        <?php $this->widget('Widget_Metas_Category_List')->listCategories('wrapClass=widget-list'); ?>
	</section>
    <?php endif; ?>


    <?php Typecho_Widget::widget('Widget_Metas_Tag_Cloud')->to($tags); ?>
    <?php if($tags->have()): ?>
    <section class="widget">
        <div class="title">
            <h3 class="widget-title"><?php _e('标签'); ?></h3>
        </div>
        
        <div class="tagcloud">
        <?php while ($tags->next()): ?>
            <?php $scale=(int)$tags->count; $lead = (int)($scale/10 + 1) > 3 ? 3 : (int)($scale/10 +1); ?>
            <a style="font-size: <?php echo $lead,$scale % 10; ?>0%" href="<?php $tags->permalink();?>"><?php $tags->name(); ?></a>
        <?php endwhile; ?>
        </div>
        </section>

    <section class="widget">
        <div class="title">
            <h3 class="widget-title"><?php _e('友情链接'); ?></h3>
        </div>
        <div class="friends">
            <?php Links_Plugin::output(); ?>
        </div>
    </section>
    
    
    <?php endif; ?>

</div><!-- end #sidebar -->
