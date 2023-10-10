<?php

namespace App\Services;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Services\DTO\GetArticlesDTO;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class BlogService
{
    private const COUNT_ARTICLES_MAIN_PAGE = 3;
    private const COUNT_RECOMMEND_ARTICLES = 3;
    private const COUNT_RECENT_ARTICLES = 3;
    private const COUNT_PAGINATE_ARTICLES_PAGE = 4;

    private const TYPE_RECENT = 'recent';
    private const TYPE_RECOMMEND = 'recommend';
    private const TYPE_RANDOM = 'random';

    public function composeGetArticlesDTO(Article $article): GetArticlesDTO
    {
        return new GetArticlesDTO(
            id: $article->getId(),
            header: $article->getHeader(),
            text: $article->getText(),
            img: $article->getImg(),
            alias:$article->getAlias(),
            articleCategory: $article->articleCategory->getName(),
            dateCreated: date_format($article->getCreatedAt(), 'o-F-d'),
        );
    }

    public function prepareArticlesDTO(Collection $articles): array
    {
        $dto = [];

        /** @var Article $article */
        foreach ($articles as $article) {
            $dto[] = $this->composeGetArticlesDTO($article);
        }

        return $dto;
    }

    public function getRandomArticles(): Collection
    {
        return Article::query()->inRandomOrder()->limit(self::COUNT_ARTICLES_MAIN_PAGE)->get();
    }

    public function getArticle(string $alias): GetArticlesDTO
    {
        /** @var Article $article */
        $article = Article::query()->where('alias', $alias)->first();

        return $this->composeGetArticlesDTO($article);
    }

    public function getArticles(): LengthAwarePaginator
    {
        return Article::query()->paginate(self::COUNT_PAGINATE_ARTICLES_PAGE);
    }

    public function getArticleCategories(): Collection
    {
        return ArticleCategory::has('articles')->get();
    }

    public function getArticlesByCategory(string $categoryCode): LengthAwarePaginator
    {
        return Article::query()->whereRelation('articleCategory', 'code', $categoryCode)
            ->paginate(self::COUNT_PAGINATE_ARTICLES_PAGE);
    }

    public function getRecentArticles(): Collection
    {
        return Article::query()->orderBy('created_at', 'desc')
            ->limit(self::COUNT_RECENT_ARTICLES)
            ->get();
    }

    public function getRecommendArticles(): Collection
    {
        return Article::query()->where('is_recommend', true)->inRandomOrder()
            ->limit(self::COUNT_RECOMMEND_ARTICLES)
            ->get();
    }

    public function searchArticle(string $searchValue): LengthAwarePaginator
    {
        return Article::query()->where('header', 'LIKE', "%$searchValue%")
            ->paginate(self::COUNT_PAGINATE_ARTICLES_PAGE);
    }

    public function getCaterogyName(string $categoryCode): string
    {
        return ArticleCategory::query()->where('code', $categoryCode)->value('name');
    }

    public function getArticlesCollection(?int $categoryId = null, ?string $type = null): LengthAwarePaginator
    {
        $query = Article::query();

        if ($categoryId != null) {
            $query = $query->where('article_category_id', $categoryId);
        }

        if ($type != null) {
            $query = match ($type) {
                self::TYPE_RANDOM => $query->inRandomOrder()->limit(self::COUNT_ARTICLES_MAIN_PAGE),
                self::TYPE_RECENT => $query->orderBy('created_at', 'desc')->limit(self::COUNT_RECENT_ARTICLES),
                self::TYPE_RECOMMEND =>$query->where('is_recommend', true)->inRandomOrder()->limit(self::COUNT_RECOMMEND_ARTICLES),
                default => $query,
            };
        }

        return $query->paginate();
    }
}
