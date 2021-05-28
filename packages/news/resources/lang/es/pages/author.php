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
        'page_title' => 'Autores',
        'page_header' => 'Autores',
        'breadcrumb' => 'Autores',

        'create' => 'Nuevo autor',
        'edit' => 'Editar autor',
        'show' => 'Ver autor',
        'destroy' => [
            'tooltip' => 'Eliminar autor',
            'alert' => [
                'title' => '¿Seguro desea eliminar este autor?',
                'text' => 'Esta acción no se puede deshacer.',
                'confirm' => 'Si, eliminar.',
                'cancel' => 'No.',
            ],
        ],
        'columns' => [
            'email' => 'Correo',
            'name' => 'Nombre',
            'phone' => 'Telefono',
            'actions' => 'Acciones',
        ],
    ],

    'create' => [
        'page_title' => 'Crear autor',
        'page_header' => 'Crear autor',
        'breadcrumb' => 'Crear autor',
    ],

    'edit' => [
        'page_title' => 'Editar autor',
        'page_header' => 'Editar autor',
        'breadcrumb' => 'Editar autor',
    ],

    'show' => [
        'page_title' => 'Ver autor',
        'page_header' => 'Ver autor',
        'breadcrumb' => 'Ver autor',
    ],

    'fields' => [
        'dni' => 'Cedula',
        'email' => 'Correo',
        'name' => 'Nombre',
        'lastName' => 'Apellido',
        'phone' => 'Telefono',
        'submit' => [
            'save' => 'Guardar',
        ],
    ],
];
