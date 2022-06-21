<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_category()
    {
        $response = $this->get('/api/category');

        $response->assertStatus(200);
    }

    public function test_get_category_by_id()
    {
        $response = $this->get('/api/category/1');

        $response->assertStatus(200);
    }

    public function test_create_category()
    {
        $response = $this->post('/api/category',[
            "name"=> "test"
        ]);
        
        $response->assertStatus(200);
    }

    public function test_delete_category()
    {
        $response = $this->delete('/api/category/1');
        
        $response->assertStatus(200);
    }

    
}
