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
            $dd_filter = $dropdown->dd_filter;
            // add blanks
            if (!isset($this->ddItems[$dd][''])) {
                $this->ddItems[$dd][''] = '';
            }
            if (empty($dd_filter)) {
                $this->ddItems[$dd][$key] = $label;
        } else {
                //changes by TIA - Purpose - dependent dropdown logic did not need the concated dropdown value
                //$this->ddItems[$dd][$dd_filter . "|" . $key] = $label;
                $this->ddItems[$dd][$key] = $label;
            }
        }
    }

    public function get($dropdown, $flagEmpty = true) {
        if (!isset($this->ddItems[$dropdown])) {
            throw new Exception("Dropdown " . $dropdown . " not found");
        } else {
            if ($flagEmpty) {
                unset($this->ddItems[$dropdown]['']);
            }
            return $this->ddItems[$dropdown];
        }
    }

    public function getItem($dropdown, $name, $dd_filter = null) {
        if (!isset($this->ddItems[$dropdown])) {
            throw new Exception("Dropdown " . $dropdown . " or key " . $name . " not found");
        } else if (!isset($this->ddItems[$dropdown][$name])) {
            return null;
        } else {
            if (!empty($dd_filter)) {
                return $this->ddItems[$dropdown][$dd_filter . "|" . $name];
            } else {
            return $this->ddItems[$dropdown][$name];
            }
        }
    }
}
