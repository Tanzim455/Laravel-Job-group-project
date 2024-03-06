<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Company\Auth\Login;
use App\Models\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class CompanyLoginTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_company_login_component_exists()
    {
        Livewire::test(Login::class)
            ->assertStatus(200);
    }

    public function test_dashboard_can_only_be_visited_by_authenticated_companies()
    {
        $this->withoutExceptionHandling();
        $company = Company::factory()->create();

        $response = Livewire::test(Login::class)
            ->set('email', $company->email)
            ->set('password', 'password')
            ->call('companylogin');

        Livewire::actingAs($company);

        $response->assertRedirect('company/dashboard');

    }
}
