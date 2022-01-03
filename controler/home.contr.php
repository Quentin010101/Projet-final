<?php

class Home
{
    public function index(){
        Renderer::render('home','template');
    }
}