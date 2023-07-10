<?php

//Menampilkan User Login di sudut kanan atas
function userLogin()
{
    $db = \Config\Database::connect();
    return $db->table('users')->where('id_user', session('id_user'))->get()->getRow();
}

//Dashboard
function countData($table)
{
    $db = \Config\Database::connect();
    return $db->table($table)->countAllResults();
}
