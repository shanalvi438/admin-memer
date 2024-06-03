<?php

use Illuminate\Support\Facades\DB;
use Spatie\Tags\Tag;

function _removeUnnecessaryTags(): void
{
    $tags = Tag::all();

    foreach ($tags as $tag) {
        $tag_relation_exist = DB::table('taggables')->where('tag_id', $tag->id)->first();
        if (! $tag_relation_exist) {
            $tag->delete();
        }
    }
}
