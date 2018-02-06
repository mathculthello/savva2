<table class="table">
  @foreach ($urls as $url)
  <tr>
    <td>
      {{$url->title}}
    </td>
    <td>
      <a href="{{$url->url}}">{{ substr($url->url,0,90) }}</a>
    </td>
  </tr>
  @endforeach
</table>
