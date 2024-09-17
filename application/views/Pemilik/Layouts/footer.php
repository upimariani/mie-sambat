<script type="text/javascript" src="<?= base_url('asset/guruable-master/') ?>assets/js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?= base_url('asset/guruable-master/') ?>assets/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?= base_url('asset/guruable-master/') ?>assets/js/popper.js/popper.min.js"></script>
<script type="text/javascript" src="<?= base_url('asset/guruable-master/') ?>assets/js/bootstrap/js/bootstrap.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="<?= base_url('asset/guruable-master/') ?>assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="<?= base_url('asset/guruable-master/') ?>assets/js/modernizr/modernizr.js"></script>
<!-- am chart -->
<script src="<?= base_url('asset/guruable-master/') ?>assets/pages/widget/amchart/amcharts.min.js"></script>
<script src="<?= base_url('asset/guruable-master/') ?>assets/pages/widget/amchart/serial.min.js"></script>
<!-- Todo js -->
<script type="text/javascript " src="<?= base_url('asset/guruable-master/') ?>assets/pages/todo/todo.js "></script>
<!-- Custom js -->
<script type="text/javascript" src="<?= base_url('asset/guruable-master/') ?>assets/pages/dashboard/custom-dashboard.js"></script>
<script type="text/javascript" src="<?= base_url('asset/guruable-master/') ?>assets/js/script.js"></script>
<script type="text/javascript " src="<?= base_url('asset/guruable-master/') ?>assets/js/SmoothScroll.js"></script>
<script src="<?= base_url('asset/guruable-master/') ?>assets/js/pcoded.min.js"></script>
<script src="<?= base_url('asset/guruable-master/') ?>assets/js/demo-12.js"></script>
<script src="<?= base_url('asset/guruable-master/') ?>assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?= base_url('asset/quantam-lite/') ?>assets/js/menu.min.js"></script>
<link href="<?= base_url('asset/') ?>/datatables.min.css" rel="stylesheet">

<script src="<?= base_url('asset/') ?>/datatables.min.js"></script>
<script>
	$('#belum_bayar').DataTable({
		select: true
	});
	$('#konfirmasi').DataTable({
		select: true
	});
	$('#kirim').DataTable({
		select: true
	});
	$('#selesai').DataTable({
		select: true
	});
</script>
<script>
	var $window = $(window);
	var nav = $('.fixed-button');
	$window.scroll(function() {
		if ($window.scrollTop() >= 200) {
			nav.addClass('active');
		} else {
			nav.removeClass('active');
		}
	});
</script>
<script>
	console.log = function() {}
	$("#bahanbaku").on('change', function() {

		$(".harga").html($(this).find(':selected').attr('data-harga'));
		$(".harga").val($(this).find(':selected').attr('data-harga'));

		$(".nama").html($(this).find(':selected').attr('data-nama'));
		$(".nama").val($(this).find(':selected').attr('data-nama'));

	});
</script>
<script>
	console.log = function() {}
	$("#bb").on('change', function() {

		$(".nama").html($(this).find(':selected').attr('data-nama'));
		$(".nama").val($(this).find(':selected').attr('data-nama'));

		$(".harga").html($(this).find(':selected').attr('data-harga'));
		$(".harga").val($(this).find(':selected').attr('data-harga'));

		$(".stok").html($(this).find(':selected').attr('data-stok'));
		$(".stok").val($(this).find(':selected').attr('data-stok'));

	});
</script>
</body>

</html>
