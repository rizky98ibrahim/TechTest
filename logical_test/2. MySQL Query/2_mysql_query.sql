SELECT m.mhs_nama
FROM tb_mahasiswa AS m
JOIN tb_mahasiswa_nilai AS mn ON m.mhs_id = mn.mhs_id
JOIN tb_matakuliah AS mk ON mn.mk_id = mk.mk_id
WHERE mk.mk_kode = 'MK303'
ORDER BY mn.nilai DESC
LIMIT 1;
