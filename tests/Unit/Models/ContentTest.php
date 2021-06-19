<?php

namespace Tests\Unit\Model;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;
use App\Models\Content;

class ContentTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function getContents(){
        $content = new Content();
        $contents = $content->getContents();

        $idx = 1;
        foreach($contents as $content){
            $this->assertSame($idx++, $content->contents_id);
        }
    }

    /**
     * @test
     */
    public function getContent(){
        $content = new Content();
        $contents = $content->getContents();

        $this->assertSame(1, $contents->first()->contents_id);
    }

    /**
     * @test
     */
    public function registerContent(){
        $content = new Content();
        $content->step_id = '1';
        $content->contents_name = 'test';
        $content->youtube_video_id = 'aaabbb';
        $content->contents_text = 'testtest';
        $content->del_flg = false;

        $this->assertTrue($content->save());
    }
}
