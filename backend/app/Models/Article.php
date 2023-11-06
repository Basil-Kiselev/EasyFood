<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $article_category_id
 * @property string $header
 * @property string $text
 * @property string $alias
 * @property string $img
 * @property DateTimeInterface $created_at
 * @property BelongsTo|ArticleCategory $articleCategory
 */
class Article extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function articleCategory(): BelongsTo
    {
        return $this->belongsTo(ArticleCategory::class);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getArticleCategoryId(): int
    {
        return $this->article_category_id;
    }

    /**
     * @param int $article_category_id
     * @return Article
     */
    public function setArticleCategoryId(int $article_category_id): Article
    {
        $this->article_category_id = $article_category_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getHeader(): string
    {
        return $this->header;
    }

    /**
     * @param string $header
     * @return Article
     */
    public function setHeader(string $header): Article
    {
        $this->header = $header;
        return $this;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return Article
     */
    public function setText(string $text): Article
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return string
     */
    public function getAlias(): string
    {
        return $this->alias;
    }

    /**
     * @param string $alias
     * @return Article
     */
    public function setAlias(string $alias): Article
    {
        $this->alias = $alias;
        return $this;
    }

    /**
     * @return string
     */
    public function getImg(): string
    {
        return $this->img;
    }

    /**
     * @param string $img
     * @return Article
     */
    public function setImg(string $img): Article
    {
        $this->img = $img;
        return $this;
    }

    /**
     * @return DateTimeInterface
     */
    public function getCreatedAt(): DateTimeInterface
    {
        return $this->created_at;
    }
}
