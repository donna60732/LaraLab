<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Article;

class ArticlePolicy
{
    /**
     * 判斷用戶是否可以編輯文章
     * 
     * @param  User  $user
     * @param  Article  $article
     * @return bool
     */
    public function edit(User $user, Article $article)
    {
        // 檢查用戶是否是文章的擁有者
        return $user->id === $article->user_id;
    }
    /**
     * 判斷用戶是否可以刪除文章
     * 
     * @param  User  $user
     * @param  Article  $article
     * @return bool
     */
    public function delete(User $user, Article $article)
    {
        // 檢查用戶是否是文章的擁有者
        return $user->id === $article->user_id;
    }
}
