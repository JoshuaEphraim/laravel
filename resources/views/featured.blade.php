<!doctype html>
@extends('layouts.main')
@section('header')
    @parent
@stop
@section('content')



    <div id="first"><div class="inner"><div class="padder">
                <div class="lSide"><div class="cSide">
                        <p class="caption">Domain Base</p>

                    </div></div>
                <div class="rSide">

                </div>
                <div class="clear"><!--//--></div>
            </div></div></div>
    <div id="second"><div class="inner">
            <div class="column col_table">
                <table class="table rate">
                    <p class="caption">Top rated</p>
                    <thead class="thead-inverse">
                    <tr>
                        <th>#</th>
                        <th>Domain</th>
                        <th>Raiting</th>
                        <th>Comments</th>
                        <th>Reverse Ip</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                <div class="p"></div>
            </div>
            <div class="column col_table">
                <table class="table comment">
                    <p class="caption">Most commented</p>
                    <thead class="thead-inverse">
                    <tr>
                        <th>#</th>
                        <th>Domain</th>
                        <th>Comments</th>
                        <th>Raiting</th>
                        <th>Reverse Ip</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                <div class="p"></div>
            </div>
            <div class="clear"><!--//--></div>
        </div></div>


@endsection
@section('footer')
    @parent
@stop

