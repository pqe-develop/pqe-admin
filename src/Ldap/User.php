<?php

namespace Pqe\Admin\Ldap;

use LdapRecord\Models\Model;

class User extends Model {
    /**
     * The object classes of the LDAP model.
     */
    public static array $objectClasses = [];
}
