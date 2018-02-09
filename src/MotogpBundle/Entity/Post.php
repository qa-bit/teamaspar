<?php

namespace MotogpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MotogpBundle\Entity\Traits\ContentTrait;
use MotogpBundle\Entity\Traits\InCategoriesTrait;
use MotogpBundle\Entity\Traits\InModalityTrait;
use MotogpBundle\Entity\Traits\HasMediaTrait;
use MotogpBundle\Entity\Traits\HasMediaGalleryTrait;

/**
 * Post
 *
 * @ORM\Table(name="post")
 * @ORM\Entity(repositoryClass="MotogpBundle\Repository\PostRepository")
 */
class Post
{
    use ContentTrait, InCategoriesTrait, InModalityTrait, HasMediaTrait, HasMediaGalleryTrait {
        InCategoriesTrait::__construct as inCategoriesTraitConstructor;
    }

    public function __construct()
    {
        $this->inCategoriesTraitConstructor();
    }
}