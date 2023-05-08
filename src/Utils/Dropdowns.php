<?php

namespace Pqe\Admin\Utils;

interface Dropdowns
{
    const STATUS_SELECT = [
        'Inactive' => 'Inactive',
        'Active' => 'Active',
        'From IRS' => 'From IRS',
        'To Be Deleted' => 'To Be Deleted'
    ];
        const JOB_LEVEL_SELECT = [
        '' => '',
        'SME' => 'SME',
        'MNG' => 'MNG',
    ];
    const JOB_GRADE_SELECT = [
        '1' => '1',
        '2' => '2',
        '3' => '3',
        '4' => '4',
        '5' => '5',
        '6' => '6',
        '7' => '7',
        '8' => '8',
        '9' => '9',
        '10' => '10',
        '11' => '11',
        '12' => '12',
        '13' => '13'
    ];

}
