<?php declare(strict_types=1);

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

use App\Models\Forum;

class LatestForumsComponent extends Component
{
    public $latest_forums;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->latest_forums = Forum::select('slug', 'title', 'created_at', 'user_id', 'description')
                                    ->where('is_active',1)
                                    ->orderBy('created_at','DESC')
                                    ->paginate(5);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render(): View
    {
        return view('components.latest-forums-component');
    }
}
