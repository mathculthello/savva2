
<table class="table">
  @foreach ($urls as $url)
  <tr>
    @auth
    <td>
      <input name="box[]" value="{{ $url->id }}" type="checkbox">
    </td>
    @endauth
    <td>
      {{$url->id}}
    </td>
    <td>
      {{$url->title}}
    </td>
    <td>
      <a target="_blank" href="{{$url->url}}">{{ substr($url->url,0,50) }}</a>
    </td>
    <td>
      {{$url->created_at}}
    </td>
    <td>
      {{$url->tag}}
    </td>
    @auth
    <td>
      <a href="{{ route('urls.edit',$url->id) }}">Ред</a>
    </td>
    @endauth
  </tr>
  @endforeach
</table>
