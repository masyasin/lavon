<?php
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;

$yml = file_get_contents(APPPATH.'config/main_module.yml');

$config['main_module'] = Yaml::parse($yml);