<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function setUp(): void
    {
        parent::setUp();
        $this->seed('FolderTableSeeder');
    }
    // 期限日が日付ではない場合はバリデーションエラー
    public function due_date_should_be_date()
    {
        $response = $this->post('/folders/1/tasks/create', [
            'title' => 'Sample task',
            'due_date' => 123,
        ]);
        $response->assertSessionHasErrors([
            'due_date' => '期限日には二付けを入力してください',

        ]);
        $response->assertSessionHasErrors([
            'due_date' => '期限日には今日以降の日付を入力してください',
        ]);
    }
    // 期限が過去の場合はバリデーションエラー

}
