<?php

const IMG_PATH = 'photo/img';
const IMG_MINI_PATH = 'photo/mini_img';

require_once 'Twig/Autoloader.php';
Twig_Autoloader::register();

try{

  $loader = new Twig_Loader_Filesystem('templates');

  $twig = new Twig_Environment($loader);

  $template = $twig->loadTemplate('index.tmpl');

  $photo_dir = array_slice(scandir(IMG_PATH), 2);

  echo $template->render([
    'title' => 'Список фотографий',
    'path_img_small' => IMG_MINI_PATH,
    'images' => $photo_dir
  ]);

} catch (Exception $e){
  die ('ERROR: '. $e->getMessage());
}