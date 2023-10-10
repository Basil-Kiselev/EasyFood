<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property string $code
 * @property HasMany|Collection|Article[] $articles
 */
class ArticleCategory extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return ArticleCategory
     */
    public function setName(string $name): ArticleCategory
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return ArticleCategory
     */
    public function setCode(string $code): ArticleCategory
    {
        $this->code = $code;
        return $this;
    }
}
