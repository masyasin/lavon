<?php
$paggingParams = $_GET;
unset($paggingParams['page']);

return array (
    'base_url' => current_url() .'?'. ($paggingParams ? http_build_query($paggingParams) : 'view=all'),
    'total_rows' => 0,
    'per_page' => $this->config->item('tableRowPerPage'),
    'page_query_string' => TRUE,
    'query_string_segment' => 'page',
    'num_links' => 2,
    'full_tag_open' => '<div class="btn-group pull-right">',
    'full_tag_close' => '</div>',
    'attributes' => array('class' => 'btn btn-default'),
    'cur_tag_open' => '<button class="btn btn-success" type="button">',
    'cur_tag_close' => '</button>',
    'last_link' => '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
    'first_link' => '<i class="fa fa-angle-double-left" aria-hidden="true"></i>',
    'next_link' => '<i class="fa fa-angle-right" aria-hidden="true"></i>',
    'prev_link' => '<i class="fa fa-angle-left" aria-hidden="true"></i>'
);