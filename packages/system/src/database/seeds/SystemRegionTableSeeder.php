<?php

namespace Packages\System\Database\Seeds;

use Packages\System\Models\SystemRegion;
use Illuminate\Database\Seeder;

class SystemRegionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                'regionId' => "R1",
                'regionName' => "TARAPACA",
                'ineRegionCode' => '1',
            ],
            [
                'regionId' => "R2",
                'regionName' => "ANTOFAGASTA",
                'ineRegionCode' => '2',
            ],
            [
                'regionId' => "R3",
                'regionName' => "ATACAMA",
                'ineRegionCode' => '3',
            ],
            [
                'regionId' => "R4",
                'regionName' => "COQUIMBO",
                'ineRegionCode' => '4',
            ],
            [
                'regionId' => "R5",
                'regionName' => "VALPARAISO",
                'ineRegionCode' => '5',
            ],
            [
                'regionId' => "R6",
                'regionName' => "LIBERTADOR GRAL BERNARDO O HIGGINS",
                'ineRegionCode' => '6',
            ],
            [
                'regionId' => "R7",
                'regionName' => "MAULE",
                'ineRegionCode' => '7',
            ],
            [
                'regionId' => "R8",
                'regionName' => "BIOBIO",
                'ineRegionCode' => '8',
            ],
            [
                'regionId' => "R9",
                'regionName' => "ARAUCANIA",
                'ineRegionCode' => '9',
            ],
            [
                'regionId' => "RM",
                'regionName' => "METROPOLITANA DE SANTIAGO",
                'ineRegionCode' => '13',
            ],
            [
                'regionId' => "R10",
                'regionName' => "LOS LAGOS",
                'ineRegionCode' => '10',
            ],
            [
                'regionId' => "R11",
                'regionName' => "AISEN DEL GRAL C IBANEZ DEL CAMPO",
                'ineRegionCode' => '11',
            ],
            [
                'regionId' => "R12",
                'regionName' => "MAGALLANES Y LA ANTARTICA CHILENA",
                'ineRegionCode' => '12',
            ],
            [
                'regionId' => "R14",
                'regionName' => "LOS RIOS",
                'ineRegionCode' => '14',
            ],
            [
                'regionId' => "R15",
                'regionName' => "ARICA Y PARINACOTA",
                'ineRegionCode' => '15',
            ],
            [
                'regionId' => "R16",
                'regionName' => "NUBLE",
                'ineRegionCode' => '16',
            ],

        ])->each(function ($region) {
            SystemRegion::updateOrCreate(['regionId' => $region['regionId']], $region);
        });
    }
}
