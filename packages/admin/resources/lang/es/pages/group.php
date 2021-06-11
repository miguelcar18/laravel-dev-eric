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
        'page_title' => 'Grupo',
        'page_header' => 'Grupo',
        'breadcrumb' => 'Grupo',

        'create' => 'Nuevo grupo',
        'edit' => 'Editar grupo',
        'destroy' => [
            'tooltip' => 'Eliminar grupo',
            'alert' => [
                'title' => '¿Seguro desea eliminar este grupo?',
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
        'page_title' => 'Crear grupo',
        'page_header' => 'Crear grupo',
        'breadcrumb' => 'Crear grupo',
    ],

    'edit' => [
        'page_title' => 'Editar grupo',
        'page_header' => 'Editar grupo',
        'breadcrumb' => 'Editar grupo',
    ],

    'fields' => [
        'name' => 'Nombre',
        'slug' => 'Slug',
        'description' => 'description',
        'submit' => [
            'save' => 'Guardar',
        ],
    ],
];