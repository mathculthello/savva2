<table class="table">
  @foreach ($urls as $url)
  <tr>
    <td>
      {{$url->id}}
    </td>
    <td>
      {{$url->title}}
    </td>
    <td>
      <a href="{{$url->url}}">{{ substr($url->url,0,90) }}</a>
    </td>
    <td>
      {{$url->created_at}}
    </td>
    <td>
      {{$url->status}}
    </td>
    @auth
    <td>
      <form method="POST" action="{{ action('UrlController@destroy',$url->id) }}">
        @csrf
        @method('DELETE')
        <input type="submit" value="Удалить">
      </form>
    </td>
    @endauth
  </tr>
  @endforeach
</table>
