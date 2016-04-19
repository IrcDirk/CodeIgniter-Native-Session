    /* FLASH SESSION TO CODEIGNITER SESSION */
    private function check_session()
    {
        $this->load->library('encrypt');
        
        if($this->input->post('session_id') == "") return "";
        
        session_start();
        session_decode(file_get_contents(session_save_path().'/sess_'.$this->encrypt->decode($this->input->post('session_id'))));
        
        return $_SESSION[$this->config->item('sess_namespace')];
    }
