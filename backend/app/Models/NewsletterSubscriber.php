<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $email
 */
class NewsletterSubscriber extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

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
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return NewsletterSubscriber
     */
    public function setEmail(string $email): NewsletterSubscriber
    {
        $this->email = $email;
        return $this;
    }
}
