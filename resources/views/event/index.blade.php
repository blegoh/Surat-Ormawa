{{$event->nama_kegiatan}}<br />
{{$event->tanggal_pinjam}} - {{$event->tanggal_kembali}}
Ruang
<ul>
    @foreach($event->ruang as $ruang)
        <li>{{$ruang->nama_ruang}}</li>
    @endforeach
</ul>
Alat
<ul>
    @foreach($event->alat as $alat)
        <li>{{$alat->nama_alat}}</li>
    @endforeach
</ul>