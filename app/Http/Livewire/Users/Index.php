<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.users.index', [
            'users' => User::where('id', '<>', auth()->user()->id)
                ->where('name', 'like', $this->search.'%')->paginate(10),
        ]);
    }

    public function destroy($id)
    {
        if (! $id) {
            return;
        }

        User::query()->where('id', $id)->delete();
        session()->flash('alert-success', __('messages.deleted_success'));
    }
}
