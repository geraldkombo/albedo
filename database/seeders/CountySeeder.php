<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountySeeder extends Seeder
{
    public function run(): void
    {
        $counties = [
            ['name' => 'Nairobi', 'region' => 'Nairobi', 'latitude' => -1.286389, 'longitude' => 36.817223],
            ['name' => 'Mombasa', 'region' => 'Coast', 'latitude' => -4.043740, 'longitude' => 39.668207],
            ['name' => 'Kwale', 'region' => 'Coast', 'latitude' => -4.181220, 'longitude' => 39.458440],
            ['name' => 'Kilifi', 'region' => 'Coast', 'latitude' => -3.510660, 'longitude' => 39.856720],
            ['name' => 'Tana River', 'region' => 'Coast', 'latitude' => -1.745240, 'longitude' => 39.651710],
            ['name' => 'Lamu', 'region' => 'Coast', 'latitude' => -2.271570, 'longitude' => 40.902010],
            ['name' => 'Taita-Taveta', 'region' => 'Coast', 'latitude' => -3.316080, 'longitude' => 38.484070],
            ['name' => 'Garissa', 'region' => 'North Eastern', 'latitude' => -0.453280, 'longitude' => 39.646170],
            ['name' => 'Wajir', 'region' => 'North Eastern', 'latitude' => 1.747050, 'longitude' => 40.057340],
            ['name' => 'Mandera', 'region' => 'North Eastern', 'latitude' => 3.936900, 'longitude' => 41.855910],
            ['name' => 'Marsabit', 'region' => 'Eastern', 'latitude' => 2.334940, 'longitude' => 37.990820],
            ['name' => 'Isiolo', 'region' => 'Eastern', 'latitude' => 0.354720, 'longitude' => 37.582210],
            ['name' => 'Meru', 'region' => 'Eastern', 'latitude' => 0.047560, 'longitude' => 37.649880],
            ['name' => 'Tharaka-Nithi', 'region' => 'Eastern', 'latitude' => -0.297310, 'longitude' => 37.805400],
            ['name' => 'Embu', 'region' => 'Eastern', 'latitude' => -0.531670, 'longitude' => 37.451710],
            ['name' => 'Kitui', 'region' => 'Eastern', 'latitude' => -1.366900, 'longitude' => 38.010170],
            ['name' => 'Machakos', 'region' => 'Eastern', 'latitude' => -1.516800, 'longitude' => 37.263480],
            ['name' => 'Makueni', 'region' => 'Eastern', 'latitude' => -1.804200, 'longitude' => 37.620140],
            ['name' => 'Nyandarua', 'region' => 'Central', 'latitude' => -0.180380, 'longitude' => 36.523870],
            ['name' => 'Nyeri', 'region' => 'Central', 'latitude' => -0.421070, 'longitude' => 36.951100],
            ['name' => 'Kirinyaga', 'region' => 'Central', 'latitude' => -0.659010, 'longitude' => 37.382880],
            ['name' => "Murang'a", 'region' => 'Central', 'latitude' => -0.721340, 'longitude' => 37.152580],
            ['name' => 'Kiambu', 'region' => 'Central', 'latitude' => -1.171370, 'longitude' => 36.835100],
            ['name' => 'Turkana', 'region' => 'Rift Valley', 'latitude' => 3.312230, 'longitude' => 35.565880],
            ['name' => 'West Pokot', 'region' => 'Rift Valley', 'latitude' => 1.238920, 'longitude' => 35.111470],
            ['name' => 'Samburu', 'region' => 'Rift Valley', 'latitude' => 1.215400, 'longitude' => 36.954100],
            ['name' => 'Trans-Nzoia', 'region' => 'Rift Valley', 'latitude' => 1.056600, 'longitude' => 34.950680],
            ['name' => 'Uasin Gishu', 'region' => 'Rift Valley', 'latitude' => 0.517390, 'longitude' => 35.269930],
            ['name' => 'Elgeyo-Marakwet', 'region' => 'Rift Valley', 'latitude' => 0.677500, 'longitude' => 35.507060],
            ['name' => 'Nandi', 'region' => 'Rift Valley', 'latitude' => 0.183460, 'longitude' => 35.127830],
            ['name' => 'Baringo', 'region' => 'Rift Valley', 'latitude' => 0.491490, 'longitude' => 35.743060],
            ['name' => 'Laikipia', 'region' => 'Rift Valley', 'latitude' => 0.361440, 'longitude' => 36.781410],
            ['name' => 'Nakuru', 'region' => 'Rift Valley', 'latitude' => -0.303100, 'longitude' => 36.080260],
            ['name' => 'Narok', 'region' => 'Rift Valley', 'latitude' => -1.087750, 'longitude' => 35.860700],
            ['name' => 'Kajiado', 'region' => 'Rift Valley', 'latitude' => -1.852340, 'longitude' => 36.776740],
            ['name' => 'Kericho', 'region' => 'Rift Valley', 'latitude' => -0.369360, 'longitude' => 35.286380],
            ['name' => 'Bomet', 'region' => 'Rift Valley', 'latitude' => -0.781550, 'longitude' => 35.340020],
            ['name' => 'Kakamega', 'region' => 'Western', 'latitude' => 0.282210, 'longitude' => 34.751860],
            ['name' => 'Vihiga', 'region' => 'Western', 'latitude' => 0.083160, 'longitude' => 34.707240],
            ['name' => 'Bungoma', 'region' => 'Western', 'latitude' => 0.569520, 'longitude' => 34.558240],
            ['name' => 'Busia', 'region' => 'Western', 'latitude' => 0.460350, 'longitude' => 34.111260],
            ['name' => 'Siaya', 'region' => 'Nyanza', 'latitude' => -0.061330, 'longitude' => 34.288050],
            ['name' => 'Kisumu', 'region' => 'Nyanza', 'latitude' => -0.091850, 'longitude' => 34.767960],
            ['name' => 'Homa Bay', 'region' => 'Nyanza', 'latitude' => -0.527350, 'longitude' => 34.457000],
            ['name' => 'Migori', 'region' => 'Nyanza', 'latitude' => -1.063930, 'longitude' => 34.473270],
            ['name' => 'Kisii', 'region' => 'Nyanza', 'latitude' => -0.681340, 'longitude' => 34.766870],
            ['name' => 'Nyamira', 'region' => 'Nyanza', 'latitude' => -0.563420, 'longitude' => 34.934460],
        ];

        $now = now();
        foreach ($counties as &$county) {
            $county['created_at'] = $now;
            $county['updated_at'] = $now;
        }

        DB::table('counties')->insert($counties);
    }
}
