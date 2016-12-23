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
}
