<?php

namespace Database\Seeders;

use App\Models\LetterType;
use Illuminate\Database\Seeder;

class LetterTypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            [
                'name' => 'Surat Keterangan Domisili',
                'description' => 'Surat keterangan tempat tinggal atau domisili warga.',
                'allow_pdf' => true,
                'allow_pickup' => true,
            ],
            [
                'name' => 'Surat Keterangan Usaha',
                'description' => 'Surat keterangan bahwa warga memiliki atau menjalankan usaha.',
                'allow_pdf' => true,
                'allow_pickup' => true,
            ],
            [
                'name' => 'Surat Keterangan Tidak Mampu',
                'description' => 'Surat keterangan tidak mampu untuk keperluan tertentu.',
                'allow_pdf' => true,
                'allow_pickup' => true,
            ],
            [
                'name' => 'Surat Pengantar',
                'description' => 'Surat pengantar untuk kebutuhan administrasi warga.',
                'allow_pdf' => true,
                'allow_pickup' => true,
            ],
            [
                'name' => 'Surat Keterangan Lainnya',
                'description' => 'Jenis surat keterangan lain sesuai kebutuhan warga.',
                'allow_pdf' => true,
                'allow_pickup' => true,
            ],
        ];

        foreach ($types as $type) {
            LetterType::updateOrCreate(
                ['name' => $type['name']],
                $type
            );
        }
    }
}