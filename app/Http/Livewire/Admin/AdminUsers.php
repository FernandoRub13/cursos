<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class AdminUsers extends Component 
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;

    public function render()
    {
        $users = User::where('name', 'LIKE', '%'.$this->search.'%')
        ->orWhere('email', 'LIKE', '%'.$this->search.'%')
        ->paginate(15);
        return view('livewire.admin.users-index', compact('users'));
    }

    public function limpiar_page()
    {
        $this->resetPage('page');
    }

}
