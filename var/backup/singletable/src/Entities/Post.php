<?php
/**
 * Created by PhpStorm.
 * User: mopkob
 * Date: 03.01.16
 * Time: 22:21
 */

namespace Entities;



use Entities\Article;

/**
 * @Entity
 */
class Post extends  Article {
    /**
     * @Column(type="string")
     */
    protected $fromPost;
} 