<?php
return [

    /*
     * |--------------------------------------------------------------------------
     * | PQE Api Keys
     * |--------------------------------------------------------------------------
     * |
     */

    // Suite Config

    'suiteApiUrl' => env('SUITECRM_API_URL'),
    'suiteHsUser' => env('SUITECRM_HS_API_USER_NAME'),
    'suiteHsPass' => env('SUITECRM_HS_API_PASSWORD'),
    'suiteAdmUser' => env('SUITECRM_ADM_API_USER_NAME'),
    'suiteAdmPass' => env('SUITECRM_ADM_API_PASSWORD'),
    'suiteZcsUser' => env('SUITECRM_ZCS_API_USER_NAME'),
    'suiteZcsPass' => env('SUITECRM_ZCS_API_PASSWORD'),
    'suiteHost' => env('SUITECRM_HOST'),

    // Hubspot Config

    'hsProxyUrl' => env('PROXY_URL'),
    'hsProxySchema' => env('PROXY_SCHEMA'),

    'hsAccessToken' => env('HUBSPOT_ACCESS_TOKEN'),

    // Infinity Config

    'infinityUrl' => env('INFINITY_WS_BASEURL'),
    'infinityAddUrl' => env('INFINITY_WS_ADDURL'),
    'infinityUser' => env('INFINITY_WS_USERNAME'),
    'infinityPass' => env('INFINITY_WS_PASSWORD'),
    'infinityCompany' => env('INFINITY_WS_COMPANY'),

    // HR Zucchetti Config

    //         HRZ_WS_BASEURL=http://192.168.3.159/GestioneRisorseUmane/servlet/
    //         HRZ_WS_ADDURL=SQLDataProviderServer/SERVLET/
    //         HRZ_WS_USERNAME=utente_ws
    //         HRZ_WS_PASSWORD=WebService01!
    //         HRZ_WS_COMPANY=001
    //         HRZ_WS_HRUT=http://192.168.3.159/HRPORTAL/servlet/

    // HRMS Config

    'hrmsUrl' => env('HRMS_API_URL'),
    'hrmsUser' => env('HRMS_API_USERNAME'),
    'hrmsPass' => env('HRMS_API_PASSWORD'),

    // Dropbox Sign Config

    'helloSignKey' => env('HELLOSIGN_API_KEY'),

    // Sharepoint Config

    'spoAuthority' => env('SPO_AUTHORITY'),
    'spoClientId' => env('SPO_CLIENT_ID'),
    'spoClientSecret' => env('SPO_CLIENT_SECRET'),
    'spoScope' => env('SPO_SCOPE'),
    'spoTokenEndPoint' => env('SPO_TOKEN_ENDPOINT'),
    'spoBaseUrl' => env('SPO_BASE_URL'),
    'spoBaseVersion' => env('SPO_BASE_VERSION'),

    // JobDiva Config

    'jdUrl' => env('JD_EMEA_API_URL'),
    'jdUrl2' => env('JD_EMEA_APIV2_URL'),
    'jdClientId' => env('JD_EMEA_CLIENT_ID'),
    'jdUser' => env('JD_EMEA_USER'),
    'jdPass' => env('JD_EMEA_PASS'),

    // Mail Config
    'mailDevTo' => env('MAIL_DEV_TO'),
    'mailDevToName' => env('MAIL_DEV_TO_NAME'),
        
    // Inertia Flag
    'inertia' => env('APP_INERTIA'),
];
