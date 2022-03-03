<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupportFeeArchivesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // テーブルのクリア
        DB::table('support_fee_archives')->truncate();

        // 初期データ用意（列名をキーとする連想配列）
        $support_fee_archives = [
            [
                'user_id' => 'testuser01',
                'support_fee' => 100,
                'support_fee_post_id' => 1
            ]
        ];

        // 登録
        foreach ($support_fee_archives as $support_fee_archive) {
            \App\Models\SupportFeeArchive::create($support_fee_archive);
        }
    }
}
