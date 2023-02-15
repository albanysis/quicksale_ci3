<?php

function is_logged_in()
{
    $ci = get_instance(); // Pengganti $this
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    }
}
