<?php

namespace Packages\System\Traits;

use Packages\System\Events\ArticleEvent;
use Packages\System\Events\NewUserEvent;
use Packages\System\Events\PrimerEvento;
use Packages\System\Events\RegisterEvent;

trait Agregar
{
    public function mailTrait($data)
    {
//        dd($data);
        if ($data->rut <> null ){
            event(new NewUserEvent($data));
            event(new PrimerEvento($data));
            event(new RegisterEvent($data));
            return redirect()->route('users.index');

        } else if($data->title <> null) {
//            dd('es un articulo', $data);
            event(new ArticleEvent());
            return redirect()->route('articles.index');
        }
    }
}
