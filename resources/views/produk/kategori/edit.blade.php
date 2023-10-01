<x-admin-layout headerTitle="Ubah Data Kategori">

    @php
        $route = route('kategori.update', $kategori);
    @endphp

    <x-card title="Data Kategori">
        <x-form action="{{ $route }}" method="PUT">
            <div class="row justify-content-around align-items-center">
                <div class="col-xl-3 col-12">
                    <div class="text-center">
                        <img class="img-fluid rounded mb-3"
                            src="{{ asset('storage/gambar-kategori/' . $kategori->gambar) }}" />
                    </div>
                    <x-input class="" name="gambar" type="file" label="" />
                </div>
                <div class="col-9">
                    <div class="row">
                        <x-input class="" name="nama" type="text"
                            value="{{ $kategori->nama ?? (old('nama') ?? '') }}" />
                        <x-select class="" name="dapur_id" label="Dapur">
                            <option value="">Pilih Dapur</option>
                            @foreach ($dapurs as $dapur)
                                <option value="{{ $dapur->id }}"
                                    {{ isset($dapur) ? ($dapur->id == ($kategori->dapur_id ?? 0) ? 'selected' : '') : '' }}>
                                    {{ $dapur->nama }}
                                </option>
                            @endforeach
                        </x-select>
                    </div>
                </div>
            </div>
        </x-form>

    </x-card>

    @push('scripts')
        <script type="application/javascript">
        $('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            $('.custom-file-label').html(fileName);
        });
    </script>
    @endpush
    </x-admin-layot>
