<?php

namespace App\Http\Middleware;

use Auth;
use Cache;
use Closure;
use Illuminate\Database\QueryException;
use App\Models\HttpRequestLog as RequestLog;

class RequestLogger {

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request        	
     * @param \Closure $next        	
     * @return mixed
     */
    public function handle($request, Closure $next, $type) {
        $response = $next($request);
        try {
            if (config('blog.request_log_enabled')) {
                RequestLog::create([
                    'type' => $type,
                    'ip' => ip2long($request->ip()),
                    'url' => $request->url(),
                    'user_id' => Auth::user() ? Auth::user()->id : null,
                    'request_body' => json_encode($request->input()),
                    'request_method' => $request->method(),
                    'responded_with' => $response->status(),
                    'user_agent' => $request->header('User-Agent'),
                    'success' => $response->status() === 200
                ]);
            }
            // Store user id to check user is currently online
            if (Auth::check() or $request->user()) {
                $user = $request->user();
                // store into cache
                $expiresAt = \Carbon::now()->addMinutes(5);
                Cache::put('user-is-online-' . $user->id, true, $expiresAt);
                // Update in DB
                $user->last_activity_at = \Carbon::now();
                $user->save();
            }
        } catch (QueryException $e) {
            
        }
        return $response;
    }

}
