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
                'text'       => 'Tipo Cambio App',
                'icon'       => 'fas fa-clipboard-list',
                /* 'can'        => ['clientes', 'proveedores'], */
                'submenu' => [

                    [
                        'text'    => 'Tipos de cambio',
                        'icon'    => 'fas fa-people-carry',
                        'url'     => 'javascript:void(0)',
                        'submenu' => [

                            [
                                'text' => 'Consultas',
                                'icon' => 'fas fa-hand-holding-usd',
                                'url'  => '/peticiones'
                            ],




                        ]
                    ],


                ],
            ]
        ];
        return $catalog;
    }




    public static function geTransactions()
    {

        $transactions = [
            [
                'text'       => 'Otros datos',
                'icon'       => 'fas fa-hand-holding-heart',
                'url'     => 'javascript:void(0)',
                'submenu'    => [






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
