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

            <div class="column config">
                <p class="caption">Select country</p>
                <div class="list-group countries">
                </div>



            </div>
            <div class="column col_table">
                <table class="table">
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
            <div class="column search" id="menu">
                <p class="caption">Select rate</p>
                <div class="list-group rate">
                </div>
            </div>
            <div class="clear"><!--//--></div>
        </div></div>

@endsection
@section('footer')
    @parent
@stop