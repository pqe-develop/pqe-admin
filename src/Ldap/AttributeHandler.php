<?php

namespace Pqe\Admin\Ldap;

class AttributeHandler
{
    public function handle($ldap, $database)
    {
        $database->username = strtoupper($ldap->getFirstAttribute('samaccountname'));
        $database->email = strtolower($ldap->getFirstAttribute('mail'));
        $database->name = ucwords(strtolower($ldap->getFirstAttribute('cn')));
    }
}