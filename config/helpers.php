<?php

function getOrder($order){

    if ($order){
        if ($order == 'asc'){
            return 'desc';
        }
    }
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
