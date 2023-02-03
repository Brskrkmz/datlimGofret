<?php

namespace Tests\Feature\Http\Controllers\backend;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class userControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_users_index_page_status()
    {
        $response = $this->get('/users');

        $response->assertOk();
    }
    public function test_users_index_url_goes_to_correct_view()
    {
        $response = $this->get('/users');

        $response->assertViewIs('backend.users.index');
    }
    public function test_users_ceate_form_page_status()
    {
        $response = $this->get('/users/create');
        $response->assertOk();
    }
    public function test_users_create_form_goes_to_correct_view()
    {
        $response = $this->get('/users/create');
        $response->assertViewIs('backend.users.insertForm');
    }
    public function test_users_new_resource_is_created()
    {
        //$generator = Conteiner::getInstance()->make(Generator::class);
        //    $data = [
        //     "name" => $generator->name,
        //     "email" => $generator->email,
        //     "password" => "12345678",
        //     "password_confirmation" => "12345678",
        //     "is_admin" => $generator->bolean,
        //     "is_active" => $generator->bolean
        //    ];
        $data = [
            "name" => "kamil sulak",
            "email" => "sulak@gmail.com",
            "password" => "12345678",
            "password_confirmation" => "12345678",
            "is_admin" => 1,
            "is_active" => 0
        ];
        $response = $this->post('/users', $data);
        $response->assertRedirect('/users');
    }
    public function test_users_existing_user_is_update()
    {
        $user = User::All()->last();
        $user->name = 'UPDATED' . $user->name;
        $user->email = 'UPDATED' . $user->email;
        $data = $user->toArray();

        $response = $this->put('/users', $user->user_id, $data);
        $response->assertRedirect('/users');
    }
    public function test_users_latest_user_is_delete()
    {
        $user = User::All()->last();
        $user_id = $user->user_id;

        $response = $this->delete('/users', $user_id);
        $response->assertOk();
        $response->assertJson(["message" => "Done", "id" => $user->user_id]);
        $this->assertDeleted($user);
    }
}