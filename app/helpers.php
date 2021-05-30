<?php


function getSendersId($name)
{
    $query = str_replace('user_'.auth()->id().'_','',$name);
    $id = strpos($query,'_');
    $id = substr($query,$id+1,3);
    $id = str_replace('_','',$id);
    return $id;
}

function getInbox_name($id1,$id2){
    return 'user_'.$id1.'_-user_'.$id2.'_';
}

function active_class($path, $active = 'active') {
    return call_user_func_array('Request::is', (array)$path) ? $active : '';
}

function is_active_route($path): string
{
    return call_user_func_array('Request::is', (array)$path) ? 'true' : 'false';
}

function show_class($path): string
{
    return call_user_func_array('Request::is', (array)$path) ? 'show' : '';
}
