<?php
namespace Database\Seeders;

use App\Models\Company;
use App\Models\Person;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Company 1
        $company1 = Company::create([
            'name'      => 'Euro Expo',
            'address'   => 'Boulevard de l\'Europe, 69680 Chassieu, France',
            'telephone' => '+33 1 41 56 78 00',
            'email'     => 'mail.customerservice.hdq@example.com',
            'is_active' => true,
        ]);

        Person::create(['company_id' => $company1->id, 'type' => 'owner',   'name' => 'Benjamin Smith', 'mobile' => '+33 6 12 34 56 78', 'email' => 'b.smith@example.com']);
        Person::create(['company_id' => $company1->id, 'type' => 'contact', 'name' => 'Marie Dubois',   'mobile' => '+33 6 98 76 54 32', 'email' => 'm.dubois@example.com']);

        Product::create([
            'company_id'       => $company1->id,
            'name_en'          => 'Organic Apple Juice',
            'name_fr'          => 'Jus de pomme biologique',
            'gtin'             => '03000123456789',
            'description_en'   => 'Our organic apple juice is pressed from 100% fresh organic apples, with no added sugars or preservatives.',
            'description_fr'   => 'Notre jus de pomme biologique est pressé à partir de 100% de pommes biologiques fraîches.',
            'brand'            => 'Green Orchard',
            'country_of_origin'=> 'France',
            'gross_weight'     => 1.1,
            'net_weight'       => 1.0,
            'weight_unit'      => 'L',
        ]);

        // Company 2
        $company2 = Company::create([
            'name'      => 'French Delights',
            'address'   => '12 Rue de la Paix, 75002 Paris, France',
            'telephone' => '+33 1 42 68 53 00',
            'email'     => 'contact@frenchdelights.example.com',
            'is_active' => true,
        ]);

        Person::create(['company_id' => $company2->id, 'type' => 'owner',   'name' => 'Pierre Laurent', 'mobile' => '+33 6 11 22 33 44', 'email' => 'p.laurent@example.com']);
        Person::create(['company_id' => $company2->id, 'type' => 'contact', 'name' => 'Sophie Martin',  'mobile' => '+33 6 55 66 77 88', 'email' => 's.martin@example.com']);

        Product::create([
            'company_id'       => $company2->id,
            'name_en'          => 'Lavender Honey',
            'name_fr'          => 'Miel de lavande',
            'gtin'             => '03000987654321',
            'description_en'   => 'Pure lavender honey harvested from the fields of Provence.',
            'description_fr'   => 'Miel de lavande pur récolté dans les champs de Provence.',
            'brand'            => 'Provence Gold',
            'country_of_origin'=> 'France',
            'gross_weight'     => 0.5,
            'net_weight'       => 0.4,
            'weight_unit'      => 'kg',
        ]);
    }
}
