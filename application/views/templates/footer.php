<footer class="main-footer">
    <div class="footer-left">
        Copyright &copy; 2020
        <div class="bullet"></div>
        Created By
        <a href="https://instagram.com/andikha.dian16">Andikha Dian Nugraha</a>
    </div>
    <div class="footer-right">
        BETA
    </div>
</footer>
<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/js/swal/sweetalert2.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="<?= base_url() ?>assets/js/stisla.js"></script>

<!-- Template JS File -->
<script src="<?= base_url() ?>assets/js/jquery.steps.min.js"></script>
<script src="<?= base_url() ?>assets/js/scripts.js"></script>
<script src="<?= base_url() ?>assets/js/custom.js"></script>

<script>
    $(document).ready(function() {
        $('#mytable').DataTable();
        $('#btnLapor').click(function() {
            $(this).prop("disabled", true);
            $(this).addClass("btn-progress");
        })

        if ($('#judul').text() === "Pilih Jenis Pelanggaran") {
            console.log('Ini pelanggaran');
            load_dataPelanggaran();
        } else if ($('#judul').text() === "Pilih Kelas") {
            console.log('Ini Kelas');
            load_dataKelas();
        } else if ($('#judul').text() === "Pilih Siswa") {
            console.log('Ini Siswa');
            load_dataSiswa();
        }

        //load pelanggaran
        function load_dataPelanggaran(query) {
            $('#resultPelanggaran').html(`
            <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
            `);
            $.ajax({
                url: "<?php echo base_url(); ?>guru/pelanggar/fetchPelanggaran",
                method: "POST",
                data: {
                    query: query
                },
                success: function(data) {

                    $("#resultPelanggaran").html(data);
                }
            });
        }

        $('#keywordPelanggaran').keyup(function() {
            var search = $(this).val();
            if (search != '') {
                load_dataPelanggaran(search);
            } else {
                load_dataPelanggaran();
            }
        })

        //load kelas
        function load_dataKelas(query) {
            const id_kasus = $('#resultKelas').data("kasus");
            console.log(id_kasus);

            $.ajax({
                url: "<?php echo base_url(); ?>guru/pelanggar/fetchKelas",
                method: "POST",
                data: {
                    query: query,
                    id_kasus: id_kasus
                },
                success: function(data) {

                    $("#resultKelas").html(data);
                }
            });
        }

        $('#keywordKelas').keyup(function() {
            var search = $(this).val();
            if (search != '') {
                load_dataKelas(search);
            } else {
                load_dataKelas();
            }
        })

        //load Siswa
        function load_dataSiswa(query) {
            const id_kasus = $('#resultSiswa').data("kasus");
            const id_kelas = $('#resultSiswa').data("kelas");

            $.ajax({
                url: "<?php echo base_url(); ?>guru/pelanggar/fetchSiswa",
                method: "POST",
                data: {
                    query: query,
                    id_kasus: id_kasus,
                    id_kelas: id_kelas
                },
                success: function(data) {
                    $("#resultSiswa").html(data);
                }
            });
        }

        $('#keywordSiswa').keyup(function() {
            var search = $(this).val();
            if (search != '') {
                load_dataSiswa(search);
            } else {
                load_dataSiswa();
            }
        })
    });
</script>

</body>

</html>