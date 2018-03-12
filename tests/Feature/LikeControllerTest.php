<?php

namespace Tests\Feature;

use App\Chusqer;
use App\User;
use App\Like;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LikeControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testStore()
    {
        $user = factory(User::class, 1)->create()->first();
        $chusqer = factory(Chusqer::class,1)->create([
            'user_id'=> $user->id
        ])->first();
        $response = $this->actingAs($user)->post
        ('chusqers/like/' . $chusqer->id);

        $response->assertStatus(302);
    }

    public function testShow(){
        $user = factory(User::class, 1)->create()->first();
        $chusqer = factory(Chusqer::class,1)->create([
            'user_id'=> $user->id
        ])->first();
        $like = Like::create([
            'chusqer_id'=>$chusqer->id,
            'user_id'=>$user->id
        ]);

        $this->assertDatabaseHas('likes',[
            'chusqer_id'=>$chusqer->id,
            'user_id'=>$user->id
        ]);

    }

    public function testDelete(){
        $user = factory(User::class, 1)->create()->first();
        $chusqer = factory(Chusqer::class,1)->create([
            'user_id'=> $user->id
        ])->first();
        $like = Like::create([
            'chusqer_id'=>$chusqer->id,
            'user_id'=>$user->id
        ]);

       $this->actingAs($user)->delete
        ('chusqers/like/' . $chusqer->id);

        $this->assertDatabaseMissing('likes',[
            'chusqer_id'=>$chusqer->id,
            'user_id'=>$user->id
        ]);
    }

}
