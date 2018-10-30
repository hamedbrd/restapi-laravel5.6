<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryControllerTest extends TestCase
{
    public function testIndex()
    {
        //check for a list
        $response = $this->call('GET', 'api/v1/categories.json');
        $this->assertEquals(200, $response->status());

    }


    public function testShow()
    {

        $user = factory(\App\Models\Category::class)->create();


        $response = $this->call('GET', 'api/v1/category/' . $user->id . '.json');
        $this->assertEquals(200, $response->status());

    }

    public function testCreate() {


        $response = $this->call('POST', 'api/v1/category.json', [

            'title' => 'LG'.rand(500,99999),
            'user_id' => User::first()->id,
        ]);
        $this->assertEquals(201, $response->status());
    }

    public function testUpdate()
    {
        $user = factory(\App\Models\Category::class)->create();

        $response = $this->call('PUT', 'api/v1/category/' . $user->id . '.json', [

            'title' => 'test'.rand(1,99999)
        ]);
        $this->assertEquals(200, $response->status());

    }

    public function testDestroy()
    {

        $user = factory(\App\Models\Category::class)->create();


        $response = $this->call('DELETE', 'api/v1/category/50000.json');
        $this->assertEquals(404, $response->status());

        $response = $this->call('GET', 'api/v1/category/' . $user->id . '.json');
        $this->assertEquals(200, $response->status());

    }
}
