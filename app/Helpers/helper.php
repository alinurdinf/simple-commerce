<?php

use App\Models\UserRoleView;

if (!function_exists('isAdmin')) {
    function isAdmin($email)
    {
        $data = UserRoleView::where('email', $email)->first();
        if (!$data) {
            return false;
        }
        if ($data->role_name == 'admin') {
            return true;
        }

        return false;
    }
}
