<?php


namespace App\Models;


use App\SysOccupationArea;
use App\SysOccupationMacro;

class System
{
    private const OUTROS = 'Outros';

    public function occupations()
    {
        $macro = SysOccupationMacro::all();
        $allOccupation = SysOccupationArea::orderBy('id')->get();
        $macroGroup = $macro->groupBy('id');

        return $allOccupation->groupBy('sys_macro_id')
            ->map(function ($item, $key) use ($macroGroup) {
                $item->macro = $macroGroup->get($key)->first()->name ?? self::OUTROS;
                return $item;
            });
    }
}
