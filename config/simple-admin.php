<?php

return [
    /*
     * Authentication config
     */
    'auth' => [
        'model' => 'Chilloutalready\SimpleAdmin\Models\Administrator',
        'rules' => [
            'username' => 'required',
            'password' => 'required',
        ]
    ],
    'prefix' => 'admin',
    'adminAuthMiddleware' => 'simpleadmin.authenticated',
    //Models available to be managed
    'tables' => [
        'administrators'
    ],
    'rowsPerPage' => 15,
    'additionalLinks' => [],
    'columns' => [
        'administrators' => [
            'name',
            'username',
            'email'
        ]
    ],
    'filters' => [
//        'administrators' => [
//
//            'email' => [
//                'label' => 'Email',
//                'type' => 'text',
//                'compare' => 'LIKE'
//            ],
//            'username' => [
//                'label' => 'Username',
//                'type' => 'text',
//                'compare' => 'LIKE'
//            ],
//        ],
    ],
    'forms' => [
        'administrators' => [
            'username' => [
                'label' => 'Username',
                'type' => 'text'
            ],
            'name' => [
                'label' => 'Name',
                'type' => 'text'
            ],
            'email' => [
                'label' => 'Email',
                'type' => 'email'
            ],
            'password' => [
                'label' => 'Password',
                'type' => 'password'
            ],
        ],
//        'articles' => [
//            'title',
//            'category' => [
//                'label' => 'Takson',
//                'type' => 'text'
//            ],
//            'belongsTo' => [
//                'users' => [
//                    'label' => 'User',
//                    'column' => 'user_id',
//                    'foreignLabel' => 'name',
//                    'nullable' => true // this is optional param
//                ]
//            ],
//            'hasMany' => [
//                'videos' => [
//                    'label' => 'Videos',
//                    'column' => 'article_id',
//                    'foreignLabel' => 'title'
//                ]
//            ]
//        ]
    ],
    'validationRules' => [
        'administrators' => [
            'default' => [
                'username' => 'required',
                'password' => 'required|min:6|confirmed',
            ],
            'update' => [
                'password' => 'min:6|confirmed',
                'email' => 'required|email'
            ],
            'create' => [
                'username' => 'required|unique:administrators',
                'email' => 'required|email|unique:administrators'
            ]
        ]
//        'articles' => [
//            'title' => 'required|min:10',
//            'text' => 'required'
//        ]
    ]
];
