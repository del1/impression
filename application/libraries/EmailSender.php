<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Email Sender
 */
class EmailSender
{
    private $ci; // CI Instance

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->library('email');

        $this->ci->load->config('email');
        $this->ci->email->initialize($this->ci->config->item('email'));
    }

    public function send($dataArray)
    {

        $this->ci->email->from('info@impressionrbidalstore.com', 'Impression Bridal');
        $this->ci->email->to($dataArray['to']);
        if (isset($dataArray['cc']) && strlen(trim($dataArray['cc']))) {
            $this->ci->email->cc($dataArray['cc']);
        }
        if (isset($dataArray['bcc']) && strlen(trim($dataArray['bcc']))) {
            $this->ci->email->cc($dataArray['bcc']);
        }
        $this->ci->email->subject($dataArray['subject']);
        $this->ci->email->message($dataArray['message']);
        $this->ci->email->send();
    }
}
