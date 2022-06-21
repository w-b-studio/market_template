<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_product()
    {
        $response = $this->get('/api/product');

        $response->assertStatus(200);
    }

    public function test_create_product()
    {
        $response = $this->post('/api/product',[
            "name" => "test",
            "price" => 25000,
            "category" => "test",
            "first_char" => "test",
            "second_char" => "test",
            "third_char" => "test",
            "fourth_char" => "test",
            "fivth_char" => "test"
        ]);
        
        $response->assertStatus(200);
    }

    public function test_delete_product()
    {
        $response = $this->delete('/api/product/1');
        
        $response->assertStatus(200);
    }
}
