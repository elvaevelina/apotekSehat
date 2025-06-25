<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>.:Hasil Pencarian Obat:.</title>
  </head>
  <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 bg-info py-4"></div>
        </div>
    </div>

    <div class="container pt-4">
        <div class="row">
            <div class="col-md-12">
                <h4>Hasil pencarian untuk: <em>{{ request('q') }}</em></h4>
                <div class="row">
                    @forelse ($data as $d)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $d->nama }}</h5>
                                    <p class="card-text"><strong>Bentuk:</strong> {{ $d->bentuk }}</p>
                                    <p class="card-text"><strong>Harga:</strong> Rp {{ number_format($d->harga_obat, 0, ',', '.') }}</p>
                                    <p class="card-text"><strong>Stok:</strong> {{ $d->stok_obat }}</p>
                                    <p class="card-text"><strong>Produsen:</strong> {{ $d->produsen }}</p>
                                    <p class="card-text"><strong>Kadaluarsa:</strong> {{ $d->tgl_kadaluarsa }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-warning text-center">Obat tidak ditemukan.</div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
