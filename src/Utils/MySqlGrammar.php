<?php

namespace Pqe\Admin\Utils;

use Illuminate\Database\Query\Grammars\MySqlGrammar as LaravelMySqlGrammar;

class MySqlGrammar extends LaravelMySqlGrammar {

    public function getDateFormat() {
        return 'Y-m-d H:i:s.u';
    }
}

