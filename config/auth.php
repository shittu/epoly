<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => 'student',
        'passwords' => 'students',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | Of course, a great default configuration has been defined for you
    | here which uses session storage and the Eloquent user provider.
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | Supported: "session", "token"
    |
    */

    'guards' => [
        'student' => [
            'driver' => 'session',
            'provider' => 'students',
        ],

        'sudent_api' => [
            'driver' => 'token',
            'provider' => 'students',
            'hash' => false,
        ],

        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],

        'admin_api' => [
            'driver' => 'token',
            'provider' => 'admins',
            'hash' => false,
        ],

        'staff' => [
            'driver' => 'session',
            'provider' => 'staff',
        ],

        'staff_api' => [
            'driver' => 'token',
            'provider' => 'staff',
            'hash' => false,
        ],

        'lecturer' => [
            'driver' => 'session',
            'provider' => 'lecturers',
        ],

        'lecturer_api' => [
            'driver' => 'token',
            'provider' => 'lecturers',
            'hash' => false,
        ],

        'head_of_department' => [
            'driver' => 'session',
            'provider' => 'head_of_departments',
        ],

        'head_of_department_api' => [
            'driver' => 'token',
            'provider' => 'head_of_departments',
            'hash' => false,
        ],

        'directer' => [
            'driver' => 'session',
            'provider' => 'directers',
        ],

        'directer_api' => [
            'driver' => 'token',
            'provider' => 'directers',
            'hash' => false,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | If you have multiple user tables or models you may configure multiple
    | sources which represent each model / table. These sources may then
    | be assigned to any extra authentication guards you have defined.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\User::class,
        ],
        'admins' => [
            'driver' => 'eloquent',
            'model' => Modules\Admin\Entities\Admin::class,
        ],

        'staff' => [
            'driver' => 'eloquent',
            'model' => Modules\Staff\Entities\Staff::class,
        ],

        'lecturers' => [
            'driver' => 'eloquent',
            'model' => Modules\Lecturer\Entities\Lecturer::class,
        ],
        
        'head_of_departments' => [
            'driver' => 'eloquent',
            'model' => Modules\Department\Entities\HeadOfDepartment::class,
        ],

        'directers' => [
            'driver' => 'eloquent',
            'model' => Modules\College\Entities\Directer::class,
        ],

        'students' => [
            'driver' => 'eloquent',
            'model' => Modules\Student\Entities\Student::class,
        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | You may specify multiple password reset configurations if you have more
    | than one user table or model in the application and you want to have
    | separate password reset settings based on the specific user types.
    |
    | The expire time is the number of minutes that the reset token should be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.
    |
    */

    'passwords' => [
        
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
        ],

        'admins' => [
            'provider' => 'admins',
            'table' => 'password_resets',
            'expire' => 60,
        ],

        'staff' => [
            'provider' => 'staff',
            'table' => 'password_resets',
            'expire' => 60,
        ],

        'lecturers' => [
            'provider' => 'lecturers',
            'table' => 'password_resets',
            'expire' => 60,
        ],

        'head_of_departments' => [
            'provider' => 'head_of_departments',
            'table' => 'password_resets',
            'expire' => 60,
        ],

        'students' => [
            'provider' => 'students',
            'table' => 'password_resets',
            'expire' => 60,
        ],

    ],

];
