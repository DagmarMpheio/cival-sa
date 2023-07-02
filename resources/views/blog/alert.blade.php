<?php
/**
 * Created by PhpStorm.
 * User: Dagmar Mpheio
 * Date: 11/4/2020
 * Time: 12:59 PM
 */
?>

@if(isset($categoryName))
    <div class="alert alert-info">
        <p>Categoria: <strong>{{$categoryName}}</strong></p>
    </div>
@endif

@if(isset($tagName))
    <div class="alert alert-info">
        <p>Tagged: <strong>{{$tagName}}</strong></p>
    </div>
@endif

@if(isset($authorName))
    <div class="alert alert-info">
        <p>Autor: <strong>{{$authorName}}</strong></p>
    </div>
@endif

@if($term =  request('term'))
    <div class="alert alert-info">
        <p>Resultados da pesquisa para: <strong>{{$term}}</strong></p>
    </div>
@endif