<?php

namespace App\Http\Livewire\Warrantys;

use App\Models\Warranty;
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
        return view('livewire.warrantys.index', [
            'warrantys' => Warranty::where('ref_warranty', 'like', $this->search . '%')->paginate(10),
        ]);
    }

    public function destroy($id)
    {
        if (!$id) {
            return;
        }

        Warranty::query()->where('id', $id)->delete();
        session()->flash('alert-success', __('messages.deleted_success'));
    }
}
