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
        'page_title' => 'Articulos',
        'page_header' => 'Articulos',
        'breadcrumb' => 'Articulos',

        'create' => 'Nuevo articulo',
        'edit' => 'Editar articulo',
        'show' => 'Ver articulo',
        'destroy' => [
            'tooltip' => 'Eliminar articulo',
            'alert' => [
                'title' => '¿Seguro desea eliminar este articulo?',
                'text' => 'Esta acción no se puede deshacer.',
                'confirm' => 'Si, eliminar.',
                'cancel' => 'No.',
            ],
        ],
        'columns' => [
            'title' => 'Titulo',
            'subtitle' => 'subtitulo',
            'section' => 'Categoria',
            'author_id' => 'Autor',
            'actions' => 'Acciones',
        ],
    ],

    'create' => [
        'page_title' => 'Crear articulo',
        'page_header' => 'Crear articulo',
        'breadcrumb' => 'Crear articulo',
    ],

    'edit' => [
        'page_title' => 'Editar articulo',
        'page_header' => 'Editar articulo',
        'breadcrumb' => 'Editar articulo',
    ],

    'show' => [
        'page_title' => 'Ver articulo',
        'page_header' => 'Ver articulo',
        'breadcrumb' => 'Ver articulo',
    ],

    'fields' => [
        'title' => 'Titulo',
        'subtitle' => 'Subtitulo',
        'body' => 'Cuerpo',
        'section' => 'Categoria',
        'author_id' => 'Autor',
        'submit' => [
            'save' => 'Guardar',
        ],
    ],
];
