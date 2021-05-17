<?php

if (!function_exists('uuidv4')) {
    function uuidv4()
    {
        return Uuid::generate(4)->string;
    }
}

if (!function_exists('authortlf')) {
    function authortlf($id)
    {
        $author = \Packages\News\Models\Author::find($id);
        if (!empty($author)) {
            $tlf = "(" . substr($author->phone, 0, 3) . ")" . "" . substr($author->phone, 3, 3) . "-" . substr($author->phone, 6, 7);
            return $tlf;
        } else {
            return ('No posee un tlf');
        }
    }
}

if (!function_exists('authordni')) {
    function authordni($id)
    {
        $author = \Packages\News\Models\Author::find($id);
        if (!empty($author->dni)) {
            $dni = substr($author->dni, 0, 2) . "." . substr($author->dni, 3, 3) . "." . substr($author->dni, 3, 3);
            return $dni;
        } else {
            return ('No poee un DNI');
        }
    }
}
