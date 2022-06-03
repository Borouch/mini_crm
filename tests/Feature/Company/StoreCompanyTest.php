<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Role;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StoreCompanyTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_company_store_fail_with_image_dim_less_than_min()
    {
        $this->actingAs(Role::where('name', 'admin')->first()->users->first());

        $img = File::get(storage_path() . '\app\public\test\test1.png');
        $response = $this->post('/companies', ['logo' => $img,'name'=>'luna']);
        $response->assertSessionHasErrors('logo');
    }
}
