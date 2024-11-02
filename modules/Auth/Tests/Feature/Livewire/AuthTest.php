<?php

namespace Modules\Auth\Tests\Feature\Livewire;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Modules\Auth\Livewire\AuthFormComponent;
use Modules\Auth\Models\User;
use Modules\Kanban\Models\Project;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function redirect_unauthenticated_user()
    {
        $this->get('/')
            ->assertRedirect(route('login'));
    }

    #[Test]
    public function renders_successfully()
    {
        $project = Project::factory()->create();

        Livewire::test(AuthFormComponent::class, ['projectId' => $project->getKey()])
            ->assertOk();
    }

    #[Test]
    public function user_enter_invalid_credentials()
    {
        $email = 'testuser@test.com';
        $password = 'testpass';

        $user = User::factory()
            ->emailAttribute($email)
            ->passwordAttribute($password)
            ->create();

        Livewire::test(AuthFormComponent::class)
            ->set('email', 'mymail')
            ->call('submit')
            ->assertHasErrors('email');

        Livewire::test(AuthFormComponent::class)
            ->set('password', '12')
            ->call('submit')
            ->assertHasErrors([
                'email' => 'required',
                'password' => 'min:6',
            ]);

        Livewire::test(AuthFormComponent::class)
            ->set('email', $email)
            ->set('password', 'invalidPassword__$^&*((###1')
            ->call('submit')
            ->assertHasNoErrors()
            ->assertOk();
    }

    #[Test]
    public function user_enter_valid_credentials()
    {
        $email = 'testuser@test.com';
        $password = 'testpass';

        $user = User::factory()
            ->emailAttribute($email)
            ->passwordAttribute($password)
            ->create();

        Livewire::test(AuthFormComponent::class)
            ->set('email', $email)
            ->set('password', $password)
            ->call('submit')
            ->assertHasNoErrors()
            ->assertOk();
    }
}
