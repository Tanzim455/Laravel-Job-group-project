<?php

namespace Tests\Feature;

use App\Models\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_company_can_register_using_registration_screen(): void
    {
        $response = $this->get('/company/register');
        $response->assertViewIs('company.create');
        $response->assertStatus(200);
    }
   public function test_company_can_register():void
   {
    $response = $this->post('/company/register', [
        'name' => 'Test Company',
        'email' => 'company@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ]);
    $this->assertEquals(1,Company::count());
   }

}
