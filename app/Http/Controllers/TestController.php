<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index() {
        $filter_field = isset($_GET['by_time']) ? "delta.hour" : "";
        $order = isset($_GET['trend']) && $_GET['trend'] == "desc" ? "descending" : "ascending";
        if($filter_field) {
            $query = "?offset=0&limit=100&sort=".$filter_field."&order=".$order."&currency=USD&platforms=";
        }
        $url = "https://http-api.livecoinwatch.com/coins?offset=0&limit=100&sort=delta.hour&order=".$order."&currency=USD&platforms=";
        $result = file_get_contents($url);

        $result = json_decode($result);
        $data = $result->data;        

        echo json_encode($data);
    }    
}
