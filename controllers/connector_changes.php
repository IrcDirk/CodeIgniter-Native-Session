    /* FLASH SESSION TO CODEIGNITER SESSION */
    private function check_session()
    {
        if($this->input->post('session_id') == "") return "";
        
        session_start();
        session_decode(@file_get_contents(session_save_path().'/sess_'.$this->input->post('session_id')));
        
        return $_SESSION[$this->config->item('sess_namespace')];
    }
