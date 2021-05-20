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
        'page_title' => 'Clientes',
        'page_header' => 'Clientes',
        'breadcrumb' => 'Clientes',

        'create' => 'Nueva cliente',
        'edit' => 'Editar cliente',
        'destroy' => [
            'tooltip' => 'Eliminar cliente',
            'alert' => [
                'title' => '¿Seguro desea eliminar este cliente?',
                'text' => 'Esta acción no se puede deshacer.',
                'confirm' => 'Si, eliminar.',
                'cancel' => 'No.',
            ],
        ],
        'columns' => [
            'email' => 'Correo',
            'mobile' => 'Movil',
            'name' => 'Nombre',
            'actions' => 'Acciones',
        ],
    ],

    'create' => [
        'page_title' => 'Crear cliente',
        'page_header' => 'Crear cliente',
        'breadcrumb' => 'Crear cliente',
    ],

    'edit' => [
        'page_title' => 'Editar cliente',
        'page_header' => 'Editar cliente',
        'breadcrumb' => 'Editar cliente',
    ],

    'fields' => [
        'email' => 'Correo',
        'mobile' => 'Movil',
        'name' => 'Nombre',
        'submit' => [
            'save' => 'Guardar',
        ],
    ],
];
