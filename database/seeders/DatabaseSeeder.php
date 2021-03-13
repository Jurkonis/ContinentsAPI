<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\Continent;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         Continent::factory()->state(
            function (array $attributes) {
                return ['name' => 'Asia'];
            })->create();
            Country::factory()->state(
                function (array $attributes) {
                    return ['name' => 'China', 'continent_id' => 1];
                })->create();
                Country::factory()->state(
                    function (array $attributes) {
                        return ['name' => 'India', 'continent_id' => 1];
                    })->create();
                    Country::factory()->state(
                        function (array $attributes) {
                            return ['name' => 'Indonesia', 'continent_id' => 1];
                        })->create();
                        Country::factory()->state(
                            function (array $attributes) {
                                return ['name' => 'Pakistan', 'continent_id' => 1];
                            })->create();
                            Country::factory()->state(
                                function (array $attributes) {
                                    return ['name' => 'Japan', 'continent_id' => 1];
                                })->create();
        Continent::factory()->state(
            function (array $attributes) {
                return ['name' => 'Africa'];
            })->create();
            Country::factory()->state(
                function (array $attributes) {
                    return ['name' => 'Nigeria', 'continent_id' => 2];
                })->create();
                Country::factory()->state(
                    function (array $attributes) {
                        return ['name' => 'Egypt', 'continent_id' => 2];
                    })->create();
                    Country::factory()->state(
                        function (array $attributes) {
                            return ['name' => 'Tanzania', 'continent_id' => 2];
                        })->create();
                        Country::factory()->state(
                            function (array $attributes) {
                                return ['name' => 'Kenya', 'continent_id' => 2];
                            })->create();
                            Country::factory()->state(
                                function (array $attributes) {
                                    return ['name' => 'Morocco', 'continent_id' => 2];
                                })->create();
        Continent::factory()->state(
            function (array $attributes) {
                return ['name' => 'Europe'];
            })->create();
            Country::factory()->state(
                function (array $attributes) {
                    return ['name' => 'Russia', 'continent_id' => 3];
                })->create();
                Country::factory()->state(
                    function (array $attributes) {
                        return ['name' => 'Germany', 'continent_id' => 3];
                    })->create();
                    Country::factory()->state(
                        function (array $attributes) {
                            return ['name' => 'United Kingdom', 'continent_id' => 3];
                        })->create();
                        Country::factory()->state(
                            function (array $attributes) {
                                return ['name' => 'France', 'continent_id' => 3];
                            })->create();
                            Country::factory()->state(
                                function (array $attributes) {
                                    return ['name' => 'Italy', 'continent_id' => 3];
                                })->create();
        Continent::factory()->state(
            function (array $attributes) {
                return ['name' => 'North America'];
            })->create();
            Country::factory()->state(
                function (array $attributes) {
                    return ['name' => 'USA', 'continent_id' => 4];
                })->create();
                Country::factory()->state(
                    function (array $attributes) {
                        return ['name' => 'Mexico', 'continent_id' => 4];
                    })->create();
                    Country::factory()->state(
                        function (array $attributes) {
                            return ['name' => 'Canada', 'continent_id' => 4];
                        })->create();
                        Country::factory()->state(
                            function (array $attributes) {
                                return ['name' => 'Cuba', 'continent_id' => 4];
                            })->create();
                            Country::factory()->state(
                                function (array $attributes) {
                                    return ['name' => 'Haiti ', 'continent_id' => 4];
                                })->create();
        Continent::factory()->state(
            function (array $attributes) {
                return ['name' => 'South America'];
            })->create();
            Country::factory()->state(
                function (array $attributes) {
                    return ['name' => 'Brazil', 'continent_id' => 5];
                })->create();
                Country::factory()->state(
                    function (array $attributes) {
                        return ['name' => 'Colombia', 'continent_id' => 5];
                    })->create();
                    Country::factory()->state(
                        function (array $attributes) {
                            return ['name' => 'Argentina', 'continent_id' => 5];
                        })->create();
                        Country::factory()->state(
                            function (array $attributes) {
                                return ['name' => 'Peru', 'continent_id' => 5];
                            })->create();
                            Country::factory()->state(
                                function (array $attributes) {
                                    return ['name' => 'Chile ', 'continent_id' => 5];
                                })->create();
    }
}
