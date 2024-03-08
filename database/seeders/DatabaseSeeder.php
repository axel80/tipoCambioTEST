<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersSeeder::class,
            RolesPermissionsSeeder::class,
            CurrencySeeder::class,
            CountrySeeder::class,
            StateSeeder::class,
            CitySeeder::class,
            CompanySeeder::class,
            AcademicLevelSeeder::class,
            JobRequirementSeeder::class,
            OccupationSeeder::class,
            StatuSeeder::class,
            WorkingDaySeeder::class,
            DocumenTypeSeeder::class,
            FamilyRelationShipStatusSeeder::class,
            GenderSeeder::class,
            LanguageSeeder::class,
            MaritalStatusSeeder::class,
            BonusTypeSeeder::class,
            DeductionTypeSeeder::class,
            WorkerFileTypeSeeder::class,
            PayrolTypeSeeder::class,
            TypeWeaponSeeder::class,
            EthnicSeeder::class,
            ClothingSizeSeeder::class,
            BloodSeeder::class
        ]);

        //\App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
