<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Disposisi</title>
    <style type="text/css">
        table {
            background: #fff;
            padding: 5px;
            border: none;
        }

        tr,
        td {
            border: table-cell;
            border: 1px solid #444;
        }

        tr,
        td {
            vertical-align: top !important;
        }

        #right {
            border-right: none !important;
        }

        #left {
            border-left: none !important;
        }

        .isi {
            height: 300px !important;
        }

        .disp {
            text-align: center;
            padding: 1.5rem 0;
            margin-bottom: .5rem;
        }

        .logodisp {
            float: left;
            position: relative;
            width: 110px;
            height: 110px;
            margin: 0 0 0 1rem;
        }

        #lead {
            width: auto;
            position: relative;
            margin: 25px 0 0 75%;
        }

        .lead {
            font-weight: bold;
            text-decoration: underline;
            margin-bottom: -10px;
        }

        .tgh {
            text-align: center;
        }

        #nama {
            font-size: 2.1rem;
            margin-bottom: -1rem;
        }

        #alamat {
            font-size: 16px;
        }

        .up {
            text-transform: uppercase;
            margin: 0;
            line-height: 2.2rem;
            font-size: 1.5rem;
        }

        .status {
            margin: 0;
            font-size: 1.3rem;
            margin-bottom: .5rem;
        }

        #lbr {
            font-size: 20px;
            font-weight: bold;
        }

        .separator {
            border-bottom: 2px solid #616161;
            margin: -1.3rem 0 1.5rem;
        }

        @media print {
            body {
                font-size: 12px;
                color: #212121;
            }

            table {
                width: 70%;
                font-size: 12px;
                color: #212121;
            }

            tr,
            td {
                border: table-cell;
                border: 1px solid #444;
                padding: 8px !important;

            }

            tr,
            td {
                vertical-align: top !important;
            }

            #lbr {
                font-size: 20px;
            }

            .isi {
                height: 100px !important;
            }

            .tgh {
                text-align: center;
            }

            .disp {
                text-align: center;
                margin: -.5rem 0;
            }

            .logodisp {
                float: left;
                position: relative;
                width: 80px;
                height: 80px;
                margin: .5rem 0 0 .5rem;
            }

            #lead {
                width: auto;
                position: relative;
                margin: 15px 0 0 75%;
            }

            .lead {
                font-weight: bold;
                text-decoration: underline;
                margin-bottom: -10px;
            }

            #nama {
                font-size: 20px !important;
                font-weight: bold;
                text-transform: uppercase;
                margin: -10px 0 -20px 0;
            }

            .up {
                font-size: 17px !important;
                font-weight: normal;
            }

            .status {
                font-size: 17px !important;
                font-weight: normal;
                margin-bottom: -.1rem;
            }

            #alamat {
                margin-top: -15px;
                font-size: 13px;
            }

            #lbr {
                font-size: 17px;
                font-weight: bold;
            }

            .separator {
                border-bottom: 2px solid #616161;
                margin: -1rem 0 1rem;
            }

        }
    </style>
</head>

<body>
    <div class="container">
        <div id="colres">
            <div class="disp">
                <img class="logodisp" src="{{asset('asset_backend/img/logo.png')}}" />
                <h6 class="up">DINAS PERHUBUNGAN</h6>
                <h5 class="up" id="nama">PROVINSI SULAWESI SELATAN</h5><br /><br>
                <span id="alamat">Jln. Perintis Kemerdekaan KM 15 Daya Makassar</span>
            </div>
            <div class="separator"></div>

            <table>
                <tbody>
                    <tr>
                        <td class="tgh" id="lbr" colspan="5">LEMBAR DISPOSISI</td>
                    </tr>
                    <tr>
                        <td id="right" width="18%"><strong>Indeks Berkas</strong></td>
                        <td id="left" style="border-right: none;" width="57%">: {{$surat->indeks}}</td>
                        <td id="left" width="25"><strong>Kode : {{$surat->kode}}</strong> </td>
                    </tr>
                    <tr>
                        <td id="right"><strong>Tanggal Surat</strong></td>
                        <td id="left" colspan="2">: {{$surat->tgl_surat->format('d-m-Y')}}</td>
                    </tr>
                    <tr>
                        <td id="right"><strong>Nomor Surat</strong></td>
                        <td id="left" colspan="2">: {{$surat->no_surat}}</td>
                    </tr>
                    <tr>
                        <td id="right"><strong>Asal Surat</strong></td>
                        <td id="left" colspan="2">: {{$surat->asal_surat}}</td>
                    </tr>
                    <tr>
                        <td id="right"><strong>Isi Ringkas</strong></td>
                        <td id="left" colspan="2">: {{$surat->isi}}</td>
                    </tr>
                    <tr>
                        <td id="right"><strong>Diterima Tanggal</strong></td>
                        <td id="left" style="border-right: none;">: {{$surat->tgl_diterima}}</td>
                        <td id="left"><strong>No. Agenda</strong> : {{ $surat->no_agenda }} </td>
                    </tr>
                    <tr>
                        <td id="right"><strong>Tanggal Penyelesaian</strong></td>
                        <td id="left" colspan="2">: </td>
                    </tr>
                    <tr class="isi">
                        <td colspan="2">
                            <strong>Isi Disposisi :</strong>{{$surat->disposisi[0]->isi}}<br />
                            <div style="height: 50px;"></div>
                            <strong>Batas Waktu</strong> :{{$surat->disposisi[0]->batas_waktu->format('d-m-Y')}} <br />
                            <strong>Sifat</strong> :{{ $surat->disposisi[0]->sifat }} <br />
                            <strong>Catatan</strong> :{{ $surat->disposisi[0]->catatan }}<br />
                            <div style="height: 25px;"></div>
                        </td>
                        <td><strong>Diteruskan Kepada</strong> : {{ $surat->disposisi[0]->tujuan }}<br /></td>
                    </tr>
                </tbody>
            </table>

            <div id="lead">
                <p>Kepala </p>
                <div style="height: 50px;"></div>

                <p class="lead"> S.Kom.</p>
                <p>NIP. </p>
            </div>
        </div>
        <div class="jarak2"></div>
</body>

</html>