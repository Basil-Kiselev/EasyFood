<?php

namespace App\Services\DTO;

class GetArticlesDTO
{
    public function __construct
    (
        private string $header,
        private string|null $text,
        private string $img,
        private string $alias,
        private string|null $articleCategory,
        private string $dateCreated,
    ){}

    /**
     * @return string
     */
    public function getHeader(): string
    {
        return $this->header;
    }

    /**
     * @param string $header
     * @return GetArticlesDTO
     */
    public function setHeader(string $header): GetArticlesDTO
    {
        $this->header = $header;
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
     * @return GetArticlesDTO
     */
    public function setImg(string $img): GetArticlesDTO
    {
        $this->img = $img;
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
     * @return GetArticlesDTO
     */
    public function setAlias(string $alias): GetArticlesDTO
    {
        $this->alias = $alias;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @param string|null $text
     * @return GetArticlesDTO
     */
    public function setText(?string $text): GetArticlesDTO
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getArticleCategory(): ?string
    {
        return $this->articleCategory;
    }

    /**
     * @param string|null $articleCategory
     * @return GetArticlesDTO
     */
    public function setArticleCategory(?string $articleCategory): GetArticlesDTO
    {
        $this->articleCategory = $articleCategory;
        return $this;
    }

    /**
     * @return string
     */
    public function getDateCreated(): string
    {
        return $this->dateCreated;
    }

    /**
     * @param string $dateCreated
     * @return GetArticlesDTO
     */
    public function setDateCreated(string $dateCreated): GetArticlesDTO
    {
        $this->dateCreated = $dateCreated;
        return $this;
    }
}
