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
      {{$url->tag}}
    </td>
    @auth
    <td>
      <a href="{{ route('urls.edit',$url->id) }}">Ред</a>
    </td>
    <td>
      <form method="POST" action="{{ route('urls.destroy',$url->id) }}">
        @csrf
        @method('DELETE')
        <input type="submit" value="Удалить">
      </form>
    </td>
    @endauth
  </tr>
  @endforeach
</table>
