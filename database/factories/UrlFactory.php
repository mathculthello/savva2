<?php

use Faker\Generator as Faker;

$factory->define(Savva\Url::class, function (Faker $faker) {
  $tag = ['google',''];
    return [
      'url' => $faker->url,
      'title' => $faker->sentence,
      'section' => $faker->numberBetween(0,9),
      'tag' => $tag[array_rand($tag)]
    ];
});
