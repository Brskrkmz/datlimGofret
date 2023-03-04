<?php

namespace Tests\Feature\Http\Controllers\backend;

use App\Models\Adress;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class productsImageControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_adress_index_page()
    {
        $response = $this->get('/productImages/2/images');
        $response->assertStatus(200);
    }
    public function test_adress_url_goes_to_correct_view()
    {
        $response = $this->get('/productImages/2/images');
        $response->assertViewIs('backend.images.index');
    }
    public function test_adress_ceate_form_page_status()
    {
        $response = $this->get('/productImages/2/images/create');
        $response->assertOk();
    }
    public function test_users_create_form_goes_to_correct_view()
    {
        $response = $this->get('/productImages/2/images/create');
        $response->assertViewIs('backend.images.insertForm');
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
        $response = $this->post('/productImages/2/images', $data);
        $response->assertRedirect('/productImages/2/images');
    }
    public function test_existing_resource_is_update()
    {
        $enttity = Adress::All()->last();
        $enttity->city = 'CITY ' . $enttity->city;
        $enttity->district = 'DISTRICT ' . $enttity->district;
        $data = $enttity->toArray();

        $response = $this->put('/productImages/2/images', $enttity->adress_id, $data);
        $response->assertRedirect('/productImages/2/images');
    }
    public function test_users_latest_user_is_delete()
    {
        $enttity = Adress::All()->last();
        $id = $enttity->adress_id;

        $response = $this->delete('/productImages/2/images', $id);
        $response->assertOk();
        $response->assertJson(["message" => "Done", "id" => $id]);
        $this->assertSoftDeleted($enttity);
    }
}