{{--
 Author: Koss (karakurtkoss{at}gmail.com)
 Date: 03.09.2014
--}}
<tr>
	<td>{{ $verse->name }}</td>
	<td>{{ Str::limit($verse->text) }}</td>
	<td>{{ $verse->created_at->format('d.m.Y') }}</td>
</tr>