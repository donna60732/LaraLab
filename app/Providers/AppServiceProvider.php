<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Message;
use App\Policies\ArticlePolicy;
use App\Policies\MessagePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Article::class => ArticlePolicy::class,
        Message::class => MessagePolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}
