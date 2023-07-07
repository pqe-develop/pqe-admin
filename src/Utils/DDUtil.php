<?php

namespace Pqe\Admin\Utils;

use Pqe\Admin\Models\Dropdowns;

class DDUtil {

    public static function getList($dropdownName, $group = null) {
        if (empty($group)) {
            return Dropdowns::where('dropdown', $dropdownName)->whereNot('disactivated', '1')->pluck('name', 'label');
        } else {
            return Dropdowns::where('dropdown', $dropdownName)->where('group', $group)->whereNot('disactivated', '1')->pluck(
                    'name', 'label');
        }
    }
}
