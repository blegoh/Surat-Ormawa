<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Surat Peminjaman Ruang dan Peralatan</title>

    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
</head>
<body>
<style type="text/css" rel="stylesheet">
    body { margin: 0cm 1.5cm 0cm 1.5cm}
    p {margin-bottom: 10px }
    h4 { margin: 0px}
    .size12 { font-size: 12pt;}
    .size14 { font-size: 14pt;}
    .size16 { font-size: 16pt;}
    .regular { font-weight: normal}
    .bold { font-weight: bold}
    .italic { font-style: italic}
    .center { text-align: center}
    .justify { text-align: justify}
    tr, td { margin: 0px; padding: 0px}
    .container {
        width: 86%;
        margin: auto;
    }
    .heading {
        width: 100%;
        border-bottom: #000000 3px solid;
        padding-bottom: 10px;
    }
    .heading img {width: 20%; float: left}
    .content {
        width: 100%;
        margin-top: 15px;
    }
    .content table {
        width: 100%;
    }
    .ttd {
        width: 100%;
        height: auto;
        /*float: left;*/
    }
</style>
<div class="heading">
    <table style="border: none">
        <tr>
            <td><img style="float: left; width: 15%" src="http://3.bp.blogspot.com/-ikEqtjKCE_c/UazMv7JxBXI/AAAAAAAAALo/vIQAGJKhkd4/s1600/logo+unej.png"></td>
            <td>
                <h4 class="size16 regular center">KEMENTERIAN RISET DAN TEKNOLOGI</h4>
                <h4 class="size16 bold center">UNIVERSITAS JEMBER</h4>
                <h4 class="size14 bold center">PROGRAM STUDI SISTEM INFORMASI</h4>
                <h4 class="size14 regular center">BADAN EKSEKUTIF MAHASISWA</h4>
                <h4 class="size14 regular center">"{{$peminjaman->nama_kegiatan}}"</h4>
                <h4 class="size12 regular center">Sekretariat : Jl. Kalimantan 37 Kampus Bumi Tegalboto Jember 68121</h4>
                <h4 class="size12 regular center">Telp. (0331) – 326935 Fax.0331-326911</h4>
                <h4 class="size12 regular center">Laman : www.cs.unej.ac.id</h4>
            </td>
        </tr>
    </table>
</div>
<div class="content">
    <table>
        <tr class="size12 regular">
            <td style="padding-bottom: 5px">Nomor</td>
            <td style="padding-bottom: 5px">:</td>
            <td style="padding-bottom: 5px">{{$peminjaman->nomor}}/Pan.{{$peminjaman->panitia_kegiatan}}/{{$peminjaman->kode_divisi}}/BEM.1/PSSI/3/2016</td>
            <td style="padding-bottom: 5px">{{$today}}</td>
        </tr>
        <tr class="size12 regular">
            <td style="padding-bottom: 5px">Lampiran</td>
            <td style="padding-bottom: 5px">:</td>
            <td style="padding-bottom: 5px">{{$peminjaman->jumlah_lampiran}} lembar</td>
        </tr>
        <tr class="size12 regular">
            <td style="padding-bottom: 5px">Hal</td>
            <td style="padding-bottom: 5px">:</td>
            <td style="padding-bottom: 5px">Permohonan Peminjaman Ruang dan Peralatan</td>
        </tr>
    </table>
    <p style="margin-top: 25px" class="size12 regular">Yth.</p>
    <p class="size12 regular">Sekretaris II Program Studi Sistem Informasi</p>
    <p class="size12 regular">Universitas Jember</p>
    <p style="margin: 0px" class="size12 regular">
            Sehubungan dengan akan dilaksanakannya {{$peminjaman->nama_kegiatan}},
            kami memohon Ibu berkenan memberikan izin peminjaman
            ruang dan peralatan yang akan digunakan selama acara berlangsung yakni:<br>
    hari/tanggal    : {{$peminjaman->tanggal_pinjam}} s/d {{$peminjaman->tanggal_kembali}}
    <table>
        <tr>
            <td class="size12 regular">hari/tanggal</td>
            <td class="size12 regular">:</td>
            <td class="size12 regular">{{$peminjaman->tanggal_pinjam}} s/d {{$peminjaman->tanggal_kembali}}</td>
        </tr>
        <tr>
            <td class="size12 regular">pukul</td>
            <td class="size12 regular">:</td>
            <td class="size12 regular">07.00 WIB - selesai</td>
        </tr>
        </table>
    </p>

    <p class="size12 regular justify" style="margin-top: 15pt">
        Berikut kami lampirkan rincian ruang dan peralatan yang akan dipinjam.
    </p>
    <p class="size12 regular justify">
        Demikian surat permohonan ini kami buat, atas perhatian dan izin Ibu kami ucapkan terima kasih.
    </p>
</div>
<table class="ttd">
    <tr style="text-align: center;">
        <td>
            <p>Ketua {{Auth::user()->name}},</p><br><br><br>
            {{Auth::user()->nama_ketua}}<br>
            NIM. {{Auth::user()->nim}}
        </td>
        <td>
            <p>Ketua Pelaksana,</p><br><br><br>
            {{$peminjaman->ketua_panitia}}<br>
            NIM. {{$peminjaman->nim}}
        </td>
    </tr>
</table>
<table class="ttd">
    <tr style="text-align: center">
        <td>
            <p>Mengetahui,<br>
                Sekertaris III Program Studi Sistem Informasi<br>
                Universitas Jember
            </p>
            <p></p>
            <p></p><br><br>
            <p>Anang Andrianto S.T., M.T.<br>
                NIP 196906161997021002
            </p>
        </td>
    </tr>
</table>
</body>
</html>