<?php
class Layout_lib
{
    protected $CI;

    function __construct()
    {
        $this->CI = &get_instance();
    }

    public function getTemplate($view, $data = '')
    {
        $this->CI->load->view('layout/header', $data);
        $this->CI->load->view($view, $data);
        $this->CI->load->view('layout/footer');
    }
}
