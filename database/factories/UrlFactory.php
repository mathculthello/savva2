<?php

use Faker\Generator as Faker;

$factory->define(App\Url::class, function (Faker $faker) {
  $tag = ['google','course'];
    return [
      'url' => $faker->url,
      'title' => $faker->sentence,
      'tag' => $tag[array_rand($tag)]
    ];
});
