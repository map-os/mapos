<?php

namespace Tests\Feature\Http\Livewire\Users;

use App\Http\Livewire\Users\Index;
use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Pagination\LengthAwarePaginator;
use JMac\Testing\Traits\AdditionalAssertions;
use Livewire\Livewire;
use Tests\TestCase;

/**
 * @see \App\Http\Livewire\Services\Index
 */
class IndexTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function it_can_see_initial_data()
    {
        $loggedUser = factory(User::class)->create();
        $users = factory(User::class, 10)->create();

        $this->actingAs($loggedUser);

        Livewire::test(Index::class)
            ->assertViewHas('users', function (LengthAwarePaginator $paginator) use ($users) {
                return empty($users->diff($paginator->items())->toArray());
            });
    }

    /**
     * @test
     */
    public function it_can_search_services_by_name()
    {
        $loggedUser = factory(User::class)->create();
        [$userToSearch] = factory(User::class, 10)->create();

        $this->actingAs($loggedUser);

        Livewire::test(Index::class)
            ->set('search', $userToSearch->name)
            ->assertViewHas('users', function (LengthAwarePaginator $paginator) use ($userToSearch) {
                $searchResults = collect($paginator->items());

                return count($searchResults) === 1 && $searchResults->first()->is($userToSearch);
            });
    }

    /**
     * @test
     */
    public function destroy_deletes()
    {
        $loggedUser = factory(User::class)->create();
        $user = factory(User::class)->create();

        $this->actingAs($loggedUser);

        Livewire::test(Index::class)
            ->call('destroy', $user->getKey());

        $this->assertDatabaseMissing('users', ['id' => $user->getKey()]);
    }
}
