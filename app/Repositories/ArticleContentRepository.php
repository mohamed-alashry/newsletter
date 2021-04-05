<?php

namespace App\Repositories;

use App\Models\ArticleContent;
use App\Repositories\BaseRepository;

/**
 * Class ArticleContentRepository
 * @package App\Repositories
 * @version April 5, 2021, 2:21 pm UTC
*/

class ArticleContentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'article_id',
        'title',
        'body',
        'image',
        'sort',
        'link'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ArticleContent::class;
    }
}
