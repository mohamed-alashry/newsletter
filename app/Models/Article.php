<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Article
 * @package App\Models
 * @version April 5, 2021, 1:36 pm UTC
 *
 * @property string $title
 * @property string $body
 * @property string $image
 */
class Article extends Model
{
    public $table = 'articles';


    public $fillable = [
        'font_family',
        'title',
        'subtitle',
        'body',
        'image',
        'link_text',
        'link',
        'content_title',
        'content_subtitle',
        // 'shape',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        // 'title' => 'required',
        // 'subtitle' => 'required',
        // 'body' => 'required',
        'image' => 'image|max:1000',
        // 'link_text' => 'required',
        // 'link' => 'required',
        // 'content_title' => 'required',
        // 'content_subtitle' => 'required',
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
     * Get all of the contents for the Article
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contents(): HasMany
    {
        return $this->hasMany(ArticleContent::class);
    }
}
