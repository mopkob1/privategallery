<?php
/**
 * Created by PhpStorm.
 * User: mopkob
 * Date: 03.01.16
 * Time: 22:19
 */

namespace Entities;


/**
 * @Entity
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="type", type="string")
 * @DiscriminatorMap({"article" = "Article", "post" = "Post"})
 */
class Article {
    /**
     * @Column(name="id", type="integer")
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @OneToMany(targetEntity="Comment", mappedBy="article")
     */
    protected $comments;
    /**
     * @Column(type="string")
     */
    protected $fromArt;
} 