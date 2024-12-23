<?php
//
//namespace App\Http\Middleware;
//
//use Closure;
//use Illuminate\Http\Request;
//use App\Events\UserOnlineCountUpdated;
//use Illuminate\Support\Facades\Redis;
//
//class TrackActiveUsers
//{
//    private $onlineDuration = 300; // 5 phút (thời gian timeout)
//
//    public function handle(Request $request, Closure $next)
//    {
//        $userId = auth()->check() ? 'user:' . auth()->id() : 'guest:' . $request->ip();
//
//        Redis::set($userId, now());
//        Redis::expire($userId, $this->onlineDuration);
//
//        $this->broadcastOnlineCount();
//
//        return $next($request);
//    }
//
//    private function broadcastOnlineCount()
//    {
//        $userKeys = Redis::keys('user:*');
//        $guestKeys = Redis::keys('guest:*');
//        $onlineCount = count($userKeys) + count($guestKeys);
//        broadcast(new UserOnlineCountUpdated($onlineCount));
//    }
//}
