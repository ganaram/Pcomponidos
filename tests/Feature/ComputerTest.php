<?php
namespace Tests\Feature;
use App\Computer;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
class ComputerTest extends TestCase
{
    use DatabaseTransactions;
    /** @test */
    public function check_if_computer_list_loads()
    {
        $response = $this->get('/computers');
        
        $response->assertSeeText('More Info');
    }
    /** @test */
    public function check_if_user_logins()
    {
        $this->actingAs( factory('App\User')->create() );

        $this->get('/computers')
            ->assertOk()
            ->assertSee('logout');
    }
    /** @test */
    public function check_if_a_guest_user_creates_a_computer()
    {
        $this->get('/computers/create')
            ->assertRedirect('/login');
    }
    /** @test */
    public function check_if_a_user_can_load_create_computer_form()
    {
        $this->actingAs( factory('App\User')->create() );
        $this->get('/computers/create')
            ->assertOk()
            ->assertSee('Create!');
    }
    /** @test */
    public function check_if_component_list_loads()
    {
        $response = $this->get('/components');
        
        $response->assertSeeText('More Info');
    }
    
    /**@test */
    public function check_if_a_component_is_created(){

        $this->actingAs( factory('App\User')->create() );

        $component = factory('App\component')->create();

        $this->post('/components', $component->toArray() );
        $this->assertDatabaseHas('components', [
            'name'            => $component->name,
            'info'            => $component->info,
            'type'            => $component->type
        ]);
    }

} 