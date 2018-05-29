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

class  ArticleObserver
{


    public function saving(Article $article)
    {
        // 关闭了自动维护时间，改用模型观察来维护。
        $date = date('Y-m-d H:i:s');
        if (!$article->created_at) {
            $article->created_at = $date;
        }
        $article->updated_at = $date;

        // 解析maarkdown语法
        $article->content = app(Markdown::class)->markdown($article->old_content);

        // 截取描述
        $article->describe = str_limit(strip_tags($article->content), '300', '...');
    }


}