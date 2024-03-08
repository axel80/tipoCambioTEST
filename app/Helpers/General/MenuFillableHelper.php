<?php

namespace App\Helpers\General;

use Illuminate\Support\Facades\Auth;


class MenuFillableHelper
{

    public static function getMenuHeader()
    {

        $headers = [
            ['header' => 'MENU PRINCIPAL'],
            ['header' => 'TRANSACCIONES'],


        ];
        return $headers;
    }


    public static function getCatalogItems()
    {

        $catalog = [

            [
                'text'       => 'Catálogos',
                'icon'       => 'fas fa-clipboard-list',
                /* 'can'        => ['clientes', 'proveedores'], */
                'submenu' => [
                    
                    [
                        'text'    => 'Admon. de usuarios ',
                        'icon'    => 'fas fa-people-carry',
                        'url'     => 'javascript:void(0)',
                        'submenu' => [

                            [
                                'text' => 'Usuarios',
                                'icon' => 'fas fa-vote-yea',
                                'url'  => '#'
                            ],

                            [
                                'text' => 'Roles',
                                'icon' => 'fas fa-users',
                                'url'  => '#'
                            ],
                            [
                                'text' => 'Permisos',
                                'icon' => 'fas fa-user-tag',
                                'url'  => '#'
                            ],


                        ]
                    ],
                    [
                        'text'       => 'Catálogos generales',
                        'icon'       => 'fas fa-stream',
                        /* 'can'        => ['clientes', 'proveedores'], */
                        'submenu' => [

                            [
                                'text'    => 'Mantenimientos',
                                'icon'    => 'fas fa-people-carry',
                                'url'     => 'javascript:void(0)',
                                'submenu' => [

                                    [
                                        'text' => 'Empresa',
                                        'icon' => 'fas fa-building',
                                        'url'  => '#',
                                    ],
                                    [
                                        'text' => 'Idiomas',
                                        'icon' => 'fas fa-language',
                                        'url'  => '/catalogs/language'
                                    ],

                                    [
                                        'text' => 'Monedas',
                                        'icon' => 'fas fa-dollar-sign',
                                        'url'  => '/catalogs/currencies'
                                    ],
                                    /*   [
                                        'text' => 'Centros de costo',
                                        'icon' => 'fas fa-pencil-ruler',
                                        'url'  => '#'
                                    ], */

                                    [
                                        'text' => 'Etnias',
                                        'icon' => 'fas fa-user-ninja',
                                        'url'  => '/catalogs/ethnics'
                                    ],
                                    [
                                        'text' => 'Estados civiles',
                                        'icon' => 'fas fa-ring',
                                        'url'  => '#'
                                    ],
                                    [
                                        'text' => 'Países',
                                        'icon' => 'fas fa-globe-asia',
                                        'url'  => '#'
                                    ],
                                    [
                                        'text' => 'Departamentos',
                                        'icon' => 'far fa-compass',
                                        'url'  => '#'
                                    ],
                                    [
                                        'text' => 'Municipios',
                                        'icon' => 'fas fa-city',
                                        'url'  => '#'
                                    ],

                                    [
                                        'text' => 'Niveles académicos',
                                        'icon' => 'fas fa-graduation-cap',
                                        'url'  => '#'
                                    ],
                                    [
                                        'text' => 'Grados académicos',
                                        'icon' => 'fas fa-user-graduate',
                                        'url'  => '#'
                                    ],
                                    [
                                        'text' => 'Tipo de discapacidades',
                                        'icon' => 'fas fa-blind',
                                        'url'  => '#'
                                    ],
                                    [
                                        'text' => 'Jornadas',
                                        'icon' => 'fas fa-history',
                                        'url'  => '#'
                                    ],

                                    [
                                        'text' => 'Tallas',
                                        'icon' => 'fas fa-tshirt',
                                        'url'  => '#'
                                    ],

                                    [
                                        'text' => 'Parentescos',
                                        'icon' => 'fas fa-users',
                                        'url'  => '#'
                                    ],



                                ]
                            ],

                        ],
                    ]

                ],
            ]
        ];
        return $catalog;
    }

    //public function getGeneralCatalagos(){

    /*  $catalog = [

            [
                'text'       => 'Catálogos generales',
                'icon'       => 'fas fa-clipboard-list',

                'submenu' => [

                    [
                        'text'    => 'Mantenimientos',
                        'icon'    => 'fas fa-people-carry',
                        'url'     => 'javascript:void(0)',
                        'submenu' => [
                            [
                                'text' => 'Datos Empresa',
                                'icon' => 'far fa-building',
                                'url'  => '#',
                            ],
                            [
                                'text' => 'Usuarios',
                                'icon' => 'fas fa-vote-yea',
                                'url'  => '#'
                            ],

                            [
                                'text' => 'Roles',
                                'icon' => 'fas fa-users',
                                'url'  => '#'
                            ],
                            [
                                'text' => 'Permisos',
                                'icon' => 'fas fa-user-tag',
                                'url'  => '#'
                            ],


                        ]
                    ],

                ],
            ]
        ];
        return $catalog; */

    //}


    public static function geTransactions()
    {

        $transactions = [
            [
                'text'       => 'Recuros humanos',
                'icon'       => 'fas fa-hand-holding-heart',
                'url'     => 'javascript:void(0)',
                'submenu'    => [
                    [
                        'text' => 'Requerimientos',
                        'icon' => 'fas fa-bars',
                        'url'  => '/catalogs/requirement'
                    ],
                    [
                        'text' => 'Vacantes',
                        'icon' => 'fas fa-inbox',
                        'url'  => '/maintenance/vacancies'
                    ],
                    [
                        'text' => 'Aplicaciones',
                        'icon' => 'fab fa-searchengin',
                        'url'  => '/transactions-rh/applications'
                    ],
                    [
                        'text' => 'Fichas',
                        'icon' => 'far fa-id-card',
                        'url'  => '#'
                    ],
                    [
                        'text' => 'Enlaces de plazas',
                        'icon' => 'fas fa-link',
                        'url'  => '#'
                    ],



                    [
                        'text' => 'Divulgación',
                        'icon' => 'fas fa-share-alt',
                        'url'  => '#',
                        'submenu'    => [
                            [
                                'text' => 'Plantillas correos',
                                'icon' => 'fas fa-receipt',
                                'url'  => '#',

                            ],
                            [
                                'text' => 'Envio noticaciones',
                                'icon' => 'fas fa-user-edit',
                                'url'  => '#',

                            ],

                            [
                                'text' => 'Programar notificaciones',
                                'icon' => 'fas fa-stopwatch-20',
                                'url'  => '#',

                            ],


                        ]
                    ],


                    [
                        'text' => 'Otros procesos',
                        'icon' => 'fas fa-spinner',
                        'url'  => '#',
                        'submenu'    => [
                            [
                                'text' => 'Inv. Equipos',
                                'icon' => 'fas fa-toolbox',
                                'url'  => '#',

                            ],
                            [
                                'text' => 'Inv. Uniformes',
                                'icon' => 'fas fa-tshirt',
                                'url'  => '#',

                            ],

                            [
                                'text' => 'Capacitaciones',
                                'icon' => 'fas fa-chalkboard-teacher',
                                'url'  => '#',

                            ],
                            [
                                'text' => 'Atribuciones',
                                'icon' => 'fas fa-tasks',
                                'url'  => '#',

                            ],


                        ]
                    ],





                    /*  [
                        'text' => 'Entradas y salidas',
                        'icon' => 'fas fa-shopping-basket',
                        'url'  => '#',
                        'submenu'    => [
                            [
                                'text' => 'Traslados',
                                'icon' => 'fas fa-exchange-alt',
                                'url'  => '#',
                                'submenu' => [
                                    [
                                        'text' => 'Enviar productos',
                                        'icon' => 'fas fa-long-arrow-alt-right',
                                        'url'  => '#',

                                    ],
                                    [
                                        'text' => 'Recibir productos',
                                        'icon' => 'fas fa-cart-arrow-down',
                                        'url'  => '#',

                                    ]

                                ],
                            ],


                            [
                                'text' => 'Entradas',
                                'icon' => 'fas fa-box',
                                'url'  => '#',
                            ],

                            [
                                'text' => 'Reporte de productos ',
                                'icon' => 'fas fa-print',
                                'url'  => '#',
                            ]


                        ]
                    ], */

                    [
                        'text' => 'Optimizar aplicación',
                        'icon' => 'fas fa-sync',
                        'url'  => 'optimize-app'

                    ],
                    /*    [
                        'text' => 'Limpiar datos',
                        'icon' => 'fas fa-sync',
                        'url'  => 'clear-data'
                    ], */



                ]
            ]
        ];

        return $transactions;
    }
}
