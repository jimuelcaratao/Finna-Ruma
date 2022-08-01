<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Search extends Component
{
    public $listings;
    public $categories;
    public $search;

    public function mount()
    {
        $this->resetSearch();
    }
    public function resetSearch()
    {
        $this->search = '';
        $this->listings = [];
        $this->categories = [];
    }

    public function updatedSearch()
    {

        $this->listings = DB::table('listings')
            ->where('listing_status', 'Approved')
            ->where('listing_title', 'like', '%' . $this->search . '%')
            ->get();

        $this->categories = DB::table('categories')
            ->where('category_name', 'like', '%' . $this->search . '%')
            ->get();
    }

    public function render()
    {
        return view('livewire.search');
    }
}
