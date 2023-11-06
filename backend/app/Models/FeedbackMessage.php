<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $user_name
 * @property string $user_email
 * @property string $text
 */
class FeedbackMessage extends Model
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
    public function getUserName(): string
    {
        return $this->user_name;
    }

    /**
     * @param string $user_name
     * @return FeedbackMessage
     */
    public function setUserName(string $user_name): FeedbackMessage
    {
        $this->user_name = $user_name;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserEmail(): string
    {
        return $this->user_email;
    }

    /**
     * @param string $user_email
     * @return FeedbackMessage
     */
    public function setUserEmail(string $user_email): FeedbackMessage
    {
        $this->user_email = $user_email;
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
     * @return FeedbackMessage
     */
    public function setText(string $text): FeedbackMessage
    {
        $this->text = $text;
        return $this;
    }

    public static function createMessage(string $name, string $email, string $text): bool
    {
        $message = new FeedbackMessage();

        return $message
            ->setUserName($name)
            ->setUserEmail($email)
            ->setText($text)
            ->save();
    }
}
