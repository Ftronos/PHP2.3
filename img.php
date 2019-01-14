<?php

const IMG_PATH = 'photo/img';
const IMG_MINI_PATH = 'photo/mini_img';

require_once 'Twig/Autoloader.php';
Twig_Autoloader::register();

try{

  $loader = new Twig_Loader_Filesystem('templates');

  $twig = new Twig_Environment($loader);

  $template = $twig->loadTemplate('img.tmpl');

  $photo = $_GET['img'];

  echo $template->render([
    'title' => 'Список фотографий',
    'path_img' => IMG_PATH,
    'image' => $photo
  ]);

} catch (Exception $e){
  die ('ERROR: '. $e->getMessage());
}