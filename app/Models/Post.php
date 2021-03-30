<?php


namespace App\Models;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post {

    public $date;
    public $excerpt;
    public $title;
    public $body;
    public $slug;


    public function __construct( $date, $excerpt, $title, $body, $slug ) {
        $this->date    = $date;
        $this->excerpt = $excerpt;
        $this->title   = $title;
        $this->body    = $body;
        $this->slug    = $slug;
    }

    public static function all() {
        return collect(File::files(resource_path('posts')))
            ->map(function ($file) {
                $document = \Spatie\YamlFrontMatter\YamlFrontMatter::parseFile($file);

                return new Post(
                    $document->date,
                    $document->excerpt,
                    $document->title,
                    $document->body(),
                    $document->slug,
                );
            });
    }

    public static function find($slug) {

        return static::all()->firstWhere('slug',$slug);

    }
}
