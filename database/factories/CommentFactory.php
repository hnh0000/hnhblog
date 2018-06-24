<?php
/**
 * Created by hnh.
 * Date: 2018/6/24
 * Time: 11:46
 * Email: 1123416584@qq.com
 * Blog: blog.hnh117.com
 */


$faker = Faker\Factory::create('zh_CN');

$factory->define(\App\Models\Comment::class, function () use ($faker) {
    $created_at = $faker->dateTimeThisMonth();
    $updated_at = $faker->dateTimeThisMonth($created_at);

    return [
        'content' => $faker->sentence(),
        'created_at' => $created_at,
        'updated_at' => $updated_at
    ];

});