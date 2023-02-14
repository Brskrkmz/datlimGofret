<?php

namespace Tests\Feature\Http\Controllers\backend;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\category;

class categoryControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_users_index_page_status()
    {
        $response = $this->get('/categories');

        $response->assertOk();
    }
    public function test_users_index_url_goes_to_correct_view()
    {
        $response = $this->get('/categories');

        $response->assertViewIs('backend.categories.index');
    }
    public function test_users_ceate_form_page_status()
    {
        $response = $this->get('/categories/create');
        $response->assertOk();
    }
    public function test_users_create_form_goes_to_correct_view()
    {
        $response = $this->get('/categories/create');
        $response->assertViewIs('backend.categories.insertForm');
    }
    public function test_users_new_resource_is_created()
    {
        $data = [
            "name" => "Deneme Kategorisi",
            "slug" => "deneme-kategorisi"
        ];
        $response = $this->post('/categories', $data);
        $response->assertRedirect('/categories');
    }
    public function test_users_existing_user_is_update()
    {
        $entity = category::All()->last();
        $entity->name = 'UPDATED' . $entity->name;
        $entity->slug = 'UPDATED' . $entity->slug;
        $data = $entity->toArray();

        $response = $this->put('/categories', $entity->category_id, $data);
        $response->assertRedirect('/categories');
    }
    public function test_users_latest_user_is_delete()
    {
        $entity = category::All()->last();
        $category_id = $entity->category_id;

        $response = $this->delete('/categories', $category_id);
        $response->assertOk();
        $response->assertJson(["message" => "Done", "id" => $category_id]);
        $this->assertDeleted($entity);
    }
}