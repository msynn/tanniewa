<?php

use App\Models\teams;
use App\Models\abouts;
use App\Models\aplications;
use App\Models\karir;
use App\Models\layanans;
use App\Models\pengalaman;
use App\Models\products;
use App\Models\visimisis;
use App\Models\pengaturans;
use App\Models\website;
use Illuminate\Console\Application;

function get_setting_value($key){
    $data = pengaturans::where('key', $key)->first();
    if (isset($data->value)) {
        return $data->value;
    } else {
        return 'empty';
    }
}

function get_about_value($key){

    $data = abouts::where('bagian', $key)->first();
    if (isset($data)) {
        return $data;
    }
}

function get_all_teams() {
    return teams::all(); // Mengambil semua data dari tabel teams
}

function get_all_pengalaman() {
    return pengalaman::all(); // Mengambil semua data dari tabel teams
}

function get_all_applications() {
    return aplications::all(); // Mengambil semua data dari tabel teams
}

function get_all_karir() {
    return karir::all(); // Mengambil semua data dari tabel teams
}

function get_all_website() {
    return website::all(); // Mengambil semua data dari tabel teams
}

function get_applications_by_id($id) {
    return aplications::table('applications')->where('id', $id)->first();
}


function get_visimisis_value($key){

    $data = visimisis::where(column: 'title', operator: $key)->first();
    if (isset($data)) {
        return $data;
    }
}


function get_products_value($key){
    $data = products::where('key', $key)->first();
    if (isset($data)) {
        return $data;
    } else {
        return 'empty';
    }
}

function get_layanans_value($key){
    $data = layanans::where('key', $key)->first();
    if (isset($data)) {
        return $data;
    } else {
        return 'empty';
    }
}
