<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'activated' => 'Activated',
            'email' => 'Email',
            'first_name' => 'First name',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
            'last_name' => 'Last name',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'brand' => [
        'title' => 'Brands',

        'actions' => [
            'index' => 'Brands',
            'create' => 'New Brand',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            
        ],
    ],

    'product' => [
        'title' => 'Products',

        'actions' => [
            'index' => 'Products',
            'create' => 'New Product',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'assets' => 'Assets',
            'brandName' => 'BrandName',
            'color' => 'Color',
            'description' => 'Description',
            'name' => 'Name',
            'price' => 'Price',
            'shortName' => 'ShortName',
            'sizes' => 'Sizes',
            'type' => 'Type',
            
        ],
    ],

    'product' => [
        'title' => 'Products',

        'actions' => [
            'index' => 'Products',
            'create' => 'New Product',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'assets' => 'Assets',
            'brand_id' => 'Brand',
            'brandName' => 'BrandName',
            'color' => 'Color',
            'description' => 'Description',
            'name' => 'Name',
            'price' => 'Price',
            'shortName' => 'ShortName',
            'sizes' => 'Sizes',
            'type' => 'Type',
            
        ],
    ],

    'product' => [
        'title' => 'Products',

        'actions' => [
            'index' => 'Products',
            'create' => 'New Product',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'assets' => 'Assets',
            'brand_id' => 'Brand',
            'color' => 'Color',
            'description' => 'Description',
            'name' => 'Name',
            'price' => 'Price',
            'shortName' => 'ShortName',
            'sizes' => 'Sizes',
            'type' => 'Type',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];