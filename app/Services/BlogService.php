<?php

namespace App\Services;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Services\DTO\GetArticlesDTO;
use Illuminate\Database\Eloquent\Collection;

class BlogService
{
    private const COUNT_ARTICLES_MAIN_PAGE = 3;
    private const COUNT_RECOMMEND_ARTICLES = 3;
    private const COUNT_RECENT_ARTICLES = 3;

    public function composeGetArticlesDTO(Article $article): GetArticlesDTO
    {
        return new GetArticlesDTO(
            header: $article->getHeader(),
            text: $article->getText(),
            img: $article->getImg(),
            alias:$article->getAlias(),
            articleCategory: $article->articleCategory->getName(),
            dateCreated: date_format($article->getCreatedAt(), 'o-F-d'),
        );
    }

    public function getArticlesMainPage(): array
    {
        $articles = Article::query()->inRandomOrder()->limit(self::COUNT_ARTICLES_MAIN_PAGE)->get();
        $dto = [];

        /** @var Article $article */
        foreach ($articles as $article) {
            $dto[] = $this->composeGetArticlesDTO($article);
        }

        return $dto;
    }

    public function getArticle(string $alias): GetArticlesDTO
    {
        /** @var Article $article */
        $article = Article::query()->where('alias', $alias)->first();

        return $this->composeGetArticlesDTO($article);
    }

    public function getArticleCategories(): Collection
    {
        return ArticleCategory::has('articles')->get();
    }

    public function getRecentArticles(): array
    {
        $recentArticles = Article::query()->orderBy('created_at', 'desc')->limit(self::COUNT_RECENT_ARTICLES)->get();
        $dto = [];

        /** @var Article $article */
        foreach ($recentArticles as $article) {
            $dto[] = $this->composeGetArticlesDTO($article);
        }

        return $dto;
    }

    public function getRecommedArticles(): array
    {
        $recommendArticles = Article::query()->where('is_recommend', 1)->inRandomOrder()->limit(self::COUNT_RECOMMEND_ARTICLES)->get();
        $dto = [];

        /** @var Article $article */
        foreach ($recommendArticles as $article) {
            $dto[] = $this->composeGetArticlesDTO($article);
        }

        return $dto;
    }
}
