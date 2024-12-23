<?php

namespace App\Http\Controllers;

use App\Events\PageViewUpdated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageView extends Controller
{
    public function index()
    {
        // Lấy trang hiện tại
        $page = request()->path(); // Ví dụ "/home"

        // Tăng lượt truy cập
        DB::table('page_views')->updateOrInsert(
            ['page' => $page],
            ['views' => DB::raw('views + 1'), 'updated_at' => now()]
        );
        $views = DB::table('page_views')->where('page', $page)->value('views');

        // Phát sự kiện
        broadcast(new PageViewUpdated($page, $views))->toOthers();
    }
}
