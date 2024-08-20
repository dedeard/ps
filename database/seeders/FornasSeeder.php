<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fornes;
use Illuminate\Support\Facades\File;

class FornasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Path to your data.json file
        $jsonFilePath = base_path('database/seeders/data.json');

        // Check if the file exists
        if (File::exists($jsonFilePath)) {
            // Read the JSON file
            $jsonData = File::get($jsonFilePath);

            // Decode JSON data into PHP array
            $data = json_decode($jsonData, true);

            // Iterate over each record and insert into the database
            foreach ($data as $record) {
                Fornes::create(
                    [
                        'nama_obat' => $record['Nama Obat'],
                        'kelas_terapi' => $record['Kelas Terapi'],
                        'sub_kelas_terapi' => $record['Sub Kelas Terapi'],
                        'kekuatan' => $record['Kekuatan'],
                        'satuan' => $record['Satuan'],
                        'sediaan' => $record['Sediaan'],
                        'tingkat_faskes' => $record['Tingkat Faskes'],
                        'oen' => $record['OEN'],
                        'program_p' => $record['Program [P]'],
                        'kanker_ca' => $record['Kanker [Ca]'],
                        'restriksi_obat' => $record['Restriksi Obat'],
                        'restriksi_sediaan' => $record['Restriksi sediaan'],
                        'restriksi_kelas_terapi' => $record['Restriksi Kelas Terapi'],
                        'restriksi_sub_kelas_terapi' => $record['Restriksi Sub Kelas Terapi'],
                        'restriksi_sub_sub_kelas_terapi' => $record['Restriksi Sub Sub Kelas Terapi'],
                        'restriksi_sub_sub_sub_kelas_terapi' => $record['Restriksi Sub Sub Sub Kelas Terapi'],
                        'peresepan_maksimal' => $record['Peresepan Maksimal'],
                    ]
                );
            }
        } else {
            $this->command->error("File data.json not found.");
        }
    }
}
