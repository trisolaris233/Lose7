<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点 LOGO 地址'), _t('在这里填入一个图片 URL 地址, 以在网站标题前加上一个 LOGO'));
    $form->addInput($logoUrl);
    
    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
    array('ShowRecentPosts' => _t('显示最新文章'),
    'ShowRecentComments' => _t('显示最近回复'),
    'ShowCategory' => _t('显示分类'),
    'ShowArchive' => _t('显示归档'),
    'ShowOther' => _t('显示其它杂项')),
    array('ShowRecentPosts', 'ShowRecentComments', 'ShowCategory', 'ShowArchive', 'ShowOther'), _t('侧边栏显示'));
    
    $form->addInput($sidebarBlock->multiMode());
}


function getRecentUpdate($num, $style = '<li><time style="margin-right: 10px; color: grey; font-size: 12px;">%date%</time><a href="%link%" title="%title%" target="_blank">%title%</a></li>') {
    if($num) {
        // 取出所有的文章
        $db = Typecho_Db::get();
        $select = $db->select()->from('contents')->where('type = ?', 'post')->order('modified', Typecho_Db::SORT_DESC);
        $result = $db->fetchAll($select);
        $i = 0;
        $fields = array('%title%', '%date%', '%link%');

        // 以降序输出文章标题
        foreach ($result as $row) {
            if($i >= $num && $num > 0)
                break;
            $row = Typecho_Widget::widget('Widget_Abstract_Contents')->push($row);
            $post_title = htmlspecialchars($row['title']);
            $permalink = $row['permalink'];
            $modified_date = $row['modified'];
            $values = array($post_title, date('Y-m-d', $modified_date), $permalink);
            $tmp = $style;

            for($i = 0; $i < count($fields); $i++) {
                $tmp = str_replace($fields[$i], $values[$i], $tmp);
            }
            
            echo $tmp;
            
            // echo '<li><time style="margin-right: 10px; color: grey; font-size: 12px;">'.date('Y-m-d', $modified_date).'</time><a href="'.$permalink.'" title="'.$post_title.'" target="_blank">'.$post_title.'</a></li>';
        }
    }
}


/*
function themeFields($layout) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点LOGO地址'), _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO'));
    $layout->addItem($logoUrl);
}
*/

