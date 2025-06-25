<?php

use Illuminate\Database\Seeder;

class obatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Faker = Faker\Factory::create('id_ID');
        for($i=0; $i<100; $i++){
            DB::table('obat')->insert([
                'nama' => $Faker->randomElement([
                        'Paracetamol', 'Ibuprofen', 'Amoxicillin', 'Metformin', 'Atorvastatin',
                        'Omeprazole', 'Losartan', 'Aspirin', 'Simvastatin', 'Ciprofloxacin']),
                'bentuk' => $Faker->randomElement(['Tablet', 'Kapsul', 'Sirup', 'Salep', 'Injeksi']),
                'harga_obat' => $Faker->numberBetween(5000, 100000),
                'stok_obat' => $Faker->numberBetween(1, 1000),
                'produsen' => $Faker->company,
                'tgl_kadaluarsa' => $Faker->dateTimeBetween('now', '+2 years')->format('y-m-d')
            ]);

        }
    }
}
