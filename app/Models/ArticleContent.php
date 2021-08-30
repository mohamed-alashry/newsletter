<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class ArticleContent
 * @package App\Models
 * @version April 5, 2021, 2:21 pm UTC
 *
 * @property integer $article_id
 * @property string $title
 * @property string $body
 * @property string $image
 * @property integer $sort
 * @property string $link
 */
class ArticleContent extends Model
{
    public $table = 'article_contents';




    public $fillable = [
        'article_id',
        'title',
        'body',
        'image',
        'sort',
        'link',
        'shape',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'article_id' => 'integer',
        'title' => 'string',
        'body' => 'string',
        'image' => 'string',
        'sort' => 'integer',
        'link' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        // 'title' => 'required',
        // 'body' => 'required',
        'image' => 'image|max:1000'
    ];

    public function setImageAttribute($file)
    {
        if ($file) {
            $fileName = time();

            $file->move('uploads/', $fileName);

            $this->attributes['image'] = $fileName;
        }
    }

    public function getImageAttribute($fileName)
    {
        return $fileName ? asset('uploads/' .  $fileName) : null;
    }

    /**
     * Get the article that owns the ArticleContent
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }
}
