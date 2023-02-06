<?php

namespace Tests\Feature\Http\Controllers\backend;

use App\Models\Adress;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class adressControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_adress_index_page()
    {
        $response = $this->get('/users/2/adresses');
        $response->assertStatus(200);
    }
    public function test_adress_url_goes_to_correct_view()
    {
        $response = $this->get('/users/2/adresses');
        $response->assertViewIs('backend.adresses.index');
    }
    public function test_adress_ceate_form_page_status()
    {
        $response = $this->get('/users/2/adresses/create');
        $response->assertOk();
    }
    public function test_users_create_form_goes_to_correct_view()
    {
        $response = $this->get('/users/2/adresses/create');
        $response->assertViewIs('backend.adresses.insertForm');
    }
    public function test_adress_new_resource_is_created()
    {
        $adrs = Adress::factory()->make();
        $data = $adrs->toArray();
        // $data = [
        //     "name" => "kamil sulak",
        //     "email" => "sulak@gmail.com",
        //     "password" => "12345678",
        //     "password_confirmation" => "12345678",
        //     "is_admin" => 1,
        //     "is_active" => 0
        // ];
        $response = $this->post('/users/2/adresses', $data);
        $response->assertRedirect('/users/2/adresses');
    }
    public function test_existing_resource_is_update()
    {
        $enttity = Adress::All()->last();
        $enttity->city = 'CITY ' . $enttity->city;
        $enttity->district = 'DISTRICT ' . $enttity->district;
        $data = $enttity->toArray();

        $response = $this->put('/users/2/adresses', $enttity->adress_id, $data);
        $response->assertRedirect('/users/2/adresses');
    }
    public function test_users_latest_user_is_delete()
    {
        $enttity = Adress::All()->last();
        $id = $enttity->adress_id;

        $response = $this->delete('/users/2/adresses', $id);
        $response->assertOk();
        $response->assertJson(["message" => "Done", "id" => $id]);
        $this->assertSoftDeleted($enttity);
    }
}