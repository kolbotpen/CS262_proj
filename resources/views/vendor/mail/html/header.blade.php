@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block; width: 200px;">
@if (trim($slot) === 'Laravel')
<img src="https://i.ibb.co/PxdcR5k/logo1-3.png" class="logo" alt=" OURDEN">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>