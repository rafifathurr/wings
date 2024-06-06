<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    public static function list()
    {
        $menus = [
            /**
             * DELIVERY MENUS
             */
            [
                'header' => 'Delivery',
                'departments' => [
                    'purchasing',
                    'warehouse',
                ],
                'menus' => [
                    /**
                     * List Menus
                     */
                    [
                        'displayName' => 'Delivery',
                        'icon' => 'fas fa-shipping-fast',
                        'children' => [
                            /**
                             * List Sub Menus
                             */
                            [
                                'route' => 'delivery.delivery_information.index',
                                'displayName' => 'Informasi Pengiriman',
                                'sub_departments' => [
                                    'warehouse',
                                ],
                            ],
                            [
                                'displayName' => 'Pengiriman Kembali',
                                'route' => 'delivery.return_vendor.index',
                                'sub_departments' => [
                                    'warehouse',
                                    'purchasing'
                                ],
                            ]
                            // Add other sub-routes here...
                        ],
                    ]
                ],
                // Add other roles and their routes here...
            ],

            /**
             * DEFECTIVE REPORT PURCHASING MENU
             */
            [
                'header' => 'Defective Report',
                'departments' => [
                    'warehouse',
                    'purchasing',
                ],
                'menus' => [
                    /**
                     * List Menus
                     */
                    [
                        'displayName' => 'Defective Report',
                        'icon' => 'fas fa-file-invoice',
                        'route' => 'report.defective_report.purchasing.index',
                    ]
                ]
                // Add other roles and their routes here...
            ],

            /**
             * DEFECTIVE REPORT QC MENU
             */
            [
                'header' => 'Defective Report',
                'departments' => [
                    'qc'
                ],
                'menus' => [
                    /**
                     * List Menus
                     */
                    [
                        'displayName' => 'Defective Report',
                        'icon' => 'fas fa-file-invoice',
                        'route' => 'report.defective_report.qc.index',
                    ]
                ]
                // Add other roles and their routes here...
            ],

            /**
             * GIRN MENU
             */
            [
                'header' => 'GIRN',
                'departments' => [
                    'qc',
                    'finance',
                    'warehouse',
                    'purchasing',
                ],
                'menus' => [
                    /**
                     * List Menus
                     */
                    [
                        'displayName' => 'GIRN',
                        'icon' => 'fas fa-file-invoice',
                        'route' => 'report.girn.index',
                    ]
                ],
                // Add other roles and their routes here...
            ],

            /**
             * LPBB MENUS
             */
            [
                'header' => 'LPBB',
                'departments' => [
                    'qc',
                    'warehouse',
                    'purchasing',
                ],
                'menus' => [
                    /**
                     * List Menus
                     */
                    [
                        'displayName' => 'LPBB',
                        'icon' => 'fas fa-file-invoice',
                        'children' => [
                            /**
                             * List Sub Menus
                             */
                            [
                                'sub_departments' => [
                                    'qc'
                                ],
                                'route' => 'report.lpbb.index',
                                'displayName' => 'Penerimaan Barang',
                            ],
                            [
                                'sub_departments' => [
                                    'qc',
                                    'warehouse',
                                    'purchasing',
                                ],
                                'route' => 'report.lpbb.indexLpbb',
                                'displayName' => 'LPBB',
                            ],
                            // Add other sub-routes here...
                        ],
                    ],
                ]
                // Add other roles and their routes here...
            ],

            /**
             * PURCHASING MENUS
             */
            [
                'header' => 'Purchasing',
                'departments' => [
                    'produksi',
                    'hrga',
                    'rm',
                    'purchasing',
                    'marketing',
                    'sales',
                    'finance',
                    'mtc',
                    'ga',
                    'it',
                ],
                'menus' => [
                    /**
                     * List Menus
                     */
                    [
                        'displayName' => 'Purchase',
                        'icon' => 'fas fa-file-invoice',
                        'children' => [
                            /**
                             * List Sub Menus
                             */
                            [

                                'displayName' => 'Form Pembelian Barang',
                                'route' => 'purchase.fpb.index',
                                'sub_departments' => [
                                    'produksi',
                                    'hrga',
                                    'marketing',
                                    'sales',
                                    'it',
                                    'rm',
                                    'mtc',
                                    'ga'
                                ],
                            ],
                            [

                                'displayName' => 'Permintaan Pembelian',
                                'route' => 'purchase.pp.index',
                                'sub_departments' => [
                                    'rm',
                                    'mtc',
                                    'ga',
                                    'purchasing'
                                ],
                            ],
                            [

                                'displayName' => 'Purchase Order',
                                'route' => 'purchase.po.index',
                                'sub_departments' => [
                                    'purchasing',
                                    'finance'
                                ],
                            ],
                            [
                                'displayName' => 'Pembayaran',
                                'route' => 'payment.index',
                                'sub_departments' => [
                                    'finance'
                                ],
                            ],
                        ],
                    ],
                ],
                // Add other roles and their routes here...
            ],

            /**
             * VENDOR MENUS
             */
            [
                'header' => 'Vendor',
                'departments' => [
                    'purchasing'
                ],
                'menus' => [
                    /**
                     * List Menus
                     */
                    [
                        'displayName' => 'Vendor',
                        'icon' => 'far fa-user nav-icon',
                        'route' => 'vendor.index',
                    ]
                ]
            ]
        ];
        return $menus;
    }
}
