<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Event;

class EventFilter extends Component
{
    use WithPagination;

    public $viewMode = 'user';
    public $perPage = 4;
    public $search = '';
    public $title = '';
    public $region = '';
    public $event_format = '';
    public $audience_scope = '';

    protected $paginationTheme = 'bootstrap';

    protected $queryString = [
        'search' => ['except' => ''],
        'title'  => ['except' => ''],
        'region' => ['except' => ''],
        'event_format' => ['except' => ''],
        'audience_scope' => ['except' => '']
    ];

    public function mount($viewMode = 'user')
    {
        $this->viewMode = $viewMode;
    }

    public function updated($propertyName)
    {
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->reset(['search', 'title', 'region','event_format', 'audience_scope']);
        $this->resetPage();
    }

    public function render()
    {
        $events = Event::query()
            ->withCount('participants')
            ->when($this->title, fn($query) => $query->where('title', 'like', $this->title . '%'))
            ->when($this->search, fn($query) => $query->search(trim($this->search)))
            ->when($this->region, fn($query) => $query->where('region', $this->region))
            ->when($this->event_format, fn($query) => $query->where('event_format', $this->event_format))
            ->when($this->audience_scope, fn($query) => $query->where('audience_scope', $this->audience_scope))
            ->orderBy('id', 'desc')
            ->paginate($this->perPage);

        return view('livewire.event-filter', [
            'events' => $events,
            'viewMode' => $this->viewMode,
        ]);
    }
}
