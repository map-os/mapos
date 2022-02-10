<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Events\UserCreatedEvent;
use App\Events\UserUpdatedEvent;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Admin\UserController
 */
class UserControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $loggedUser = factory(User::class)->create();
        $users = factory(User::class, 3)->create();

        $response = $this->actingAs($loggedUser)->get(route('admin.users.index'));

        $response->assertOk();
        $response->assertViewIs('admin.users.index');
        $response->assertSeeLivewire('users.index');
    }

    /**
     * @test
     */
    public function create_displays_view()
    {
        $loggedUser = factory(User::class)->create();
        $response = $this->actingAs($loggedUser)->get(route('admin.users.create'));

        $response->assertOk();
        $response->assertViewIs('admin.users.create');
        $response->assertViewHas('user');
    }

    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\UserController::class,
            'store',
            \App\Http\Requests\Admin\UserStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $loggedUser = factory(User::class)->create();
        $email = $this->faker->safeEmail;
        $name = 'test_name';
        $password = 'test_password';

        Event::fake();

        $response = $this
            ->actingAs($loggedUser)
            ->post(route('admin.users.store'), [
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'password_confirmation' => $password,
            ]);

        $response->assertStatus(302);

        $users = User::query()
            ->where('name', $name)
            ->where('email', $email)
            ->get();
        $this->assertCount(1, $users);

        $response->assertRedirect(route('admin.users.index'));

        $user = $users->first();

        Event::assertDispatched(UserCreatedEvent::class, function ($event) use ($user) {
            return $event->user->is($user);
        });
    }

    /**
     * @test
     */
    public function show_displays_view()
    {
        $loggedUser = factory(User::class)->create();
        $user = factory(User::class)->create();

        $response = $this->actingAs($loggedUser)->get(route('admin.users.show', $user));

        $response->assertOk();
        $response->assertViewIs('admin.users.show');
        $response->assertViewHas('user');
    }

    /**
     * @test
     */
    public function edit_displays_view()
    {
        $loggedUser = factory(User::class)->create();
        $user = factory(User::class)->create();

        $response = $this->actingAs($loggedUser)->get(route('admin.users.edit', $user));

        $response->assertOk();
        $response->assertViewIs('admin.users.edit');
        $response->assertViewHas('user');
    }

    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\UserController::class,
            'update',
            \App\Http\Requests\Admin\UserUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_saves_and_redirects()
    {
        $loggedUser = factory(User::class)->create();
        $user = factory(User::class)->create();
        $email = $this->faker->safeEmail;
        $name = 'test_name';
        $password = 'test_password';

        Event::fake();

        $response = $this->actingAs($user)
            ->put(route('admin.users.update', $user), [
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'password_confirmation' => $password,
            ]);

        $response->assertStatus(302);

        $users = User::query()
            ->where('name', $name)
            ->where('email', $email)
            ->get();
        $this->assertCount(1, $users);

        $response->assertRedirect(route('admin.users.index'));

        $user = $users->first();

        Event::assertDispatched(UserUpdatedEvent::class, function ($event) use ($user) {
            return $event->user->is($user);
        });
    }
}
