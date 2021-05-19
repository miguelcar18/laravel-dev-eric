<?php

namespace Packages\Admin\Models;

use Jenssegers\Model\Model;

class Menu extends Model
{
    public static function build()
    {
        $menues = array_merge(
            config('admin.menu'),
            collect(config('admin.merge_menu_from_packages', []))
                ->map(function ($package) {
                    return config("{$package}.menu", []);
                })
                ->flatten(1)
                ->toArray()
        );

        $html = '';
        foreach ($menues as $menu) {
            if (empty($menu)) {
                $html .= self::separator();
                continue;
            }
            $menu = collect($menu);
            if (!self::shouldSee($menu)) {
                continue;
            }
            $html .= empty($menu->get('submenu')) ?
            self::singleMenu($menu->get('text'), $menu->get('route'), $menu->get('icon', 'caret-right'), $menu) :
            self::nestedMenu($menu->get('text'), $menu->get('icon', 'more-vert'), $menu->get('submenu'), $menu);
        }
        return $html;
    }

    private static function shouldSee($menu)
    {
        //return request()->user()->hasGroup('super-administrator') || empty($menu->get('route')) || request()->user()->can('route:' . $menu->get('route'));
        return true;
    }

    private static function separator()
    {
        return '<li class="separator"></li>';
    }

    private static function singleMenu($text, $route, $icon = 'caret-right', $menu)
    {
        return '<li ' . self::singleActive($route, $menu) . '><a href="' . route($route) . '"><i class="nav-icon fas fa-' . $icon . '"></i> ' . trans($text) . '</a></li>' . PHP_EOL;
    }

    private static function nestedMenu($text, $icon = 'more-vert', $submenues = [], $menu)
    {
        $nested =
        '   <li class="' . self::nestedActive($submenues) . '">' . PHP_EOL .
        '       <a href="#"><i class="nav-icon fas fa-' . $icon . '"></i> ' . trans($text) . '</a>' . PHP_EOL .
            '   <ul class="nav nav-treeview">' . PHP_EOL;
        foreach ($submenues as $menu) {
            $menu = collect($menu);
            if (!self::shouldSee($menu)) {
                continue;
            }
            $nested .= self::singleMenu($menu->get('text'), $menu->get('route'), $menu->get('icon', 'caret-right'), $menu);
        }
        $nested .= '   </ul>' . PHP_EOL .
            '</li>' . PHP_EOL;
        return $nested;
    }

    private static function singleActive($route, $menu)
    {
        $also_active_when = false;
        if (!empty(coollect($menu)->get('also_active_when'))) {
            $also_active_when = collect($menu['also_active_when'])->filter(function ($in) {
                if (strpos($in, '*')) {
                    return strpos(request()->route()->getName(), str_replace('*', '', $in)) !== false;
                }
                return $in == request()->route()->getName();
            })->count();
        }
        if (request()->url() == route($route) || (strpos(request()->url(), route($route) . '/') !== false) || $also_active_when) {
            return 'class=" menu-open"';
        }
        return '';
    }

    private static function nestedActive($submenues)
    {
        foreach ($submenues as $submenu) {
            if (strlen(self::singleActive($submenu['route'] ?? null, $submenu))) {
                return '  menu-open ';
            }
        }
        return '';
    }
}
