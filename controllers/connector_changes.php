    * FLASH SESSION TO CODEIGNITER SESSION */
	private function check_session()
	{		
		if($this->input->post('session_id') == "") return FALSE;
        
        // LOWER SECURITY
        ini_set('session.use_trans_sid', 1);
        ini_set('session.use_strict_mode', 1);
        ini_set('session.use_cookies', 1);
        ini_set('session.use_only_cookies', 0);
        ini_set('session.hash_function', 1);
        ini_set('session.hash_bits_per_character', 4);
        
        // CLOSE ACTIVE SESSION
        session_write_close();
        
        // SET OLD ID AND GET SESSION
        session_id($this->input->post('session_id'));
        session_start();
        
        $session = $_SESSION[$this->config->item('sess_namespace')];
        
        // CLOSE AGAIN
        session_write_close();
        
        // SECURITY
        ini_set('session.use_trans_sid', 0);
        ini_set('session.use_strict_mode', 1);
        ini_set('session.use_cookies', 1);
        ini_set('session.use_only_cookies', 1);
        ini_set('session.hash_function', 1);
        ini_set('session.hash_bits_per_character', 4);
        
        return $session;
	}
