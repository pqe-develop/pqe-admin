<?php

namespace Pqe\Admin\Utils;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Exception;

class DDUtil extends Model {
    protected $dropdowns;
    protected $ddItems;

    public function __construct(Collection $dropdowns) {
        $this->dropdowns = $dropdowns;
        foreach ($dropdowns as $dropdown) {
            $dd = $dropdown->dropdown;
            $key = $dropdown->name;
            $label = $dropdown->label;
            $group = $dropdown->group;
        if (empty($group)) {
                $this->ddItems[$dd][$key] = $label;
        } else {
                $this->ddItems[$dd][$group][$key] = $label;
            }
        }
    }

    public function get($dropdown) {
        if (!isset($this->ddItems[$dropdown])) {
            throw new Exception("Dropdown " . $dropdown . " not found");
        } else {
            return $this->ddItems[$dropdown];
        }
    }

    public function getItem($dropdown, $name) {
        if (!isset($this->ddItems[$dropdown])) {
            throw new Exception("Dropdown " . $dropdown . " or key " . $name . " not found");
        } else if (!isset($this->ddItems[$dropdown][$name])) {
            return null;
        } else {
            return $this->ddItems[$dropdown][$name];
        }
    }
}
