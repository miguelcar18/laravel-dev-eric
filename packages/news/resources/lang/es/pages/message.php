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
        'page_title' => 'Correos',
        'page_header' => 'Correos',
        'breadcrumb' => 'Correos',

        'create' => 'Nuevo correo',
        'edit' => 'Editar correo',
        'show' => 'Ver correo',
        'destroy' => [
            'tooltip' => 'Eliminar correo',
            'alert' => [
                'title' => '¿Seguro desea eliminar este correo?',
                'text' => 'Esta acción no se puede deshacer.',
                'confirm' => 'Si, eliminar.',
                'cancel' => 'No.',
            ],
        ],
        'columns' => [
            'name' => 'Nombre',
            'subject' => 'Asunto',
            'sender_email' => 'Correo remitente',
            'answer_to' => 'Responder a',
            'actions' => 'Acciones',
        ],
    ],

    'create' => [
        'page_title' => 'Crear correo',
        'page_header' => 'Crear correo',
        'breadcrumb' => 'Crear correo',
    ],

    'edit' => [
        'page_title' => 'Editar correo',
        'page_header' => 'Editar correo',
        'breadcrumb' => 'Editar correo',
    ],

    'show' => [
        'page_title' => 'Ver correo',
        'page_header' => 'Ver correo',
        'breadcrumb' => 'Ver correo',
    ],

    'fields' => [
        'name' => 'Nombre',
        'subject' => 'Asunto',
        'sender_name' => 'Nombre del remitente',
        'sender_email' => 'Correo del remitente',
        'footer_text' => 'Texto del pie del correo',
        'answer_to' => 'Responder a',
        'content' => 'Contenido',
        'submit' => [
            'save' => 'Guardar',
        ],
    ],
];
