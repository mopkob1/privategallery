<?php
/**
 * Created by PhpStorm.
 * User: mopkob
 * Date: 03.01.16
 * Time: 22:24
 */

namespace Entities;

/**
 * @Entity
 */
class Comment {
    /**
     * @Column(name="id", type="integer")
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @ManyToOne(targetEntity="Article", inversedBy="comments")
     */
    protected $article;
} 