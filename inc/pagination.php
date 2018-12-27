<?php

if ( !function_exists('the_pagination') ) {
    function the_pagination($config) {
        $pagination = new QNP_Pagination($config);

        // Default config
        // $pagination->paged_name     = 'pageded';
        // $pagination->label_first    = '最初へ';
        // $pagination->label_last     = '最後へ';
        // $pagination->label_previous = '前へ';
        // $pagination->label_next     = '次へ';
        // $pagination->class_li       = 'page-item';
        // $pagination->class_a        = 'page-link';
        // $pagination->range          = 2;
        // $pagination->hide_dot       = false;
        // $pagination->hide_first     = false;
        // $pagination->hide_last      = false;
        // $pagination->hide_previous  = false;
        // $pagination->hide_next      = false;

        ?>
        <nav>
            <ul class="pagination">
                <?php $pagination->pagination(); ?>
            </ul>
            <?php $pagination->pagerText('<span>', '</span>'); ?>
            <?php $pagination->gotoPager(); ?>
        </nav>
        <?php
    }
}
