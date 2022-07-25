<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Events\UserUpdatedEvent;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function edit_displays_view()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('admin.profile.edit'));

        $response->assertOk();
        $response->assertViewIs('admin.profile.edit');
        $response->assertViewHas('user');
    }

    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\ProfileController::class,
            'update',
            \App\Http\Requests\Admin\UserUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_saves_and_redirects()
    {
        $user = factory(User::class)->create();
        $email = $this->faker->safeEmail;
        $name = 'test_name';
        $password = 'test_password';

        Event::fake();

        $response = $this->actingAs($user)
            ->put(route('admin.profile.update'), [
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

        $response->assertRedirect(route('admin.profile.edit'));

        $user = $users->first();

        Event::assertDispatched(UserUpdatedEvent::class, function ($event) use ($user) {
            return $event->user->is($user);
        });
    }
}
