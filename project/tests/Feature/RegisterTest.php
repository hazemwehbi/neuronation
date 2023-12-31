<?php

namespace Tests\Unit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class RegisterTest extends TestCase
{
    /**
     * A registration form can be displayed.
     *
     * @return void
     */
    public function testRegisterFormDisplayed()
    {
        $response = $this->get('/register');
        $response->assertSuccessful();
        $response->assertViewIs('auth.register');
        $response->assertStatus(200);
        $this->assertGuest();
    }
    /**
     * A valid user can be registered.
     *
     * @return void
     */
    public function testRegistersAValidUser()
    {

        $faker = \Faker\Factory::create();
        
        $response = $this->post('register', [
            'name' => $faker->name,
            'email' => $faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => 'password',
            'remember_token' => \Str::random(10),
        ]);
        
        $response->assertStatus(302);
    }
    /**
     * An invalid user is not registered.
     *
     * @return void
     */
    public function testDoesNotRegisterAnInvalidUser()
    {

                $faker = \Faker\Factory::create();
        
        $response = $this->post('register', [
            'name' => $faker->name,
            'email' => $faker->unique()->safeEmail,
            'password' => '12', 
        ]);
        
        $response->assertSessionHasErrors();
        $this->assertGuest();

    }
}
