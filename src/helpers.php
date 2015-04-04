<?php

use Chilloutalready\SimpleAdmin\Providers\SimpleAdminProvider;

function SApackageConfig($config)
{
    return config(SimpleAdminProvider::PACKAGE_NAME_CONFIG . '.' . $config);
}

function SApackageView($name, $data = array())
{
    return view( SApackageName() . '::' . $name, $data);
}

function SApackageName(){
    return SimpleAdminProvider::PACKAGE_NAME;
}