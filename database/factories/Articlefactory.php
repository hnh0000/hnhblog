<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Article::class, function(Faker $faker) {

    // 所有分类数量
    $category_num = \App\Models\Category::count();

    $created_at = $faker->dateTimeThisMonth();
    $updated_at = $faker->dateTimeThisMonth($created_at);

    return [
        'title' => $faker->title,
        'content' => $faker->text,
        'category_id' => mt_rand(1,$category_num),
        'created_at' => $created_at,
        'updated_at' => $updated_at
    ];

});