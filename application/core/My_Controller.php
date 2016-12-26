<?php
/**
 * BaseController
 */
class MY_Controller extends CI_Controller
{
    /**
     * Render view with header and footer
     */
    public function _render($template, $data = array())
    {
        $this->load->view('header', $data);
        $this->load->view($template, $data);
        $this->load->view('footer', $data);
    }

    /**
     * Get common pagination configuration
     * @param array $config Array of configuration to Pagination class
     * @return array
     */
    protected function getPagerConfig($config = array())
    {
        $pager_config = array(
            'use_page_numbers'      => true,
            'reuse_query_string'    => true,
            'cur_page'              => 1,
            'per_page'              => 5,
            'full_tag_open'         => '<ul class="pagination">',
            'full_tag_close'        => '</ul>',
            'num_tag_open'          => '<li>',
            'num_tag_close'         => '</li>',
            'cur_tag_open'          => '<li class="active"><a href="#">',
            'cur_tag_close'         => '</a></li>',
            'first_tag_open'        => '<li class="first">',
            'first_tag_close'       => '</li>',
            'prev_tag_open'         => '<li class="prev">',
            'prev_tag_close'        => '</li>',
            'next_tag_open'         => '<li class="next">',
            'next_tag_close'        => '</li>',
            'last_tag_open'        => '<li class="last">',
            'last_tag_close'       => '</li>',
            'prev_link'             => '&laquo;',
            'next_link'             => '&raquo;',
        );

        return array_merge($pager_config, $config);
    }
}
