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
    public function get_category_test()
    {
        $response = $this->get('/api/category');

        $response->assertStatus(200);
    }

    public function get_category_by_id_test()
    {
        $response = $this->get('/api/category/1');

        $response->assertStatus(200);
    }

    public function create_category_test()
    {
        $response = $this->post('/api/category',[
            "name"=> "test"
        ]);
        
        $response->assertStatus(200);
    }

    public function delete_category_test()
    {
        $response = $this->delete('/api/category/1');
        
        $response->assertStatus(200);
    }

    
}
