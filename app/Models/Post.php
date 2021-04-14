<?php


namespace App\Models;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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

    public static function all()
    {
        return cache()->rememberForever( 'posts.all', function () {
            return collect( File::files( resource_path( "posts" ) ) )
                ->map(fn( $file ) => YamlFrontMatter::parseFile( $file ) )
                ->map(fn($document) => new Post(
                    $document->date,
                    $document->excerpt,
                    $document->title,
                    $document->body(),
                    $document->slug,
                ) )
                ->sortByDesc( 'date' );
        } );
    }

    public static function find($slug) {

        $post = static::all()->firstWhere('slug',$slug);

        if (! $post) {
            throw new ModelNotFoundException();
        }

        return $post;

    }
}
