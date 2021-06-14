<?php
class Layout_mobile_library
{
    protected $CI;

    function __construct()
    {
        $this->CI = &get_instance();
        $this->naviHref = htmlentities($_SERVER['PHP_SELF']);
    }

    public function getTemplate($view, $data = '')
    {
        $this->CI->load->view('vzl/layout/header', $data);
        $this->CI->load->view($view, $data);
        $this->CI->load->view('vzl/layout/footer');
    }
}
