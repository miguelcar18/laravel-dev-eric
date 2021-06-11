<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Customer Page Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in the Customer Page. You are free to modify
    | these language lines according to your application's requirements.
    |
     */
    'meta' => [
        'title' => '',
        'description' => '',
    ],

    'index' => [
        'page_title' => 'Permisos',
        'page_header' => 'Permisos',
        'breadcrumb' => 'Permisos',

        'create' => 'Nuevo permiso',
        'edit' => 'Editar permiso',
        'destroy' => [
            'tooltip' => 'Eliminar permiso',
            'alert' => [
                'title' => '¿Seguro desea eliminar este permiso?',
                'text' => 'Esta acción no se puede deshacer.',
                'confirm' => 'Si, eliminar.',
                'cancel' => 'No.',
            ],
        ],
        'columns' => [
            'name' => 'Nombre',
            'slug' => 'Slug',
            'description' => 'Descripcion',
            'actions' => 'Acciones',
        ],
    ],

    'create' => [
        'page_title' => 'Crear permiso',
        'page_header' => 'Crear permiso',
        'breadcrumb' => 'Crear permiso',
    ],

    'edit' => [
        'page_title' => 'Editar permiso',
        'page_header' => 'Editar permiso',
        'breadcrumb' => 'Editar permiso',
    ],

    'fields' => [
        'name' => 'Nombre',
        'slug' => 'Slug',
        'description' => 'Descripcion',
        'submit' => [
            'save' => 'Guardar',
        ],
    ],
];
