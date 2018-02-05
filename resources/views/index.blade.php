@extends('layout')

      @section('content')
      <table class="table">
        @foreach ($urls as $url)
        <tr>
          <td>
            {{$url->rowid}}
          </td>
          <td>
            {{$url->title}}
          </td>
          <td>
            <a href="{{$url->url}}">{{ substr($url->url,0,90) }}</a>
          </td>
        </tr>
        @endforeach
      </table>
      @endsection
