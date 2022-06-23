<div id="wizard_horizontal">
    <h2>Isi Informasi Dasar</h2>
    <section>
        @include('backend.prasarana-sarana-umum.sub-form.form-informasi-dasar')
    </section>
    <h2>Tambahkan Foto Prasarana</h2>
    <section>
        @include('backend.prasarana-sarana-umum.sub-form.form-foto', ['jenis' => 'prasarana', 'jenisFotos' => ['Jaringan Jalan','Saluran Pembuangan Air Limbah','Drainase','TPS']])
    </section>
    <h2>Tambahkan Foto Sarana</h2>
    <section>
        @include('backend.prasarana-sarana-umum.sub-form.form-foto', ['jenis' => 'sarana', 'jenisFotos' => ['Ibadah', 'Perniagaan', 'Pelayanan Umum dan Pemerintahan', 'Pendidikan', 'Kesehatan', 'Rekreasi dan Olahraga', 'Pemakaman', 'Pertamanan dan RTH', 'Parkir', 'Persampahan']])
    </section>
    <h2>Tambahkan Foto Utilitas</h2>
    <section>
        @include('backend.prasarana-sarana-umum.sub-form.form-foto', ['jenis' => 'utilitas', 'jenisFotos' => ['Air bersih','Listrik','Telepon','Gas', 'Transportasi', 'Pemadam Kebakaran', 'Sarana Penerangan Jalan Umum']])
    </section>
</div>
