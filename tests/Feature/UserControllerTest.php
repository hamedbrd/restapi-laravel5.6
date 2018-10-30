<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Support\Facades\App;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserControllerTest extends TestCase
{

    public function testIndex()
    {
        //check for a list
        $response = $this->call('GET', 'api/v1/users.json');
        $this->assertEquals(200, $response->status());

    }


    public function testShow()
    {

        $user = factory(\App\Models\User::class)->create();


        $response = $this->call('GET', 'api/v1/user/' . $user->id . '.json');
        $this->assertEquals(200, $response->status());

    }

    public function testCreate() {
        $response = $this->call('POST', 'api/v1/user.json', [

            'email' => rand(1,99999).'newq@new.com',
            'name' => 'new'.rand(1,99999),
            'password' => '123456'
        ]);
        $this->assertEquals(201, $response->status());
    }

    public function testUpdate()
    {
        $user = factory(\App\Models\User::class)->create();

        $response = $this->call('PUT', 'api/v1/user/' . $user->id . '.json', [

            'email' => 'newq@new.com'.rand(1,99999),
            'name' => 'new',
            'password' => '123456'
        ]);
        $this->assertEquals(200, $response->status());

    }

    public function testDestroy()
    {

        $user = factory(\App\Models\User::class)->create();


        $response = $this->call('DELETE', 'api/v1/user/50000.json');
        $this->assertEquals(404, $response->status());

        $response = $this->call('GET', 'api/v1/user/' . $user->id . '.json');
        $this->assertEquals(200, $response->status());

    }
}
