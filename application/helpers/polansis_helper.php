<?php
function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    }
}

function last_login()
{
    $ci = get_instance();
    $last = $ci->db->get_where('user', ['email' => $ci->session->userdata('email')])->row();
    $lastOnline = $last->last_login;
    if ($lastOnline > 0) {
        $time = time();
        if ($lastOnline >= $time - 60 or $lastOnline == $time) {
            $lastOnline = "Baru ini";
        } else if ($lastOnline >= $time - 3600) {
            $lastOnline = "Login " . intval(date('i', $time - $lastOnline)) . " mnt yang lalu";
        } else if ($lastOnline >= $time - 86400) {
            $lastOnline = "Login " . intval(date('G', $time - $lastOnline)) . " jam yang lalu";
        } else if ($lastOnline >= $time - 604800) {
            $lastOnline = "Login " . intval(date('j', $time - $lastOnline)) . " hari yang lalu";
        }
    } else {
        $lastOnline = "Baru ini";
    }
    return $lastOnline;
}
