<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // テーブルのクリア
        DB::table('user_profiles')->truncate();

        // 初期データ用意（列名をキーとする連想配列）
        $user_profiles = [
            [
                'name' => 'テストユーザー01',
                'email' => 'test01@test.com',
                'user_id' => 'testuser01',
                'password' => 'test'
            ],
            [
                'name' => 'テストユーザー02',
                'email' => 'test02@test.com',
                'user_id' => 'testuser02',
                'password' => 'test'
            ],
            [
                'name' => 'テストユーザー03',
                'email' => 'test03@test.com',
                'user_id' => 'testuser03',
                'password' => 'test'
            ],
            [
                'name' => 'テストユーザー04',
                'email' => 'test04@test.com',
                'user_id' => 'testuser04',
                'password' => 'test'
            ]
        ];

        // 登録
        foreach ($user_profiles as $user_profile) {
            \App\Models\UserProfile::create($user_profile);
        }
    }
}
