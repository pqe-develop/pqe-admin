<?php

namespace Pqe\Admin\Utils;

class GetAdmin {

    public static function getAdmin() {
//         return auth()->user()->roles->contains(1); // id=1 is Admin in all databases
         return auth()->user()->is_admin;
    }
}