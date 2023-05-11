<?php
/**
 * Created by PhpStorm.
 * User: Dagmar Mpheio
 * Date: 10/27/2020
 * Time: 10:52 PM
 */
?>
@if(session('message'))
    <div style="padding: 15px; margin-bottom: 20px; border: 1px solid transparent; border-radius: 4px; color: #3c763d; background-color: #dff0d8; border-color: #d6e9c6;">
        {{session('message')}}
    </div>
@elseif(session('error-message'))
    <div style="padding: 15px; margin-bottom: 20px; border: 1px solid transparent; border-radius: 4px;  color: #a94442; background-color: #f2dede; border-color: #ebccd1;">
        {{session('error-message')}}
    </div>
@endif
{{-- @elseif(session('trash-message'))
    <div class="alert alert-info">
        <!--php list($message, $postId) = session('trash-message');?>
        {{ $message }}
        {!! Form::open(['method' => 'PUT','route'=>['backend.blog.restore',$postId]]) !!}
        <button type="submit" class="btn btn-sm btn-warning"><i class="fa fa-undo"></i> Desfazer</button>
        {!! Form::close() !!}
    </div>
@endif --}}
