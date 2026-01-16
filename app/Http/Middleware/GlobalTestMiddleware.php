<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Post;
use DB;
use Illuminate\Support\Benchmark;
use Exception;

class GlobalTestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        $data = Post::select([

                    'user_id',
                     DB::raw("COUNT('id') as total_posts")
                ])
                
                ->with('user:id,name')
                ->whereYear('created_at',2026)
                ->groupBy('user_id')
                ->get();

        $map = Post::all()->map(function($post){

            return [

                'id' => $post->id,
                'title' => $post->title
            ];
        }); 

        //db transaction
        /*
        DB::transaction(function(){

            $post = Post::create(['title'=>'this is title','content'=>'this is content','status'=>1]);

            //throw new Exception("Error Processing Request", 1);
            
            $post->update(['user_id'=>1]);
        });
        

        dd('done');
        */
        /*Benchmark::dd([
            'Scenario 1' => fn () => Post::select([

                    'user_id',
                     DB::raw("COUNT('id') as total_posts")
                ])
                
                ->with('user:id,name')
                ->whereYear('created_at',2026)
                ->where('user_id',1)
                ->groupBy('user_id')
                ->get(), // 0.5 ms

            'Scenario 2' => fn () => Post::select([

                    'user_id',
                     DB::raw("COUNT('id') as total_posts")
                ])
                
                ->with('user:id,name')
                ->whereYear('created_at',2026)
                ->where('user_id',3)
                ->groupBy('user_id')
                ->lazy(), // 20.0 ms

            'Scenario 3' => fn () => Post::select([

                    'user_id',
                     DB::raw("COUNT('id') as total_posts")
                ])
                
                ->with('user:id,name')
                ->whereYear('created_at',2026)
                ->where('user_id',3)
                ->groupBy('user_id')
                ->cursor(), // 20.0 ms    
        ]); 
        */ 
        //dump('helo thiss comes from GlobalTestMiddleware');

        return $next($request);
    }
}
