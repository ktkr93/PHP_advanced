<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostDataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // テーブルのクリア
        DB::table('post_data')->truncate();

        // 初期データ用意（列名をキーとする連想配列）
        $post_data = [
            [
                'user_id' => 'testuser01',
                'post_title' => 'テスト件名01',
                'post_data' => 'テスト本文01'
            ],
            [
                'user_id' => 'testuser02',
                'post_title' => 'テスト件名02',
                'post_data' => 'テスト本文02'
            ],
            [
                'user_id' => 'testuser03',
                'post_title' => 'テスト件名03',
                'post_data' => 'テスト本文03'
            ],
            [
                'user_id' => 'testuser04',
                'post_title' => 'テスト件名04',
                'post_data' => 'テスト本文04'
            ]
        ];

        // 登録
        foreach ($post_data as $post_datum) {
            \App\Models\PostDatum::create($post_datum);
        }
    }
}
