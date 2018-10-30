<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductControllerTest extends TestCase
{
    public function testIndex()
    {
        //check for a list
        $response = $this->call('GET', 'api/v1/products.json');
        $this->assertEquals(200, $response->status());

    }


    public function testShow()
    {

        $user = factory(\App\Models\Product::class)->create();


        $response = $this->call('GET', 'api/v1/product/' . $user->id . '.json');
        $this->assertEquals(200, $response->status());

    }

    public function testCreate() {


        $response = $this->call('POST', 'api/v1/product.json', [

            'name' => 'LG'.rand(500,99999),
            'price' => 12000,
            'user_id' => User::first()->id,
            'cat_ids' => [Category::first()->id]
        ]);
        $this->assertEquals(201, $response->status());
    }

    public function testUpdate()
    {
        $user = factory(\App\Models\Product::class)->create();

        $response = $this->call('PUT', 'api/v1/product/' . $user->id . '.json', [

            'name' => 'test'.rand(1,99999),
            'price' => '12000'
        ]);
        $this->assertEquals(200, $response->status());

    }

    public function testDestroy()
    {

        $user = factory(\App\Models\Product::class)->create();


        $response = $this->call('DELETE', 'api/v1/product/50000.json');
        $this->assertEquals(404, $response->status());

        $response = $this->call('GET', 'api/v1/product/' . $user->id . '.json');
        $this->assertEquals(200, $response->status());

    }
}
