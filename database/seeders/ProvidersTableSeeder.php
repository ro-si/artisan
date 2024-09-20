<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Provider;

class ProvidersTableSeeder extends Seeder
{
    public function run()
    {
        $services = [
            'Mécanique', 'Menuiserie', 'Maçonnerie', 'Spécialiste en froid', 'Couture',
            'Tapisserie', 'Coiffure', 'Bijouterie', 'Boucherie', 'Vente de marchandise',
            'Agroalimentaire, Alimentation, Restauration', 'Vitrerie',
            'Hygiène et soins corporels', 'Audiovisuel et communication', 'Transport',
            'Artisanat d\'art et de décoration'
        ];

        foreach ($services as $service) {
            Provider::create(['name' => $service, 'service' => $service]);
        }
    }
}
