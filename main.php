<?php
require_once "inc/Koneksi.php";
require_once "app/Mahasiswa.php";
require_once "app/Dosen.php";
require_once "app/Matakuliah.php";

$mhsw = new Mahasiswa();
$dosen = new Dosen();
$matkul = new Matakuliah();

$jam = (int) date('G');
$salam = $jam < 11 ? 'Selamat pagi' : ($jam < 15 ? 'Selamat siang' : ($jam < 18 ? 'Selamat sore' : 'Selamat malam'));

$sebaran = array_column($matkul->perSemester(), 'jml', 'smt');
$maks = max(array_merge([1], array_values($sebaran)));
?>
<div class="hero">
    <div>
        <h2><?php echo $salam; ?>, selamat datang!</h2>
        <p class="sub">SIAKAD Mini &mdash; buku catatan kuliah</p>
    </div>
    <div class="jam" id="jam"></div>
</div>

<div class="tiles">
    <a class="tile" href="index.php?page=mhsw"><span class="ico">🎓</span><b data-n="<?php echo $mhsw->total(); ?>">0</b><small>Mahasiswa</small></a>
    <a class="tile" href="index.php?page=dosen"><span class="ico">🧑‍🏫</span><b data-n="<?php echo $dosen->total(); ?>">0</b><small>Dosen</small></a>
    <a class="tile" href="index.php?page=matkul"><span class="ico">📚</span><b data-n="<?php echo $matkul->total(); ?>">0</b><small>Mata kuliah</small></a>
    <div class="tile"><span class="ico">🧮</span><b data-n="<?php echo $matkul->totalSks(); ?>">0</b><small>Total SKS ditawarkan</small></div>
</div>

<div class="grid2">
    <section class="panel">
        <h3>Sebaran mata kuliah per semester</h3>
        <div class="bars">
            <?php for ($s = 1; $s <= 8; $s++) { $j = (int) ($sebaran[$s] ?? 0); ?>
                <div class="bar"><span>Smt <?php echo $s; ?></span><i style="--w:<?php echo round($j / $maks * 100); ?>%"></i><em><?php echo $j; ?></em></div>
            <?php } ?>
        </div>
    </section>

    <section class="panel">
        <h3>Mahasiswa terbaru</h3>
        <ul class="feed">
            <?php foreach ($mhsw->latest(4) as $r) { ?>
                <li><span class="avatar" style="--h:<?php echo abs(crc32($r['mhsw_nama'])) % 360; ?>"><?php echo e(inisial($r['mhsw_nama'])); ?></span>
                    <div><b><?php echo e($r['mhsw_nama']); ?></b><small><?php echo e($r['mhsw_nim']); ?></small></div></li>
            <?php } ?>
        </ul>
        <h3>Dosen terbaru</h3>
        <ul class="feed">
            <?php foreach ($dosen->latest(3) as $r) { ?>
                <li><span class="avatar" style="--h:<?php echo abs(crc32($r['dosen_nama'])) % 360; ?>"><?php echo e(inisial($r['dosen_nama'])); ?></span>
                    <div><b><?php echo e($r['dosen_nama']); ?></b><small>Gol. <?php echo e($r['dosen_golongan'] ?: '-'); ?></small></div></li>
            <?php } ?>
        </ul>
    </section>
</div>

<section class="panel konsep">
    <h3>🔎 Bedah kode: Pewarisan (is-a)</h3>
    <ul><li>Setiap kelas model ditulis <code>extends Koneksi</code>, jadi <code>$this-&gt;koneksi</code> langsung tersedia.</li><li>Property <code>koneksi</code> bersifat <code>protected</code>: dipakai kelas turunan, tertutup dari luar.</li><li>Konsekuensinya: setiap <code>new Mahasiswa()</code> membuka koneksi database sendiri.</li></ul>
</section>
