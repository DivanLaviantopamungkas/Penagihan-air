@extends('admin.layouts.app')

@push('after-style')
@endpush

@section('title')
    Tambah Data Tagihan
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('home') }}">Dashboard</a>
                </li>

                <li class="breadcrumb-item">
                    <a href="{{ route('data-tagihan.index') }}">Daftar Pelanggan</a>
                </li>

                <li class="breadcrumb-item active">Tambah Pelanggan</li>
            </ol>
        </nav>

        <!-- Collapse -->
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Tambah Pelanggan</h5>

                        <a href="{{ route('data-tagihan.index') }}">
                            <button type="button" class="btn btn-secondary btn-icon-text">
                                <i class="fas fa-arrow-left btn-icon-prepend"></i>
                                Kembali
                            </button>
                        </a>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('data-tagihan.store') }}" method="POST" id="form"
                            enctype="multipart/form-data">
                            @csrf
                            @if (isset($data))
                                <input type="hidden" name="name" value="{{ $data->id }}">
                            @endif
                            <div class="mb-3">
                                <label class="form-label" for="name">Nama Lengkap<span
                                        style="color:red;">*</span></label>

                                <input type="text" disabled class="form-control" id="name" name="name"
                                    placeholder="Masukkan nama pelanggan" value="{{ $data->name ?? old('name') }}" />
                                <input type="hidden" name="name" value="{{ $data->name ?? old('name') }}" />
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="bulan">Bulan</label>
                                <div class="col-sm-10">
                                    <label class="col-form-label" id="bulan-label">: {{ date('F') }}</label>
                                    <input type="hidden" name="bulan" id="bulan" value="{{ date('m') }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="tahun">Tahun</label>
                                <div class="col-sm-10">
                                    <label class="col-form-label" id="tahun-label">: {{ date('Y') }}</label>
                                    <input type="hidden" name="tahun" id="tahun" value="{{ date('Y') }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="area">Nomor Telephone</label>

                                <div class="col-sm-10">
                                    <label class="col-form-label" id="phone-label">: </label>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="area">RT</label>

                                <div class="col-sm-10">
                                    <label class="col-form-label" id="rt_customers-label">: </label>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="area">RW</label>

                                <div class="col-sm-10">
                                    <label class="col-form-label" id="rw_customers-label">: </label>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="area">Alamat</label>

                                <div class="col-sm-10">
                                    <label class="col-form-label" id="address_customers-label">: </label>
                                </div>
                            </div>
                            <fieldset
                                style="border: 2px solid #ccc; border-radius: 5px; padding: 10px; margin-bottom: 15px;">
                                <legend><b>Tagihan Sebelumnya</b></legend>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="row mb-3">
                                            <label for="area">Tunggakan</label>

                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" readonly id="tunggakan-label">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="row mb-3">
                                            <label for="area">Denda</label>

                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" readonly id="denda-label">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="row mb-3">
                                            <label for="area">Lain-Lain</label>

                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" readonly id="lain_lain-label">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="row mb-3">
                                            <label for="area">Total Kekurangan</label>

                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" readonly
                                                    id="total-kekurangan">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset
                                style="border: 2px solid #ccc; border-radius: 5px; padding: 10px; margin-bottom: 15px;">
                                <legend><b>Tagihan Bulan Ini</b></legend>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="row mb-3">
                                            <label for="area">Meteran Awal</label>

                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" readonly id="awal-label">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="row mb-3">
                                            <label for="akhir">Meteran Akhir<span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" id="akhir" name="akhir"
                                                placeholder="Masukkan Meteran Akhir" value="{{ old('akhir') }}"
                                                width="5" />
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="row mb-3">
                                            <label for="tarif">Tarif<span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" id="tarif" name="tarif"
                                                placeholder="Masukkan tarif" value="{{ old('tarif') }}" />
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="row mb-3">
                                            <label for="area">Tagihan Bulan Ini</label>

                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" readonly id="total-tagihan">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3" style="margin-left: 77%">
                                    <div class="row mb-3">
                                        <label for="area">Total Semua Tagihan</label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" readonly id="semua-tagihan">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            {{-- <div class="row mb-3">
                <div class="col-md-6 col-sm-12">
                  <label class="form-label" for="tarif">Tarif<span
                      style="color:red;">*</span></label>
                  <input type="text" class="form-control" id="tarif" name="tarif"
                    placeholder="Masukkan Lain-lain" value="{{ old('tarif') }}" />
                </div>
              </div> --}}
                            <button type="submit" class="btn btn-primary btn-simpan">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-script')
    <script>
        $(document).ready(function() {
            // Inisialisasi nilai jika data tersedia
            @if (isset($data))
                inisialisasiData();
            @endif

            // Event listener untuk menghitung total tagihan ketika nilai input berubah
            $('#akhir, #tarif').on('input', function() {
                hitungTotalTagihan();
            });

            function inisialisasiData() {
                $('#name').val('{{ $data->name }}').trigger('change');
                $('#phone-label').text(': ' + '{{ $data->phone }}');
                $('#rt_customers-label').text(': ' + '{{ $data->customer->rt_customers }}');
                $('#rw_customers-label').text(': ' + '{{ $data->customer->rw_customers }}');
                $('#address_customers-label').text(': ' + '{{ $data->customer->address_customers }}');
                $('#tunggakan-label').val('{{ $data->customer->dataAwal->tunggakan }}');
                $('#denda-label').val('{{ $data->customer->dataAwal->denda }}');
                $('#lain_lain-label').val('{{ $data->customer->dataAwal->lain_lain }}');
                $('#awal-label').val('{{ $data->customer->dataAwal->awal }}');
                $('#tarif').val('{{ $data->customer->tarif }}');

                var tunggakan = parseFloat('{{ $data->customer->dataAwal->tunggakan }}') || 0;
                var denda = parseFloat('{{ $data->customer->dataAwal->denda }}') || 0;
                var lainLain = parseFloat('{{ $data->customer->dataAwal->lain_lain }}') || 0;

                var totalKekurangan = tunggakan + denda + lainLain;
                $('#total-kekurangan').val(totalKekurangan).trigger('change');

                hitungTotalTagihan();
            }

            function hitungTotalTagihan() {
                var awal = parseFloat($('#awal-label').val()) || 0;
                var akhir = parseFloat($('#akhir').val()) || 0;
                var tarif = parseFloat($('#tarif').val()) || 0;
                var totalTagihan = 0;

                if (!isNaN(awal) && !isNaN(akhir) && !isNaN(tarif) && akhir > awal) {
                    totalTagihan = tarif * (akhir - awal);
                    $('#total-tagihan').val(totalTagihan.toFixed(0));
                } else {
                    $('#total-tagihan').val('');
                }

                var totalKekurangan = parseFloat($('#total-kekurangan').val()) || 0;
                var totalSemuaTagihan = totalKekurangan + totalTagihan;
                $('#semua-tagihan').val(totalSemuaTagihan.toFixed(0));
            }

            $('#akhir').on('input', hitungTotalTagihan);
            $('#tarif').on('input', hitungTotalTagihan);

            if (typeof data !== 'undefined') {
                inisialisasiData(data);
                hitungTotalTagihan();
            }

            $('.select2').select2({
                theme: "bootstrap-5"
            });

            $('.btn-simpan').on('click', function() {
                $('#form').ajaxForm({
                    success: function(response) {
                        if (response.status == true) {
                            swal({
                                title: "Success!",
                                text: response.pesan,
                                icon: "success"
                            }).then(function() {
                                document.location =
                                    "{{ route('data-tagihan.index') }}";
                            });
                        } else {
                            var pesan = "";
                            var data_pesan = response.pesan;
                            const wrapper = document.createElement('div');

                            if (typeof(data_pesan) == 'object') {
                                jQuery.each(data_pesan, function(key, value) {
                                    console.log(value);
                                    pesan += value + '. <br>';
                                    wrapper.innerHTML = pesan;
                                });

                                swal({
                                    title: "Error!",
                                    content: wrapper,
                                    icon: "warning"
                                });
                            } else {
                                swal({
                                    title: "Error!",
                                    text: response.pesan,
                                    icon: "warning"
                                });
                            }
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        var err = eval("(" + jqXHR.responseText + ")");
                        swal("Error!", err.Message, "error");
                    }
                });
            });
        });
    </script>
@endpush
