<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminAuthorizationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_admin_access_fail_when_user_not_admin()
    {

        $this->actingAs(User::where('email','demo@demo.com')->first());
        $response = $this->get('companies/');
        $response->assertStatus(403);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_admin_access_success_when_user_is_admin()
    {
        $this->actingAs(Role::where('name', 'admin')->first()->users->first());
        $response = $this->get('companies/');
        $response->assertStatus(200);
    }
}
