<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Apartment;
use Illuminate\Support\Str;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $apartments = [
            [
                'title' => 'Rota d\'Imagna House',
                'user_id' => 1,
                'visible' => true,
                'rooms' => 3,
                'beds' => 5,
                'bathrooms' => 2,
                'square_meters' => '113',
                'address' => 'Via Giacomo Quarenghi, 20, 24037, Rota d\'Imagna',
                'latitude' => 45.8346781,
                'longitude' => 9.5089536,
                'cover_img' => 'https://a0.muscache.com/im/pictures/miso/Hosting-43726531/original/15ecdb25-69fc-47ed-b11e-6ca369ea30e2.jpeg',
            ],
            [
                'title' => 'La casetta di Via Balbi',
                'user_id' => 2,
                'visible' => true,
                'rooms' => 2,
                'beds' => 3,
                'bathrooms' => 1,
                'square_meters' => '85',
                'address' => 'Via Balbi, 126-16, 16126, Genova',
                'latitude' => 44.415577,
                'longitude' => 8.925140,
                'cover_img' => 'https://a0.muscache.com/im/pictures/prohost-api/Hosting-1116497923395394251/original/d2d1d5a6-200e-40c6-bac7-7dccacdd590b.jpeg',
            ],
            [
                'title' => 'Le Lagore Fattoria',
                'user_id' => 2,
                'visible' => true,
                'rooms' => 5,
                'beds' => 11,
                'bathrooms' => 6,
                'square_meters' => '315',
                'address' => 'Loc. Fattore, 8, 19015, Levanto',
                'latitude' => 44.182668,
                'longitude' => 9.620552,
                'cover_img' => 'https://a0.muscache.com/im/pictures/a2008024-cbd3-4cbd-a531-3421861cd44f.jpg',
            ],
            [
                'title' => 'Meravigliosa Italia, Casa Acquario',
                'user_id' => 1,
                'visible' => true,
                'rooms' => 1,
                'beds' => 2,
                'bathrooms' => 1,
                'square_meters' => '73',
                'address' => 'Via di Sottoripa, 115, 16100, Genova',
                'latitude' => 44.410482,
                'longitude' => 8.929106,
                'cover_img' => 'https://a0.muscache.com/im/pictures/prohost-api/Hosting-1115031042552707085/original/f2cfc126-065c-45e7-8c58-753e67333e5e.jpeg',
            ],
            [
                'title' => 'Apartment Montesacro',
                'user_id' => 2,
                'visible' => true,
                'rooms' => 2,
                'beds' => 4,
                'bathrooms' => 2,
                'square_meters' => '130',
                'address' => 'Via Monte Croce, 3, 00139, Roma',
                'latitude' => 41.946190,
                'longitude' => 12.533340,
                'cover_img' => 'https://a0.muscache.com/im/pictures/miso/Hosting-1044695677116934917/original/5448e6e3-d43f-4bba-ae89-2cbead1e4ab5.jpeg',
            ],
            [
                'title' => 'Grazioso Appartamento di Design',
                'user_id' => 1,
                'visible' => true,
                'rooms' => 1,
                'beds' => 1,
                'bathrooms' => 1,
                'square_meters' => '54',
                'address' => 'Via Giacomo Bresadola, 00171, Roma',
                'latitude' => 41.893617,
                'longitude' => 12.561055,
                'cover_img' => 'https://a0.muscache.com/im/pictures/prohost-api/Hosting-1028175476468232392/original/ecbf5754-51ce-4455-85ba-2e705117bfe1.jpeg',
            ],
            [
                'title' => 'Casa Maccheri Centrale',
                'user_id' => 2,
                'visible' => true,
                'rooms' => 3,
                'beds' => 6,
                'bathrooms' => 2,
                'square_meters' => '175',
                'address' => 'Corso Re Umberto, 4/E , 10121, Torino',
                'latitude' => 45.067273,
                'longitude' => 7.675644,
                'cover_img' => 'https://a0.muscache.com/im/pictures/prohost-api/Hosting-1028175476468232392/original/ecbf5754-51ce-4455-85ba-2e705117bfe1.jpeg',
            ],
            [
                'title' => 'Bilocale Venaria con balconcino',
                'user_id' => 1,
                'visible' => true,
                'rooms' => 1,
                'beds' => 2,
                'bathrooms' => 1,
                'square_meters' => '62',
                'address' => 'Via Palestro, 7D, 10078, Venaria Reale',
                'latitude' => 45.1289192,
                'longitude' => 7.6319306,
                'cover_img' => 'https://a0.muscache.com/im/pictures/8d6894bd-344a-4391-b810-3f2cc3e75c12.jpg',
            ],
            [
                'title' => 'Hello, Casa sul Giardino',
                'user_id' => 1,
                'visible' => false,
                'rooms' => 4,
                'beds' => 7,
                'bathrooms' => 3,
                'square_meters' => '210',
                'address' => 'Corso Massimo d\'Azeglio, 10, 10125, Torino',
                'latitude' => 45.057607,
                'longitude' => 7.686444,
                'cover_img' => 'https://a0.muscache.com/im/pictures/7e4b83d6-d6e0-4cbf-b75a-6b472ca61498.jpg',
            ],
            [
                'title' => 'Residenza La Terrazza',
                'user_id' => 1,
                'visible' => true,
                'rooms' => 2,
                'beds' => 3,
                'bathrooms' => 1,
                'square_meters' => '147',
                'address' => 'Corso Firenze, 27, 16136, Genova',
                'latitude' => 44.419525,
                'longitude' => 8.931075,
                'cover_img' => 'https://a0.muscache.com/im/pictures/miso/Hosting-1112279179595880109/original/d3e96dd8-20ab-4b14-a77d-e2953f46d788.jpeg',
            ],
            [
                'title' => 'La Casa nel Vicolo',
                'user_id' => 3,
                'visible' => true,
                'rooms' => 2,
                'beds' => 4,
                'bathrooms' => 2,
                'square_meters' => '92',
                'address' => 'Vico Palla, 1, 16128, Genova',
                'latitude' => 44.407012,
                'longitude' => 8.925817,
                'cover_img' => 'https://a0.muscache.com/im/pictures/hosting/Hosting-1067948643054634370/original/721eee57-cbbd-42d6-8ef0-366929510666.jpeg',
            ],
            [
                'title' => 'B&B La casa di Rosco',
                'user_id' => 1,
                'visible' => true,
                'rooms' => 1,
                'beds' => 2,
                'bathrooms' => 1,
                'square_meters' => '75',
                'address' => 'Via Caffaro, 8, 16124, Genova',
                'latitude' => 44.413086,
                'longitude' => 8.934812,
                'cover_img' => 'https://a0.muscache.com/im/pictures/miso/Hosting-1071753284351861164/original/a328bad2-5cc3-4c98-8ef9-8836fb741e06.jpeg',
            ],
            [
                'title' => 'Friends and Family Apartment',
                'user_id' => 3,
                'visible' => true,
                'rooms' => 3,
                'beds' => 7,
                'bathrooms' => 3,
                'square_meters' => '240',
                'address' => 'Via Cupra, 23, 00157, Roma',
                'latitude' => 41.909591,
                'longitude' => 12.536016,
                'cover_img' => 'https://a0.muscache.com/im/pictures/miso/Hosting-1110977674681925407/original/58713607-63c3-438f-b771-a6ca95ea85f0.jpeg',
            ],
            [
                'title' => 'Appartamento botanico Trastevere',
                'user_id' => 1,
                'visible' => true,
                'rooms' => 2,
                'beds' => 4,
                'bathrooms' => 1,
                'square_meters' => '65',
                'address' => 'Via delle Mantellate, 24, 00165, Roma',
                'latitude' => 41.895956,
                'longitude' => 12.464588,
                'cover_img' => 'https://a0.muscache.com/im/pictures/miso/Hosting-1094879307716491054/original/4298e9c6-f383-4e7d-94c5-921b7076a69c.jpeg',
            ],
            [
                'title' => 'Appartamento zona Vanchiglietta',
                'user_id' => 3,
                'visible' => true,
                'rooms' => 1,
                'beds' => 2,
                'bathrooms' => 1,
                'square_meters' => '53',
                'address' => 'Via Eusebio Bava, 46/A, 10124, Torino',
                'latitude' => 45.069567,
                'longitude' => 7.702485,
                'cover_img' => 'https://a0.muscache.com/im/pictures/miso/Hosting-607140757382073538/original/e75911a9-18a9-416f-b2d5-3384d9242986.jpeg',
            ],
            [
                'title' => 'Villa Le Rose',
                'user_id' => 1,
                'visible' => true,
                'rooms' => 3,
                'beds' => 6,
                'bathrooms' => 2,
                'square_meters' => '325',
                'address' => 'Via Cassagna, 17, 10044, Pianezza',
                'latitude' => 45.104310,
                'longitude' => 7.557021,
                'cover_img' => 'https://a0.muscache.com/im/pictures/miso/Hosting-908520646530600248/original/d2486b1f-656a-431e-86cb-6ed887ded5a8.jpeg',
            ],
            [
                'title' => 'Appartamento Famiglia Lombardi',
                'user_id' => 3,
                'visible' => true,
                'rooms' => 2,
                'beds' => 4,
                'bathrooms' => 1,
                'square_meters' => '102',
                'address' => 'Via Paolo Losa, 15, 10093, Collegno',
                'latitude' => 45.074643,
                'longitude' => 7.590437,
                'cover_img' => 'https://a0.muscache.com/im/pictures/miso/Hosting-1112327701165420154/original/69e582f0-a5e9-47f0-9c13-d7a402984491.jpeg',
            ],
            [
                'title' => 'La tua scelta Romana',
                'user_id' => 3,
                'visible' => true,
                'rooms' => 2,
                'beds' => 5,
                'bathrooms' => 2,
                'square_meters' => '124',
                'address' => 'Via Alberto Mancini, 42, 00149, Roma',
                'latitude' => 41.855531,
                'longitude' => 12.455622,
                'cover_img' => 'https://a0.muscache.com/im/pictures/miso/Hosting-1111495187024918614/original/ec39dc9f-524e-457d-b30b-6f64eb9def5b.jpeg',
            ],
            [
                'title' => 'Imma Apulia Apartments',
                'user_id' => 1,
                'visible' => true,
                'rooms' => 1,
                'beds' => 3,
                'bathrooms' => 1,
                'square_meters' => '118',
                'address' => 'Via de Rossi, 70122, Bari',
                'latitude' => 41.124201,
                'longitude' => 16.865323,
                'cover_img' => 'https://a0.muscache.com/im/pictures/miso/Hosting-1003626022869675246/original/49bdf170-bd4f-4670-9fc2-6d4ff5c897d2.jpeg',
            ],
            [
                'title' => 'Casa Rinaldi Loft Panoramico',
                'user_id' => 1,
                'visible' => true,
                'rooms' => 3,
                'beds' => 5,
                'bathrooms' => 2,
                'square_meters' => '123',
                'address' => 'Via Stefano Jacini, 25, 70125, Bari',
                'latitude' => 41.104537,
                'longitude' => 16.877499,
                'cover_img' => 'https://a0.muscache.com/im/pictures/miso/Hosting-947611178198273825/original/61b2094c-771a-4bb3-9960-b91c5abc29b0.jpeg',
            ],
            [
                'title' => 'Paradiso panoramico con vasca',
                'user_id' => 3,
                'visible' => true,
                'rooms' => 2,
                'beds' => 4,
                'bathrooms' => 2,
                'square_meters' => '150',
                'address' => 'Via Paolo Aquilino, 1, 70126, Bari',
                'latitude' => 41.105898,
                'longitude' => 16.913101,
                'cover_img' => 'https://a0.muscache.com/im/pictures/miso/Hosting-1090712701693905440/original/8742d4a0-b562-4965-a818-19808ab8fc82.jpeg',
            ],
            [
                'title' => 'Palazzo la Trulla',
                'user_id' => 1,
                'visible' => true,
                'rooms' => 3,
                'beds' => 6,
                'bathrooms' => 2,
                'square_meters' => '247',
                'address' => 'Via Monte Grappa, 135, 70125, Bari',
                'latitude' => 41.109143,
                'longitude' => 16.868677,
                'cover_img' => 'https://a0.muscache.com/im/pictures/miso/Hosting-902853055743235703/original/84b8399c-1f42-4799-87d5-b0c249f48d95.jpeg',
            ],
            [
                'title' => 'Casa di Collodi',
                'user_id' => 1,
                'visible' => true,
                'rooms' => 2,
                'beds' => 4,
                'bathrooms' => 1,
                'square_meters' => '146',
                'address' => 'Via Carlo Collodi, 2, 70124, Bari',
                'latitude' => 41.115161,
                'longitude' => 16.864447,
                'cover_img' => 'https://a0.muscache.com/im/pictures/676a8cdc-0571-427d-bdd6-5f8e6d87d8b6.jpg',
            ],
            [
                'title' => 'Dimora Genova Quinto al Mare',
                'user_id' => 1,
                'visible' => true,
                'rooms' => 2,
                'beds' => 4,
                'bathrooms' => 1,
                'square_meters' => '146',
                'address' => 'Via Divisione Acqui, 1, 16166, Genova',
                'latitude' => 44.386717,
                'longitude' => 9.013336,
                'cover_img' => 'https://a0.muscache.com/im/pictures/676a8cdc-0571-427d-bdd6-5f8e6d87d8b6.jpg',
            ],
            [
                'title' => 'Dimora Genova Quinto al Mare Seconda',
                'user_id' => 1,
                'visible' => true,
                'rooms' => 2,
                'beds' => 3,
                'bathrooms' => 1,
                'square_meters' => '129',
                'address' => 'Via Divisione Acqui, 1, 16166, Genova',
                'latitude' => 44.386717,
                'longitude' => 9.013336,
                'cover_img' => 'https://a0.muscache.com/im/pictures/prohost-api/Hosting-879417612431768317/original/912056e3-57f3-41b2-927b-b748375fa083.jpeg',
            ],
            [
                'title' => 'Alloggio in affitto a Torino',
                'user_id' => 1,
                'visible' => true,
                'rooms' => 1,
                'beds' => 2,
                'bathrooms' => 1,
                'square_meters' => '74',
                'address' => 'Via Tommaso Grossi, 52, 10126, Torino',
                'latitude' => 45.043896,
                'longitude' => 7.670330,
                'cover_img' => 'https://a0.muscache.com/im/pictures/hosting/Hosting-976112097074409633/original/71457b95-a71d-4f42-8489-f3e1d8194213.jpeg',
            ],
            [
                'title' => 'Terrazza Dante',
                'user_id' => 1,
                'visible' => true,
                'rooms' => 3,
                'beds' => 4,
                'bathrooms' => 2,
                'square_meters' => '98',
                'address' => 'Via Dalmazia, 46, 70121, Bari',
                'latitude' => 41.121142,
                'longitude' => 16.880639,
                'cover_img' => 'https://a0.muscache.com/im/pictures/miso/Hosting-873037333203136422/original/f70121f9-4d39-4fc2-a0ed-194372a9dc50.jpeg',
            ],
            [
                'title' => 'Casa Colorata degli Archi',
                'user_id' => 1,
                'visible' => true,
                'rooms' => 2,
                'beds' => 4,
                'bathrooms' => 2,
                'square_meters' => '125',
                'address' => 'Corso Italia, 141, 70123, Bari',
                'latitude' => 41.117933,
                'longitude' => 16.857556,
                'cover_img' => 'https://a0.muscache.com/im/pictures/miso/Hosting-1101322052170724565/original/7c05c357-7eed-44dd-86c0-1fd8d863a19e.jpeg',
            ],
            [
                'title' => 'Monolocale moderno centrale',
                'user_id' => 1,
                'visible' => true,
                'rooms' => 1,
                'beds' => 1,
                'bathrooms' => 1,
                'square_meters' => '34',
                'address' => 'Via Caffaro, 71, 16125, Genova',
                'latitude' => 44.413620,
                'longitude' => 8.934892,
                'cover_img' => 'https://a0.muscache.com/im/pictures/airflow/Hosting-855771731626635818/original/a7a32470-b680-4a79-9fdc-a12ee4e52160.jpg',
            ],
            [
                'title' => 'Splendida Italia Petit Studio',
                'user_id' => 1,
                'visible' => true,
                'rooms' => 3,
                'beds' => 7,
                'bathrooms' => 3,
                'square_meters' => '254',
                'address' => 'Via Giovanni Torti, 30, 16143, Genova',
                'latitude' => 44.407447,
                'longitude' => 8.958979,
                'cover_img' => 'https://a0.muscache.com/im/pictures/prohost-api/Hosting-847583082998778245/original/7d6d345b-b002-4dad-b19f-a07410ca4470.jpeg',
            ],


        ];

        foreach ($apartments as $apartment) {
            $new_apartment = new Apartment();

            // definisco lo slug dal title 
            $apartment['slug'] = Str::slug($apartment['title']);

            $new_apartment->title = $apartment['title'];
            $new_apartment->user_id = $apartment['user_id'];
            $new_apartment->visible = $apartment['visible'];
            $new_apartment->rooms = $apartment['rooms'];
            $new_apartment->beds = $apartment['beds'];
            $new_apartment->bathrooms = $apartment['bathrooms'];
            $new_apartment->square_meters = $apartment['square_meters'];
            $new_apartment->address = $apartment['address'];
            $new_apartment->latitude = $apartment['latitude'];
            $new_apartment->longitude = $apartment['longitude'];
            $new_apartment->slug = $apartment['slug'];
            $new_apartment->cover_img = $apartment['cover_img'];

            $new_apartment->save();
        }
    }
}
