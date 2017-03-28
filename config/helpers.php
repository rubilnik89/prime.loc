<?php

function getNextOrder($order, $sortby = null, $column){
    if ($column == $sortby){
        if ($order){
            if ($order == 'asc'){
                return 'desc';
            }
        }
        return 'asc';
    } else return 'asc';

    return 'asc';
}

function getSort($order){

    if ($order == 'asc'){
        return '-desc';
    }
    if ($order == 'desc'){
            return '-asc';
    }
    return '';
}
