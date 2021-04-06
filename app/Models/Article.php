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
        'title',
        'body',
        'image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'body' => 'string',
        'image' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'body' => 'required',
        'image' => 'required|image'
    ];

    public function setImageAttribute($file)
    {
        if ($file) {
            $originalName = $file->getClientOriginalName();

            $fileName = time() .'_'. $originalName;

            $file->move('uploads/', $fileName);

            $this->attributes['image'] = $fileName;
        }
    }

    public function getImageAttribute($fileName)
    {
        return $fileName ? asset('uploads/'.  $fileName) : null;
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
