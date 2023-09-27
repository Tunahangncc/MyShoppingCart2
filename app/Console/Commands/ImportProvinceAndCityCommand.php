<?php

namespace App\Console\Commands;

use App\Models\City;
use App\Models\Country;
use App\Models\Province;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ImportProvinceAndCityCommand extends Command
{
    protected $signature = 'app:import-province-and-city {fileName?}';

    protected $description = 'Import Province and Cities';

    public function handle()
    {
        $fileName = $this->argument('fileName');

        if (! $fileName) {
            $this->error('File Name Required !');
        }

        $fileName = explode('.', $fileName)[0];

        $filePath = storage_path('countries/'.$fileName.'.json');

        try {
            $file = File::get($filePath);
        } catch (\Exception $exception) {
            $this->error($exception->getMessage());
            return;
        }

        $countries = json_decode($file);

        DB::beginTransaction();

        foreach ($countries as $country) {
            $countryName = $country->name;
            $countrySlug = Str::slug($countryName, '_');

            // If country data is available, it is updated, otherwise it is created.
            $countryData = Country::query()->updateOrCreate(
                ['slug' => $countrySlug],
                [
                    'name' => $countryName,
                    'slug' => $countrySlug,
                ]
            );

            foreach ($country->provinces as $province) {
                $provinceName = $province->name;
                $provinceSlug = Str::slug($provinceName, '_');
                $provinceStateCode = $province->state_code;

                // If province data is available, it is updated, otherwise it is created.
                $provinceData = Province::query()->updateOrCreate(
                    [
                        'slug' => $provinceSlug,
                        'state_code' => $provinceStateCode,
                        'country_id' => $countryData->id,
                    ],
                    [
                        'name' => $provinceName,
                        'slug' => $provinceSlug,
                        'country_id' => $countryData->id,
                        'state_code' => $provinceStateCode,
                    ]
                );

                $cities = $province->cities;

                if (count($cities)) {
                    foreach ($cities as $city) {
                        $cityName = $city->name;
                        $citySlug = Str::slug($cityName, '_');

                        City::query()->updateOrCreate(
                            [
                                'slug' => $citySlug,
                                'province_id' => $provinceData->id,
                            ],
                            [
                                'name' => $cityName,
                                'slug' => $citySlug,
                                'lat' => $city->lat,
                                'lng' => $city->lng,
                                'province_id' => $provinceData->id,
                            ]
                        );
                    }
                }
            }
        }

        DB::commit();

        $this->info('Country, Province and Cities Imported !');
    }
}
