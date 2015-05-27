@extends('_master')

@section('content')
    <h3>New Post</h3>
    <form class="form" method="post" action="/">
        <label>Flavor:</label>
        <select name="flavor">
            <option value="vanilla">Vanilla</option>
            <option value="chocolate">Chocolate</option>    
            <option value="strawberry">Strawberry</option>    
            <option value="mint chip">Mint Chip</option>    
            <option value="oreo">Oreo</option>    
            <option value="rocky road">Rocky Road</option>    
            <option value="coffee">Coffee</option>
        </select>
        <label>Size:</label>
        <select name="size">
            <option value="kiddie">Kiddie</option>
            <option value="small">Small</option>    
            <option value="medium">Medium</option>    
            <option value="large">Large</option>    
            <option value="sundae">Sundae</option>    
        </select>
        <label>Comments:</label>
        <textarea type="text" name="post" value="{{$comments}}"></textarea>
        <input type="submit" class="submit" value="Post"/>
    </form>
    <div>
    @if($error)
        {{$error}}
    @endif
    </div>
@stop