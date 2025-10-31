<?php

namespace Database\Seeders;

use App\Models\Pronoun;
use Illuminate\Database\Seeder;

class PronounSeeder extends Seeder
{
    public function run(): void
    {
        $list = [
            ['name' => 'He/Him', 'temp' => 'he_him'],
            ['name' => 'She/Her', 'temp' => 'she_her'],
            ['name' => 'They/Them', 'temp' => 'they_them'],
            ['name' => 'Ze/Hir', 'temp' => 'ze_hir'],
            ['name' => 'Xe/Xem', 'temp' => 'xe_xem'],
            ['name' => 'Ey/Em', 'temp' => 'ey_em'],
            ['name' => 'Ve/Ver', 'temp' => 've_ver'],
            ['name' => 'Per/Per', 'temp' => 'per_per'],
            ['name' => 'It/Its', 'temp' => 'it_its'],
            ['name' => 'Any Pronouns', 'temp' => 'any_pronouns']
        ];

        foreach ($list as $pronoun) {
            Pronoun::firstOrCreate(['temp' => $pronoun['temp']], $pronoun);
        }
    }

}
