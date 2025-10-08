<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

use App\Models\Forum;

class IndexController extends Controller
{
    public function index(): View
    {
        $latest_forums = Forum::select('slug', 'title', 'created_at', 'user_id', 'description')
                                ->withCount(['topics' => function($query) {
                                    $query->where('is_active', true);
                                }])
                                ->where('is_active',true)
                                ->orderBy('created_at','DESC')
                                ->paginate(5);

        return view('index',compact('latest_forums'));
    }

    public function about(): View
    {
        return view('about');
    }

    public function contact(): View
    {
        return view('contact');
    }
}
