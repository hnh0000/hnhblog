<?php
/**
 * Created by hnh.
 * Date: 2018/4/14
 * Time: 21:33
 * Email: 1123416584@qq.com
 * Blog: blog.hnh117.com
 */

namespace App\Observers;

use App\Models\Article;
use App\Plugs\Markdown;

class  ArticleObserver{

    /**
     * article模型监听save
     * @param Article $article
     */
    public function saving(Article $article)
    {
        // 解析maarkdown语法
        $article->content = app(Markdown::class)->markdown($article->old_content);
    }

}