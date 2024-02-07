Eloquent(エロクアント)<br>

@foreach($values as $value)
{{ $value->id }}<br>
{{ $value->text }}<br>
@endforeach
<br>

カウント数は
{{$count}}です<br>
<br>

インスタンスfirstは<br>
@php
//echo $first['id'] .'<br>' .$first['text'] .'<br>'
echo $first->id .'<br>' .$first['text'] .'<br>'
@endphp
<br>
＠phｐでやらなくてよかった。。<br>
{{ $first['id'] }}<br>
{{ $first['text'] }}<br>
<br>

コレクションwhereBBBは<br>
@foreach($whereBBB as $col)
{{ $col->id }}<br>
{{ $col->text }}<br>
@endforeach
<br>

コレクションqueryBuilderは<br>
@foreach($queryBuilder as $que)
{{ $que->id }}<br>
{{ $que->text }}<br>
@endforeach