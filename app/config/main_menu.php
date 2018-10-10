<?php

use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;

$yml = file_get_contents(APPPATH.'config/main_menu.yml');

$config['main_menu'] = Yaml::parse($yml);
