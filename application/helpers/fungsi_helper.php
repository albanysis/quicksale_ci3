<?php

function cek_already_login()
{
    $ci = get_instance();
    $user_session = $ci->session->userdata('user_id');
    if ($user_session) {
        redirect();
    }
}
