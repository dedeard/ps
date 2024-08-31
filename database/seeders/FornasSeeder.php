<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Drug;
use App\Models\TherapeuticClass;
use App\Models\TherapeuticSub1;
use App\Models\TherapeuticSub2;
use App\Models\TherapeuticSub3;

class FornasSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                "kelasTerapi" => [
                    "nama" => "ANTIDIABETES",
                    "sub1" => [
                        [
                            "name" => "BIGUANIDA",
                            "sub2" => [
                                [
                                    "name" => "AGEN METABOLIK",
                                    "sub3" => [
                                        ["name" => "PENURUN GULA DARAH", "namaObat" => "Metformin"],
                                        ["name" => "PENINGKAT SENSITIVITAS INSULIN", "namaObat" => "Glyburide"]
                                    ]
                                ],
                                [
                                    "name" => "PENGHAMBAT PEMECAHAN KARBOHIDRAT",
                                    "sub3" => [
                                        ["name" => "INHIBITOR ALFA-GLUKOSIDASE", "namaObat" => "Acarbose"],
                                        ["name" => "INHIBITOR AMILASE", "namaObat" => "Miglitol"]
                                    ]
                                ]
                            ]
                        ],
                        [
                            "name" => "THIAZOLIDINEDION",
                            "sub2" => [
                                [
                                    "name" => "MODULATOR SENSITIVITAS INSULIN",
                                    "sub3" => [
                                        ["name" => "PIOGLITAZONE", "namaObat" => "Actos"],
                                        ["name" => "ROSIGLITAZONE", "namaObat" => "Avandia"]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            [
                "kelasTerapi" => [
                    "nama" => "HORMON OBAT ENDOKRIN LAIN dan KONTRASEPSI",
                    "sub1" => [
                        [
                            "name" => "ANTIDIABETES",
                            "sub2" => [
                                [
                                    "name" => "MIMETIK INKRETIN",
                                    "sub3" => [
                                        ["name" => "PENURUN GULA DARAH", "namaObat" => "Liraglutide"],
                                        ["name" => "PENINGKAT KONTROL GLIKEMIK", "namaObat" => "Exenatide"]
                                    ]
                                ],
                                [
                                    "name" => "MODULATOR HORMON",
                                    "sub3" => [
                                        ["name" => "AGONIS GLP-1", "namaObat" => "Semaglutide"],
                                        ["name" => "AGONIS GIP", "namaObat" => "Tirzepatide"]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            [
                "kelasTerapi" => [
                    "nama" => "ANTIDIABETES",
                    "sub1" => [
                        [
                            "name" => "SULFONILUREA",
                            "sub2" => [
                                [
                                    "name" => "SEKRETAGOG INSULIN",
                                    "sub3" => [
                                        ["name" => "PENINGKAT SEKRESI INSULIN", "namaObat" => "Glimepiride"],
                                        ["name" => "GLIBENCLAMIDE", "namaObat" => "Glibenclamide"]
                                    ]
                                ],
                                [
                                    "name" => "OBAT KONVENSIONAL",
                                    "sub3" => [
                                        ["name" => "GLIKLAZID", "namaObat" => "Diamicron"],
                                        ["name" => "GLIPIZID", "namaObat" => "Glucotrol"]
                                    ]
                                ]
                            ]
                        ],
                        [
                            "name" => "KATEGORI LAIN",
                            "namaObat" => "ExampleDrug" // Drug under sub1 without sub2
                        ]
                    ]
                ]
            ],
            [
                "kelasTerapi" => [
                    "nama" => "ANTIDIABETES",
                    "namaObat" => "DirectDrug" // Directly attach drug under kelasTerapi
                ]
            ],
        ];

        foreach ($data as $item) {
            // Create the therapeutic class
            $therapeuticClass = TherapeuticClass::create([
                'name' => $item['kelasTerapi']['nama']
            ]);

            // Check if therapeutic class has a direct drug
            if (isset($item['kelasTerapi']['namaObat'])) {
                Drug::create([
                    'name' => $item['kelasTerapi']['namaObat'],
                    'therapeutic_type' => TherapeuticClass::class,
                    'therapeutic_id' => $therapeuticClass->id
                ]);
            }

            // Check if therapeutic class has subcategories
            if (isset($item['kelasTerapi']['sub1'])) {
                foreach ($item['kelasTerapi']['sub1'] as $sub1Data) {
                    $sub1 = TherapeuticSub1::create([
                        'name' => $sub1Data['name'],
                        'therapeutic_class_id' => $therapeuticClass->id
                    ]);

                    if (isset($sub1Data['namaObat'])) {
                        // Create drug directly under sub1 if no sub2
                        Drug::create([
                            'name' => $sub1Data['namaObat'],
                            'therapeutic_type' => TherapeuticSub1::class,
                            'therapeutic_id' => $sub1->id
                        ]);
                    }

                    if (isset($sub1Data['sub2'])) {
                        foreach ($sub1Data['sub2'] as $sub2Data) {
                            $sub2 = TherapeuticSub2::create([
                                'name' => $sub2Data['name'],
                                'sub1_id' => $sub1->id
                            ]);

                            if (isset($sub2Data['sub3'])) {
                                foreach ($sub2Data['sub3'] as $sub3Data) {
                                    $sub3 = TherapeuticSub3::create([
                                        'name' => $sub3Data['name'],
                                        'sub2_id' => $sub2->id
                                    ]);

                                    // Check if drug data is present
                                    if (isset($sub3Data['namaObat'])) {
                                        Drug::create([
                                            'name' => $sub3Data['namaObat'],
                                            'therapeutic_type' => TherapeuticSub3::class,
                                            'therapeutic_id' => $sub3->id
                                        ]);
                                    }
                                }
                            } else if (isset($sub2Data['namaObat'])) {
                                // Create drug directly under sub2 if no sub3
                                Drug::create([
                                    'name' => $sub2Data['namaObat'],
                                    'therapeutic_type' => TherapeuticSub2::class,
                                    'therapeutic_id' => $sub2->id
                                ]);
                            }
                        }
                    }
                }
            }
        }
    }
}
